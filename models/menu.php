<?php

function getMenus(){
    global $pdo;
    $sql = "select * from menu where status=" . STATUS_ACTIVE;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
}

function menuCreate($name, $url, $position, $status){
    global $pdo;
    $sql = "INSERT INTO `menu`(`name`, `url`, `position`, `status`) VALUES(:name, :url, :position, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":url", $url, PDO::PARAM_STR);
    $stmt->bindParam(":position", $position, PDO::PARAM_INT);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

function getMenuById($id){
    global $pdo;
    $sql = "SELECT * from menu where id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    try{
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

function menuUpdate($id, $name, $url, $position, $status){
    global $pdo;
    $sql = "UPDATE `menu`
            SET `name` = :name, 
                `url` = :url,
                `position` = :position,
                `status` = :status
            WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":url", $url, PDO::PARAM_STR);
    $stmt->bindParam(":position", $position, PDO::PARAM_INT);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

function deleteMenu($id){
    global $pdo;
    $sql = "DELETE FROM `menu` WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}
<?php

function getCategory(){
    global $pdo;
    $sql = "select * from category where status=" . STATUS_ACTIVE;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
}

function categoryCreate($name, $status){
    global $pdo;
    $sql = "INSERT INTO `category`(`name`, `status`) VALUES(:name, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

function getCategoryById($id){
    global $pdo;
    $sql = "SELECT * FROM category WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    try{
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

function categoryUpdate($id, $name, $status){
    global $pdo;
    $sql = "UPDATE `category`
            SET `name` = :name,
                 `status` =:status
            WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

function deleteCategory($id){
    global $pdo;
    $sql = "DELETE FROM `category` WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}
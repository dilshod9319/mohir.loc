<?php

function getAllNews($page)
{
    global $pdo;
    $offset = ($page-1)*LIMIT;
    $sql = "
    SELECT
        n.id,
        c.name as category_name,
        n.category_id as category_id,
        n.title,
        n.seen_count,
        n.created_at,
        n.description,
        n.image,
        n.body,
        n.status
    FROM news n
    LEFT JOIN category c ON n.category_id = c.id
    ORDER BY n.created_at DESC
    limit :offset, :limit
";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
    $stmt->bindValue(":limit", LIMIT, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getLastNews()
{
    global $pdo;

    $sql = "
    SELECT
        n.id,
        c.name as category_name,
        n.category_id as category_id,
        n.title,
        n.seen_count,
        n.created_at,
        n.description,
        n.image,
        n.body
    FROM news n
    LEFT JOIN category c ON n.category_id = c.id
    ORDER BY n.created_at DESC 
    LIMIT 3
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNewsById($id)
{
    global $pdo;

    $sql = "
    SELECT
        n.id,
        c.name as category_name,
        n.category_id as category_id,
        n.title,
        n.seen_count,
        n.created_at,
        n.description,
        n.image,
        n.body,
        n.status
    FROM news n
    LEFT JOIN category c ON n.category_id = c.id
    WHERE n.id = :id
";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateCount($id)
{
    global $pdo;
    $sql = "update news set seen_count = seen_count + 1 where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function getNewsByCategory($id)
{
    global $pdo;

    $sql = "
                SELECT
                    n.id as news_id,
                    c.name as category_name,
                    c.id,
                    n.category_id as category_id,
                    n.title,
                    n.seen_count,
                    n.created_at,
                    n.description,
                    n.image,
                    n.body
                    FROM news n
                    LEFT JOIN category c ON n.category_id = c.id
                    WHERE c.id = :id
";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function newsCreate($title, $description, $category_id, $body, $status, $image)
{
    global $pdo;
    $sql = "INSERT INTO `news`(`title`, `description`, `category_id`, `body`, `status`, `image`) 
    VALUES(:title, :description, :category_id, :body, :status, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":category_id", $category_id, PDO::PARAM_INT);
    $stmt->bindParam(":body", $body, PDO::PARAM_STR);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    try {
        $stmt->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function newsUpdate($id, $title, $description, $category_id, $body, $status, $image){
 global $pdo;
    $sql = "update `news`
            SET `title` = :title,
                `description` = :description,
                `category_id` = :category_id,
                `body` = :body,
                `status` = :status,
                `image` = :image
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":category_id", $category_id, PDO::PARAM_INT);
    $stmt->bindParam(":body", $body, PDO::PARAM_STR);
    $stmt->bindParam(":status", $status, PDO::PARAM_INT);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        dd($e->getMessage());
    }
}

function deleteNews($id){
    global $pdo;
    $sql = "DELETE FROM `news` WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    try{
        return $stmt->execute();
    }catch(PDOException $e){
        dd($e->getMessage());
    }
}

<?php

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
    WHERE n.status = " . STATUS_ACTIVE . " 
      AND c.status = " . STATUS_ACTIVE . "
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
        n.body
    FROM news n
    LEFT JOIN category c ON n.category_id = c.id
    WHERE n.status = " . STATUS_ACTIVE . " 
      AND c.status = " . STATUS_ACTIVE . "
      AND n.id = :id
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
                    WHERE n.status = " . STATUS_ACTIVE . " 
                    AND c.status = " . STATUS_ACTIVE . "
                    AND c.id = :id
";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

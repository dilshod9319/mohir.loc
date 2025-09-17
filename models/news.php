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
    WHERE n.status = " .STATUS_ACTIVE. " 
      AND c.status = " .STATUS_ACTIVE. "
    ORDER BY n.created_at DESC 
    LIMIT 3
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

<?php

function getCategory(){
    global $pdo;
    $sql = "select * from category where status=" . STATUS_ACTIVE;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
}
<?php

function getMenus(){
    global $pdo;
    $sql = "select * from menu where status=" . STATUS_ACTIVE;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
}
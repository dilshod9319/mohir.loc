<?php
const STATUS_ACTIVIVE=1;
const STATUS_NOT_ACTIVIVE=2;

function getMenus(){
    global $pdo;
    $sql = "select * from menu where status=" . STATUS_ACTIVIVE;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
}
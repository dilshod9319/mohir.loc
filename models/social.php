<?php
function getSocial(){
    global $pdo;
    $sql = "select * from social where status=" . STATUS_ACTIVIVE;
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
}
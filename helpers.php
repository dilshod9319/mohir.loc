<?php

function dd($arr, $die = false)
{
    if ($die) {
        echo "<pre>";
        print_r($arr);
        die();
    } else {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

function getImage($table_name, $id, $fileName)
{
    if (empty($fileName)) {
        return "/assets/images/about-us.jpg";
    }
    $imagePath = $_SERVER['DOCUMENT_ROOT'] .  "/uploads/{$table_name}/{$id}/{$fileName}";
    if (file_exists($imagePath)) {
        return "/uploads/{$table_name}/{$id}/{$fileName}";
    }

    return "/assets/images/about-us.jpg";
}

function saveImage($table_name, $id, $fileName)
{
    if (!isset($_FILES) && $_FILES['image']['error'] !== 0) {
        return false;
    }

    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];

    $file = $_FILES['image'];

    if (!in_array($file['type'], $allowed_types)) {
        return false;
    }

    $folderPath = $_SERVER['DOCUMENT_ROOT'] .  "/uploads/{$table_name}/{$id}";
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    $filePath = $folderPath . '/' . $fileName;
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return true;
    } else {
        return false;
    }
}

function getImageName()
{
    if (!empty($_FILES)) {
        $file = $_FILES['image'];
        $fileArray = explode('.', $file['name']);
        $fileType = end($fileArray);
        $image = md5($fileArray[0]) . '.' . $fileType;
        return $image;
    }
    return null;
}

function deleteImage($table_name, $id, $fileName){
    $filePath = $_SERVER['DOCUMENT_ROOT'] .  "/uploads/{$table_name}/{$id}/{$fileName}";
    if(file_exists($filePath)){
        if(unlink($filePath)){
            return true;
        }
    }

    return false;
}

function deleteFolder($table_name, $id){
    $filePath = $_SERVER['DOCUMENT_ROOT'] .  "/uploads/{$table_name}/{$id}";
    if(file_exists($filePath)){
        if(rmdir($filePath)){
            return true;
        }
    }

    return false;
}

function getPagination($tableName){
    global $pdo;
    $sql = "SELECT * FROM {$tableName}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    $pageCount = ceil($rowCount/LIMIT);
    return $pageCount;
}

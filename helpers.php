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

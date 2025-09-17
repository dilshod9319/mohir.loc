<?php

require_once "models/mainModel.php";
$menus = getMenus();
$socials = getSocial();
$news = getLastNews();
$category = getCategory();
if(!empty($_GET) && !empty($_GET['controller'])){
    $controller = $_GET['controller'];
    switch($controller){
        case 'news_view':
            require_once "views/view.php";
            break;
    }
}else{
    require_once "views/index.php";
}


// dd($news, true);


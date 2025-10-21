<?php

require_once "models/mainModel.php";
$menus = getMenus();
$socials = getSocial();
$news = getLastNews();
$category  = getCategory();
if(!empty($_GET) && !empty($_GET['controller'])){
    $controller = $_GET['controller'];
    switch($controller){
        case 'news_view':
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id =  $_GET['id'];
                if(!is_numeric($id)){
                    require_once "views/error.php";
                }
                $newsItem = getNewsById($id);
                if(updateCount($id)){
                    require_once "views/view.php";
                }
            }else{
                require_once "views/error.php";
            }
            break;
    }
}else{
    require_once "views/index.php";
}


// dd($news, true);


<?php
session_start();
require_once __DIR__ . "/../../models/mainModel.php";
if(isset($_GET['acontroller']) && !empty($_GET['acontroller'])){
    $controller = $_GET['acontroller'];
    switch($controller){
        case "menu_index":
            $menus = getMenus();
            require_once __DIR__ .  "/../views/menu/menu_index.php";
            break;
            case "menu_create":
                if(!empty($_POST)){
                    $name = $_POST['name'];
                    $url = $_POST['url'];
                    $position = $_POST['position'];
                    $status = $_POST['status'];
                    if(!empty($name) && !empty($url) && !empty($position) && !empty($status) ){
                        if(menuCreate($name, $url, $position, $status)){
                            $_SESSION['success'] = "Menu muvaffaqiyatli qo'shildi";
                            header("Location:?acontroller=menu_index"); exit();
                        }
                    }else{
                        $_SESSION['error'] = "Barcha maydonlarni to'ldiring" ;
                    }
                }
                require_once __DIR__ .  "/../views/menu/menu_form.php";
            break;
            case "menu_update":
                if(!isset($_GET['id']) || empty($_GET['id'])){
                    require_once __DIR__ .  "/../views/404.php";
                }
                $id = $_GET['id'];
                $menuItem = getMenuById($id);
                if(!$menuItem){
                    require_once __DIR__ .  "/../views/404.php";
                }
                if(!empty($_POST)){
                    $name = $_POST['name'];
                    $url = $_POST['url'];
                    $position = $_POST['position'];
                    $status = $_POST['status'];
                    if(!empty($name) && !empty($url) && !empty($position) && !empty($status) ){
                        if(menuUpdate($id, $name, $url, $position, $status)){
                            $_SESSION['success'] = "Menu muvaffaqiyatli tahrirlandi";
                            header("Location:?acontroller=menu_index"); exit();
                        }
                    }else{
                        $_SESSION['error'] = "Barcha maydonlarni to'ldiring" ;
                    }
                }

            require_once __DIR__ .  "/../views/menu/menu_form.php";
            break;
            case "menu_delete":
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $id = $_GET['id'];
                    if(deleteMenu($id)){
                        $_SESSION['success'] = "Menu muvaffaqiyatli o'chirildi";
                       header("Location:?acontroller=menu_index"); exit(); 
                    }
                }
            break;
            case 'category_index':
                $categories = getCategory();
                 require_once __DIR__ .  "/../views/category/category_index.php";
                break;
                case "category_create":
                if(!empty($_POST)){
                    $name = $_POST['name'];
                    $status = $_POST['status'];
                    if(!empty($name) && !empty($status) ){
                        if(categoryCreate($name, $status)){
                            $_SESSION['success'] = "Kategoriya muvaffaqiyatli qo'shildi";
                            header("Location:?acontroller=category_index"); exit();
                        }
                    }else{
                        $_SESSION['error'] = "Barcha maydonlarni to'ldiring" ;
                    }
                }
                require_once __DIR__ .  "/../views/category/category_form.php";
            break;
            case "category_update":
                if(!isset($_GET['id']) || empty($_GET['id'])){
                    require_once __DIR__ .  "/../views/404.php";
                }
                $id = $_GET['id'];
                $categoryItem = getCategoryById($id);
                if(!$categoryItem){
                    require_once __DIR__ .  "/../views/404.php";
                }
                if(!empty($_POST)){
                    $name = $_POST['name'];
                    $status = $_POST['status'];
                    if(!empty($name) && !empty($status) ){
                        if(categoryUpdate($id, $name, $status)){
                            $_SESSION['success'] = "Kategoriya muvaffaqiyatli tahrirlandi";
                            header("Location:?acontroller=category_index"); exit();
                        }
                    }else{
                        $_SESSION['error'] = "Barcha maydonlarni to'ldiring" ;
                    }
                }

            require_once __DIR__ .  "/../views/category/category_form.php";
            break;
            case "category_delete":
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $id = $_GET['id'];
                    if(deleteCategory($id)){
                        $_SESSION['success'] = "Kategoriya muvaffaqiyatli o'chirildi";
                       header("Location:?acontroller=category_index"); exit(); 
                    }
                }
            break;
    }
}else{
    require_once "views/index.php";
}
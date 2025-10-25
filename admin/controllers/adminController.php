<?php
session_start();
require_once __DIR__ . "/../../models/mainModel.php";
if (isset($_GET['acontroller']) && !empty($_GET['acontroller'])) {
    $controller = $_GET['acontroller'];
    switch ($controller) {
        // menu CRUD start
        case "menu_index":
            $menus = getMenus();
            require_once __DIR__ .  "/../views/menu/menu_index.php";
            break;
        case "menu_create":



            if (!empty($_POST)) {
                $name = $_POST['name'];
                $url = $_POST['url'];
                $position = $_POST['position'];
                $status = $_POST['status'];
                if (!empty($name) && !empty($url) && !empty($position) && !empty($status)) {
                    if (menuCreate($name, $url, $position, $status)) {
                        $_SESSION['success'] = "Menu muvaffaqiyatli qo'shildi";
                        header("Location:?acontroller=menu_index");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Barcha maydonlarni to'ldiring";
                }
            }
            require_once __DIR__ .  "/../views/menu/menu_form.php";
            break;
        case "menu_update":
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                require_once __DIR__ .  "/../views/404.php";
            }
            $id = $_GET['id'];
            $menuItem = getMenuById($id);
            if (!$menuItem) {
                require_once __DIR__ .  "/../views/404.php";
            }
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $url = $_POST['url'];
                $position = $_POST['position'];
                $status = $_POST['status'];
                if (!empty($name) && !empty($url) && !empty($position) && !empty($status)) {
                    if (menuUpdate($id, $name, $url, $position, $status)) {
                        $_SESSION['success'] = "Menu muvaffaqiyatli tahrirlandi";
                        header("Location:?acontroller=menu_index");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Barcha maydonlarni to'ldiring";
                }
            }

            require_once __DIR__ .  "/../views/menu/menu_form.php";
            break;
        case "menu_delete":
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                if (deleteMenu($id)) {
                    $_SESSION['success'] = "Menu muvaffaqiyatli o'chirildi";
                    header("Location:?acontroller=menu_index");
                    exit();
                }
            }
            break;
        // menu CRUD end
        // category CRUD start
        case 'category_index':
            $categories = getCategory();
            require_once __DIR__ .  "/../views/category/category_index.php";
            break;
        case "category_create":
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $status = $_POST['status'];
                if (!empty($name) && !empty($status)) {
                    if (categoryCreate($name, $status)) {
                        $_SESSION['success'] = "Kategoriya muvaffaqiyatli qo'shildi";
                        header("Location:?acontroller=category_index");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Barcha maydonlarni to'ldiring";
                }
            }
            require_once __DIR__ .  "/../views/category/category_form.php";
            break;
        case "category_update":
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                require_once __DIR__ .  "/../views/404.php";
            }
            $id = $_GET['id'];
            $categoryItem = getCategoryById($id);
            if (!$categoryItem) {
                require_once __DIR__ .  "/../views/404.php";
            }
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $status = $_POST['status'];
                if (!empty($name) && !empty($status)) {
                    if (categoryUpdate($id, $name, $status)) {
                        $_SESSION['success'] = "Kategoriya muvaffaqiyatli tahrirlandi";
                        header("Location:?acontroller=category_index");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Barcha maydonlarni to'ldiring";
                }
            }

            require_once __DIR__ .  "/../views/category/category_form.php";
            break;
        case "category_delete":
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                if (deleteCategory($id)) {
                    $_SESSION['success'] = "Kategoriya muvaffaqiyatli o'chirildi";
                    header("Location:?acontroller=category_index");
                    exit();
                }
            }
            break;
        // category CRUD end
        // news CRUD start
        case "news_index":
            $news = getAllNews();
            require_once __DIR__ .  "/../views/news/news_index.php";
            break;
        case "news_create":
            $categories = getCategory();
            $image = getImageName();

            if ($_POST) {
                $title = $_POST['title'];
                $category_id = $_POST['category_id'];
                $description = $_POST['description'];
                $body = $_POST['body'];
                $status = $_POST['status'];
                if (!empty($title) && !empty($category_id) && !empty($description) && !empty($body)) {
                    if ($lastId = newsCreate($title, $description, $category_id, $body, $status, $image)) {
                        saveImage('news', $lastId, $image);
                        $_SESSION['success'] = "Yangilik muvaffaqiyatli yaratildi";
                        header("Location: ?acontroller=news_index");
                        die();
                    }
                } else {
                    $_SESSION['error'] = "Barcha maydonlarni to'ldiring";
                }
            }
            require_once __DIR__ .  "/../views/news/news_form.php";
            break;
        case 'news_update':
            $categories = getCategory();
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                require_once __DIR__ .  "/../views/404.php";
            }
            $id = $_GET['id'];
            $newsItem = getNewsById($id);
            if (!$newsItem) {
                require_once __DIR__ .  "/../views/404.php";
            }
            $oldImage = getImage('news', $newsItem['id'], $newsItem['image']);
            $image = getImageName();
            if (!empty($image) && !empty($oldImage)) {
                deleteImage('news', $newsItem['id'], $newsItem['image']);
            }
            if (!empty($_POST)) {
                $title = $_POST['title'];
                $category_id = $_POST['category_id'];
                $description = $_POST['description'];
                $body = $_POST['body'];
                $status = $_POST['status'];
                if (!empty($title) && !empty($category_id) && !empty($description) && !empty($body)) {
                    if (newsUpdate($id, $title, $description, $category_id, $body, $status, $image)) {
                        saveImage('news', $newsItem['id'], $image);
                        $_SESSION['success'] = "Yangilik muvaffaqiyatli tahrirlandi";
                        header("Location:?acontroller=news_index");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Barcha maydonlarni to'ldiring";
                }
            }

            require_once __DIR__ .  "/../views/news/news_form.php";
            break;
        case "news_delete":
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $newsItem = getNewsById($id);
                if (!empty($newsItem)) {
                    $deleteImage = deleteImage('news', $newsItem['id'], $newsItem['image']);
                    $deleteFolder = deleteFolder('news', $id);
                    if (deleteNews($id) && $deleteImage) {
                        $_SESSION['success'] = "Yangilik muvaffaqiyatli o'chirildi";
                        header("Location:?acontroller=news_index");
                        exit();
                    } else {
                        $_SESSION['error'] = "Yangilikni o'chirishda xatolik sodir bo'ldi";
                        header("Location:?acontroller=news_index");
                        exit();
                    }
                }
            }
            break;
    }
} else {
    require_once "views/index.php";
}

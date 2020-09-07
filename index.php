<?php
    session_start();

    include('templates/header.php');
    include('settings/settings.config.php');

    spl_autoload_register('classLoader');

    $item = new Shop($localhost);
    $user = new User($localhost);

    $page = 'showHomePage';

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }

    switch ($page) {
        case 'about':
            include('templates/frontend/about.php');
            break;
        case 'contact':
            include('templates/frontend/contact.php');
            break;
        case 'single':
            include('templates/frontend/single.php');
            break;
        case 'loginForm':
            include('templates/auth/loginForm.php');
            break;
        case 'registerForm':
            include('templates/auth/registerForm.php');
            break;
        case 'login':
            include('auth/login.php');
            break;
        case 'logout':
            include('auth/logout.php');
            break;
        case 'register':
            include('auth/register.php');
            break;
        case 'cart':
            switch ($action) {
                case 'add':
                    include('cart/addCart.php');
                    break;
                case 'modify':
                    include('cart/modifyCart.php');
                    break;
                case 'removeCart':
                    include('cart/removeCart.php');
                    break;
                case 'removeProduct':
                    include('cart/removeProduct.php');
                    break;
                default:
                    include('cart/addCart.php');
            }
            break;
        case 'showCart':
            include('templates/cart/showCart.php');
            break;
        case 'order':
            include('templates/order/order.php');
            break;
        default:
            include('templates/frontend/home.php');
    }
    include('templates/footer.php');

    function classLoader($name)
    {
        if (file_exists("class/$name.php")) {
            require_once("class/$name.php");
        } else {
            throw new Exception("Brak pliku z definicją klasy");
        }
    }

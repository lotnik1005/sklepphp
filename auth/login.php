<?php
    /**
     * login and create user session
     */

    $name = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user_name = $user->login($name, $password);

    if($user_name) {
        $_SESSION['user_name'] = $user_name;
        header("Location: index.php");
    } else {
        header("Location: index.php?page=loginForm");
    }

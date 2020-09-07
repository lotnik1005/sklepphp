<?php
    /**
     * register new user
     * start user session
     */

    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user_name = $user->register($name, $username, $email, $password);

    $_SESSION['user_name'] = $user_name;

    header("Location: index.php");

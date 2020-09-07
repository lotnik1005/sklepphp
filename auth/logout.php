<?php
    /**
     * logout and destroy user session
     */

    session_start();

    $_SESSION['user_name'] = [];

    unset($_SESSION['user_name']);

    header("Location: index.php");

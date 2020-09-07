<?php
    /**
     * remove all cart
     */

    if(isset($_SESSION['shopping_cart'])) {
        unset($_SESSION['shopping_cart']);
        $_SESSION['shopping_cart'] = [];
        session_destroy();
    }
    header('Location: index.php');
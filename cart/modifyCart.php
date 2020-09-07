<?php
    /**
     * modify product in cart
     */

    $amount = $_POST['amount'];
    $prod_name = $_POST['prod_name'];

    foreach($_SESSION['shopping_cart'] as $key => $value) {
        if($value['name'] == $prod_name) {
            $_SESSION['shopping_cart'][$key]['quantity'] = $amount;
        }
    }

    header('Location: index.php?page=showCart');

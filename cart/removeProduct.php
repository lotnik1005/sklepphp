<?php
    /**
     * remove product from cart
     */

    $prod_name = $_POST['prod_name'];
    foreach($_SESSION['shopping_cart'] as $key => $value) {
        if($value['name'] == $prod_name) {
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    header("Location: index.php?page=showCart");



<?php
    /**
     * add product to cart
     */

    $id = $_POST['prod_id'];
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
    } else {
        $amount = 1;
    }

    $result = $item->show('products', null, $id);

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $id = $row['id'];
    $index = $row['indeks'];
    $name = $row['name'];
    $price = $row['net_price'];

    $cartArray = [
        $id => [
            'name' => $name,
            'index' => $index,
            'price' => $price,
            'quantity' => $amount
        ]
    ];

    if (empty($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = $cartArray;
    } else {
        $array_keys = array_keys($_SESSION['shopping_cart']);
        if (in_array($id, $array_keys)) {
            $status = "<div class='box' style='color:red';'>Produkt jest już w koszyku</div>";
        } else {
            $_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $cartArray);
            $status = "<div class='box'>Produkt dodany do koszyka</div>";
        }
    }
    if (isset($_POST['single'])) {
        header("Location: index.php?page=single&prod_id=" . $id);
    } else {
        header("Location: index.php");
    }

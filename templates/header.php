<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sklep sieciowy">
    <meta name="author" content="Poczynajło Grzegorz">

    <title>Sklep - sprzęt sieciowy</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                if (isset($_SESSION['user_name'])) :
                ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=about">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=contact">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=logout">Wyloguj</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= $_SESSION['user_name']; ?></a>
                        </li>
                        <li class="nav-item cart">
                            <?php
                            if (!empty($_SESSION['shopping_cart'])) {
                                $cart_count = count(array_keys($_SESSION['shopping_cart']));
                            ?>
                                <div class="cart-content">
                                    <a href="index.php?page=showCart"><?= $cart_count ?></a>
                                </div>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                <?php
                else :
                ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=about">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=contact">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginForm">Logowanie</a>
                        </li>
                        <li class="nav-item cart">

                            <?php
                            if (!empty($_SESSION['shopping_cart'])) {
                                $cart_count = count(array_keys($_SESSION['shopping_cart']));
                            ?>
                                <div class="cart-content">
                                    <a href="index.php?page=showCart"><?= $cart_count ?></a>
                                </div>
                            <?php
                            }
                            ?>

                        </li>
                    </ul>
                <?php
                endif;
                ?>
            </div>
        </div>
    </nav>
    
    <div class="container">
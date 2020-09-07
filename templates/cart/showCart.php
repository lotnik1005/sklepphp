<div class="row cart-show content">
    <?php
    if (!empty($_SESSION['shopping_cart'])) :
    ?>
        <div class="col-12 mt-5">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Dostępność</th>
                            <th scope="col" class="text-center">Cena</th>
                            <th scope="col" class="text-center">Ilość</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        foreach ($_SESSION['shopping_cart'] as $product) {
                            $shipping = 10;
                            $sum += $product['price'] * $product['quantity'];
                        ?>
                            <tr>
                                <td></td>
                                <td><?= $product['name'] ?></td>
                                <td>Dostępny</td>
                                <td class="text-center"><?= $product['price'] ?> PLN</td>
                                <form action="index.php?page=cart" method="POST">
                                    <td><input class="form-control col-7 offset-5" type="text" name="amount" value="<?= $product['quantity'] ?>"></td>
                                    <input type="hidden" name="action" value="modify">
                                    <input type="hidden" name="prod_name" value="<?= $product['name'] ?>">
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-primary form-control"><i class="fa fa-trash"></i>Aktualizuj</button>
                                    </td>
                                </form>
                                <td class="text-right">
                                    <form action="index.php?page=cart" method="POST">
                                        <input type="hidden" name="action" value="removeProduct">
                                        <input type="hidden" name="prod_name" value="<?= $product['name'] ?>">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Wartość towaru</td>
                            <td class="text-right"><?= $sum ?> PLN</td>
                            <td class="text-right pt-5" rowspan="3">
                                <form action="index.php?page=cart" method="POST">
                                    <input type="hidden" name="action" value="removeCart">
                                    <button class="btn btn-danger">Wyczyść koszyk</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Przesyłka</td>
                            <td class="text-right"><?= $shipping ?> PLN</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Razem</strong></td>
                            <td class="text-right"><strong><?= $sum + $shipping ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="index.php">
                        <button class="btn btn-block btn-light">Kontynuuj zakupy</button>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="index.php?page=order"><button class="btn btn-lg btn-block btn-success text-uppercase">Zamów</button></a>
                </div>
            </div>
        </div>
    <?php
    else :
    ?>
        <div class="col-12 text-center">
            <h1>Twój koszyk jest pusty</h1>
            <a href="index.php"><button class="btn btn-primary mt-5">Powrót do sklepu</button></a>
        </div>
    <?php
    endif;
    ?>
</div>
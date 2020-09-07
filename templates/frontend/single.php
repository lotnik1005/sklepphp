<?php
$prodId = $_GET['prod_id'];
$result = $item->show('products', null, $prodId);
$product = $result->fetch(PDO::FETCH_ASSOC);
?>
<div class="row single-product-page mt-5 mb-5">
    <div class="col-md-6">
        <div class="show" href="1.jpg">
            <img src="images/<?= $product['indeks']; ?>-0.png" id="show-img">
        </div>
        <div class="small-img">
            <img src="images/next-icon.png" class="icon-left" alt="" id="prev-img">
            <div class="small-container">
                <div id="small-img-roll">
                    <?php
                    foreach ($item->getProductPictures($product['indeks']) as $picture) {
                    ?>
                        <img src="<?= $picture; ?>" class="show-small-img" alt="">
                    <?php
                    }
                    ?>
                </div>
            </div>
            <img src="images/next-icon.png" class="icon-right" alt="" id="next-img">
        </div>
    </div>
    <div class="col-md-6">
        <h1 class="mt-5"><?= $product['name']; ?></h1>
        <h4>ZŁ <?= $product['net_price']; ?></h4>
        <form action="index.php?page=cart" method="post" class="form-inline">
            <input type="number" name="amount" class="form-group" placeholder="ilość" required>
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="single">
            <input type="hidden" name="prod_id" value="<?= $product['id'] ?>">
            <button type="submit" class="btn btn-primary ml-4">Dodaj do koszyka</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#description-single-product">Opis</a>
            </li>
        </ul>
        <div id="description-single-product">
            <?= $product['description']; ?>
        </div>
    </div>
</div>
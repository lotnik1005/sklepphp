<div class="row home content">

    <div class="col-lg-3">

        <h1 class="my-4">Kategorie</h1>
        <?php
        $categories = $item->show('categories');
        ?>
        <div class="list-group">
            <a href="index.php" class="list-group-item">Strona główna</a>
            <?php
            foreach ($categories as $category) {
            ?>
                <a href="index.php?cat_id=<?= $category['id']; ?>" class="list-group-item"><?= $category['name']; ?></a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="row">
            <?php
            if (isset($_GET['cat_id'])) {
                $id = $_GET['cat_id'];
            } else {
                $id = null;
            }

            $products = $item->show('products', $id);

            foreach ($products as $product) {
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <?php
                        $filename = "images/" . $product['indeks'] . "-0.png";
                        if (file_exists($filename)) :
                        ?>
                            <img class="card-img-top" src="<?php echo $filename; ?>" alt="">
                        <?php
                        endif;
                        ?>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="index.php?page=single&prod_id=<?= $product['id']; ?>"><?= $product['name']; ?></a>
                            </h4>
                            <h5><?= $product['net_price']; ?> PLN</h5>
                            <p class="card-text"><?= substr($product['description'], 0, 90); ?> ...<a href="index.php?page=single&prod_id=<?= $product['id']; ?>">Więcej</a></p>
                            <form action="index.php?page=cart" method="POST">
                                <input type="hidden" name="prod_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="action" value="add">
                                <button class="btn btn-primary">Do koszyka</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
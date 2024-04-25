<?php
require_once('config/products.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск (<?= $_GET['search'] ?>)</title>
    <link rel="stylesheet" href="css/catalog.css">
</head>

<body>
    <?php
    $search = true;
    require_once('header.php')
    ?>

    <main>
        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">

            <h1>Поиск (<?= $_GET['search'] ?>)</h1>


            <div class="product-block">
                <?php
                addProductListUser($products, $productsPhoto);
                ?>

            </div>

        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

<script src="script/basket-add.js"></script>

</html>
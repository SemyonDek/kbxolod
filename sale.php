<?php
require_once('config/slider.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спецпредложения на некоторые товары</title>
    <link rel="stylesheet" href="css/catalog.css">
</head>

<body>
    <?php
    $sale = true;
    require_once('header.php')
    ?>

    <main>
        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>

        </div>

        <div class="main-block">

            <h1>Спецпредложения на некоторые товары</h1>

            <div class="product-block">
                <?php
                addSaleListUser($productsSale, $TableProdAll, $TablePhotoProd);
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
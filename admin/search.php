<?php
require_once('../config/products.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="icon" href="img/svg/favicon.svg" type="image/svg">
    <link rel="stylesheet" href="../css/catalog.css">
</head>

<body>

    <?php
    $searchPage = true;
    require_once('header.php')
    ?>

    <main>

        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>


        <div class="main-block">
            <h1 style="text-align: center;">Поиск (<?= $_GET['search'] ?>)</h1>
            <input id="search" name="search" value="<?= $_GET['search'] ?>" type="hidden">

            <div id="product-list-block" class="product-block">
                <?php
                addProductListAmd($products, $productsPhoto);
                ?>
            </div>

        </div>

    </main>

</body>

<script src="../script/product-del.js"></script>

</html>
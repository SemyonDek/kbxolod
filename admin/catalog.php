<?php
require_once('../config/products.php');
require_once('../config/brands.php');
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
    $catalogPage = true;
    require_once('header.php')
    ?>

    <main>

        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
            <div class="filter-block">
                <div class="title">Фильтр</div>
                <form id="filter-form" action="" method="get">
                    <p>Производитель</p>
                    <select name="brand" id="brand">
                        <?php
                        if (isset($_GET['brand'])) {
                            addSelectBrand($brand, $_GET['brand']);
                        } else {

                            addSelectBrand($brand);
                        }
                        ?>
                    </select>
                    <p>Цена</p>
                    <div class="line-input-filter">
                        <p>от</p>
                        <input name="min_price" id="min_price" value="<?php if (isset($_GET['min_price'])) echo $_GET['min_price'] ?>" type="number">
                        <p>до</p>
                        <input name="max_price" id="max_price" value="<?php if (isset($_GET['max_price'])) echo $_GET['max_price'] ?>" type="number">
                    </div>
                    <p>Температура</p>
                    <div class="line-input-filter">
                        <p>от</p>
                        <input name="min_temp" id="min_temp" value="<?php if (isset($_GET['min_temp'])) echo $_GET['min_temp'] ?>" type="number">
                        <p>до</p>
                        <input name="max_temp" id="max_temp" value="<?php if (isset($_GET['max_temp'])) echo $_GET['max_temp'] ?>" type="number">
                    </div>
                    <input type="submit" value="Применить">
                </form>
                <form action="">
                    <input type="submit" value="Сбросить">
                </form>
            </div>
        </div>


        <div class="main-block">
            <h1 style="text-align: center;">Список товаров</h1>
            <a class="btn-primary" href="product-add.php">Добавить</a>

            <div class="pagination">
                <?php
                if ($TableProdCount > 8) {
                    $page = $TableProdCount / 8;
                    if ($TableProdCount % 8 > 0) $page++;
                    for ($i = 1; $i <= $page; $i++) {
                ?>
                        <div class="pagination-item <?php if ($pageNumber == $i) echo 'active-pagination'; ?>" onclick="pageSwipe(<?= $i ?>)"><?= $i ?></div>
                <?php
                    }
                }
                ?>
            </div>

            <div id="product-list-block" class="product-block">
                <?php
                addProductListAmd($products, $productsPhoto);
                ?>
            </div>

            <div class="pagination">
                <?php
                if ($TableProdCount > 8) {
                    $page = $TableProdCount / 8;
                    if ($TableProdCount % 8 > 0) $page++;
                    for ($i = 1; $i <= $page; $i++) {
                ?>
                        <div class="pagination-item <?php if ($pageNumber == $i) echo 'active-pagination'; ?>" onclick="pageSwipe(<?= $i ?>)"><?= $i ?></div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

    </main>


</body>

<script src="../script/product-del.js"></script>
<script src="../script/page-swipe.js"></script>

</html>
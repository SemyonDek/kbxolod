<?php
require_once('config/connect.php');
require_once('config/brands.php');
$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
$catparentid = $categoryitem['PARENT'];
$categoryparentitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catparentid'");
$categoryparentitem = mysqli_fetch_assoc($categoryparentitem);
require_once('config/products.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шкафы холодильные (0... +15)</title>
    <link rel="stylesheet" href="css/catalog.css">
</head>

<body>
    <?php
    $categoryPage = true;
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
                    <input name="catid" id="catid" value="<?= $categoryitem['ID'] ?>" type="hidden">
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
                    <input name="catid" id="catid" value="<?= $categoryitem['ID'] ?>" type="hidden">
                    <input type="submit" value="Сбросить">
                </form>
            </div>
        </div>

        <div class="main-block">
            <div class="breadcrumb">
                <a class="active-breadcrumb" href="catalog-category.php">Каталог</a>
                <p>/</p>
                <a class="active-breadcrumb" href="catalog-subcategory.php?catid=<?= $categoryparentitem['ID'] ?>"><?= $categoryparentitem['NAME'] ?></a>
                <p>/</p>
                <a class="deactive-breadcrumb" href="catalog.php?catid=<?= $categoryitem['ID'] ?>"><?= $categoryitem['NAME'] ?></a>
            </div>

            <h1><?= $categoryitem['NAME'] ?></h1>
            <p><?= nl2br($categoryitem['TEXT']) ?></p>

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

            <div class="product-block">
                <?php
                addProductListUser($products, $productsPhoto);
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

    <?php
    require_once('footer.php')
    ?>

</body>

<script src="script/basket-add.js"></script>
<script src="script/page-swipe.js"></script>

</html>
<?php
require_once('config/connect.php');
require_once('config/review.php');
$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);

$countPagePhoto = count($productPhoto);
if ($countPagePhoto > 2) {
    $countPagePhoto--;
} else {
    $countPagePhoto = 1;
}

$catid = $productitem['CATID'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
$catparentid = $categoryitem['PARENT'];
$categoryparentitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catparentid'");
$categoryparentitem = mysqli_fetch_assoc($categoryparentitem);

$reviewsProd = mysqli_query($ConnectDatabase, "SELECT * FROM `review` WHERE PRODID = '$prodid' AND STATUS = 1");
$reviewsProd = mysqli_fetch_all($reviewsProd, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Холодильный шкаф витринного типа GASTRORAG SC316G.A</title>
    <link rel="stylesheet" href="css/product-card.css">
</head>

<body>

    <?php
    $category = true;
    require_once('header.php')
    ?>

    <main>
        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">
            <div class="breadcrumb">
                <a class="active-breadcrumb" href="catalog-category.php">Каталог</a>
                <p>/</p>
                <a class="active-breadcrumb" href="catalog-subcategory.php?catid=<?= $categoryparentitem['ID'] ?>"><?= $categoryparentitem['NAME'] ?></a>
                <p>/</p>
                <a class="active-breadcrumb" href="catalog.php?catid=<?= $categoryitem['ID'] ?>"><?= $categoryitem['NAME'] ?></a>
            </div>

            <h1><?= $productitem['NAME'] ?></h1>

            <div class="product-info-block">
                <div class="product-img-block">

                    <div class="ptoduct-list-block">
                        <div class="hidden-block">
                            <input id="countpagesslider" type="hidden" value="<?= $countPagePhoto ?>">
                            <div id="slider" class="slider-photo-block">
                                <?php
                                foreach ($productPhoto as $itemPhoto) {
                                ?>
                                    <div class="item-img-list item-img-active">
                                        <img class="item-img" src="<?= $itemPhoto['SRC'] ?>" alt="">
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>

                        <div class="button-slider-block">
                            <div id="btn-slid-top" class="button-slider-item button-slider-top"></div>
                            <div id="btn-slid-bottom" class="button-slider-item button-slider-bottom"></div>
                        </div>
                    </div>

                    <div class="main-img-block">
                        <img id="main-photo" src="<?= $productPhoto[0]['SRC'] ?>" alt="">
                    </div>
                </div>

                <div class="product-buy-block">
                    <div class="buy-button-block">
                        <p>Цена</p>
                        <div class="price-wr">
                            <div class="item-price-box">
                                <div class="i-price-wr"> <?= number_format($productitem['PRICE'], 0, '.', ' ') . ' ' ?> <span>р.</span></div>
                                <div title="В корзину" class="basket-btn-wr">
                                    <div>
                                        <span>
                                            <span class=" btn btn-sm btn-primary" onclick="addBasket(<?= $productitem['ID'] ?>)">
                                                <i class="fa fa-cart-plus"></i> В&nbsp;корзину
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dostavka">
                            <span style="font-size: 10px;">Доставка</span>
                            <br>
                            <img src="img/main/dostavka.png" alt="Доставка по России">
                            <br>
                            <span style="font-size: 10px;">по России</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <h1 style="text-align:center;">Описание</h1> -->
            <h3>Описание</h3>

            <div class="product-description-block">
                <ul>
                    <li>Производитель: <?= $productitem['BRAND'] ?>.</li>
                    <li>Габаритные размеры: <?= $productitem['XSIZE'] ?>х<?= $productitem['YSIZE'] ?>х<?= $productitem['ZSIZE'] ?> мм (ДхШхВ).</li>
                    <li>Температурный диапазон: <?= $productitem['MINTEMP'] ?>...<?= $productitem['MAXTEMP'] ?> С.</li>
                    <li>Объем: <?= $productitem['VOLUME'] ?> л.</li>
                    <li>Мощность: <?= $productitem['POWER'] ?> кВт.</li>
                    <li>Напряжение: <?= $productitem['MINTEMP'] ?> В.</li>
                    <li>Вес: <?= $productitem['VOLTAGE'] ?> кг.</li>
                    <li>Цвет: <?= $productitem['COLOR'] ?>.</li>
                </ul>
                <p><?= nl2br($productitem['TEXT']) ?></p>
            </div>

            <h3>Отзывы</h3>

            <div class="review-block">
                <form id="review-form" action="">
                    <?php
                    if ($reviewsProd == []) {
                    ?>
                        <h3>Отзывов ещё нет<?php if (isset($_SESSION['accountName'])) echo ', будьте первым' ?></h3>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['accountName'])) {
                    ?>
                        <textarea class="form-textarea" name="comm-text" id="comm-text"></textarea>
                        <input class="form-button" type="button" value="Отправить" onclick="addComm(<?= $productitem['ID'] ?>)">
                    <?php
                    }
                    ?>
                </form>
                <?php
                if ($reviewsProd !== []) {
                ?>

                    <div class="review-list">

                        <?php
                        addReviewsUser($reviewsProd);
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

<script src="script/slider-photo-prod.js"></script>
<script src="script/review-add.js"></script>
<script src="script/basket-add.js"></script>

</html>
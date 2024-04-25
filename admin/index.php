<?php
require_once('../config/category.php');
require_once('../config/slider.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="icon" href="img/svg/favicon.svg" type="image/svg">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
    $indexPage = true;
    require_once('header.php');
    ?>

    <main>

        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>


        <div class="main-block">
            <h1 style="text-align: center;">Промышленное холодильное оборудование</h1>
            <p>
                Предлагаем свыше 1000 моделей промышленного холодильного оборудования для магазинов, заведений общепита и других отраслей, где требуется охлаждение сырья или готовой продукции. Предлагаем технику известных брендов и изготовление на заказ с установкой по Санкт-Петербургу и области.
            </p>
            <div class="category-main-block">

                <?php
                addindexCatAdm($category, $categoryindex);
                ?>

            </div>
        </div>

    </main>

    <div class="slider-block">
        <div class="conteiner-slider">
            <div class="title2">Акции</div>
            <div class="hidden-block">
                <input id="countpagesslider" type="hidden" value="<?= $countPageSlider ?>">
                <div id="slider" class="slide-move-block">
                    <?php
                    addSliderAdm($productsSale, $TableProdAll, $TablePhotoProd);
                    ?>

                </div>
            </div>
            <div class="button-slider-block">
                <div id="btn-slid-left" class="button-slider-item button-slider-left"></div>
                <div id="btn-slid-right" class="button-slider-item button-slider-right"></div>
            </div>
        </div>
    </div>


</body>

<script src="../script/slider-sale.js"></script>

</html>
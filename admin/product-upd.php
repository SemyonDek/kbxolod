<?php
require_once('../config/category.php');
$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
$saleList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale` WHERE PRODID = '$prodid'");
$saleList = mysqli_fetch_assoc($saleList);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="icon" href="img/svg/favicon.svg" type="image/svg">
    <link rel="stylesheet" href="../css/category-adm.css">
    <link rel="stylesheet" href="../css/product-add.css">
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
        </div>

        <div class="main-block">
            <h1 style="text-align: center;">Изменение товара</h1>

            <div class="cat-info-block">
                <form id="add-prod-form" action="">
                    <input name="prodid" id="prodid" value="<?= $productitem['ID'] ?>" type="hidden">
                    <div class="input-block">
                        <div class="name-input">Категория</div>
                        <select name="idcat" id="idcat">
                            <?php
                            addSelectCatProdAdm($category, $productitem['CATID']);
                            ?>
                        </select>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Название</div>
                        <input name="nameprod" id="nameprod" value="<?= $productitem['NAME'] ?>" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Цена</div>
                        <input name="priceprod" id="priceprod" value="<?= $productitem['PRICE'] ?>" type="number" placeholder="руб">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Производитель</div>
                        <input name="brandprod" id="brandprod" value="<?= $productitem['BRAND'] ?>" type="text" placeholder="">
                    </div>
                    <h3>Габаритные размеры</h3>
                    <div class="mult-block-input">
                        <div class="input-block">
                            <div class="name-input">Длина</div>
                            <input name="xsizeprod" id="xsizeprod" value="<?= $productitem['XSIZE'] ?>" type="number" placeholder="мм">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Ширина</div>
                            <input name="ysizeprod" id="ysizeprod" value="<?= $productitem['YSIZE'] ?>" type="number" placeholder="мм">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Высота</div>
                            <input name="zsizeprod" id="zsizeprod" value="<?= $productitem['ZSIZE'] ?>" type="number" placeholder="мм">
                        </div>
                    </div>
                    <h3>Температурный диапазон</h3>
                    <div class="mult-block-input">
                        <div class="input-block">
                            <div class="name-input">Минимальная температура</div>
                            <input name="mintempprod" id="mintempprod" value="<?= $productitem['MINTEMP'] ?>" type="number" placeholder="°С">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Максимальная температура</div>
                            <input name="maxtempprod" id="maxtempprod" value="<?= $productitem['MAXTEMP'] ?>" type="number" placeholder="°С">
                        </div>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Объем</div>
                        <input name="volumeprod" id="volumeprod" value="<?= $productitem['VOLUME'] ?>" type="number" placeholder="л">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Мощность</div>
                        <input name="powerprod" id="powerprod" value="<?= $productitem['POWER'] ?>" type="number" placeholder="Вт">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Напряжение</div>
                        <input name="voltageprod" id="voltageprod" value="<?= $productitem['VOLTAGE'] ?>" type="number" placeholder="В">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Вес</div>
                        <input name="weightprod" id="weightprod" value="<?= $productitem['WEIGHT'] ?>" type="number" placeholder="кг">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Цвет</div>
                        <input name="colorprod" id="colorprod" value="<?= $productitem['COLOR'] ?>" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Добавить в распродажу</div>
                        <select name="saleprod" id="saleprod">
                            <option value="0">Нет</option>
                            <option value="1" <?php if (isset($saleList)) echo 'selected="selected"' ?>>Да</option>
                        </select>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Описание</div>
                        <textarea name="textprod" id="textprod" value="" style="height: 200px; max-height: 200px; min-height: 200px;"><?= $productitem['TEXT'] ?></textarea>
                    </div>
                    <input class="btn-primary" type="button" value="Изменить" onclick="updProd()">
                </form>
            </div>
            <div class="img-prod-block">
                <form action="" id="add-photo-form">
                    <div class="input-block">
                        <div class="name-input">Изображение</div>
                        <input name="file_photo" id="file_photo" type="file">
                    </div>
                    <input class="btn-primary" type="button" value="Добавить" onclick="addPhoto()">
                </form>
                <div id="PhotoBlock" class="img-items-block">
                    <?php
                    foreach ($productPhoto as $item) {
                    ?>

                        <div class="img-item-block">
                            <img src="../<?= $item['SRC'] ?>" alt="">
                            <span onclick="delPhoto(<?= $item['ID'] ?>)" class="del-img"></span>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <a class="btn-primary" href="catalog.php">Назад</a>
        </div>

    </main>

</body>

<script src="../script/product-upd.js"></script>

</html>
<?php
require_once('../config/category.php');
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
            <h1 style="text-align: center;">Добавлние товара</h1>

            <div class="cat-info-block">
                <form id="add-prod-form" action="">
                    <div class="input-block">
                        <div class="name-input">Категория</div>
                        <select name="idcat" id="idcat">
                            <?php
                            addSelectCatProdAdm($category, 0);
                            ?>
                        </select>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Название</div>
                        <input name="nameprod" id="nameprod" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Цена</div>
                        <input name="priceprod" id="priceprod" type="number" placeholder="руб">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Производитель</div>
                        <input name="brandprod" id="brandprod" type="text" placeholder="">
                    </div>
                    <h3>Габаритные размеры</h3>
                    <div class="mult-block-input">
                        <div class="input-block">
                            <div class="name-input">Длина</div>
                            <input name="xsizeprod" id="xsizeprod" type="number" placeholder="мм">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Ширина</div>
                            <input name="ysizeprod" id="ysizeprod" type="number" placeholder="мм">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Высота</div>
                            <input name="zsizeprod" id="zsizeprod" type="number" placeholder="мм">
                        </div>
                    </div>
                    <h3>Температурный диапазон</h3>
                    <div class="mult-block-input">
                        <div class="input-block">
                            <div class="name-input">Минимальная температура</div>
                            <input name="mintempprod" id="mintempprod" type="number" placeholder="°С">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Максимальная температура</div>
                            <input name="maxtempprod" id="maxtempprod" type="number" placeholder="°С">
                        </div>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Объем</div>
                        <input name="volumeprod" id="volumeprod" type="number" placeholder="л">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Мощность</div>
                        <input name="powerprod" id="powerprod" type="number" placeholder="Вт">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Напряжение</div>
                        <input name="voltageprod" id="voltageprod" type="number" placeholder="В">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Вес</div>
                        <input name="weightprod" id="weightprod" type="number" placeholder="кг">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Цвет</div>
                        <input name="colorprod" id="colorprod" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Описание</div>
                        <textarea name="textprod" id="textprod" style="height: 200px; max-height: 200px; min-height: 200px;"></textarea>
                    </div>
                    <input class="btn-primary" type="button" value="Добавить" onclick="addProd()">
                    <br>
                    <a class="btn-primary" href="catalog.php">Назад</a>
                </form>
            </div>
        </div>

    </main>

</body>

<script src="../script/product-add.js"></script>

</html>
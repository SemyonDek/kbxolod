<?php
require_once('../config/category.php');
$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
$categoryindex = mysqli_query($ConnectDatabase, "SELECT * FROM `category-index` WHERE CATID = '$catid'");
$categoryindex = mysqli_fetch_assoc($categoryindex);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="icon" href="img/svg/favicon.svg" type="image/svg">
    <link rel="stylesheet" href="../css/category-adm.css">
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
        </div>

        <div class="main-block">
            <h1 style="text-align: center;">Изменить категорию</h1>

            <div class="cat-info-block">
                <form action="" id="PhotoCatForm">
                    <div class="img-cat-upd-block">
                        <div class="name-input">Изображение</div>
                        <div id="mainPhotoCat" class="div-img-block">
                            <img src="../<?= $categoryitem['SRC'] ?>" alt="">
                        </div>
                        <div class="input-block">
                            <input name="file_photo" id="file_photo" type="file">
                            <input class="btn-primary" type="button" value="Изменить" onclick="updPhoto()">
                        </div>
                    </div>
                </form>
                <form id="addCategoryForm" action="">
                    <input name="catid" id="catid" value="<?= $catid ?>" type="hidden">
                    <div class="input-block">
                        <div class="name-input">Родитель</div>
                        <select name="parentid" id="parentid">
                            <?php
                            addSelectCatAdm($category, $categoryitem['PARENT']);
                            ?>
                        </select>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Заголовок</div>
                        <input name="namecat" id="namecat" value="<?= $categoryitem['NAME'] ?>" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Описание</div>
                        <textarea name="textcat" id="textcat" style="height: 200px; max-height: 200px; min-height: 200px;"><?= $categoryitem['TEXT'] ?></textarea>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Добавить на главную</div>
                        <select name="indexcat" id="indexcat">
                            <option value="0">Нет</option>
                            <option value="1" <?php if (isset($categoryindex)) echo 'selected="selected"' ?>>Да</option>
                        </select>
                    </div>
                    <input class="btn-primary" type="button" value="Изменить" onclick="updCat()">
                    <br>
                    <input class="btn-primary" type="button" value="Удалить" onclick="delCat()">
                    <br>
                    <a class="btn-primary" href="category.php">Назад</a>
                </form>
            </div>
        </div>

    </main>

</body>

<script src="../script/category-upd.js"></script>

</html>
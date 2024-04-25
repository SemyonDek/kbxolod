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
            <h1 style="text-align: center;">Добавить категорию</h1>

            <div class="cat-info-block">
                <form id="addCategoryForm" action="">
                    <div class="input-block">
                        <div class="name-input">Родитель</div>
                        <select name="catid" id="catid">
                            <?php
                            addSelectCatAdm($category);
                            ?>
                        </select>
                    </div>
                    <div class="input-block">
                        <div class="name-input">Изображение</div>
                        <input name="file_photo" id="file_photo" type="file">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Название</div>
                        <input name="namecat" id="namecat" value="" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Описание</div>
                        <textarea name="textcat" id="textcat" style="height: 200px; max-height: 200px; min-height: 200px;"></textarea>
                    </div>
                    <input class="btn-primary" type="button" value="Добавить" onclick="addCat()">
                    <br>
                    <a class="btn-primary" href="category.php">Назад</a>
                </form>
            </div>
        </div>

    </main>


</body>

<script src="../script/category-add.js"></script>

</html>
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
            <h1 style="text-align: center;">Изменить главную категорию</h1>

            <div class="cat-info-block">
                <form id="upd-main-category-form" action="">
                    <div class="input-block">
                        <div class="name-input">Заголовок</div>
                        <input name="titlecat" id="titlecat" value="<?= $category[0]['NAME'] ?>" type="text" placeholder="">
                    </div>
                    <div class="input-block">
                        <div class="name-input">Описание</div>
                        <textarea name="textcat" id="textcat" style="height: 200px; max-height: 200px; min-height: 200px;"><?= $category[0]['TEXT'] ?></textarea>
                    </div>
                    <input class="btn-primary" type="button" value="Изменить" onclick="updMainCat()">
                </form>
            </div>
            <h1 style="text-align: center;">Список категорий</h1>
            <a class="btn-primary" href="category-add.php">Добавить</a>
            <div class="cat-list-block">
                <?php
                addListCatAdm($category);
                ?>
            </div>
        </div>

    </main>

</body>

<script src="../script/category-main-upd.js"></script>

<script>

</script>

</html>
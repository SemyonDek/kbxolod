<?php
require_once('config/connect.php');
$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог холодильных и морозильных шкафов</title>
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
            <div class="breadcrumb">
                <a class="active-breadcrumb" href="catalog-category.php">Каталог</a>
                <p>/</p>
                <a class="deactive-breadcrumb" href="catalog-subcategory.php?catid=<?= $categoryitem['ID'] ?>"><?= $categoryitem['NAME'] ?></a>
            </div>

            <h1><?= $categoryitem['NAME'] ?></h1>
            <p><?= nl2br($categoryitem['TEXT']) ?></p>

            <div class="category-main-block">

                <?php
                addListSubCatUser($category, $categoryitem['ID']);
                ?>

            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог профессионального холодильного оборудования</title>
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

            <h1><?= $category[0]['NAME'] ?></h1>
            <p><?= nl2br($category[0]['TEXT']) ?></p>

            <div class="category-main-block">
                <?php
                addListCatUser($category);
                ?>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

</html>
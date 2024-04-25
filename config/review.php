<?php

require_once('connect.php');

$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$reviews = mysqli_query($ConnectDatabase, "SELECT * FROM `review`");
$reviews = mysqli_fetch_all($reviews, MYSQLI_ASSOC);


function addReviewsUser($reviews)
{
    foreach ($reviews as $item) {
?>
        <div class="review-item">
            <div class="review-name"><?= $item['USER'] ?></div>
            <div class="review-date"><?= $item['DATE'] ?></div>
            <div class="review-text"><?= nl2br($item['COMM']) ?></div>
        </div>
    <?php
    }
}
function addReviewsAdm($reviews, $TableProdAll)
{
    foreach ($reviews as $item) {
        $name = '';
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $item['PRODID']) {
                $name = $itemProd['NAME'];
                break;
            }
        }
    ?>
        <div class="review-item">
            <div class="product-name"><?= $name ?></div>
            <div class="status-review">
                <?php
                if ($item['STATUS'] == 0) {
                ?>
                    Опубликовать:
                    <span class="add-review-adm" onclick="updComm(<?= $item['ID'] ?>)">Да</span>
                    <span class="del-review-adm" onclick="delComm(<?= $item['ID'] ?>)">Нет</span>
                <?php
                } else {
                ?>
                    Опубликовано
                <?php
                }
                ?>
            </div>
            <div class="review-name"><?= $item['USER'] ?></div>
            <div class="review-date"><?= $item['DATE'] ?></div>
            <div class="review-text"><?= nl2br($item['COMM']) ?></div>
        </div>
<?php
    }
}

<?php

require_once('../../config/connect.php');

$idPhoto = $_POST['idPhoto'];

$photoitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE ID = '$idPhoto'");
$photoitem = mysqli_fetch_assoc($photoitem);

$prodid = $photoitem['PRODID'];

unlink('../../' . $photoitem['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`ID` = $idPhoto");


$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
?>

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
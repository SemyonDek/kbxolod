<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$img = $_FILES['file_photo'];
$srcImg = '';

$typeFIle = substr($img['name'], strrpos($img['name'], '.') + 1);

$prov = True;
while ($prov) {
    $fileName = uniqid() . '.' . $typeFIle;
    $fileUrl = '../../img/products/' . $fileName;
    $srcImg = 'img/products/' . $fileName;

    if (!file_exists($fileUrl)) {
        move_uploaded_file($img['tmp_name'], $fileUrl);

        $prov = False;
    }
}

mysqli_query($ConnectDatabase, "INSERT INTO `products_img` (`ID`, `PRODID`, `SRC`) VALUES (NULL, '$prodid', '$srcImg')");

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
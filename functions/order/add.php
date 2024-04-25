<?php
require_once('../../config/connect.php');
session_start();

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
} else {
    $idAccount = 0;
}

$nameUser = $_POST['fio_user'];

$orgUser = $_POST['org_user'];
$numberUser = $_POST['numb_user'];
$mailUser = $_POST['mail_user'];
$commUser = $_POST['com_user'];

$info = "ФИО: $nameUser
Организация: $orgUser
Телефон: $numberUser
Email address: $mailUser
Комментарий к заказу: $commUser";

$amount = $_SESSION['basketSum'];

if (!empty($_FILES['file_user']['tmp_name'])) {
    $file = $_FILES['file_user'];
    $typeFIle = substr($file['name'], strrpos($file['name'], '.') + 1);
    $prov = True;
    while ($prov) {
        $fileName = uniqid() . '.' . $typeFIle;
        $fileUrl = '../../database/files/' . $fileName;
        $srcFile = 'database/files/' . $fileName;

        if (!file_exists($fileUrl)) {
            move_uploaded_file($file['tmp_name'], $fileUrl);

            $prov = False;
        }
    }
} else {
    $srcFile = '';
}

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `USERID`, `AMOUNT`, `INFO`, `FILE`, `STATUS`) VALUES 
    (NULL, '$idAccount', '$amount', '$info', '$srcFile', '0')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {

    $prodid = $item['ID'];
    $productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
    $productitem = mysqli_fetch_assoc($productitem);

    $value = $item['VALUE'];
    $nameProd = $productitem['NAME'];

    mysqli_query($ConnectDatabase, "INSERT INTO `order_item` 
    (`ID`,`IDORDER`, `NAME`, `VALUE`) VALUES 
    (NULL,'$idOrder', '$nameProd', $value)");
}

unset($_SESSION['basket']);
unset($_SESSION['basketSum']);

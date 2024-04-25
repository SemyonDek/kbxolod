<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];

$catid = $_POST['idcat'];
$name = $_POST['nameprod'];
$price = $_POST['priceprod'];
$brand = $_POST['brandprod'];

$xsizeprod = $_POST['xsizeprod'];
$ysizeprod = $_POST['ysizeprod'];
$zsizeprod = $_POST['zsizeprod'];

$mintempprod = $_POST['mintempprod'];
$maxtempprod = $_POST['maxtempprod'];

$volumeprod = $_POST['volumeprod'];
$powerprod = $_POST['powerprod'];
$voltageprod = $_POST['voltageprod'];
$weightprod = $_POST['weightprod'];

$colorprod = $_POST['colorprod'];
$textprod = $_POST['textprod'];


mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`CATID` = '$catid', `NAME` = '$name', `PRICE` = '$price', `BRAND` = '$brand', 
`XSIZE` = '$xsizeprod', `YSIZE` = '$ysizeprod', `ZSIZE` = '$zsizeprod', 
`MINTEMP` = '$mintempprod', `MAXTEMP` = '$maxtempprod', 
`VOLUME` = '$volumeprod', `POWER` = '$powerprod', `VOLTAGE` = '$voltageprod', `WEIGHT` = '$weightprod', 
`COLOR` = '$colorprod', `TEXT` = '$textprod' 
WHERE `products`.`ID` = $prodid");

$saleprod = $_POST['saleprod'];

$categoryindex = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale` WHERE PRODID = '$prodid'");
$categoryindex = mysqli_fetch_assoc($categoryindex);

if ($saleprod == 1) {
    if (!isset($categoryindex)) {
        mysqli_query($ConnectDatabase, "INSERT INTO `products_sale` (`ID`, `PRODID`) VALUES (NULL, '$prodid')");
    }
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `products_sale` WHERE `products_sale`.`PRODID` = $prodid");
}

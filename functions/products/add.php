<?php
require_once('../../config/connect.php');

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

mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `CATID`, `NAME`, `PRICE`, `BRAND`, 
`XSIZE`, `YSIZE`, `ZSIZE`, `MINTEMP`, `MAXTEMP`, 
`VOLUME`, `POWER`, `VOLTAGE`, `WEIGHT`, `COLOR`, 
`TEXT`) VALUES 
(NULL, '$catid', '$name', '$price', '$brand', 
'$xsizeprod', '$ysizeprod', '$zsizeprod', '$mintempprod', '$maxtempprod', 
'$volumeprod', '$powerprod', '$voltageprod', '$weightprod', '$colorprod', 
'$textprod')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

echo $idProd;

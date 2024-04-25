<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];
$parentid = $_POST['parentid'];
$namecat = $_POST['namecat'];
$textcat = $_POST['textcat'];

$indexcat = $_POST['indexcat'];

$categoryindex = mysqli_query($ConnectDatabase, "SELECT * FROM `category-index` WHERE CATID = '$catid'");
$categoryindex = mysqli_fetch_assoc($categoryindex);


if ($indexcat == 1) {
    if (!isset($categoryindex)) {
        mysqli_query($ConnectDatabase, "INSERT INTO `category-index` (`ID`, `CATID`) VALUES (NULL, '$catid')");
    }
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `category-index` WHERE `category-index`.`CATID` = $catid");
}


mysqli_query($ConnectDatabase, "UPDATE `category` SET 
    `PARENT` = '$parentid', `NAME` = '$namecat' , `TEXT` = '$textcat' WHERE `category`.`ID` = $catid");

require_once('../../config/category.php');

$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);

?>

<select name="parentid" id="parentid">
    <?php
    addSelectCatAdm($category, $categoryitem['PARENT']);
    ?>
</select>
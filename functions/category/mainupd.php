<?php
require_once('../../config/connect.php');

$titlecat = $_POST['titlecat'];
$textcat = $_POST['textcat'];

mysqli_query($ConnectDatabase, "UPDATE `category` SET 
`NAME` = '$titlecat',  `TEXT` = '$textcat'
WHERE `category`.`ID` = 1");

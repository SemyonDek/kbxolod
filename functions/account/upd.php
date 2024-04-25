<?php
session_start();
require_once('../../config/connect.php');
$nameUser = $_POST['fio_user'];

$organizationUser = $_POST['org_user'];
$numberUser = $_POST['numb_user'];
$mailUser = $_POST['mail_user'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET 
`NAME` = '$nameUser',  `ORGANIZATION` = '$organizationUser', 
`NUMBER` = '$numberUser', `EMAIL` = '$mailUser'
WHERE `users`.`ID` = $idUser");

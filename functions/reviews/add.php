<?php
session_start();
require_once('../../config/connect.php');

$iduser = $_SESSION['accountId'];
$prodid = $_POST['prodid'];
$date = date('d.m.Y') . ' г.';
$commtext =  $_POST['comm'];

$usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$iduser'");
$usersData = mysqli_fetch_assoc($usersData);

$name = $usersData['NAME'];

mysqli_query($ConnectDatabase, "INSERT INTO `review` 
(`ID`, `PRODID`, `USER`, `DATE`, `COMM`, `STATUS`) VALUES 
(NULL, '$prodid', '$name', '$date', '$commtext', '0')");

<?php
$ConnectDatabase = mysqli_connect(
    'localhost',    /* Хост к которому подключаемся */
    'root',         /* Имя пользователя */
    '',             /* Используемый пароль */
    'kbxolod'       /* База данных для запросов по умолчанию */

);
if (!$ConnectDatabase) {
    echo 'Error!'; /* При неудачной попытки подключения файла выводит ошибку */
}
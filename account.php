<?php
require_once('config/connect.php');
require_once('config/orders.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/basket.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <?php
    $accountPage = true;
    require_once('header.php');
    $accountid = $_SESSION["accountId"];
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
    $usersData = mysqli_fetch_assoc($usersData);
    $ordersUser = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE USERID = '$accountid'");
    $ordersUser = mysqli_fetch_all($ordersUser, MYSQLI_ASSOC);
    ?>

    <main>
        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">
            <div class="add-order-block">
                <h2>Ваши контактные данные</h2>
                <div class="user-info-block">
                    <form action="" id="user-form">
                        <div class="input-block">
                            <div class="name-input">ФИО</div>
                            <input name="fio_user" id="fio_user" value="<?= $usersData['NAME'] ?>" type="text" placeholder="Введите Имя">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Организация</div>
                            <input name="org_user" id="org_user" value="<?= $usersData['ORGANIZATION'] ?>" type="text" placeholder="">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Телефон</div>
                            <input name="numb_user" id="numb_user" value="<?= $usersData['NUMBER'] ?>" type="text" placeholder="Введите Телефон">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Email address</div>
                            <input name="mail_user" id="mail_user" value="<?= $usersData['EMAIL'] ?>" type="text" placeholder="Ваш email">
                        </div>
                        <input class="btn-primary" type="button" value="Обновить" onclick="updInfo()">
                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="orders-block">
                <table>
                    <thead>
                        <tr>
                            <td class="number">№</td>
                            <td class="products">Товары</td>
                            <td class="value">Кол-во</td>
                            <td class="amount">Сумма</td>
                            <td class="info">Детали</td>
                            <td class="file">Файл</td>
                            <td class="status">Оформить</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        addListOrddersUser($ordersUser, $ordersItems);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

<script src="script/account-upd.js"></script>

</html>
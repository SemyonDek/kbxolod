<?php
require_once('config/basket.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="css/basket.css">
</head>

<body>

    <?php
    $orderPage = true;
    require_once('header.php');
    if (isset($_SESSION['accountName'])) {
        $accountid = $_SESSION["accountId"];
        $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
        $usersData = mysqli_fetch_assoc($usersData);
    }
    ?>

    <main>

        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">
            <div class="basket-table-block">
                <h2>Ваш заказ</h2>
                <table>
                    <thead>
                        <tr>
                            <td class="img"></td>
                            <td class="name">Товар</td>
                            <td class="count" colspan="3">Количество</td>
                            <td class="del"></td>
                        </tr>
                    </thead>
                    <tbody id="basket-table-tbody">
                        <?php
                        addBasket($_SESSION['basket'], $products, $photos);
                        ?>
                        <tr>
                            <td class="name-amount" colspan="2">
                                Итого:
                            </td>
                            <td class="amount-value" colspan="4">
                                <span id="basket-amount-price" class="p1"><?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?></span>
                                <span class="p2">руб.</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="add-order-block">
                <h2>Заполните контактные данные</h2>
                <div class="user-info-block">
                    <form action="" id="order-form">
                        <div class="input-block">
                            <div class="name-input">ФИО</div>
                            <input name="fio_user" id="fio_user" value="<?php if (isset($usersData)) echo $usersData['NAME'] ?>" type="text" placeholder="Введите Имя">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Организация</div>
                            <input name="org_user" id="org_user" value="<?php if (isset($usersData)) echo $usersData['ORGANIZATION'] ?>" type="text" placeholder="">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Телефон</div>
                            <input name="numb_user" id="numb_user" value="<?php if (isset($usersData)) echo $usersData['NUMBER'] ?>" type="text" placeholder="Введите Телефон">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Email address</div>
                            <input name="mail_user" id="mail_user" value="<?php if (isset($usersData)) echo $usersData['EMAIL'] ?>" type="text" placeholder="Ваш email">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Комментарий к заказу</div>
                            <textarea name="com_user" id="com_user"></textarea>
                        </div>
                        <div class="input-block">
                            <div class="name-input">Вы можете прикрепить ваши реквизиты</div>
                            <input name="file_user" id="file_user" type="file">
                        </div>
                        <input class="btn-primary" type="button" value="Отправить Заказ" onclick="addOrder()">
                    </form>
                </div>
            </div>
        </div>

    </main>

</body>

<script src="script/order.js"></script>

</html>
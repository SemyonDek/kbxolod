<?php
require_once('../config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="icon" href="img/svg/favicon.svg" type="image/svg">
    <link rel="stylesheet" href="../css/account.css">
</head>

<body>

    <?php
    $ordersPage = true;
    require_once('header.php')
    ?>

    <main>

        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">
            <h1 style="text-align: center;">Заказы</h1>
            <div id="orders-table" class="orders-block">
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
                        addListOrddersAdm($orders, $ordersItems);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>

<script src="../script/order-upd.js"></script>

</html>
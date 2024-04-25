<?php
require_once('../../config/connect.php');

$idorder = $_POST['idorder'];

mysqli_query($ConnectDatabase, "UPDATE `orders` SET `STATUS` = 1  WHERE `orders`.`ID` = $idorder");

require_once('../../config/orders.php');
?>
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
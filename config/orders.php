<?php
require_once('connect.php');

$orders = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
$orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
$ordersItems = mysqli_query($ConnectDatabase, "SELECT * FROM `order_item`");
$ordersItems = mysqli_fetch_all($ordersItems, MYSQLI_ASSOC);

function addListOrddersAdm($orders, $ordersItems)
{
    foreach ($orders as $item) {
        $count = 0;
        foreach ($ordersItems as $item_order) if ($item['ID'] == $item_order['IDORDER']) $count++;

?>
        <tr>
            <td class="number" rowspan="<?= $count ?>"><?= $item['ID'] ?></td>
            <?php
            foreach ($ordersItems as $item_order) if ($item['ID'] == $item_order['IDORDER']) {
            ?>
                <td class="products"><?= $item_order['NAME'] ?></td>
                <td class="value"><?= $item_order['VALUE'] ?></td>

            <?php
                break;
            }
            ?>
            <td class="amount" rowspan="<?= $count ?>"><?= number_format($item['AMOUNT'], 0, '.', ' ') . ' ' ?> р</td>
            <td class="info" rowspan="<?= $count ?>">
                <?= nl2br($item['INFO']) ?>
            </td>
            <td class="file" rowspan="<?= $count ?>">
                <?php
                if ($item['FILE'] !== '') {
                ?>
                    <a href="../<?= $item['FILE'] ?>" download="order<?= $item['ID'] ?>">Файл</a>
                <?php
                } else {
                    echo 'Пусто';
                }
                ?>
            </td>
            <td class="status" rowspan="<?= $count ?>">
                <?php
                if ($item['STATUS'] == 0) {
                ?>
                    <span class="yes_status btn_status" onclick="updOrder(<?= $item['ID'] ?>)">Да</span>
                    <br>
                    <span class="no_status btn_status" onclick="delOrder(<?= $item['ID'] ?>)">Нет</span>
                <?php
                } elseif ($item['STATUS'] == 1) {
                ?>
                    <span class="yes_status">Оформлен</span>
                <?php
                } else {
                ?>
                    <span class="no_status">Отменен</span>
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
        if ($count > 1) {
            $prov = false;
            foreach ($ordersItems as $item_order) if ($item['ID'] == $item_order['IDORDER']) {
                if ($prov) {
        ?>
                    <tr>
                        <td class="products"><?= $item_order['NAME'] ?></td>
                        <td class="value"><?= $item_order['VALUE'] ?></td>
                    </tr>

        <?php
                } else {
                    $prov = true;
                }
            }
        }
    }
}
function addListOrddersUser($orders, $ordersItems)
{
    foreach ($orders as $item) {
        $count = 0;
        foreach ($ordersItems as $item_order) if ($item['ID'] == $item_order['IDORDER']) $count++;

        ?>
        <tr>
            <td class="number" rowspan="<?= $count ?>"><?= $item['ID'] ?></td>
            <?php
            foreach ($ordersItems as $item_order) if ($item['ID'] == $item_order['IDORDER']) {
            ?>
                <td class="products"><?= $item_order['NAME'] ?></td>
                <td class="value"><?= $item_order['VALUE'] ?></td>

            <?php
                break;
            }
            ?>
            <td class="amount" rowspan="<?= $count ?>"><?= number_format($item['AMOUNT'], 0, '.', ' ') . ' ' ?> р</td>
            <td class="info" rowspan="<?= $count ?>">
                <?= nl2br($item['INFO']) ?>
            </td>
            <td class="file" rowspan="<?= $count ?>">
                <?php
                if ($item['FILE'] !== '') {
                ?>
                    <a href="../<?= $item['FILE'] ?>" download="order<?= $item['ID'] ?>">Файл</a>
                <?php
                } else {
                    echo 'Пусто';
                }
                ?>
            </td>
            <td class="status" rowspan="<?= $count ?>">
                <?php
                if ($item['STATUS'] == 0) {
                ?>
                    <span class="">В обработке</span>
                <?php
                } elseif ($item['STATUS'] == 1) {
                ?>
                    <span class="yes_status">Оформлен</span>
                <?php
                } else {
                ?>
                    <span class="no_status">Отменен</span>
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
        if ($count > 1) {
            $prov = false;
            foreach ($ordersItems as $item_order) if ($item['ID'] == $item_order['IDORDER']) {
                if ($prov) {
        ?>
                    <tr>
                        <td class="products"><?= $item_order['NAME'] ?></td>
                        <td class="value"><?= $item_order['VALUE'] ?></td>
                    </tr>

<?php
                } else {
                    $prov = true;
                }
            }
        }
    }
}

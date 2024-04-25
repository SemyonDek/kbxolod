<?php
session_start();

$idbasket = $_POST['idbasket'];

unset($_SESSION['basket'][$idbasket]);

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$_SESSION['basketSum'] = $sum;

if ($_SESSION['basket'] == []) {
    unset($_SESSION['basket']);
    unset($_SESSION['basketSum']);
}

require_once('../../config/basket.php');
?>
<div id="basket-prov"><?php
                        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                            addBasket($_SESSION['basket'], $products, $photos);
                        }
                        ?></div>

<span id="count-basket" class="count-basket"><?php
                                                if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                                    echo ' ' . count($_SESSION['basket']) . ' ';
                                                } else echo 0;
                                                ?></span>

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
        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
            addBasket($_SESSION['basket'], $products, $photos);
        }
        ?>
        <tr>
            <td class="name-amount" colspan="2">
                Итого:
            </td>
            <td class="amount-value" colspan="4">
                <span id="basket-amount-price" class="p1"><?php if (isset($_SESSION['basketSum'])) echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ';
                                                            else echo '0' ?></span>
                <span class="p2">руб.</span>
            </td>
        </tr>
    </tbody>
</table>
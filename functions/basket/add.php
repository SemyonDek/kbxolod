<?php
session_start();

require_once('../../config/connect.php');

$prod = [];
$prodid = $_POST['prodid'];
$prod['ID'] = $prodid;

$value = 1;
if (isset($_POST['valuebasket'])) {
    $value = $_POST['valuebasket'];
}
$prod['VALUE'] = $value;

$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);

$prod['AMOUNT'] = $productitem['PRICE'];

if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
    $basket = $_SESSION['basket'];
} else $basket = [];

$prov = true;
$idbasket = 0;

foreach ($basket as $key => $value) {
    if ($value['ID'] == $prod['ID']) {

        if (isset($_POST['valuebasket'])) {
            $basket[$key]['VALUE'] = $prod['VALUE'];
        } else $basket[$key]['VALUE']++;

        $prov = false;
        $basket[$key]['AMOUNT'] = $prod['AMOUNT'] * $basket[$key]['VALUE'];
        $idbasket = $key;
        break;
    }
}

if ($prov) {
    array_push($basket, $prod);
}

$_SESSION['basket'] = $basket;

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$_SESSION['basketSum'] = $sum;

require_once('../../config/basket.php');
?>
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
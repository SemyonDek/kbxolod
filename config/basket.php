<?php

require_once('connect.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);
$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);


function addBasket($basket, $products, $photos)
{
    foreach ($basket as $key => $item) {
        foreach ($products as $itemProd) {
            if ($itemProd['ID'] == $item['ID']) {
                $src = 'img/main/empty_720x540_e0a.png';
                foreach ($photos as $itemPhoto) {
                    if ($itemProd['ID'] == $itemPhoto['PRODID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
?>
                <tr>
                    <td class="img">
                        <div class="img-prod-block">
                            <img src="<?= $src ?>" alt="">
                        </div>
                    </td>
                    <td class="name">
                        <?= $itemProd['NAME'] ?>
                        <div><?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?> р.</div>
                    </td>
                    <td class="minus">
                        <span onclick="upd_val(<?= $key ?>, -1, <?= $itemProd['ID'] ?>)">
                            <i class="minus-icon"></i>
                        </span>
                    </td>
                    <td class="value">
                        <input id="value_prod<?= $key ?>" type="hidden" value="<?= $item['VALUE'] ?>">
                        <span id="text_value_prod<?= $key ?>"><?= $item['VALUE'] ?></span>
                    </td>
                    <td class="plus">
                        <span onclick="upd_val(<?= $key ?>, 1, <?= $itemProd['ID'] ?>)">
                            <i class="plus-icon"></i>
                        </span>
                    </td>
                    <td class="del">
                        <span onclick="delBasket(<?= $key ?>)">
                            <i class="del-icon"></i>
                        </span>
                    </td>
                </tr>
<?php
            }
        }
    }
}

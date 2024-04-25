<?php

require_once('connect.php');

$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$TablePhotoProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$TablePhotoProd = mysqli_fetch_all($TablePhotoProd, MYSQLI_ASSOC);
$productsSale = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale`");
$productsSale = mysqli_fetch_all($productsSale, MYSQLI_ASSOC);

$count = count($productsSale);
if ($count > 5) {
    $a = ($count - ($count % 5)) / 5;
    if (($count % 5) !== 0) {
        $count = $a + 1;
    } else {
        $count = $a;
    }
} else {
    $count = 1;
}
$countPageSlider = $count;

function addSliderUser($productsSale, $TableProdAll, $TablePhotoProd)
{
    foreach ($productsSale as $itemSale) {
        foreach ($TableProdAll as $item) {
            if ($item['ID'] == $itemSale['PRODID']) {

                $src = 'img/main/empty_720x540_e0a.png';
                foreach ($TablePhotoProd as $itemPhoto) {
                    if ($itemPhoto['PRODID'] == $item['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
?>
                <div class="product-item">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>" class="link">
                        <span class="img-wr">
                            <img src="<?= $src ?>">
                        </span>
                        <span class="name-wr">
                            <span class="i-name"><?= $item['NAME'] ?></span>
                        </span>
                    </a>
                    <div class="price-wr">
                        <div class="item-price-box">
                            <div class="i-price-wr"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?> <span>р.</span></div>
                            <div title="В корзину" class="basket-btn-wr">
                                <div>
                                    <span>
                                        <span class=" btn btn-sm btn-primary" onclick="addBasket(<?= $item['ID'] ?>)">
                                            <i class="fa fa-cart-plus"></i> В&nbsp;корзину
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                break;
            }
        }
    }
}

function addSaleListUser($productsSale, $TableProdAll, $TablePhotoProd)
{
    foreach ($productsSale as $itemSale) {
        foreach ($TableProdAll as $item) {
            if ($item['ID'] == $itemSale['PRODID']) {

                $src = 'img/main/empty_720x540_e0a.png';
                foreach ($TablePhotoProd as $itemPhoto) {
                    if ($itemPhoto['PRODID'] == $item['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
            ?>
                <div class="product-item">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>" class="link">
                        <span class="img-wr">
                            <img src="<?= $src ?>">
                        </span>
                        <span class="name-wr">
                            <span class="i-name"><?= $item['NAME'] ?></span>
                        </span>
                    </a>
                    <div class="price-wr">
                        <div class="item-price-box">
                            <div class="i-price-wr"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?> <span>р.</span></div>
                            <div title="В корзину" class="basket-btn-wr">
                                <div>
                                    <span>
                                        <span class=" btn btn-sm btn-primary" onclick="addBasket(<?= $item['ID'] ?>)">
                                            <i class="fa fa-cart-plus"></i> В&nbsp;корзину
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                break;
            }
        }
    }
}
function addSliderAdm($productsSale, $TableProdAll, $TablePhotoProd)
{
    foreach ($productsSale as $itemSale) {
        foreach ($TableProdAll as $item) {
            if ($item['ID'] == $itemSale['PRODID']) {

                $src = 'img/main/empty_720x540_e0a.png';
                foreach ($TablePhotoProd as $itemPhoto) {
                    if ($itemPhoto['PRODID'] == $item['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
            ?>
                <div class="product-item">
                    <a href="product-upd.php?prodid=<?= $item['ID'] ?>" class="link">
                        <span class="img-wr">
                            <img src="../<?= $src ?>">
                        </span>
                        <span class="name-wr">
                            <span class="i-name"><?= $item['NAME'] ?></span>
                        </span>
                    </a>
                    <div class="price-wr">
                        <div class="item-price-box">
                            <div class="i-price-wr"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?> <span>р.</span></div>
                            <div title="В корзину" class="basket-btn-wr">
                            </div>
                        </div>
                    </div>
                </div>
<?php
                break;
            }
        }
    }
}

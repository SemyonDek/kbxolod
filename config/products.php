<?php

require_once('connect.php');
require_once('filters.php');

$TableProdCount = mysqli_query($ConnectDatabase, "SELECT COUNT(*) FROM `products` WHERE 
PRICE BETWEEN $min_prod_mass AND $max_prod_mass 
AND MINTEMP BETWEEN $min_temp_mass AND $max_temp_mass 
AND MAXTEMP BETWEEN $min_temp_mass AND $max_temp_mass 
$searchStr $str_cat $str_brand");
$TableProdCount = mysqli_fetch_assoc($TableProdCount);
$TableProdCount = $TableProdCount['COUNT(*)'];


$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
PRICE BETWEEN $min_prod_mass AND $max_prod_mass 
AND MINTEMP BETWEEN $min_temp_mass AND $max_temp_mass 
AND MAXTEMP BETWEEN $min_temp_mass AND $max_temp_mass 
$searchStr $str_cat $str_brand $str_number_page");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);
$productsPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$productsPhoto = mysqli_fetch_all($productsPhoto, MYSQLI_ASSOC);

function addProductListAmd($products, $productsPhoto)
{
    foreach ($products as $item) {
        $src = 'img/main/empty_720x540_e0a.png';
        foreach ($productsPhoto as $itemPhoto) {
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
                        <div>
                            <span>
                                <span class="btn btn-sm btn-primary btn-del-prod" onclick="delProd(<?= $item['ID'] ?>)">
                                    <i class="fa fa-trash-o"></i> Удалить
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

function addProductListUser($products, $productsPhoto)
{
    foreach ($products as $item) {
        $src = 'img/main/empty_720x540_e0a.png';
        foreach ($productsPhoto as $itemPhoto) {
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
    }
}

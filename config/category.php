<?php

require_once('connect.php');

$category = mysqli_query($ConnectDatabase, "SELECT * FROM `category`");
$category = mysqli_fetch_all($category, MYSQLI_ASSOC);
$categoryindex = mysqli_query($ConnectDatabase, "SELECT * FROM `category-index`");
$categoryindex = mysqli_fetch_all($categoryindex, MYSQLI_ASSOC);

function addSelectCatAdm($category, $selected = 1)
{
?>
    <option value="1" <?php if ($selected == 1) echo 'selected="selected"' ?>>Нет родителя</option>
    <?php

    foreach ($category as $item) {
        if ($item['PARENT'] == 1) {
    ?>
            <option value="<?= $item['ID'] ?>" <?php if ($item['ID'] == $selected) echo 'selected="selected"' ?>><?= $item['NAME'] ?></option>
    <?php
        }
    }
}
function addSelectCatProdAdm($category, $selected = 0)
{
    ?>
    <option value="" <?php if ($selected == 0) echo 'selected="selected"' ?>></option>
    <?php

    foreach ($category as $item) {
        if (($item['PARENT'] !== '1') && ($item['PARENT'] !== '0')) {
    ?>
            <option value="<?= $item['ID'] ?>" <?php if ($item['ID'] == $selected) echo 'selected="selected"' ?>><?= $item['NAME'] ?></option>
        <?php
        }
    }
}

function addLeftCatUser($category)
{
    foreach ($category as $item) {
        if ($item['PARENT'] == 1) {
        ?>
            <div class="item-category-left-list">
                <a href="catalog-subcategory.php?catid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
            </div>
            <?php
        }
    }
}

function addindexCatUser($category, $categoryindex)
{
    foreach ($categoryindex as $itemInd) {
        foreach ($category as $itemCat) {
            if ($itemInd['CATID'] == $itemCat['ID']) {
                if ($itemCat['PARENT'] == 1) {
            ?>
                    <div class="cat_unit">
                        <a href="catalog-subcategory.php?catid=<?= $itemCat['ID'] ?>" class="img-link">
                            <span class="ramka-wr"></span>
                            <span class="pic-wr">
                                <img src="<?= $itemCat['SRC'] ?>" class="pic">
                            </span>
                        </a>
                        <a href="catalog-subcategory.php?catid=<?= $itemCat['ID'] ?>" class="name"><?= $itemCat['NAME'] ?></a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="cat_unit">
                        <a href="catalog.php?catid=<?= $itemCat['ID'] ?>" class="img-link">
                            <span class="ramka-wr"></span>
                            <span class="pic-wr">
                                <img src="<?= $itemCat['SRC'] ?>" class="pic">
                            </span>
                        </a>
                        <a href="catalog.php?catid=<?= $itemCat['ID'] ?>" class="name"><?= $itemCat['NAME'] ?></a>
                    </div>
                <?php
                }
            }
        }
    }
}
function addindexCatAdm($category, $categoryindex)
{
    foreach ($categoryindex as $itemInd) {
        foreach ($category as $itemCat) {
            if ($itemInd['CATID'] == $itemCat['ID']) {

                ?>
                <div class="cat_unit">
                    <a href="" class="img-link">
                        <span class="ramka-wr"></span>
                        <span class="pic-wr">
                            <img src="../<?= $itemCat['SRC'] ?>" class="pic">
                        </span>
                    </a>
                    <a href="" class="name"><?= $itemCat['NAME'] ?></a>
                </div>
            <?php

            }
        }
    }
}


function addListCatUser($category, $parrent = 1)
{
    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
            ?>
            <div class="cat_unit">
                <a href="catalog-subcategory.php?catid=<?= $item['ID'] ?>" class="img-link">
                    <span class="ramka-wr"></span>
                    <span class="pic-wr">
                        <img src="<?= $item['SRC'] ?>" class="pic">
                    </span>
                </a>
                <a href="catalog-subcategory.php?catid=<?= $item['ID'] ?>" class="name"><?= $item['NAME'] ?></a>
            </div>
        <?php
        }
    }
}

function addListSubCatUser($category, $parrent)
{
    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
        ?>
            <div class="cat_unit">
                <a href="catalog.php?catid=<?= $item['ID'] ?>" class="img-link">
                    <span class="ramka-wr"></span>
                    <span class="pic-wr">
                        <img src="<?= $item['SRC'] ?>" class="pic">
                    </span>
                </a>
                <a href="catalog.php?catid=<?= $item['ID'] ?>" class="name"><?= $item['NAME'] ?></a>
            </div>
            <?php
        }
    }
}

function addListCatAdm($category, $parrent = 1)
{
    $pr = false;

    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
            if (!$pr) { ?>
                <ol>
                <?php
                $pr = true;
            } ?>
                <li><?= $item['NAME'] ?><a class="upd-cat-button" href="category-upd.php?catid=<?= $item['ID'] ?>"></a>
                    <?php
                    addListCatAdm($category, $item['ID']);
                    ?> </li><?php
                        }
                    }

                    if ($pr) {
                            ?>
                </ol>
        <?php
                    }
                }

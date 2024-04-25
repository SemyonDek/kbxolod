<?php

if ((isset($_GET['search']) && $_GET['search'] !== '') || (isset($_POST['search']))) {
    if (isset($_GET['search'])) {
        $search = '%' . $_GET['search'] . '%';
    } else {
        $search = '%' . $_POST['search'] . '%';
    }
    $searchStr = "AND (
        `NAME` LIKE '$search')";
} else $searchStr = '';



if (isset($_GET['catid']) && $_GET['catid'] !== '' && !preg_match('/\s/', $_GET['catid'])) {
    $str_cat = "AND `CATID` = '" . $_GET['catid'] . "'";
} else $str_cat = '';



if (isset($_GET['min_price']) && ($_GET['min_price'] !== '')) {
    $min_prod_mass = $_GET['min_price'];;
} else {
    $min_prod_mass = 0;
}

if (isset($_GET['max_price']) && ($_GET['max_price'] !== '')) {
    $max_prod_mass = $_GET['max_price'];
} else {
    $max_prod_mass = 3000000000;
}



if (isset($_GET['min_temp']) && ($_GET['min_temp'] !== '')) {
    $min_temp_mass = $_GET['min_temp'];;
} else {
    $min_temp_mass = -3000000000;
}

if (isset($_GET['max_temp']) && ($_GET['max_temp'] !== '')) {
    $max_temp_mass = $_GET['max_temp'];
} else {
    $max_temp_mass = 3000000000;
}



if (isset($_GET['brand']) && $_GET['brand'] !== '' && !preg_match('/\s/', $_GET['brand'])) {
    $str_brand = "AND `BRAND` = '" . $_GET['brand'] . "'";
} else $str_brand = '';



if (isset($_GET['pagenumber']) && $_GET['pagenumber'] !== '' && !preg_match('/\s/', $_GET['pagenumber'])) {
    $pageNumber = $_GET['pagenumber'];
} else {
    $pageNumber = 1;
}

if (isset($_GET['search'])) {
    $str_number_page = '';
} else {
    $str_number_page = "LIMIT 8 OFFSET " . 8 * ($pageNumber - 1);
}

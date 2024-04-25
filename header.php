<?php
session_start();
if (isset($accountPage) && (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'user')) {
    header('Location: index.php');
}
if (isset($orderPage) && (!isset($_SESSION['basket']) || $_SESSION['basket'] == [])) {
    header('Location: index.php');
}
if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'admin') {
    header('Location: admin');
}
if (isset($_SESSION['accountName']) && isset($loginpage)) {
    header('Location: account.php');
}
?>

<link rel="stylesheet" href="css/header.css">

<header>
    <div class="top-header">
        <div class="top-header-block">
            <div class="left-top-header">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/main/logo.png" alt="компания КБ холод - оборудование для ресторанов, кафе, баров">
                    </a>
                </div>
                <div class="contact-block">
                    <div class="contact-line">
                        <span class="number-contact">(812) 248-11-48</span>
                        <span class="country-contact">Санкт-Петербург</span>
                    </div>
                    <div class="contact-line">
                        <span class="number-contact">(495) 277-13-01</span>
                        <span class="country-contact">Москва</span>
                    </div>
                    <div class="contact-line">
                        <span class="number-contact">8-800-100-15-84</span>
                        <span class="country-contact">Россия</span>
                    </div>
                </div>

            </div>
            <div class="right-top-header">
                <p class="top-slogan">
                    Профессиональное холодильное и морозильное оборудование<br>
                    для магазинов, кафе, складов и производственных предприятий<br>
                </p>
                <div class="search-block">
                    <form id="search-form" action="search.php" method="get">
                        <input class="search-input" type="text" name="search" placeholder="Поиск" style="box-shadow: none; border-radius: 4px 0px 0px 4px;">
                        <span class="search-button-span">
                            <button class="search-button" type="submit"><i></i></button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <menu>
        <div class="menu-block">
            <div class="menu-item">
                <a <?php if (isset($indexPage)) echo 'class="active"' ?> href="index.php">Главная</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($categoryPage)) echo 'class="active"' ?>href="catalog-category.php">Продукция</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($salePage)) echo 'class="active"' ?> href="sale.php">Акции</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($searchPage)) echo 'class="active"' ?> href="search.php?search=">Поиск</a>
            </div>

            <?php
            if (isset($_SESSION['accountName'])) {
            ?>
                <div class="menu-item">
                    <a <?php if (isset($accountPage)) echo 'class="active"' ?> href="account.php">Aккаунт</a>
                </div>
                <div class="menu-item">
                    <a href="functions/account/logout.php">Выход</a>
                </div>
            <?
            } else {
            ?>
                <div class="menu-item">
                    <a <?php if (isset($loginPage)) echo 'class="active"' ?> href="login.php">Вход</a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="basket-block">
            <a href="basket.php">Корзина <i></i></a>
            <span id="count-basket" class="count-basket"><?php
                                                            if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                                                echo ' ' . count($_SESSION['basket']) . ' ';
                                                            } else echo 0;
                                                            ?></span>
        </div>
    </menu>
</header>
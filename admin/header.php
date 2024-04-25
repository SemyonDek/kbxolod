<?php
session_start();
if (!isset($_SESSION['accountName']) && $_SESSION['accountName'] !== 'admin') {
    header('Location: ../');
}
?>

<link rel="stylesheet" href="../css/header.css">

<header>
    <div class="top-header">
        <div class="top-header-block">
            <div class="left-top-header">
                <div class="logo">
                    <a href="index.php">
                        <img src="../img/main/logo.png" alt="компания КБ холод - оборудование для ресторанов, кафе, баров">
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
                <a <?php if (isset($categoryPage)) echo 'class="active"' ?>href="category.php">Категории</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($catalogPage)) echo 'class="active"' ?> href="catalog.php">Товары</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($ordersPage)) echo 'class="active"' ?> href="orders.php">Заказы</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($reviewPage)) echo 'class="active"' ?> href="review.php">Отзывы</a>
            </div>
            <div class="menu-item">
                <a <?php if (isset($searchPage)) echo 'class="active"' ?> href="search.php?search=">Поиск</a>
            </div>
            <div class="menu-item">
                <a href="../functions/account/logout.php">Выход</a>
            </div>
        </div>
    </menu>
</header>
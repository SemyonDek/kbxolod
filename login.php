<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php
    $loginPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">
            <div class="login-block">
                <h2>Аторизация</h2>
                <div class="login-info-block">
                    <form action="" id="login-form">
                        <div class="input-block">
                            <div class="name-input">Логин</div>
                            <input name="login" id="login" value="" type="text">
                        </div>
                        <div class="input-block">
                            <div class="name-input">Пароль</div>
                            <input name="password" id="password" value="" type="password">
                        </div>
                        <input id="logButton" class="btn-primary" type="button" value="Войти">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

<script src="script/login.js"></script>

</html>
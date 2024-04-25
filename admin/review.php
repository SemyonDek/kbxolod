<?php
require_once('../config/review.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="icon" href="img/svg/favicon.svg" type="image/svg">
    <link rel="stylesheet" href="../css/product-card.css">
    <link rel="stylesheet" href="../css/reviews-adm.css">
</head>

<body>

    <?php
    $reviewPage = true;
    require_once('header.php')
    ?>

    <main>

        <div class="category-left-block">
            <?php
            require_once('category-block.php')
            ?>
        </div>

        <div class="main-block">
            <h1 style="text-align: center;">Отзывы</h1>

            <div class="review-block">
                <div id="table-reviews" class="review-list">
                    <?php
                    addReviewsAdm($reviews, $TableProdAll);
                    ?>
                </div>
            </div>
        </div>

    </main>

</body>

<script>
    function updComm(id) {
        let formData = new FormData();
        formData.append("id", id);

        var url = "../functions/reviews/upd.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Отзыв опубликован");
            document.getElementById("table-reviews").innerHTML =
                xhr.response.getElementById("table-reviews").innerHTML;
        };
    }

    function delComm(id) {
        let formData = new FormData();
        formData.append("id", id);

        var url = "../functions/reviews/del.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Отзыв удален");
            document.getElementById("table-reviews").innerHTML =
                xhr.response.getElementById("table-reviews").innerHTML;
        };
    }
</script>

</html>
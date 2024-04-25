<?php
require_once('../../config/connect.php');

$idComm = $_POST['id'];

mysqli_query($ConnectDatabase, "UPDATE `review` SET `STATUS` = 1  WHERE `review`.`ID` = $idComm");

require_once('../../config/review.php');
?>
<div id="table-reviews" class="review-list">
    <?php
    addReviewsAdm($reviews, $TableProdAll);
    ?>
</div>
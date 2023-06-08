<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
$numberProduct = sizeof($arrayProducts);
?>
<div id="new">
    <div class="new-title-result">
        <h4>
            <?php if ($numberProduct === 0) {
                echo "Không có sản phẩm nào!!!";
            } else {
                echo "Những sản phẩm mới nhất";
            } ?>
        </h4>
    </div>
    <div class="new">
    <div class="left-filter">
        </div>
        <div class="new-result">
            <?php grid($arrayProducts, $isSignedIn); ?>
        </div>
    </div>
</div>

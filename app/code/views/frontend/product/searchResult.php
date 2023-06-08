<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
$numberProduct = sizeof($arrayProducts);

?>
<div id="search">
    <div class="search-title-result">
        <h4>
            <?php if ($numberProduct === 0) {
                echo "Không có sản phẩm nào cho từ khóa: \"" . $key . "\" ";
            } else {
                echo "Có " . $numberProduct . " sản phẩm nào cho từ khóa: \"" . $key . "\" ";
            } ?>
        </h4>
    </div>
    <div class="search">
        <div class="left-filter">
            Left Filter
        </div>
        <div class="search-result">
            <?php grid($arrayProducts, $isSignedIn); ?>
        </div>
    </div>
</div>

<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
$numberProduct = sizeof($arrayProducts);
?>
<div id="manufacturer">
    <div class="manufacturer-title-result">
        <h4>
            <?php if ($numberProduct === 0) {
                echo "Không có sản phẩm nào của hãng sản xuất: \"" . $manufacturerName . "\" ";
            } else {
                echo "Có " . $numberProduct . " sản phẩm của hãng sản xuất: \"" . $manufacturerName . "\" ";
            } ?>
        </h4>
    </div>
    <div class="manufacturer">
    <div class="left-filter">
        </div>
        <div class="manufacturer-result">
            <?php grid($arrayProducts, $isSignedIn); ?>
        </div>
    </div>
</div>

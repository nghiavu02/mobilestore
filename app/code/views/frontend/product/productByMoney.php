<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
$numberProduct = sizeof($arrayProducts);
?>
<div id="manufacturer">
    <div class="manufacturer-title-result">
        <h4>
            <?php if ($numberProduct === 0) {
                if($key == 1000000 & $key1 == 0){
                    echo "Không có sản phẩm nào có giá bé hơn: \"" . formatPrice($key) . "\" ";
                } else{
                    if($key == 15000000){
                        echo "Không có sản phẩm nào có giá lớn hơn: \"" . formatPrice($key) . "\" ";
                    } else{
                        echo "Không có sản phẩm nào có giá lớn hơn: \"" . formatPrice($key) . "\" và nhỏ hơn \"" . formatPrice($key1) . "\" ";
                    }
                }
            } else {
                if($key == 1000000 & $key1 == 0){
                    echo "Có " . $numberProduct . " sản phẩm có giá nhỏ hơn: \"" . formatPrice($key) . "\" ";
                } else{
                    if($key == 15000000){
                        echo "Có " . $numberProduct . " sản phẩm có giá lớn hơn: \"" . formatPrice($key) . "\" ";
                    } else{
                        echo "Có " . $numberProduct . " sản phẩm có giá lớn hơn: \"" . formatPrice($key) . "\" và nhỏ hơn \"" . formatPrice($key1) . "\" ";
                    }
                }
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

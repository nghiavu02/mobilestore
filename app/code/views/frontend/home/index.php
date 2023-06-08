<style>
    .btn-add-cart{
        border: 1px solid #ccc;
         color: black;
        font-size: 20px;
    }
</style>
<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
?>
<div id="home">
    <div class="banner">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < sizeof($banners); $i++) : ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"
                            class="<?php echo(($i == 0) ? 'active' : ''); ?>"></li>
                    <?php endfor; ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php for ($j = 0; $j < sizeof($banners); $j++) : ?>
                        <div class="item <?php echo(($j == 0) ? 'active' : ''); ?>">
                            <img src="<?php echo BASE_URL . $banners[$j]['url']; ?>"
                                 alt="<?php echo $banners[$j]['name']; ?>">
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="gia-soc">
        <?php

        ?>
        <div class="title">
            <h4 style="font-family: 'Glyphicons Halflings';font-weight: bold;font-size: 30px;color: black;">GIÁ CỰC SỐC</h4>
        </div>
        <ul class="list-product">
            <?php for ($i = 0; $i < sizeof($mobileGiaSocs); $i++) : ?>
                <li data-productid="<?php echo $mobileGiaSocs[$i]['idMobile'] ?>">
                    <a href="<?php echo baseUrl('product/index/') . $mobileGiaSocs[$i]['idMobile']; ?>">
                        <img src="<?php echo BASE_URL . $mobileGiaSocs[$i][0] ?>" alt="logo-mobile">
                        <h3><?php echo $mobileGiaSocs[$i]['tenDienThoai']; ?></h3>
                        <div class="price">
                            <strong>
                                <?php echo formatPrice($mobileGiaSocs[$i]['giaBan'] - $mobileGiaSocs[$i]['giamGia']) ?>
                            </strong>
                            <span>
                                <?php echo(($mobileGiaSocs[$i]['giamGia'] > 0) ? formatPrice($mobileGiaSocs[$i]['giaBan']) : ''); ?>
                            </span>
                        </div>
                        <figure class="bginfo">
                            <span>
                                Màn hình: <?php echo $mobileGiaSocs[$i]['manHinh'] ?>
                            </span>
                            <span>
                                HĐH: <?php echo $mobileGiaSocs[$i]['heDieuHanh'] ?>
                            </span>
                            <span>
                                CPU: <?php echo $mobileGiaSocs[$i]['CPU'] ?>
                            </span>
                            <span>
                                RAM: <?php echo $mobileGiaSocs[$i]['RAM'] ?>GB
                            </span>
                            <span>
                                Camera: <?php echo $mobileGiaSocs[$i]['cameraSau']; ?>
                            </span>
                            <span>
                                Selfie: <?php echo $mobileGiaSocs[$i]['cameraTruoc']; ?>
                            </span>
                            <span>
                                PIN: <?php echo $mobileGiaSocs[$i]['dungLuongPin']; ?> mAh
                            </span>
                            <span>
                                Màu sắc: <span
                                        style='font-weight: bold;color: green; display: inline-block; font-style: italic;'><?php echo $mobileGiaSocs[$i]['mauSac']; ?></span>
                            </span>
                        </figure>
                    </a>
                    <div class="action">
                        <button style="border: 1px solid #ccc;color: black;font-weight: 600" type="button" class="btn-add-cart"
                                onclick="<?php echo $isSignedIn ? "addToCart({$mobileGiaSocs[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>"
                                style="display: <?php echo ($mobileGiaSocs[$i]['soLuongTrongKho'] > 0) ? 'inline-block' : 'none'; ?>"
                        >
                            Add to cart
                        </button>
                        <button style="border: 1px solid #ccc;font-weight: 600;" type="button" class="btn-add-wishlist"
                                onclick="<?php echo $isSignedIn ? "addToWishList({$mobileGiaSocs[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>">
                            Add to wishlist
                        </button>
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
    <div class="sanpham-moi">
        <?php

        ?>
        <div class="title">
            <h4 style="font-family: 'Glyphicons Halflings';font-weight: bold;font-size: 30px;color: black;">SẢN PHẨM MỚI</h4>
        </div>
        <ul class="list-product" >
            <?php for ($i = 0; $i < sizeof($mobileNews); $i++) : ?>
                <li data-productid="<?php echo $mobileNews[$i]['idMobile'] ?>">
                    <a href="<?php echo baseUrl('product/index/') . $mobileNews[$i]['idMobile']; ?>">
                        <img src="<?php echo BASE_URL . $mobileNews[$i][0] ?>" alt="logo-mobile">
                        <h3><?php echo $mobileNews[$i]['tenDienThoai']; ?></h3>
                        <div class="price">
                            <strong>
                                <?php echo formatPrice($mobileNews[$i]['giaBan'] - $mobileNews[$i]['giamGia']) ?>
                            </strong>
                            <span>
                                <?php echo(($mobileNews[$i]['giamGia'] > 0) ? formatPrice($mobileNews[$i]['giaBan']) : ''); ?>
                            </span>
                        </div>
                        <figure class="bginfo">
                            <span>
                                Màn hình: <?php echo $mobileNews[$i]['manHinh'] ?>
                            </span>
                            <span>
                                HĐH: <?php echo $mobileNews[$i]['heDieuHanh'] ?>
                            </span>
                            <span>
                                CPU: <?php echo $mobileNews[$i]['CPU'] ?>
                            </span>
                            <span>
                                RAM: <?php echo $mobileNews[$i]['RAM'] ?>GB
                            </span>
                            <span>
                                Camera: <?php echo $mobileNews[$i]['cameraSau']; ?>
                            </span>
                            <span>
                                Selfie: <?php echo $mobileNews[$i]['cameraTruoc']; ?>
                            </span>
                            <span>
                                PIN: <?php echo $mobileNews[$i]['dungLuongPin']; ?> mAh
                            </span>
                            <span>
                                Màu sắc: <span
                                        style='font-weight: bold;color: green; display: inline-block; font-style: italic;'><?php echo $mobileNews[$i]['mauSac']; ?></span>
                            </span>
                        </figure>
                    </a>
                    <div class="action">
                        <button style="border: 1px solid #ccc;color: black;font-weight: 600" type="button" class="btn-add-cart"
                                onclick="<?php echo $isSignedIn ? "addToCart({$mobileNews[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>"
                                style="display: <?php echo ($mobileNews[$i]['soLuongTrongKho'] > 0) ? 'inline-block' : 'none'; ?>"
                        >
                            Add to cart
                        </button>
                        <button style="border: 1px solid #ccc;font-weight: 600;" type="button" class="btn-add-wishlist"
                                onclick="<?php echo $isSignedIn ? "addToWishList({$mobileNews[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>">
                            Add to wishlist
                        </button>
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
    <div class="gia-soc">
        <?php

        ?>
        <div class="title">
            <h4 style="font-family: 'Glyphicons Halflings';font-weight: bold;font-size: 30px;color: black;">SẢN PHẨM NỔI BẬT</h4>
        </div>
        <ul class="list-product">
            <?php for ($i = 0; $i < sizeof($mobileNoiBats); $i++) : ?>
                <li data-productid="<?php echo $mobileNoiBats[$i]['idMobile'] ?>">
                    <a href="<?php echo baseUrl('product/index/') . $mobileNoiBats[$i]['idMobile']; ?>">
                        <img src="<?php echo BASE_URL . $mobileNoiBats[$i][0] ?>" alt="logo-mobile">
                        <h3><?php echo $mobileNoiBats[$i]['tenDienThoai']; ?></h3>
                        <div class="price">
                            <strong>
                                <?php echo formatPrice($mobileNoiBats[$i]['giaBan'] - $mobileNoiBats[$i]['giamGia']) ?>
                            </strong>
                            <span>
                                <?php echo(($mobileNoiBats[$i]['giamGia'] > 0) ? formatPrice($mobileNoiBats[$i]['giaBan']) : ''); ?>
                            </span>
                        </div>
                        <figure class="bginfo">
                            <span>
                                Màn hình: <?php echo $mobileNoiBats[$i]['manHinh'] ?>
                            </span>
                            <span>
                                HĐH: <?php echo $mobileNoiBats[$i]['heDieuHanh'] ?>
                            </span>
                            <span>
                                CPU: <?php echo $mobileNoiBats[$i]['CPU'] ?>
                            </span>
                            <span>
                                RAM: <?php echo $mobileNoiBats[$i]['RAM'] ?>GB
                            </span>
                            <span>
                                Camera: <?php echo $mobileNoiBats[$i]['cameraSau']; ?>
                            </span>
                            <span>
                                Selfie: <?php echo $mobileNoiBats[$i]['cameraTruoc']; ?>
                            </span>
                            <span>
                                PIN: <?php echo $mobileNoiBats[$i]['dungLuongPin']; ?> mAh
                            </span>
                            <span>
                                Màu sắc: <span
                                        style='font-weight: bold;color: green; display: inline-block; font-style: italic;'><?php echo $mobileNoiBats[$i]['mauSac']; ?></span>
                            </span>
                        </figure>
                    </a>
                    <div class="action">
                        <button style="border: 1px solid #ccc;color: black;font-weight: 600" type="button" class="btn-add-cart"
                                onclick="<?php echo $isSignedIn ? "addToCart({$mobileNoiBats[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>"
                                style="display: <?php echo ($mobileNoiBats[$i]['soLuongTrongKho'] > 0) ? 'inline-block' : 'none'; ?>"
                        >
                            Add to cart
                        </button>
                        <button style="border: 1px solid #ccc;font-weight: 600;" type="button" class="btn-add-wishlist"
                                onclick="<?php echo $isSignedIn ? "addToWishList({$mobileNoiBats[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>">
                            Add to wishlist
                        </button>
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
</div>

<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
?>
<div class="product-detail">
    <div class="p-wrap">
        <div class="p-image">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < sizeof($images); $i++) : ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"
                            class="<?php echo(($i == 0) ? 'active' : ''); ?>"></li>
                    <?php endfor; ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php for ($j = 0; $j < sizeof($images); $j++) : ?>
                        <div class="item <?php echo(($j == 0) ? 'active' : ''); ?>">
                            <img src="<?php echo BASE_URL . $images[$j]['url']; ?>"
                                 alt="<?php echo $images[$j]['name']; ?>">
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
        <div class="p-detail">
            <div class="title-mobile">
                <h3><?php echo $mobile['tenDienThoai']; ?></h3>
            </div>
            <figure class="p-character">
                <span>
                    Màu sắc: <span style='font-weight: bold;margin-top: -3px;padding: 0 !important; color: green; display: inline-block; font-style: italic;'><?php echo $mobile['mauSac'] ?></span>
                </span>
                <span>
                    CPU: <?php echo $mobile['CPU'] ?>
                </span>
                <span>
                    RAM: <?php echo $mobile['RAM'] ?>GB
                </span>
                <span>
                    Bộ nhớ trong: <?php echo $mobile['boNhoTrong'] ?>GB
                </span>
                <span>
                    Màn hình: <?php echo $mobile['manHinh'] ?>
                </span>
                <span>
                    HĐH: <?php echo $mobile['heDieuHanh'] ?>
                </span>
                <span>
                    Đồ họa: <?php echo $mobile['gpu'] ?>
                </span>
                <span>
                    Camera sau: <?php echo $mobile['cameraSau']; ?>
                </span>
                <span>
                    Camera trước: <?php echo $mobile['cameraTruoc']; ?>
                </span>
                <span>
                    PIN: <?php echo $mobile['dungLuongPin']; ?> mAh
                </span>
                <span>
                    Công nghệ sạc: <?php echo $mobile['sacNhanh']; ?>
                </span>
                <span>
                    SIM: <?php echo $mobile['SIM']; ?>
                </span>
                <span>
                    Hỗ trợ 4G: <?php echo $mobile['4G'] ? 'Có' : 'Không'; ?>
                </span>
                <span>
                    Số sao: <?php echo $mobile['soSao']; ?>
                </span>
                <span>
                    Sản phẩm: <span
                            class="check <?php echo ($mobile['soLuongTrongKho'] > 0) ? 'conhang' : 'hethang'; ?>"><?php echo ($mobile['soLuongTrongKho'] > 0) ? 'Còn hàng' : 'Hết hàng'; ?></span>
                </span>
            </figure>
            <div class="price">
                <strong>
                    <?php echo formatPrice($mobile['giaBan'] - $mobile['giamGia']) ?>
                </strong>
                <span>
                    <?php echo(($mobile['giamGia'] > 0) ? formatPrice($mobile['giaBan']) : ''); ?>
                </span>
            </div>

            <div class="action">
                <button type="button" class="btn-add-cart"
                        onclick="<?php echo $isSignedIn ? "addToCart({$mobile['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>"
                        style="display: <?php echo ($mobile['soLuongTrongKho'] > 0) ? 'inline-block' : 'none'; ?>"
                >
                    Add to cart
                </button>
                <button type="button" class="btn-add-wishlist"
                        onclick="<?php echo $isSignedIn ? "addToWishList({$mobile['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>">
                    Add to wishlist
                </button>
            </div>
        </div>
    </div>
    <div class="p-description">
        <p><?php echo $mobile['moTa'] ?></p>
    </div>
</div>
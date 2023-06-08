<?php

/**
 * Hàm tiện ích hiển thị grid product cho tìm kiếm, lọc sản phẩm
 * @param $arrayProducts Mảng các điện thoại truyền vào
 * @param $isSignedIn Biến kiểm tra xem người dùng đã đăng nhập hay chưa (sử dụng cho nút add-cart, add-wishlist)
 */
function grid($arrayProducts, $isSignedIn)
{
    $numberProducts = sizeof($arrayProducts);
    $numberRows = ceil($numberProducts / 4);
    $content = "<div id='grid'>";
    for ($i = 0; $i < $numberRows; $i++) {
        $row = "";
        $row .= "<ul class='list-product'>";
        for ($j = 4 * $i; $j < 4 * $i + 4; $j++) {
            if ($j > $numberProducts - 1) {
                break;
            }
            $row .= "<li data-productid=" . $arrayProducts[$j]['idMobile'] . ">";
            $row .= "<a href=" . baseUrl('product/index/') . $arrayProducts[$j]['idMobile'] . ">";
            $row .= "<img src=" . BASE_URL . $arrayProducts[$j][0] . " />";
            $row .= "<h3>" . $arrayProducts[$j]['tenDienThoai'] . "</h3>";
            $row .= "<div class='price'>";
            $row .= "<strong>" . formatPrice($arrayProducts[$j]['giaBan'] - $arrayProducts[$j]['giamGia']) . "</strong>";
            $oldPrice = ($arrayProducts[$j]['giamGia'] > 0) ? formatPrice($arrayProducts[$j]['giaBan']) : '';
            $row .= "<span>" . $oldPrice . "</span>";
            $row .= "</div>";
            $row .= "<figure class='bginfo'>";
            $row .= "<span>Màn hình:" . $arrayProducts[$j]['manHinh'] . "</span>";
            $row .= "<span>HĐH:" . $arrayProducts[$j]['heDieuHanh'] . "</span>";
            $row .= "<span>CPU:" . $arrayProducts[$j]['CPU'] . "</span>";
            $row .= "<span>RAM:" . $arrayProducts[$j]['RAM'] . "GB</span>";
            $row .= "<span>Camera:" . $arrayProducts[$j]['cameraSau'] . "</span>";
            $row .= "<span>Selfie:" . $arrayProducts[$j]['cameraTruoc'] . "</span>";
            $row .= "<span>PIN:" . $arrayProducts[$j]['dungLuongPin'] . " mAh</span>";
            $row .= "<span>Màu sắc:  <span style='font-weight:bold;color: green; display: inline-block; font-style: italic;'>" . $arrayProducts[$j]['mauSac'] . "</span></span>";
            $row .= "</figure>";
            $row .= "</a>";
            $row .= "<div class='action'>";
            $action1 = $isSignedIn ? "addToCart({$arrayProducts[$j]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'";
            $style1 = ($arrayProducts[$j]['soLuongTrongKho'] > 0) ? 'inline-block' : 'none';
            $row .= "<button type='button' class='btn-add-cart' onclick=" . $action1 . " style='display: " . $style1 . "' >";
            $row .= "Add to cart";
            $row .= "</button>";
            $action2 = $isSignedIn ? "addToWishList({$arrayProducts[$j]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'";
            $row .= "<button type='button' class='btn-add-wishlist' onclick=" . $action2 . " >";
            $row .= "Add to wishlist";
            $row .= "</button>";

            $row .= "</div>";
            $row .= "</li>";
        }
        $row .= "</ul>";
        $content .= $row;
    }
    $content .= "</div>";
    echo $content;
}

function getNameManufacturer($idManufacturer)
{
    $connection = connect();
    $stmt = $connection->prepare("SELECT tenNhaSX FROM nhasanxuat WHERE idNhaSanXuat = {$idManufacturer}");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['tenNhaSX'];
}

function getNameSupplier($idSupplier)
{
    $connection = connect();
    $stmt = $connection->prepare("SELECT tenNhaCC FROM nhacungcap WHERE idNhaCungCap = {$idSupplier}");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['tenNhaCC'];
}

function getNameCategory($idCategory)
{
    $connection = connect();
    $stmt = $connection->prepare("SELECT tentheloai FROM theloai WHERE idTheloai = {$idCategory}");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['tentheloai'];
}

function getObjectById($table, $idCol, $idVal)
{
    try {
        $connection = connect();
        $stmt = $connection->prepare("SELECT * FROM {$table} WHERE {$idCol} = {$idVal}");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<br />" . $e->getMessage();
        return $e->getMessage();
    }
    return $data;
}

function getAllShipper()
{
    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM nhanvien WHERE chucvu = 'Nhân viên giao hàng' AND status = 1 ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

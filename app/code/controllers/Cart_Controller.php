<?php


class Cart_Controller extends Base_Controller
{
    /** Cập nhật số lượng mới của mỗi sản phẩm ở trang giỏ hàng, sau khi bấm "Cập nhật giỏ hàng"
     *Mỗi lần gọi, cập nhật 1 sản phẩm
     * Truyền vào id của chi tiết cart và số lượng mới của chi tiết (get param bằng phương thức get)
     */
    function updateItemCart()
    {
        $idDetailCart = null;
        $newCount = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $idDetailCart = $param[0];
        }
        if (!empty($param[1])) {
            $newCount = $param[1];
        }
        $result = $this->model->giohang_has_mobile->updateRecord('giohang_has_mobile', 'id', $idDetailCart, 'soLuong', $newCount);
    }
}
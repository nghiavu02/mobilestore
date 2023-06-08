<?php

class Chitietmuahang_Model extends Base_Model
{
    protected $table = 'chitietmuahang';

    // Tạo mới 1 chi tiết mua hàng
    public function createNewDetail($soLuong, $tienCT, $idDonMua, $idMobile)
    {
        try {
            $query = "INSERT INTO {$this->table} (soLuong, soLuongTraLai, thanhTien, donmuahang_idDonHang, mobile_idMobile)
            VALUES (?, ?, ?, ?, ?)";
            $pre = $this->db->prepare($query);
            $pre->execute([$soLuong, 0, $tienCT, $idDonMua, $idMobile]);
            $pre->closeCursor();
            return true;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }
}

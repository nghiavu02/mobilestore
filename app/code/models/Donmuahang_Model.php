<?php

class Donmuahang_Model extends Base_Model
{
    protected $table = 'donmuahang';

    public function createNewOrder($diaChiNhanHang, $totalPrice)
    {
        try {
            $query = "INSERT INTO {$this->table} (ngayTao, diaChiNhanHang, trangThaiDonHang, loaiDonHang, tongTien, biHuy, khachhang_idKhachHang)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $pre = $this->db->prepare($query);
            $this->db->beginTransaction();
            $pre->execute([
                date("Y-m-d H:i:s"),
                $diaChiNhanHang,
                'chưa phê duyệt',
                'xuất hàng',
                $totalPrice,
                0,
                $_SESSION['idUser']
            ]);
            $count = $pre->rowCount();
            if ($count === 0) {
                return null;
            } else {
                // Trả về id của đơn hàng vừa được tạo mới
                $id = $this->db->lastInsertId();
                $this->db->commit();
                return $id;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return null;
    }

    public function getAllOrders($idNhanVien, $loaiDonHang, $trangThai)
    {
        try {
            if ($idNhanVien == null) {
                $query = "SELECT * FROM {$this->table} WHERE loaiDonHang = :loai AND trangThaiDonHang = :trangthai ";
                $pre = $this->db->prepare($query);
                $pre->execute([
                    ':loai' => $loaiDonHang,
                    ':trangthai' => $trangThai
                ]);
            } else {
                $query = "SELECT * FROM {$this->table} WHERE loaiDonHang = :loai AND trangThaiDonHang = :trangthai AND nhanvien_idNhanVien = :id ";
                $pre = $this->db->prepare($query);
                $pre->execute([
                    ':loai' => $loaiDonHang,
                    ':trangthai' => $trangThai,
                    ':id' => $idNhanVien
                ]);
            }
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    public function approveOrder($idOrder)
    {
        try {
            $query = "UPDATE {$this->table} SET trangThaiDonHang = :trangthai WHERE idDonHang = :idOrder ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':trangthai' => "đã phê duyệt",
                ':idOrder' => $idOrder
            ]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }

    public function approveAllOrder()
    {
        try {
            $query = "UPDATE {$this->table} SET trangThaiDonHang = :trangThaiMoi WHERE trangThaiDonHang = :trangThaiCu ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':trangThaiCu' => "chưa phê duyệt",
                ':trangThaiMoi' => "đã phê duyệt"
            ]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }

    public function assign($idOrder, $idShipper)
    {
        try {
            // thay doi trang thai don hang va gan cho shipper
            $query = "UPDATE donmuahang SET trangThaiDonHang = 'đang giao hàng', nhanvien_idNhanVien = :idShipper WHERE idDonHang = :idOrder ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idShipper' => $idShipper,
                ':idOrder' => $idOrder
            ]);
            $count = $pre->rowCount();
            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }

    public function checkout($idOrder)
    {
        try {
            
            // Lay ve tat ca cac chi tien mua hang cua don hang
            $allDetails = $this->getAll('chitietmuahang', 'donmuahang_idDonHang', $idOrder);
            // Giam so luong san pham trong kho cua cac mat hang trong don hang
            foreach($allDetails as $detail){
                $idMobile = $detail['mobile_idMobile'];
                $mobile = $this->getById('mobile', 'idMobile', $idMobile);
                $query0 = "UPDATE mobile SET soLuongTrongKho = soLuongTrongKho - :soLuong WHERE idMobile = :id ";
                $pre0 = $this->db->prepare($query0);
                $pre0->execute([
                    ':soLuong' => $detail['soLuong'],
                    ':id' => $idMobile
                ]);
            }

            // Cap nhat trang thai don hang
            $query = "UPDATE {$this->table} SET trangThaiDonHang = 'đã thanh toán', ngayThanhToan = :ngay WHERE idDonHang = :idOrder ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idOrder' => $idOrder,
                ':ngay' => date("Y-m-d H:i:s")
            ]);
            return true;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return true;
    }
}

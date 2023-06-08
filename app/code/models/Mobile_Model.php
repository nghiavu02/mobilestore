<?php

class Mobile_Model extends Base_Model
{
    protected $table = 'mobile';

    // Dien thoai gia soc co truong giamGia >= 1 000 000 VND
    function getMobileGiaSoc()
    {
        $query = "select * from {$this->table} where giamGia >= 1000000 and visibleOnHome = 1 limit 4";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function updateVisibleBasePrice()
    {
        $allBasePrice = $this->getData('mobile');
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allBasePrice); $j++) {
            $this->updateRecord('mobile', 'idMobile', $allBasePrice[$j]['idMobile'], 'visibleOnHome', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idMobile = trim($key, "visibleOnHomeBase");
            $this->updateRecord('mobile', 'idMobile', intval($idMobile), 'visibleOnHome', 1);
        }
        return true;
    }

    // Dien thoai moi hien thi o Home Page co idTheloai = 2 va truong visibleOnHome = 1
    function getMobileNew()
    {
        $query = "select * from {$this->table} where Theloai_idTheloai = 2 and visibleOnHome = 1 limit 4";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function updateVisibleNew()
    {
        $allNew = $this->getDataNew('mobile');
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allNew); $j++) {
            $this->updateRecord('mobile', 'idMobile', $allNew[$j]['idMobile'], 'visibleOnHome', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idMobile = trim($key, "visibleOnHomeBase");
            $this->updateRecord('mobile', 'idMobile', intval($idMobile), 'visibleOnHome', 1);
        }
        return true;
    }

    // Dien thoai noi bat co idTheloai = 6
    function getMobileNoiBat()
    {
        $query = "select * from {$this->table} where Theloai_idTheloai = 6 and visibleOnHome = 1 limit 4 ";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function updateVisibleExpress()
    {
        $allExpress = $this->getDataExpress('mobile');
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allExpress); $j++) {
            $this->updateRecord('mobile', 'idMobile', $allExpress[$j]['idMobile'], 'visibleOnHome', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idMobile = trim($key, "visibleOnHomeBase");
            $this->updateRecord('mobile', 'idMobile', intval($idMobile), 'visibleOnHome', 1);
        }
        return true;
    }

    /**
     * @param $key tên sản phẩm hoặc tên nhà sản xuất
     */
    public function search($key)
    {
        $data = null;
        try {
            $query = "SELECT DISTINCT mobile.* FROM mobile, nhasanxuat WHERE mobile.tenDienThoai LIKE '%" . $key . "%' OR ( mobile.NhaSanXuat_idNhaSanXuat = nhasanxuat.idNhaSanXuat AND nhasanxuat.tenNhaSX LIKE '%" . $key . "%')";
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            return $data;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return $data;
    }

    public function searchByManufacturer($idNhaSanXuat){
        $data = null;
        try{
            $query = "SELECT DISTINCT * FROM mobile WHERE NhaSanXuat_idNhaSanXuat = $idNhaSanXuat";
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            return $data;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return $data;
    }

    public function searchByProductNew(){
        $data = null;
        try{
            $query = "SELECT DISTINCT * FROM mobile ORDER BY idMobile DESC limit 8";
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            return $data;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return $data;
    }

    public function searchByMoney($param1, $param2){
        $data = null;
        try{
            if($param1 == 1000000 & $param2 == 0){
                $query = "SELECT DISTINCT * FROM mobile WHERE giaBan < $param1";
            } else{
                if($param1 == 15000000){
                    $query = "SELECT DISTINCT * FROM mobile WHERE giaBan > $param1";
                } else{
                    $query = "SELECT DISTINCT * FROM mobile WHERE giaBan > $param1 AND giaBan < $param2";
                }
            }
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            return $data;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return $data;
    }

    public function saveNewMobile()
    {
        try {
            $_4g = ($_POST['4g'] == "Có") ? 1 : 0;
            // luu du lieu khong phai hinh anh vao bang mobile
            $query1 = "INSERT INTO mobile (tenDienThoai, giaNhap, giaBan, giamGia, moTa, ngayNhapKho, soLuongTrongKho, mauSac, CPU, gpu, RAM, boNhoTrong, heDieuHanh, manHinh, cameraSau, cameraTruoc, dungLuongPin, sacNhanh, SIM, 4G, soLuotXem, soSao, mucDichSuDung, visibleOnHome, NhaCungCap_idNhaCungCap, NhaSanXuat_idNhaSanXuat, theloai_idTheloai) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $pre1 = $this->db->prepare($query1);
            $pre1->execute([
                $_POST['ten'],
                intval($_POST['gianhap']),
                intval($_POST['giaban']),
                intval($_POST['giamgia']),
                $_POST['mota'],
                null,
                0,
                $_POST['mausac'],
                $_POST['cpu'],
                $_POST['gpu'],
                $_POST['ram'],
                $_POST['bonhotrong'],
                $_POST['hedieuhanh'],
                $_POST['manhinh'],
                $_POST['camerasau'],
                $_POST['cameratruoc'],
                $_POST['pin'],
                $_POST['sacpin'],
                $_POST['sim'],
                $_4g,
                0,
                0,
                '1111',
                0,
                null,
                $_SESSION['idNSX'],
                $_SESSION['idTheloai']
            ]);
            $count = $pre1->rowCount();
            if ($count == 0) {
                return false;
            } else {
                $idMobile = $this->db->lastInsertId();
                // luu anh vao co so du lieu, bang hinhanh
                $query2 = "INSERT INTO hinhanh (tenAnh, url, logo, Mobile_idMobile) VALUES (?, ?, ?, ?)";
                $pre2 = $this->db->prepare($query2);
                // insert 1 logo
                $pre2->execute([
                    $_SESSION['nameLogo'],
                    $_SESSION['urlLogo'],
                    1,
                    $idMobile
                ]);
                // insert 4 anh phu
                $pre2->execute([
                    $_SESSION['nameAnh1'],
                    $_SESSION['urlAnh1'],
                    0,
                    $idMobile
                ]);
                $pre2->execute([
                    $_SESSION['nameAnh2'],
                    $_SESSION['urlAnh2'],
                    0,
                    $idMobile
                ]);
                $pre2->execute([
                    $_SESSION['nameAnh3'],
                    $_SESSION['urlAnh3'],
                    0,
                    $idMobile
                ]);
                $pre2->execute([
                    $_SESSION['nameAnh4'],
                    $_SESSION['urlAnh4'],
                    0,
                    $idMobile
                ]);
                return true;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    public function updateImageMobile()
    {
        try {
            // Xoa tat ca anh cu
            $query0 = "DELETE FROM hinhanh WHERE Mobile_idMobile = :id";
            $pre0 = $this->db->prepare($query0);
            $pre0->execute([
                ':id' => $_SESSION['idMobileEdit']
            ]);
            // Them anh vao co so du lieu, bang hinhanh
            $query1 = "INSERT INTO hinhanh (tenAnh, url, logo, Mobile_idMobile) VALUES (?, ?, ?, ?)";
            $pre1 = $this->db->prepare($query1);
            // them 1 logo
            $pre1->execute([
                $_SESSION['enameLogo'],
                $_SESSION['eurlLogo'],
                1,
                $_SESSION['idMobileEdit']
            ]);
            // them 4 anh phu
            $pre1->execute([
                $_SESSION['enameAnh1'],
                $_SESSION['eurlAnh1'],
                0,
                $_SESSION['idMobileEdit']
            ]);
            $pre1->execute([
                $_SESSION['enameAnh2'],
                $_SESSION['eurlAnh2'],
                0,
                $_SESSION['idMobileEdit']
            ]);
            $pre1->execute([
                $_SESSION['enameAnh3'],
                $_SESSION['eurlAnh3'],
                0,
                $_SESSION['idMobileEdit']
            ]);
            $pre1->execute([
                $_SESSION['enameAnh4'],
                $_SESSION['eurlAnh4'],
                0,
                $_SESSION['idMobileEdit']
            ]);
            return true;
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    // Luu thong tin cap nhat dien thoai
    public function saveEditMobile()
    {
        try {
            $_4g = null;
            if ($_POST['e4g'] === "Có") {
                $_4g = 1;
            } else {
                $_4g = 0;
            }
            $query = "UPDATE {$this->table} SET tenDienThoai = :ten, mauSac = :mausac, soLuongTrongKho = :soluong, giaNhap = :gianhap, giaBan = :giaban, giamGia = :giamgia, CPU = :cpu, gpu = :gpu, RAM = :ram, boNhoTrong = :bonhotrong, heDieuHanh = :hedieuhanh, manHinh = :manhinh, cameraSau = :camerasau, cameraTruoc = :cameratruoc, dungLuongPin = :pin, sacNhanh = :sac, SIM = :sim, 4G = :_4g, NhaSanXuat_idNhaSanXuat = :nsx, theloai_idTheloai = :theloai, moTa = :mota WHERE idMobile = :idMobile";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':ten' => $_POST['eten'],
                ':mausac' => $_POST['emausac'],
                ':soluong' => intval($_POST['esoluong']),
                ':gianhap' => intval($_POST['egianhap']),
                ':giaban' => intval($_POST['egiaban']),
                ':giamgia' => intval($_POST['egiamgia']),
                ':cpu' => $_POST['ecpu'],
                ':gpu' => $_POST['egpu'],
                ':ram' => intval($_POST['eram']),
                ':bonhotrong' => $_POST['ebonhotrong'],
                ':hedieuhanh' => $_POST['ehedieuhanh'],
                ':manhinh' => $_POST['emanhinh'],
                ':camerasau' => $_POST['ecamerasau'],
                ':cameratruoc' => $_POST['ecameratruoc'],
                ':pin' => $_POST['epin'],
                ':sac' => $_POST['esacpin'],
                ':sim' => $_POST['esim'],
                ':_4g' => $_4g,
                ':nsx' => $_SESSION['nsxId'],
                ':theloai' => $_SESSION['theloaiId'],
                ':mota' => $_POST['emota'],
                ':idMobile' => intval($_POST['idMobile'])
            ]);
            $count = $pre->rowCount();
            if ($count == 0) {
                // Chua thay doi thong tin
                return false;
            } else {
                // Cap nhat thanh cong
                return true;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    // Tim kiem dien thoai. Neu khong ton tai ten nhu vay thi tra ve null, nguoc lai tra ve tenDienThoai tim thay
    public function searchPhone($namePhone)
    {
        try {
            $query = "select tenDienThoai from {$this->table} where tenDienThoai = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $namePhone
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }
}

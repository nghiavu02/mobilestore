<?php

class Khachhang_Model extends Base_Model
{
    protected $table = 'khachhang';

    // Tim kiem email. Neu khong ton tai email thi tra ve null, nguoc lai tra ve email tim thay
    public function searchEmail($email)
    {
        try {
            $query = "select email from {$this->table} where email = :email";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':email' => $email
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    // Tim kiem va tra ve 1 object khachhang
    public function searchAccount($email)
    {
        try {
            $query = "select * from {$this->table} where email = :email";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':email' => $email
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    // Them moi 1 account, chen data vao csdl
    public function insertAccount($username, $email, $password, $activation, $status, $phone, $address)
    {
        try {
            $query = "INSERT INTO {$this->table} (tenKhachHang, soDienThoai, email, matKhau, activation, status, ngayTao, diaChi, wishlist)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pre = $this->db->prepare($query);
            $pre->execute([$username, $phone, $email, $password, $activation, $status, date('Y-m-d'), $address, '']);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return false;
        }
        return [
            'username' => $username,
            'email' => $email,
            'activation' => $activation
        ];
    }

    // Dang ky tai khoan
    public function registerCustomerAccount()
    {
        $data = [];
        $username = null;
        $email = null;
        $password = null;
        $address = null;
        $phone = null;
        $activation = null;
        $status = 0;

        if (isset($_POST['reg-name'])) {
            $username = addslashes(trim($_POST['reg-name']));
        }
        if (isset($_POST['reg-email'])) {
            $email = addslashes(trim($_POST['reg-email']));
        }
        // password in database = hash(password + email)
        if (isset($_POST['reg-password'])) {
            $password = password_hash(addslashes($_POST['reg-password'] . $email), PASSWORD_DEFAULT);
        }
        if (isset($_POST['reg-address'])) {
            $address = addslashes(trim($_POST['reg-address']));
        }
        if (isset($_POST['reg-phone'])) {
            $phone = addslashes(trim($_POST['reg-phone']));
        }
        // activation code = md5 (email + currentTime)
        $activation = md5($email . time());

        // insert data into database
        $result = $this->insertAccount($username, $email, $password, $activation, $status, $phone, $address);

        return $result;
    }

    /**
     * Ham tim kiem account moi dang ky theo activation code. Neu tim thay ma status = 0 thi set status = 1 va tra ve true. Nguoc lai thi tra ve false
     * @param string $activation ma hash md5 cua email va time
     * @return true xac minh thanh cong
     * @return false xac minh that bai
     */
    function activeAccount($activation)
    {
        try {
            // Khi khach kich vao link tu lan thu 2 tro di, ham luon tra ve 1 ( thong bao link het han, tk da duoc actived)
            $query0 = "select idKhachHang from {$this->table} where (activation = :activation and status = 1)";
            $pre0 = $this->db->prepare($query0);
            $pre0->execute([
                ':activation' => $activation
            ]);
            $data0 = $pre0->fetch(PDO::FETCH_ASSOC);
            if (!empty($data0)) {
                return 1;
            } else {
                // Kiem tra xem co ton tai activation code khong
                $query = "select idKhachHang from {$this->table} where (activation = :activation and status = 0)";
                $pre = $this->db->prepare($query);
                $pre->execute([
                    ':activation' => $activation
                ]);
                $data = $pre->fetch(PDO::FETCH_ASSOC);
                if (!empty($data)) {
                    $queryUpdate = "update {$this->table} set status = 1 where activation = :activation";
                    $pre1 = $this->db->prepare($queryUpdate);
                    $pre1->execute([':activation' => $activation]);
                    $pre1->closeCursor();
                    $pre->closeCursor();
                    return 2;
                } else {
                    $pre->closeCursor();
                    return 3;
                }
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            $pre->closeCursor();
            return 3;
        }
        return 2;
    }

    /**
     * Ham cap nhat thong tin ca nhan cua khach hang
     * @param int $idUser id cua khach hang
     * @param string $newName ten moi cua khach hang
     * @param string $newPhone so dien thoai moi cua khach hang
     * @param string $newAddress dia chi moi cua khach hang
     * @return boolean true cap nhat thanh cong
     * @return boolean false cap nhat that bai
     */
    function updateUserInfo($idUser, $newName, $newAddress, $newPhone)
    {
        try {
            $query = "UPDATE khachhang SET tenKhachHang = :tenKhachHang, diaChi = :diaChi, soDienThoai = :soDienThoai WHERE idKhachHang = :idKhachHang";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idKhachHang' => $idUser,
                ':tenKhachHang' => $newName,
                ':diaChi' => $newAddress,
                ':soDienThoai' => $newPhone
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

    /**
     * Get password of a customer
     * @param int $idUser id of user
     * @return  string hash of password
     */
    function getCustomerPassword($idUser)
    {
        try {
            $query = "select matKhau from {$this->table} where idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $idUser
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    /**
     * Update password of a customer
     * @param int $idUser id of user
     * @param string $newPass new plaintext password
     * @return boolean true update success
     * @return boolean false update fail
     */
    function updateCustomerPassword($idUser, $newPassText)
    {
        try {
            $query = "update {$this->table} set matKhau = :newPass where idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $idUser,
                ':newPass' => password_hash(addslashes($newPassText . $_SESSION['email']), PASSWORD_DEFAULT)
            ]);
            $rowCount = $pre->rowCount();
            if ($rowCount > 0) {
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

    /**
     * Add mobile to customer wishlist
     * @param int idMobile id cua mobile
     * @return boolean true add mobile into wishlist success
     * @return boolean false add to wishlist fail
     */
    function addToWishList($idMobile)
    {
        // wishlist trong database la 1 string (cac id phan cach nhau boi dau phay. vi du "1,12,23,5")
        try {
            // get wishlist string from database
            $query = "select wishlist from {$this->table} where idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $_SESSION['idUser']
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            $data['wishlist'] .= "," . $idMobile;
            $tempArray = explode(",", $data['wishlist']);
            // Loai bo phan tu trung nhau trong array
            $tempArray = array_unique($tempArray);
            // newWishList la string
            $newWishList = implode(",", $tempArray);

            // save new wishlist into database
            $query1 = "update {$this->table} set wishlist = :wishlist where idKhachHang = :idKhachHang";
            $pre1 = $this->db->prepare($query1);
            $pre1->execute([
                ':idKhachHang' => $_SESSION['idUser'],
                ':wishlist' => $newWishList
            ]);
            $count = $pre1->rowCount();
            if ($count === 0) {
                return 0;
            } else {
                return 1;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 2;
        }
        return 1;
    }

    function getWishList($idUser)
    {
        $data = null;
        try {
            $query = "select wishlist from {$this->table} where idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $idUser
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    function updateCountWishlist($idUser)
    {
        $data = $this->getWishList($idUser);
        $count = sizeof(explode(',', $data['wishlist'])) - 1;
        return $count;
    }

    function deleteItemWishlist($idMobile, $idUser)
    {
        $data = $this->getWishList($idUser);
        $arrayWishList = explode(",", $data['wishlist']);
        // tim kiem khoa cua idMobile trong mang
        $key = array_search($idMobile, $arrayWishList);
        // xoa idMobile do khoi mang
        array_splice($arrayWishList, $key, 1);
        $newWishList = implode(",", $arrayWishList);
        try {
            $query = "update {$this->table} set wishlist = :wishlist where idKhachHang = :idKhachHang";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idKhachHang' => $idUser,
                ':wishlist' => $newWishList
            ]);
            $rowCount = $pre->rowCount();
            if ($rowCount > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return 1;
    }

    // Kiem tra xem ton tai gio hang hay khong (tra ve 1 la ton tai, 0 la khong ton tai)
    function checkCart()
    {
        try {
            $query = "select * from giohang where khachhang_idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $_SESSION['idUser']
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            $count = $pre->rowCount();
            if ($count === 0) {
                return 0;
            } else {
                return 1;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return 1;
    }

    /** Moi khach hang chi co duy nhat 1 gio hang
     * 1 gio hang chua nhieu chi tiet gio hang
     * Tao gio hang cho khach hang (chi lan dau tien)
     */
    function createCart()
    {
        try {
            $query = "INSERT INTO giohang (khachhang_idKhachHang, ngaytao, soLuongSP) VALUES (?, ?, ?)";
            $pre = $this->db->prepare($query);
            $pre->execute([
                $_SESSION['idUser'],
                date('Y-m-d'),
                0
            ]);
            $rowCount = $pre->rowCount();
            if ($rowCount > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return 1;
    }

    // Kiem tra xem 1 dien thoai da trong cart detail hay chua ( 0 la chua, 1 la roi)
    function checkIfMobileOnCart($idMobile)
    {
        try {
            $query = "select * from giohang_has_mobile where giohang_khachhang_idKhachHang = :idUser and mobile_idMobile = :idMobile";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $_SESSION['idUser'],
                ':idMobile' => $idMobile
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            $count = $pre->rowCount();
            if ($count === 0) {
                return 0;
            } else {
                return 1;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 1;
        }
        return 0;
    }

    // Them 1 dien thoai vao gio hang (so luong la 1)
    function addToCart($idMobile)
    {
        // Kiem tra xem co ton tai gio hang khong
        $isExistedCart = $this->checkCart();
        // Neu chua ton tai gio hang thi tao moi 1 gio hang cho khach
        if ($isExistedCart === 0) {
            $this->createCart();
        }
        // Kiem tra xem dien thoai trong gio hang hay chua
        if ($this->checkIfMobileOnCart($idMobile) === 1) {
            // Da ton tai trong gio hang
            return 0;
        } else {
            // Them 1 dien thoai vao gio hang
            try {
                $query = "INSERT INTO giohang_has_mobile (soLuong, ngayThem, mobile_idMobile,giohang_khachhang_idKhachHang) VALUES (?, ?, ?,?)";
                $pre = $this->db->prepare($query);
                $pre->execute([
                    1,
                    date("Y-m-d H:i:s"),
                    $idMobile,
                    $_SESSION['idUser']
                ]);
                $rowCount = $pre->rowCount();
                if ($rowCount > 0) {
                    // Them thanh cong
                    return 1;
                } else {
                    // Da ton tai ban ghi
                    return 0;
                }
            } catch (PDOException $e) {
                echo "<br />" . $e->getMessage();
                return 0;
            }
        }

        return 1;
    }

    // Lay ve mang cac chi tiet gio hang trong gio hang (moi chi tiet la 1 phan tu cua mang)
    function getCart()
    {
        $data = null;
        try {
            $query = "select * from giohang_has_mobile where giohang_khachhang_idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $_SESSION['idUser']
            ]);
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    // Tra ve so luong chi tiet gio hang
    function updateCountCart()
    {
        $count = 0;
        try {
            $query = "select * from giohang_has_mobile where giohang_khachhang_idKhachHang = :idUser";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idUser' => $_SESSION['idUser']
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
            $count = $pre->rowCount();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return $count;
    }

    // Delete Item detail from cart
    function deleteItemCart($idDetail)
    {
        try {
            $query = "delete from giohang_has_mobile where id = :id ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $idDetail
            ]);
            $rowCount = $pre->rowCount();
            if ($rowCount > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return 1;
    }

    function saveCodeChangePass($emailForgetPass, $codeChangePass)
    {
        try {
            $query = "UPDATE khachhang SET codeChangePass = :code WHERE email = :emailKH";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':emailKH' => $emailForgetPass,
                ':code' => $codeChangePass
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

    // Ham tim kiem ban ghi chua codeChangePass, neu tim thay, tra ve 1 ban ghi khach hang
    public function findCode($codeChangePass)
    {
        try {
            $query = "select * from {$this->table} where codeChangePass = :code";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':code' => $codeChangePass
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    // Luu mat khau moi cua khach hang
    public function saveNewPassword($emailNeedChangePass, $newPassword)
    {
        $newHashPass = password_hash($newPassword . $emailNeedChangePass, PASSWORD_DEFAULT);
        try {
            $query = "UPDATE khachhang SET matKhau = :newMK WHERE email = :emailKH";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':emailKH' => $emailNeedChangePass,
                ':newMK' => $newHashPass
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
}

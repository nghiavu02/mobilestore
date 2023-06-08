<?php
class Nhacungcap_Model extends Base_Model{
    protected $table = 'nhacungcap';

    function getSupplier(){
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function saveNewSupplier()
    {
        try {
            $query = "INSERT INTO nhacungcap (tenNhaCC, diaChi, dienThoai, moTa) VALUES (?,?,?,?)";
            $pre = $this->db->prepare($query);
            $pre->execute([
                $_POST['ten'],
                $_POST['diachi'],
                $_POST['dienthoai'],
                $_POST['mota']
            ]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    public function searchSupplier($nameSupplier)
    {
        try {
            $query = "select tenNhaCC from {$this->table} where tenNhaCC = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $nameSupplier
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }
    public function saveEditSupplier()
    {
        try {
            $query = "UPDATE {$this->table} SET tenNhaCC = :ten, diaChi = :diachi, dienThoai = :dienthoai, moTa = :mota WHERE idNhaCungCap = :idNhaCungCap";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':ten' => $_POST['eten'],
                ':diachi' => $_POST['ediachi'],
                ':dienthoai' => $_POST['edienthoai'],
                ':mota' => $_POST['emota'],
                ':idNhaCungCap' => intval($_POST['idNhaCungCap'])
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

    public function deleteSupplier($idNhaCungCap)
    {
        try {
            $query = "DELETE from {$this->table} where idNhaCungCap = :id ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $idNhaCungCap
            ]);
            $rowCount = $pre->rowCount();
            if ($rowCount > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return true;
    }

    public function getCount(){
        try{
            $query =  "SELECT * FROM {$this->table}";
            $pre = $this->db->prepare($query);
            $pre->execute();
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            return sizeof($data);
        }catch(PDOException $e){
            echo "<br />". $e->getMessage();
            return false;
        }
    }
}
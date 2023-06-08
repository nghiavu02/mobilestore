
<?php
class   Nhasanxuat_Model extends Base_Model
{
    protected $table = 'nhasanxuat';

    function getNhaSX(){
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function saveNewNhaSX()
    {
        try {
            $query = "INSERT INTO nhasanxuat (tenNhaSX, diaChi, dienThoai, moTa) VALUES (?,?,?,?)";
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

    public function searchNhaSX($nameNhaSX)
    {
        try {
            $query = "select tenNhaSX from {$this->table} where tenNhaSX = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $nameNhaSX
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }
    public function saveEditManufacturer()
    {
        try {
            $query = "UPDATE {$this->table} SET tenNhaSX = :ten, diaChi = :diachi, dienThoai = :dienthoai, moTa = :mota WHERE idNhaSanXuat = :idNhaSanXuat";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':ten' => $_POST['eten'],
                ':diachi' => $_POST['ediachi'],
                ':dienthoai' => $_POST['edienthoai'],
                ':mota' => $_POST['emota'],
                ':idNhaSanXuat' => intval($_POST['idNhaSanXuat'])
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

    public function deleteManufacturer($idNhaSanXuat)
    {
        try {
            $query = "DELETE from {$this->table} where idNhaSanXuat = :id ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $idNhaSanXuat
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
?>
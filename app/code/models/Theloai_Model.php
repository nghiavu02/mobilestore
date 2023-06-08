<?php
class Theloai_Model extends Base_Model
{
    protected $table = 'theloai';

    function getCategory(){
        $query = "select * from {$this->table}";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function saveNewCategory()
    {
        try {
            $query = "INSERT INTO theloai (tentheloai, moTa) VALUES (?,?)";
            $pre = $this->db->prepare($query);
            $pre->execute([
                $_POST['ten'],
                $_POST['mota']
            ]);
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    public function searchCategory($nameCategory)
    {
        try {
            $query = "select tentheloai from {$this->table} where tentheloai = :name";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':name' => $nameCategory
            ]);
            $data = $pre->fetch(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    public function saveEditCategory()
    {
        try {
            $query = "UPDATE {$this->table} SET tentheloai = :ten, moTa = :mota WHERE idTheloai = :idTheloai";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':ten' => $_POST['eten'],
                ':mota' => $_POST['emota'],
                ':idTheloai' => intval($_POST['idTheloai'])
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

    public function deleteCategory($idTheloai)
    {
        try {
            $query = "DELETE from {$this->table} where idTheloai = :id ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $idTheloai
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

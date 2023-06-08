<?php

class Base_Model extends Core_Model
{
    /**
     * function to fetch all records of a table
     */
    function getAll($table, $colName, $colVal)
    {
        try {
            if (isset($colName) && isset($colVal)) {
                $query = "SELECT * FROM {$table} WHERE {$colName} = :colVal ";
                $pre = $this->db->prepare($query);
                $pre->execute([
                    ':colVal' => $colVal
                ]);
            } else {
                $query = "SELECT * FROM {$table} WHERE 1 ";
                $pre = $this->db->prepare($query);
                $pre->execute();
            }
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return null;
        }
        return $data;
    }

    /**
     * function to fetch a record of a table by id
     */
    function getById($table, $idName, $value)
    {
        try {
            $query = "select * from {$table} where {$idName} = :id";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $value
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
     * function to update a record of a table by column
     */
    function updateRecord($table, $idName, $idVal, $colName, $colVal)
    {
        try {
            $query = "update {$table} set {$colName} = :colVal where {$idName} = :idVal ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':idVal' => $idVal,
                ':colVal' => $colVal
            ]);
            $count = $pre->rowCount();
            if ($count === 0) {
                return 0;
            } else {
                return 1;
            }
            $pre->closeCursor();
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return 0;
        }
        return 1;
    }

    /**
     * delete all records that has special value of a column (can be id or not)
     */
    function deleteAll($table, $colName, $colVal)
    {
        try {
            $query = "DELETE FROM {$table} WHERE {$colName} = :colVal";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':colVal' => $colVal
            ]);
            $count = $pre->rowCount();
            if ($count === 0) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    function getData($table){   
        $query = "select * from {$table} where giamGia >=1000000";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    function getDataNew($table){   
        $query = "select * from {$table} where Theloai_idTheloai = 2 order by idMobile";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    function getDataExpress($table){   
        $query = "select * from {$table} where Theloai_idTheloai = 6";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    /**
     * function to edit image
     */
    public function editImage($param = [])
    {
        $tenAnh = $param[2];
        $url = $param[4];
        $logo = $param[1];
        $idMobile = $param[0];
        try {
            $query = "insert into {$this->table} (tenAnh, url, moTa, logo, Mobile_idMobile) 
            VALUES ( '{$tenAnh}', '{$url}', '' , {$logo}, {$idMobile})";
            $this->db->exec($query);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public function uploadImageMobile($param = [])
    {
        $tenAnh = $param[2];
        $url = $param[4];
        $logo = $param[1];
        $idMobile = $param[0];
        try {
            $query = "insert into {$this->table} (tenAnh, url, moTa, logo, Mobile_idMobile) 
            VALUES ( '{$tenAnh}', '{$url}', '' , {$logo}, {$idMobile})";
            $this->db->exec($query);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
}

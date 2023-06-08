<?php

class Banner_Model extends Base_Model
{
    protected $table = 'banner';

    function getActiveBanners()
    {
        $query = "select * from {$this->table} where visible = 1";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    public function updateVisibleBanner()
    {
        $allBanners = $this->getAll('banner', null, null);
        // Set all banner is not visible
        for ($j = 0; $j < sizeof($allBanners); $j++) {
            $this->updateRecord('banner', 'idBanner', $allBanners[$j]['idBanner'], 'visible', 0);
        }
        // Set all banner from post is visible
        $post = isset($_POST) ? $_POST : null;
        foreach ($post as $key => $val) {
            $idBanner = trim($key, "visibleOnHome");
            $this->updateRecord('banner', 'idBanner', intval($idBanner), 'visible', 1);
        }
        return true;
    }

    public function saveNewBanner()
    {
        try {
            $query = "INSERT INTO {$this->table} (name, url, visible) VALUES (?, ?, ?)";
            $pre = $this->db->prepare($query);
            $pre->execute([
                $_SESSION['name_image'],
                $_SESSION['url_image'],
                0
            ]);
            unset($_SESSION['name_image']);
            unset($_SESSION['url_image']);
            $count = $pre->rowCount();
            if ($count == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<br />" . $e->getMessage();
            return $e->getMessage();
        }
        return true;
    }

    public function deleteBanner($idBanner)
    {
        try {
            $query = "DELETE from {$this->table} where idBanner = :id ";
            $pre = $this->db->prepare($query);
            $pre->execute([
                ':id' => $idBanner
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

}

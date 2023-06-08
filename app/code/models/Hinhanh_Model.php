<?php

class Hinhanh_Model extends Base_Model
{
    protected $table = 'hinhanh';

    // Get base image for a mobile
    function getBaseImage($idMobile)
    {
        $query = "select * from hinhanh where Mobile_idMobile = {$idMobile} and logo = 1";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }

    // Get other image for a mobile ( not is base image)
    function getOtherImage($idMobile)
    {
        $query = "select * from hinhanh where Mobile_idMobile = {$idMobile} and logo = 0";
        $pre = $this->db->prepare($query);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        $pre->closeCursor();
        return $data;
    }
}

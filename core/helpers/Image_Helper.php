<?php
// function add all image into a mobile object (is an array ), 5 images and the first is logo
function linkImageAndMobile(&$mobile = [], $logoImage = [], $otherImage = [])
{
    // firstly, base image is insert so that key = 0
    array_push($mobile, $logoImage[0]['url']);
    // then, insert other image
    for ($i = 0; $i < sizeof($otherImage); $i++) {
        array_push($mobile, $otherImage[$i]['url']);
    }
}

// Get base image for a mobile
function getBaseImage($idMobile)
{
    $connection = connect();
    $stmt = $connection->prepare("select * from hinhanh where Mobile_idMobile = {$idMobile} and logo = 1");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

// Get other image for a mobile ( not is base image)
function getOtherImage($idMobile)
{
    $connection = connect();
    $stmt = $connection->prepare("select * from hinhanh where Mobile_idMobile = {$idMobile} and logo = 0");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function uploadImage($file, $targetDir)
{
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . $targetDir;
    if (isset($file)) {
        $target_file = $target_dir . basename($file);
        if ($file['error'] <= 0) {
            if (file_exists($target_file)) {
                $error = "da ton tai file";
            } else {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $error = "upload thanh cong";
                } else {
                    $error = "upload that bai";
                };
            }
        }
    }
}

function uploadAImage()
{
    // Get parameters
    $param = [];
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/mobileshop/static/image/mobile/";
    $link = "static/image/mobile/";
    $error = null;
    if (isset($_POST['mobile'])) {
        $mobile = $_POST['mobile'];
        array_push($param, $mobile);
    }
    if (isset($_POST['logo'])) {
        $logo = $_POST['logo'];
        array_push($param, 1);
    } else {
        array_push($param, 0);
    }
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        array_push($param, $image);
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if ($_FILES['image']['error'] <= 0) {
            if (file_exists($target_file)) {
                $error = "da ton tai file";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $error = "upload thanh cong";
                } else {
                    $error = "upload that bai";
                };
            }
        }
        array_push($param, $error);
        array_push($param, $link . $_FILES['image']['name']);
    }
    // Insert into database
    //    $this->model->hinhanh->uploadImage($param);
    //    $this->view->load('frontend/mobile/upload', [
    //        'param' => $param
    //    ]);
}

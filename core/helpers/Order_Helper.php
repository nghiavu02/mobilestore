<?php
function getKhachHang($idKH)
{
    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM khachhang WHERE idKhachHang = :id");
    $stmt->execute([
        ':id' => $idKH
    ]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

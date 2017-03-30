<?php

require_once 'koneksi.php';
$sql = $db->prepare("SELECT lat, lang FROM db_kecamatan WHERE kd_kecamatan = :kd_kecamatan");
$sql->bindParam(':kd_kecamatan', $_POST['kd_kecamatan']);
$sql->execute();
$query = $sql->fetch();

$hasil = array($query['lat'],$query['lang']);
echo json_encode($hasil);
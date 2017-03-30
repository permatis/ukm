<?php

require_once 'koneksi.php';
$hasilarray = array();
$sql = $db->prepare("SELECT db_alamat.id_alamat, db_alamat.lat, db_alamat.lang, db_kategori.icon FROM db_alamat, db_produksi, db_kategori 
	WHERE db_alamat.kd_produksi = db_produksi.kd_produksi AND db_produksi.kd_kategori = db_kategori.kd_kategori AND db_alamat.kd_kecamatan = :kd_kecamatan");
$sql->bindParam(':kd_kecamatan', $_POST['kd_kecamatan']);
$sql->execute();
$query = $sql->fetchAll();

foreach($query as $hasil){
	$hasilarray[] = $hasil;
}
echo json_encode($hasilarray);



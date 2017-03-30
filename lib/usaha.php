<?php

require_once 'koneksi.php';
$hasilarray = array();
$sql = $db->prepare("SELECT db_kategori.icon, db_alamat.id_alamat, db_alamat.lat, db_alamat.lang FROM db_kategori, db_produksi, db_alamat WHERE db_kategori.kd_kategori = db_produksi.kd_kategori AND db_alamat.kd_produksi = db_produksi.kd_produksi AND db_kategori.kd_kategori = :kd_kategori");
$sql->bindParam(':kd_kategori', $_POST['kd_kategori']);
$sql->execute();
$query = $sql->fetchAll();

foreach($query as $hasil){
	$hasilarray[] = $hasil;
}
echo json_encode($hasilarray);



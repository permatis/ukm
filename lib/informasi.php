
<?php
require_once 'koneksi.php';
$sql = $db->prepare("SELECT nama_produksi, nama_usaha, pemilik, tng_kerja, nilai_investasi, alamat, keterangan, gambar FROM db_alamat INNER JOIN db_produksi ON db_alamat.kd_produksi = db_produksi.kd_produksi WHERE id_alamat = :id_alamat");
$sql->bindParam(':id_alamat', $_POST['id_alamat']);
$sql->execute();
$query = $sql->fetch();
echo json_encode($query);


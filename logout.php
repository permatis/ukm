<?php
require_once 'lib/koneksi.php';

$tz = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$tanggal = $tz->format('Y-m-d H:i:s');

$sql = $db->prepare("UPDATE db_admin SET tgl_login = :tgl_login");
$sql->bindValue(':tgl_login', $tanggal, PDO::PARAM_STR);
$sql->execute();

unset($_SESSION['admin']); 

header("location: index.php");
exit(); 
?>
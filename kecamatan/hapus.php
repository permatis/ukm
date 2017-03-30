<?php
require_once '../lib/koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}


if (isset($_GET['id'])) {
    $sql = $db->prepare('DELETE FROM db_kecamatan WHERE id_kecamatan = :id_kecamatan');
    $sql->bindValue(':id_kecamatan', $_GET['id'], PDO::PARAM_INT);
    $sql->execute();
}

header('Location: index.php');
exit();
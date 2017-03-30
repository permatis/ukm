<?php
require_once '../lib/koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}


if (isset($_GET['id'])) {
    $sql = $db->prepare('DELETE FROM db_produksi WHERE id_produksi = :id_produksi');
    $sql->bindValue(':id_produksi', $_GET['id'], PDO::PARAM_INT);
    $sql->execute();
}

header('Location: index.php');
exit();
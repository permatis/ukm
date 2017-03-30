<?php
require_once '../lib/koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

if (isset($_GET['id'])) {
    $sql = $db->prepare('DELETE FROM db_alamat WHERE id_alamat = :id_alamat');
    $sql->bindValue(':id_alamat', $_GET['id'], PDO::PARAM_INT);
    $sql->execute();
}

header('Location: index.php');
exit();
?>
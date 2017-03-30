<?php
require_once '../lib/koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}

if (isset($_GET['id'])) {
    $sql = $db->prepare('DELETE FROM db_kategori WHERE id_kategori = :id_kategori');
    $sql->bindValue(':id_kategori', $_GET['id'], PDO::PARAM_INT);
    $sql->execute();
}

header('Location: index.php');
exit();
?>
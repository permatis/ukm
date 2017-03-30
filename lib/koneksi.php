<?php

/*
 * Konfigurasi database
 * menggunakan PDO (PHP Data Object)
 */

//database server
$host = 'localhost';

//membuat koneksi kedatabase dengan nama database GIS
$database = 'gis';

//nama pengguna database, default=root
$pengguna = 'root';

//password database, default=tidak ada password,jika ada tambahkan password setelah petik
$password = '';

//untuk mensetting dapat digunakan semua bahasa
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
//koneksi kedatabase
    $db = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $pengguna, $password, $options);
} catch (PDOException $ex) {
    die("Gagal nyambung ke database:" . $ex->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {

    function undo_magic_quotes_gpc(&$array) {
        foreach ($array as &$value) {
            if (is_array($value)) {
                undo_magic_quotes_gpc($value);
            } else {
                $value = stripslashes($value);
            }
        }
    }

    undo_magic_quotes_gpc($_POST);
    undo_magic_quotes_gpc($_GET);
    undo_magic_quotes_gpc($_COOKIE);
}

//membuat header pada halaman yang menginclude atau mengimpor file koneksi.php
header('Content-Type: text/html; charset=utf-8');

//untuk mengaktifkan funsi session pada setiap halaman yang menginclude atau mengimpor file koneksi.php
session_start();

?>

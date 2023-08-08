<?php

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'pengaduan';

$koneksi = new mysqli($db_host,$db_user,$db_pass,$db_name);

if ($koneksi->connect_error) {
   die('Koneksi Gagal loh ^_^ : '. $koneksi->connect_error).'';
}
?>
<?php
$nama ='CV. Cipta Widya Karya';
$rek_cv = '0021001716.8.109.500';
date_default_timezone_set('Asia/Jakarta');
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'dbrumah';
$konek = mysqli_connect($server, $user, $password, $database);
if(!$konek){
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  }
?>

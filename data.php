<?php
include'koneksi.php';
$query= mysqli_query($konek, "Select Count(kode_bayar) as jumlah From tbl_pesanan");
$hasil = mysqli_fetch_array($query);
echo json_encode(array('jumlah' => $hasil['jumlah']));
?>

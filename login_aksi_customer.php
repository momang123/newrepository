<?php
session_start();
include 'koneksi.php';
$username = (mysqli_real_escape_string($konek, $_POST['username']));
$password = md5((mysqli_real_escape_string($konek, $_POST['password'])));
$login = mysqli_query($konek, "SELECT * from tbl_pelanggan where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	if ($data['status'] == "Aktif") {
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['jenis_kelamin'] = $data['jenis_kelamin'];
		$_SESSION['alamat'] = $data['alamat'];
		$_SESSION['no_hp'] = $data['no_hp'];
		$_SESSION['tanggal'] = $data['tanggal'];
		$_SESSION['status'] = "Aktif";
		header("location:home_user.php");
	} else {
		header("location:login.php?pesan=gagal");
	}
} else {
	header("location:login.php?pesan=gagal");
}

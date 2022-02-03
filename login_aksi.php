<?php
session_start();
include 'koneksi.php';
$username = (mysqli_real_escape_string($konek, $_POST['username']));
$password = md5((mysqli_real_escape_string($konek, $_POST['password'])));
$login = mysqli_query($konek, "SELECT * from tbl_admin where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['level'] == "Admin") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        header("location:beranda.php");
    } else {
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal");
}

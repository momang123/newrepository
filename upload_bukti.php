
<?php include'header.php'; ?>
<?php 
error_reporting(0);
session_start();
if ($_SESSION['status'] == "") {
  header("location:login.php?pesan=login");
}
?>

<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_pesanan WHERE kode_bayar='$id'");
$data  = mysqli_fetch_array($sqlku);
$bukti = $data['bukti_transfer'];
?>
<main role="main" class="container">
  <div class="row">
    <div class="col-lg-12 col-xl-8">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <div class="list-group">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-3"> Kirim Bukti Pembayaran </h5>
            </div>
            <form  method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="file" class="form-control" name="txtgambar" required autofocus>
                </div>
              </div>
            </div>
            <input type="submit" name="btnuplad" class="btn btn-success" value="Kirim">
            <hr>
            <?php
              if ($bukti == "") {
                echo"<a>Bukti Belum di Upload</a>";
              }else{
                echo"<a href='gambar/bukti/$bukti' > <b>Lihat Bukti Pembayaran</b></a>";
              }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
if (isset($_POST["btnuplad"])) {
  $nama_file   = strtolower($_FILES['txtgambar']['name']);
  $lokasi_file = $_FILES['txtgambar']['tmp_name'];
  $upoadgambar = mysqli_query($konek, "UPDATE  tbl_pesanan SET bukti_transfer='$nama_file' 
  WHERE kode_bayar='$id'");
  if ($upoadgambar) {
    if (!empty($lokasi_file)) {
      move_uploaded_file($lokasi_file, "gambar/bukti/$nama_file");
      ?>
      <script type="text/javascript">
        document.location.href = "pesanan.php";
      </script>
      <?php
    } else {
      echo "Terjadi kesalahan";
    }
  }
}
?>





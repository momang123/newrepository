<?php include'header.php'; ?>
<?php 
error_reporting(0);
session_start();
if ($_SESSION['status'] == "") {
  header("location:login.php?pesan=login");
}
?>

<main role="main" class="container">
  <div class="row">
      <div class="col-lg-12 col-xl-12">
        <div class="card card-signin flex-row my-5">
          <div class="card-body">
            <H5 class="card-title text-center">Selamat Datang... <br> <b> <?php echo $_SESSION['nama'] ?> </b></H5>
            <table class="table">
              <tbody>
                
                  <tr>
                    <td width="20%">Nama Lengkap </td>
                    <td width="2%">:</td>
                    <td><?php echo $_SESSION['nama'] ?></td>
                  </tr>
                  <tr>
                    <td width="20%">HandPhone </td>
                    <td width="2%">:</td>
                    <td><?php echo $_SESSION['no_hp'] ?></td>
                  </tr>
                 
                  <tr>
                    <td width="20%">Jenis Kelamin </td>
                    <td width="2%">:</td>
                    <td><?php echo $_SESSION['jenis_kelamin'] ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Alamat </td>
                    <td width="2%">:</td>
                    <td><?php echo $_SESSION['alamat'] ?></td>
                  </tr>

                   <tr>
                    <td width="20%">Tgl Register </td>
                    <td width="2%">:</td>
                    <td><?php echo $_SESSION['tanggal'] ?></td>
                  </tr>



              </tbody>
            </table>
            <a href="login_keluar.php" class="btn btn-danger">Keluar</a>
            <a href="pesanan.php" class="btn btn-success">Lihat Pesanan</a>
            <a href="daftar_pesan.php" class="btn btn-success">Lihat Pesan Masuk</a>
          </div>
        </div>
      </div>
    </div>
  </main>


<?php include'footer.php'; ?>

<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_pesanan WHERE kode_Bayar='$id'");
$data  = mysqli_fetch_array($sqlku);
?>
<main role="main" class="container">
  <div class="row">
    <div class="col-lg-12 col-xl-8">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <div class="list-group">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-3"> Detail Pesanan </h5>
            </div>
           <label>  <b>Tanggal Pesanan   </b>  </label>
           <?php echo $data['tanggal']; ?>
           <label> <b> Nama Pemesan </b>  </label>
            <p> <?php echo $data['nama']; ?> </p>
           <label> <b> User Name Pemesan  </b>  </label>
           <p> <?php echo $data['user_name_pelanggan']; ?> </p>
           <label> <b> Rekening  </b>  </label>
           <p> <?php echo $data['no_rek']; ?> </p>


           <label> <b> Total Bayar  </b>  </label>
           <p> <?php echo $data['total_bayar']; ?> </p>

           <label>  Bukti Transfer <label>   
           <a href="gambar/bukti/<?php echo $data['bukti_transfer']; ?>" target="_blank"><b>Disini</b></a>
         


        </div>
        <form method="post">
         <a href="beranda.php?page=pesanan" class="btn btn-warning"> Kembali </a>
        </form>
      </div>
    </div>
  </div>
</main>



<?php
if (isset($_POST["btnsimpan"])) {

 $edit = mysqli_query($konek, "UPDATE  tbl_pesan SET status='Telah di Respon' WHERE kode_pesan='$id'");

 if ($edit) {
  ?>
  <script type="text/javascript">
    document.location.href = "beranda.php?page=beranda";
  </script>
  <?php
} else {
  echo "<script>alert('Terjadi Kesalahan Inputan')</script>";
  echo "<meta http-equiv='refresh' content='0; url=?page=beranda'>";
}
}
?>


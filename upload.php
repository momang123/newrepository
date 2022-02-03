
<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_rumah WHERE kode_rumah='$id'");
$data  = mysqli_fetch_array($sqlku);
?>
<main role="main" class="container">
  <div class="row">
    <div class="col-lg-12 col-xl-8">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <div class="list-group">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-3"> Upload Foto </h5>
            </div>

            <form  method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="file" class="form-control" name="txtgambar" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="file" class="form-control" name="txtgambar1" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="file" class="form-control" name="txtgambar2" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="file" class="form-control" name="txtgambar3" required autofocus>
                </div>
              </div>
            </div>
            <input type="submit" name="btnuplad" class="btn btn-primary" value="Upload Gambar">
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
  $nama_file1   = strtolower($_FILES['txtgambar1']['name']);
  $lokasi_file1 = $_FILES['txtgambar1']['tmp_name'];
  $nama_file2   = strtolower($_FILES['txtgambar2']['name']);
  $lokasi_file2 = $_FILES['txtgambar2']['tmp_name'];
  $nama_file3   = strtolower($_FILES['txtgambar3']['name']);
  $lokasi_file3 = $_FILES['txtgambar3']['tmp_name'];
  $upoadgambar = mysqli_query($konek, "UPDATE  tbl_rumah SET foto='$nama_file', foto1='$nama_file1', foto2='$nama_file2', foto3='$nama_file3' WHERE kode_rumah='$id'");
  if ($upoadgambar) {
   
      move_uploaded_file($lokasi_file, "gambar/rumah/$nama_file");
        move_uploaded_file($lokasi_file1, "gambar/rumah/$nama_file1");
          move_uploaded_file($lokasi_file2, "gambar/rumah/$nama_file2");
            move_uploaded_file($lokasi_file3, "gambar/rumah/$nama_file3");
      ?>
      <script type="text/javascript">
        document.location.href = "beranda.php?page=rumah";
      </script>
      <?php
    } else {
      echo "Terjadi kesalahan";
    }
  }

?>

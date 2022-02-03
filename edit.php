

<head>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>



<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_rumah WHERE kode_rumah='$id'");
$data  = mysqli_fetch_array($sqlku);
?>
<main role="main" class="container">
  <div class="row">
    <div class="col-lg-12 col-xl-12">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <div class="list-group">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-3">Form Edit</h5>
            </div>

            <form  method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

              <div class="form-group">
                <div class="form-label-group">
                  <label>Ukuran</label>
                  <input type="text" class="form-control" value="<?php echo $data['ukuran']; ?>" placeholder="Ukuran Rumah" name="ukuran"  required autofocus>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label>Tipe</label>
                  <input type="text" class="form-control" value="<?php echo $data['tipe']; ?>" placeholder="Tipe" name="tipe"  required autofocus>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" value="<?php echo $data['harga']; ?>" placeholder="Harga" name="harga"  required autofocus>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label>Lokasi</label>
                  <input type="text" class="form-control" value="<?php echo $data['lokasi']; ?>" placeholder="Lokasi" name="lokasi"  required autofocus>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label>Fasilitas</label>
                  <textarea class="form-control is-invalid" name="fasilitas" id="summernote" placeholder="Fasilitas Rumah" rows="2"><?php echo $data['fasilitas']; ?></textarea>
                </div>
              </div>

            </div>

            <input type="submit" name="btnsimpan" class="btn btn-primary" value="Simpan">
          </form>
        </div>
      </div>
    </div>

  </div>
</main>





<?php
if (isset($_POST["btnsimpan"])) {


 $ukuran = mysqli_real_escape_string($konek, $_POST['ukuran']);
 $tipe = mysqli_real_escape_string($konek, $_POST['tipe']);
 $harga = mysqli_real_escape_string($konek, $_POST['harga']);
 $lokasi = mysqli_real_escape_string($konek, $_POST['lokasi']);
 $fasilitas = mysqli_real_escape_string($konek, $_POST['fasilitas']);
 $edit = mysqli_query($konek, "UPDATE  tbl_rumah SET ukuran='$ukuran',tipe='$tipe',harga='$harga',lokasi='$lokasi',fasilitas='$fasilitas' WHERE kode_rumah='$id'");

 if ($edit) {
  ?>
  <script type="text/javascript">
    document.location.href = "beranda.php?page=rumah";
  </script>
  <?php
} else {
  echo "<script>alert('Terjadi Kesalahan Inputan')</script>";
  echo "<meta http-equiv='refresh' content='0; url=?page=rumah'>";
}
}
?>




<script>
      $('#summernote').summernote({
        placeholder: 'Harap Tulis keterangan dan Upload Gambar',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

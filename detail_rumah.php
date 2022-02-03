<?php include 'header.php';
$detail = base64_decode($_GET["detail"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_rumah WHERE kode_rumah='$detail'");
$data  = mysqli_fetch_array($sqlku);
?>
<main role="main" class="container">
  <div class="row">
    <div class="container breadcrumbs my-0 pl-3 pr-3 pt-4 pb-4 ">
    </div>
    <div class=" col-12 col-lg-12 ">
      <div class="row">
        <!-- Konten -->
        <div class='col-12 col-md-8 col-lg-8 d-flex mb-8'>
          <div class='card shadow-sm p-3 mb-5 bg-white rounded'>
            <div class='card-body'>
              <h5 class='card-title'>
                <H3 class="card-title mb-2">Ukuran : <?php echo $data['ukuran']; ?></H3>
                <hr>
              </h5>
  <img class='img thumbnail' src="gambar/rumah/<?php echo $data['foto']; ?>" width="300px" />
              <img class='img thumbnail' src="gambar/rumah/<?php echo $data['foto1']; ?>" width="300px"  />
                <img class='img thumbnail' src="gambar/rumah/<?php echo $data['foto2']; ?>" width="300px"  />
                  <img class='img thumbnail' src="gambar/rumah/<?php echo $data['foto3']; ?>" width="300px" />
              <hr>
              <H5>Fasilitas</H5>
              <hr>
              <p><?php echo $data['fasilitas']; ?></p>
            </div>
          </div>
        </div>

        <div class='col-12 col-md-4'>
          <!-- <div class="card mb-3" style="max-width: 540px;"> -->
            <div class="row no-gutters">
              <div class="col-md-12">
                <div class="card-body shadow-sm p-3 mb-5 bg-white rounded">
                  <h5 class="card-title">Detail</h5>
                  <b>  <p class="card-text">Lokasi</p> </b>
                  <p class="card-text"><?php echo $data['lokasi']; ?></p>
                  <hr>
                  <b>  <p class="card-text">Tipe</p> </b>
                  <p class="card-text"><?php echo $data['tipe']; ?></p>
                  <hr>
                  <b>  <p class="card-text">Harga </p></b>
                  <p class="card-text">Rp. <?php echo (number_format($data['harga'])); ?></p>
                  <!-- <a href="form_pesanan.php" class="btn btn-warning"> Pesan Sekarang  </a> -->
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
  <?php include'footer.php'; ?>

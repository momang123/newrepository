<?php include 'header.php';
$detail = base64_decode($_GET["detail"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_informasi WHERE kode_info='$detail'");
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
                <H3 class="card-title mb-2"> <?php echo $data['judul']; ?></H3>
                <hr>
              </h5>
              <img class='img w-100' src="gambar/informasi/gambar.jpg" width="100%" id="gambar" />
              <hr>
              Tanggal & Jam POST : <?php echo $data['waktu_info']; ?>
              <hr>
              <p><?php echo $data['isi_info']; ?></p>
            </div>
          </div>
        </div>

        <div class='col-12 col-md-4'>
          <!-- <div class="card mb-3" style="max-width: 540px;"> -->
            <div class="row no-gutters">
              <div class="col-md-12">
                <div class="card-body shadow-sm p-3 mb-5 bg-white rounded">
                  <b>  <p class="card-text">Informasi Terbaru</p> </b>

                  <hr>
                  <?php
                  $qry = mysqli_query($konek, "SELECT * from tbl_informasi order by kode_info asc");
                  while ($data = mysqli_fetch_array($qry)) {
                    ?>
                    <p class="card-text">

                      <a href="detail_informasi.php?detail=<?php echo base64_encode($data['kode_info']); ?>">
                        <?php echo $data['judul']; ?>
                      </a>
                      <HR>
                    </p>
                     <?php } ?>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
    <?php include'footer.php'; ?>
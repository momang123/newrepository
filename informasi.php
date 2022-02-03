<?php include 'header.php'; ?>
<br><br>
<main role="main" class="container">
  <H1> Daftar Informasi </H1>
  <div class="row">
    <div class="col-12 col-lg-12">
      <div class="row">
        <?php
        $qry = mysqli_query($konek, "SELECT * from tbl_informasi order by kode_info asc");
        while ($data = mysqli_fetch_array($qry)) {
          ?>
          <a href="detail_informasi.php?detail=<?php echo base64_encode($data['kode_info']); ?>">
            <div class='col-12 col-md-4 col-lg-4 d-flex mb-4 '>
              <div class='card shadow-sm'>
                <div class='card-img-top'>
                  <img class='img w-100' src="gambar/informasi/gambar.jpg" height="230px;"  id="gambar" />
                </div>
                <div class='card-body '>
                  <H5 class='card-title'>
                    <a class="badge badge-deck">
                    </a>
                  </H5>
                  <p> <b>    <?php echo $data['judul']; ?>  </b></p>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>


  </div>
</div>

<!-- End Card Produk -->
</div>
</div>
</div>
</main>


<?php include 'footer.php'; ?>
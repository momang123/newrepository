<?php include 'header.php'; ?>
<br><br>
<main role="main" class="container">
  <H1> Daftar Rumah </H1>
  <div class="row">
    <div class="col-12 col-lg-12">
      <div class="row">
        <?php
        $qry = mysqli_query($konek, "SELECT * from tbl_rumah where kode_rumah <> 0 order by kode_rumah asc");
        while ($data = mysqli_fetch_array($qry)) {
          ?>
          <a href="detail_rumah.php?detail=<?php echo base64_encode($data['kode_rumah']); ?>">
            <div class='col-12 col-md-4 col-lg-4 d-flex mb-4 '>
              <div class='card shadow-sm'>
                <div class='card-img-top'>
                  <img class='img w-100' src="gambar/rumah/<?php echo $data['foto']; ?>" height="260px;"  id="gambar" />
                </div>
                <div class='card-body '>
                  <H5 class='card-title'>
                    <a class="badge badge-deck">
                      Harga  Rp.    <?php echo (number_format($data['harga'])); ?>     
                    </a>
                    <hr>
                  </H5>
                  <p>   Tipe :  <?php echo $data['tipe']; ?> - Ukuran : <?php echo $data['ukuran']; ?> 
                </p>
                <hr>
                <p>Lokasi :  <?php echo $data['lokasi']; ?> 
                <HR>
                <a href="form_pesanan.php?detail=<?php echo base64_encode($data['kode_rumah']); ?>" class="btn btn-warning"> Pesan </a>

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
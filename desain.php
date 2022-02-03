<?php include 'header.php'; ?>
<br><br>
<main role="main" class="container">
  <H1> Daftar Desain </H1>
  <div class="row">
    <div class="col-12 col-lg-12">
      <div class="row">
        <?php
        $qry = mysqli_query($konek, "SELECT * from tbl_desain where kode_desain <> 0 order by kode_desain desc");
        while ($data = mysqli_fetch_array($qry)) {
          ?>
          <a href="detail_desain.php?detail=<?php echo base64_encode($data['kode_desain']); ?>">
            <div class='col-12 col-md-4 col-lg-4 d-flex mb-4 '>
              <div class='card shadow-sm'>
                <div class='card-img-top'>
                  <img class='img w-100' src="gambar/desain/<?php echo $data['foto']; ?>" height="260px;"  id="gambar" />
                </div>
                <div class='card-body '>
                  <H5 class='card-title'>
                    <a class="badge badge-deck">
                      Harga  Rp.    <?php echo (number_format($data['harga'])); ?>     
                    </a>
                    <hr>
                  </H5>
                  <p>   Tipe :  <?php echo $data['tipe']; ?> 
                </p>
                <a href="pesanan_desain.php?detail=<?php echo base64_encode($data['kode_desain']); ?>" class="btn btn-warning"> Pesan </a>
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
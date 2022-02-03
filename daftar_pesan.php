<?php include'header.php'; ?>
<main role="main" class="container">
  <div class="row">
    <div class="col-lg-12 col-xl-12">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <h3 class="card-title text-center"> Daftar Pesan </h3>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th >#</th>
                <th >Subject</th>
                <th >Balasan</th>
                <th >Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $qry = mysqli_query($konek, "select `tbl_pesan`.`kode_pesan` AS `kode_pesan`,`tbl_pesan`.`pengirim` AS `pengirim`,`tbl_pesan`.`balasan` AS `balasan`,`tbl_pesan`.`judul` AS `judul`,`tbl_pesan`.`isi_pesan` AS `isi_pesan`,`tbl_pesan`.`waktu_pesan` AS `waktu_pesan`,`tbl_pesan`.`status` AS `status`,`tbl_pelanggan`.`username` AS `username`,`tbl_pelanggan`.`password` AS `password`,`tbl_pelanggan`.`nama` AS `nama`,`tbl_pelanggan`.`jenis_kelamin` AS `jenis_kelamin`,`tbl_pelanggan`.`alamat` AS `alamat`,`tbl_pelanggan`.`no_hp` AS `no_hp` from (`tbl_pelanggan` join `tbl_pesan` on((`tbl_pelanggan`.`username` = `tbl_pesan`.`pengirim`))) where pengirim='" . $_SESSION['username'] . "'");
              
              while ($data = mysqli_fetch_array($qry)) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['judul']; ?></td>
                  <td><?php echo $data['balasan']; ?></td>
                  <td><?php echo $data['waktu_pesan']; ?></td>
                

                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

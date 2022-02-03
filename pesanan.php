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
          <h3 class="card-title text-center"> Daftar Pesanan </h3>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th >#</th>
                <th >Nama Pemesan</th>
                  <th >Nama Bank</th>
                <th >Nama Rumah</th>
                <th >Nama Desain</th>
                <th >Status</th>
                <th >Tanggal</th>
                <th >Total Bayar</th>
                <th scope="col" class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $no = 1;
              $qry = mysqli_query($konek, "select `tbl_rumah`.`ukuran` AS `ukuran`, `tbl_pesanan`.`bank` AS `bank`,`tbl_desain`.`tipe` AS `tipe`,`tbl_pesanan`.`kode_bayar` AS `kode_bayar`,`tbl_pesanan`.`kode_rumah` AS `kode_rumah`,`tbl_pesanan`.`kode_desain` AS `kode_desain`,`tbl_pesanan`.`user_name_pelanggan` AS `user_name_pelanggan`,`tbl_pesanan`.`nama` AS `nama`,`tbl_pesanan`.`no_rek` AS `no_rek`,`tbl_pesanan`.`total_bayar` AS `total_bayar`,`tbl_pesanan`.`status` AS `status`,`tbl_pesanan`.`jumlah` AS `jumlah`,`tbl_pesanan`.`metode` AS `metode`,`tbl_pesanan`.`bukti_transfer` AS `bukti_transfer`,`tbl_pesanan`.`tanggal` AS `tanggal` from ((`tbl_rumah` join `tbl_pesanan` on((`tbl_rumah`.`kode_rumah` = `tbl_pesanan`.`kode_rumah`))) join `tbl_desain` on((`tbl_desain`.`kode_desain` = `tbl_pesanan`.`kode_desain`))) where user_name_pelanggan='" . $_SESSION['username'] . "'");
              while ($data = mysqli_fetch_array($qry)) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['bank']; ?></td>
                  <td><?php echo $data['ukuran']; ?></td>
                  <td><?php echo $data['tipe']; ?></td>
                <td>  <form action="beranda.php?page=pesanan" method="POST">
                    <input type = "hidden" name = "kode_bayar" value = "<?php echo $data['kode_bayar'];?>"/>
                    <input type = "submit" name = "0" value = "Belum Diproses"/>
                    <input type = "hidden" name = "1" value = "Sudah Diproses"/>
                    </form>
                  </td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo (number_format($data['total_bayar'])); ?></td>

                  <td class="text-right">
                    <a href="upload_bukti.php?id=<?php echo base64_encode($data['kode_bayar']); ?>" class="btn btn-primary btn-sm">Upload</a>
                    <a onClick="return confirm('Yakin Anda Membantalkan Pesanan ini')" href="hapus_pesanan.php?id=<?php echo $data['kode_bayar']; ?>" class="btn btn-warning btn-sm"> Batal
                    </a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

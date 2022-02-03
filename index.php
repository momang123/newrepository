
<main role="main" class="container">
  <div class="row">
    <div class="col-lg-12 col-xl-12">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <a class="btn btn-primary" href="beranda.php?page=tambah_rumah"> Tambah </a>
          <h3 class="card-title text-center">DAFTAR RUMAH</h3>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th >#</th>
                <th >Ukuran</th>
                <th >Tipe</th>
                <th >Harga</th>
                <th >Lokasi</th>
                <th scope="col" class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $qry = mysqli_query($konek, "SELECT * FROM tbl_rumah where kode_rumah <>0 order by kode_rumah DESC");
              while ($data = mysqli_fetch_array($qry)) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['ukuran']; ?></td>
                  <td><?php echo $data['tipe']; ?></td>
                  <td><?php echo $data['harga']; ?></td>
                  <td><?php echo $data['lokasi']; ?></td>
                  <td class="text-right"> 
                    <a href="beranda.php?page=upload_rumah&id=<?php echo base64_encode($data['kode_rumah']); ?>" class="btn btn-warning"> Upload Foto</a>
                    <a href="beranda.php?page=edit_rumah&id=<?php echo base64_encode($data['kode_rumah']); ?>" class="btn btn-success "> Edit</a>
                    <a onClick="return confirm('Data ini akan di hapus.?')" href="beranda.php?page=rumah&hapus=<?php echo $data['kode_rumah']; ?>" class="btn btn-danger "> Hapus 
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

<?php

if (isset($_GET[hapus])) {
  $qry = mysqli_query($konek, "delete from tbl_rumah where kode_rumah='" . $_GET["hapus"] . "'");
  if ($qry) {
    echo "<script>alert('Data Berhasil di Hapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=rumah'>";
  } else {
    echo "Gagal di Hapus";
    echo "<meta http-equiv='refresh' content='0; url=?page=rumah'>";
  }
}
?>



<?php
include'header.php';
error_reporting(0);
session_start();
if ($_SESSION['status'] == "") {
	header("location:login.php?pesan=login");
}

$detail = base64_decode($_GET["detail"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_rumah WHERE kode_rumah='$detail'");
$data  = mysqli_fetch_array($sqlku);

?>


		<script LANGUAGE="JavaScript">
                        function kali() {
                        harga = eval(form.harga.value);
                        jumlah_masuk = eval(form.jumlah.value);
                      total = ((30/100)*harga*jumlah_masuk/3);
                        form.total.value = total;
						form.total_v.value = total;
                        }
      	</script>


<form  name="form"  method="POST" action="">
<main role="main" class="container">
 <div class="row">

	<div class="col-md-6">
		<div class="card card-signin flex-row my-5">
			<div class="card-body">

				<h1 class="card-title text-center"> Form Pesanan  Rumah</h1>

				<input  type="hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
                <input  type="hidden" name="rumah" value="<?php echo $data['kode_rumah']; ?>">

								<div class="form-label-group">
							<img class='img thumbnail' src="gambar/rumah/<?php echo $data['foto']; ?>" width="300px" />
								</div>

                    <div class="form-label-group">
						<label>Tipe Rumah</label> <br>
                     <b><?php echo $data['tipe']; ?> </b>  </br>
					</div>

                    <div class="form-label-group">
					<label>Harga</label> <br>
                     <b><?php echo (number_format($data['harga'])); ?> </b>  </br>

					 <input type="hidden"  value="<?php echo $data['harga']; ?>" class="form-control"  name="harga"  required autofocus>

					</div>



			</div>
		</div>
	</div>

    <div class="col-md-6">
		<div class="card card-signin flex-row my-5">
			<div class="card-body">

				<div class="form-label-group">

				<label> Nama CV </label>
				<br>
				<b><?php echo "$nama"; ?></b>
				</div>

				<div class="form-label-group">

				<label> No Rek CV </label>
				<br>
				<b><?php echo "$rek_cv";?></b>
				</div>

									<div class="form-label-group">

					<label> Nama </label>
					<input type="text"  placeholder="Nama Lengkap" class="form-control"  name="nama"  required autofocus>
				</div>

				<div class="form-label-group">
							<label>Pilih Bank Untuk Transfer</label>
							<select class="form-control" name="bank">
															<option >-</option>
								<option value="BRI">BRI</option>
								<option value="BNI">BNI</option>
								<option value="BCA">BCA</option>
								<option value="Mandiri">Mandiri</option>
								<option value="Mega">Mega</option>
								<option value="CIMB">CIMB Niaga</option>
								<option value="Bukopin">Bukopin</option>
							</select>
						</div>

									<div class="form-label-group">
					<label> No Rekening </label>
					<input type="text" placeholder="No Rekening"  class="form-control"  name="rekening"  required autofocus>

				</div>

			<div class="form-label-group">
						<label>Metode</label>
						<select class="form-control" name="metode">
                            <option >-</option>
							<option value="Transfer">Transfer</option>
							<option value="Tunai">Tunai</option>
						</select>
					</div>

                    <div class="form-label-group">
						<label> Jumlah cicilan </label>
						<input type="number" placeholder="Jumlah"  class="form-control" onchange="kali()"  name="jumlah"  required autofocus>
					</div>

					<div class="form-label-group">

						<input type="hidden" class="form-control"  name="total"  required autofocus>
					</div>

					<div class="form-label-group">
						<label> Total Bayar </label>
						<input type="text" class="form-control"  name="total_v"  required autofocus disabled>
					</div>
<p> DP sebesar 30% dicicil selama 3 bulan. Untuk harga rumah di atas 500 juta terminnya 3x bayar, sedangkan harga di bawah 500 juta terminnya 2x bayar</p>
					<br>

                    <hr>
					<button class="btn btn-success" name="btnsimpan" type="submit">KIRIM </button>
			</div>
		</div>
	</div>
    </div>
</main>

</form>

    <?php
			if (isset($_POST["btnsimpan"])) {
					$rumah = mysqli_real_escape_string($konek, $_POST['rumah']);
					$user = mysqli_real_escape_string($konek, $_POST['user']);
					$nama = mysqli_real_escape_string($konek, $_POST['nama']);
						$bank = mysqli_real_escape_string($konek, $_POST['bank']);
					$rekening = mysqli_real_escape_string($konek, $_POST['rekening']);
					$total = mysqli_real_escape_string($konek, $_POST['total']);
					$jumlah = mysqli_real_escape_string($konek, $_POST['jumlah']);
					$metode = mysqli_real_escape_string($konek, $_POST['metode']);
					$tanggal=date("Y-m-d h:i:sa");

					$cek_user = mysqli_num_rows(mysqli_query($konek, "select * from tbl_pesanan where kode_bayar = '$nama'"));

					if ($cek_user > 0) {
						echo "<script>alert('Data Sudah Ada')</script>";
					} else {
						$simpan = mysqli_query($konek,"INSERT INTO tbl_pesanan(kode_rumah,user_name_pelanggan,nama,bank,no_rek,total_bayar,jumlah,metode,tanggal) VALUES ('$rumah','$user','$nama','$bank','$rekening','$total','$jumlah','$metode','$tanggal')");
						if ($simpan) {
							?>
							<script type="text/javascript">
								alert('Pesanan Anda Berhasil di Kirim');
								document.location.href="pesanan.php";
							</script>
							<?php
						} else {
							echo "<script>alert('Pesanan Anda Gagal di Kirim')</script>";
						}
					}
			}
		?>
<?php include'footer.php'; ?>

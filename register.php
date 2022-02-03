<?php include'header.php'; ?>

<main role="main" class="container">
	<div class="col-md-6">
		<div class="card card-signin flex-row my-5">
			<div class="card-body">

				<h1 class="card-title text-center"> REGISTRASI </h1>
				<form  method="POST">
					<div class="form-label-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control"  placeholder="Nama Lengkap" name="nama"  required autofocus>
					</div>
					<div class="form-label-group">
						<label>HandPhone</label>
						<input type="text" class="form-control"  placeholder="HandPhone" name="handphone"  required autofocus>
					</div>

					<div class="form-label-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jenis">
							<option value="Laki-Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>

					<div class="form-label-group">
						<label>User Name</label>
						<input type="text" class="form-control" placeholder="User Name" name="username"  required autofocus>
					</div>

					<div class="form-label-group">
						<label>Password </label>
						<input type="password" name="password"  class="form-control" placeholder="Password" required autofocus>
					</div>

					<div class="form-label-group">
						<label>Alamat </label>
						<textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
					</div>
					<br>
					<button class="btn btn-success" name="btnsimpan" type="submit">KIRIM </button>
				</form>

				<?php
				if (isset($_POST["btnsimpan"])) {
					$username = mysqli_real_escape_string($konek, $_POST['username']);
					$password = md5((mysqli_real_escape_string($konek, $_POST['password'])));
					$nama = mysqli_real_escape_string($konek, $_POST['nama']);
					$jenis = mysqli_real_escape_string($konek, $_POST['jenis']);
					$alamat = mysqli_real_escape_string($konek, $_POST['alamat']);
					$handphone = mysqli_real_escape_string($konek, $_POST['handphone']);
					$tanggal=date("Y-m-d h:i:sa");
					
					$cek_user = mysqli_num_rows(mysqli_query($konek, "select * from tbl_pelanggan where username = '$username'"));

					if ($cek_user > 0) {
						echo "<script>alert('Username Pelanggan Sudah Ada, Harap Cek Kembali')</script>";
					} else {

						$simpan = mysqli_query($konek,"INSERT INTO tbl_pelanggan(username,password,nama,jenis_kelamin,alamat,no_hp,tanggal) VALUES ('$username','$password','$nama','$jenis','$alamat','$handphone','$tanggal')");
						if ($simpan) {
							?>
							<script type="text/javascript">
								alert('Data Anda Berhasil di Register, Harap Login');
								document.location.href="login.php";
							</script>
							<?php
						} else {
							echo "<script>alert('Gagal di Registrasi')</script>";
						}
					}
				}
				?>



			</div>
		</div>
	</div>
</main>

<?php include'footer.php'; ?>

<?php include'header.php'; ?>

<?php 
error_reporting(0);
session_start();
if ($_SESSION['status'] == "") {
	header("location:login.php?pesan=login");
}
?>

<main role="main" class="container">
	<div class="col-md-8">
		<div class="card card-signin flex-row my-5">
			<div class="card-body">

				<h1 class="card-title text-center"> PESAN </h1>
				<form  method="POST">
					
					<div class="form-label-group">
						
						<input type="hidden" class="form-control" value="<?php echo $_SESSION['username'] ?>"  placeholder="Pengirim" name="kirim"  required autofocus>
					</div>

					<div class="form-label-group">
						<label><b> Subject </b></label>
						<input type="text" class="form-control"  placeholder="Subject" name="subject"  required autofocus>
					</div>
					<br>
					<div class="form-label-group">
						<label> <b> Isi Pesan </b> </label>
						<textarea class="form-control" name="pesan" rows="3" placeholder="Isi Pesan"></textarea>
					</div>
					<br>

					<button class="btn btn-success" name="btnsimpan" type="submit">KIRIM </button>
				</form>

				<?php
				if (isset($_POST["btnsimpan"])) {
					$subject = mysqli_real_escape_string($konek, $_POST['subject']);
					$pesan = mysqli_real_escape_string($konek, $_POST['pesan']);
					$kirim = mysqli_real_escape_string($konek, $_POST['kirim']);
					$tanggal=date("Y-m-d h:i:sa");
					$simpan = mysqli_query($konek,"INSERT INTO tbl_pesan(pengirim,judul,isi_pesan,waktu_pesan,status) VALUES ('$kirim','$subject','$pesan','$tanggal','Baru')");
					if ($simpan) {
						?>
						<script type="text/javascript">
							alert('Pesan Berhasil di Kirim');
							document.location.href="home_user.php";
						</script>
						<?php
					} else {
						echo "<script>alert('Gagal di Kirim')</script>";
					}
				}
				?>



			</div>
		</div>
	</div>

</main>
<?php include'footer.php'; ?>

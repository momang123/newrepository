<?php include'header.php'; ?>
<main role="main" class="container">
  <div class="col-md-6">
    <div class="card card-signin flex-row my-5">
      <div class="card-body">
        
        <h1 class="card-title text-center">LOGIN ADMIN</h1>
        <form action="login_aksi.php" method="post">
          <div class="form-label-group">
            <label>User Name</label>
            <input type="text" class="form-control" id="nama" placeholder="User Name" name="username"  required autofocus>
          </div>
          <br>
          <div class="form-label-group">
            <label>Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Password" required autofocus>
          </div>
          <hr>

          <button class="btn btn-primary  " type="submit">LOGIN</button>
        </form>

        <?php
        if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-danger'>User Untuk Login di sistem Tidak ditemukan</div>";
          } else if ($_GET['pesan'] == "login") {
            echo "<div class='alert alert-warning'>Anda Harus Login ke database</div>";
          } else if ($_GET['pesan'] == "keluar") {
            echo "<div class='alert alert-success'>Terimakasih Anda Berhasil Keluar</div>";
          }
        }
        ?>

      </div>
    </div>
  </div>
  
</main>
<?php include'footer.php'; ?>

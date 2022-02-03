<?php include'koneksi.php'; ?>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Web Site Sumber Daya Alam">
<meta property="og:image"/>
<title>  <?php echo "$nama"; ?> </title>
<link rel="shortcut icon" href="gambar/logo_layanancoding.jpg">
<link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootsrap/css/style.css">
<link rel="stylesheet" href="bootsrap/css/font-awesome.min.css">
<link rel="stylesheet" href="bootsrap/css/css_footer.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>


<!-- end koneksi -->
<body class="bg-white">
    <nav class="navbar navbar-expand-lg fixed-top navbar-primary bg-white shadow">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="gambar/logo_layanancoding.jpg" width="45" alt="" class="d-inline-block align-middle mr-2">
                <span class="text-uppercase font-weight-bold"> <?php echo "$nama"; ?></span>
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" class="navbar-toggler"><span class="fa fa-navicon"></span>
            </button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">BERANDA<span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
  							<a href="#" class="dropdown-toggle" data-toggle="dropdown">PEMBELIAN</a>
  							<ul class="dropdown-menu">


  											<li><a href="rumah.php">Daftar Rumah</a></li>
  											<li><a href="desain.php">Daftar Desain</a></li>


  							</ul>
  						</li>
                    <li class="nav-item active"><a href="informasi.php" class="nav-link">INFORMASI</a></li>
                    <li class="nav-item active"><a href="pesan.php" class="nav-link">KIRIM PESAN</a></li>

<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == "") {
 echo "<li class='nav-item active'><a href='register.php' class='nav-link'> REGISTER</a></li>";
 echo "<li class='nav-item active'><a href='login.php' class='nav-link btn btn-primary '>LOGIN</a></li>";
}else{
    echo "<li class='nav-item active'><a href='home_user.php' class='nav-link btn btn-success '>Profil</a></li>";
}

?>


                </ul>
            </div>
        </div>
    </nav>

<meta charset="utf-8">
<?php include'koneksi.php';
$sql = mysqli_query($konek, "select * from tbl_pesanan where status = 'Proses'");
$num = mysqli_num_rows($sql);
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Web Site Sumber Daya Alam">
<meta property="og:image"/>
<title>Sistem Informasi <?php echo "$nama"; ?></title>
<link rel="shortcut icon" href="gambar/logo_layanancoding.jpg">
<link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootsrap/css/style.css">
<link rel="stylesheet" href="bootsrap/css/font-awesome.min.css">
<link rel="stylesheet" href="bootsrap/css/css_footer.css">
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg fixed-top navbar-primary bg-white shadow">
        <div class="container">
            <a href="beranda.php?page=beranda" class="navbar-brand">
                <img src="gambar/logo_layanancoding.jpg" width="45" alt="" class="d-inline-block align-middle mr-2">
                <span class="text-uppercase font-weight-bold"> <?php echo "$nama"; ?> </span>
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" class="navbar-toggler"><span class="fa fa-navicon"></span>
            </button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="beranda.php?page=beranda" class="nav-link">HOME<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item active"><a href="beranda.php?page=rumah" class="nav-link"> RUMAH</a></li>

                    <li class="nav-item active"><a href="beranda.php?page=desain" class="nav-link "> DESAIN</a></li>
                    <li class="nav-item active"><a href="beranda.php?page=informasi" class="nav-link ">INFORMASI</a></li>

                    <li class="nav-item active"><a href="beranda.php?page=pesan" class="nav-link "> PESAN</a></li>

                    <li class="nav-item active"><a href="beranda.php?page=pelanggan" class="nav-link ">  PELANGGAN</a></li>


                    <button type="button" class="btn btn-primary"><a href="beranda.php?page=pesanan">
                      PESANAN <span class="badge badge-light"><?php echo $num ?></span>
                    </a></button>


                    <li class="nav-item active"><a href="keluar_admin.php" class="nav-link btn btn-warning ">KELUAR</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

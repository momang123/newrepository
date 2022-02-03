
<?php 
include 'header_admin.php';
include 'koneksi.php';
error_reporting(0);
session_start();
if ($_SESSION['level'] == "") {
  header("location:admin.php?pesan=login");
}
?>

<main role="main">
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {

      case 'rumah': include "admin/rumah/index.php"; break;
      case 'tambah_rumah': include "admin/rumah/tambah.php"; break;
      case 'edit_rumah': include "admin/rumah/edit.php"; break;
      case 'upload_rumah': include "admin/rumah/upload.php"; break;

      case 'desain': include "admin/desain/index.php"; break;
      case 'tambah_desain': include "admin/desain/tambah.php"; break;
      case 'edit_desain': include "admin/desain/edit.php"; break;
      case 'upload_desain': include "admin/desain/upload.php"; break;

      case 'informasi': include "admin/informasi/index.php"; break;
      case 'tambah_informasi': include "admin/informasi/tambah.php"; break;
      case 'edit_informasi': include "admin/informasi/edit.php"; break;
      case 'upload_informasi': include "admin/informasi/detail.php"; break;

      case 'pesan': include "admin/pesan/index.php"; break;
      case 'detail_pesan': include "admin/pesan/detail.php"; break;

      case 'pelanggan': include "admin/pelanggan/index.php"; break;

      // pesanan
      case 'pesanan': include "admin/pesanan/index.php"; break;
      case 'detail_pesanan': include "admin/pesanan/detail.php"; break;




      case 'beranda':
      include "admin/home/index.php";
      break;
      default:
      include "admin/home/index.php";
      break;
    }
  } else {
    include "admin/home/index.php";
  }
  ?>
</main>
<script src="bootsrap/js/jquery-3.3.1.slim.min.js"></script>
<script src="bootsrap/js/bootstrap.bundle.min.js"></script>
<script src="bootsrap/js/jquery-slim.min.js"></script>
<script src="bootsrap/js/offcanvas.js">
</script>





<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
  .create( document.querySelector( '#editor' ) )
  .catch( error => {
    console.error( error );
  } );
</script>   


</html>

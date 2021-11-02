<?php 
use App\Models\Konfigurasi_model;
$session = \Config\Services::session();
$konfigurasi  = new Konfigurasi_model;
$site         = $konfigurasi->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title ?></title>
  <meta content="<?php echo strip_tags($description) ?>" name="description">
  <meta content="<?php echo $keywords ?>, <?php echo keywords() ?>" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="icon">
  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" >
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>/assets/template/assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/vendor/magicsearch/dist/css/jquery.magicsearch.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v4.1.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
  <!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style type="text/css" media="screen">
    .table {
      border: solid thin #EEE;
      border-collapse: collapse;
    }
    .table td, .table th {
      border: solid thin #EEE;
    }
    .breadcrumbs {
      padding-top: 40px;
    }
    .grid {
      display: grid;
      align-items: center; /* left and right */
      justify-content: center; /* up and down */
    }

    .wrapper {
      margin: 0 auto;
    }

    .wrapper--w680 {
      max-width: 680px;
    }

    .page-wrapper {
      min-height: 100vh;
    }

    #header {
      top: 0px;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      padding: 4px;

      position: absolute;
      background: #E0D0B9;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    body {
      font-family: "Open Sans", sans-serif;
      color: #444444;
      background: #E5E5E5;
  }
  .btn{
    color: black;
    background: #E0D0B9;
    border: 1px solid #E0D0B9;
    box-sizing: border-box;
    border-radius: 5px;
    width: 90%;
  }
  .mandatory::before {
      content: "* ";
      color: #FF0000;
  }
  .required:after {
    content:" *";
    color:  #FF0000;
  }
  .btn-upload {
    color: white !important;
    background: #161616 !important;
    border: 1px solid black !important;
    box-sizing: border-box;
    border-radius: 5px;
    padding: 8px 20px;
    cursor: pointer;
  }
  </style>
</head>

<body>
  <div class="wrapper wrapper--w680">
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top wrapper wrapper--w680">
    <div class="container d-flex align-items-center">

      <a href="https://" class="logo me-auto"><img src="<?php echo base_url('assets/upload/image/'.$site['logo']) ?>" alt="<?php echo $site['namaweb'] ?>"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <!-- <nav id="navbar" class="navbar order-last order-lg-0">
        <?php if ($session->get('akses_level') == 'Admin') {?>
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
        </ul>
        <?php }?>
        <ul>
          <li><a class="nav-link scrollto text-danger" href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> -->
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Start Content ======= -->
  <?= $this->renderSection('content') ?>
  <!-- ======= End Content ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <!--<div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-9 col-md-9">
            <div class="footer-info">
              <div class="social-links mt-3">
                <a href="<?php echo $site['twitter'] ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $site['facebook'] ?>" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="<?php echo $site['instagram'] ?>" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $site['youtube'] ?>" class="google-plus"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MODENA Indonesia</span></strong>. All Rights Reserved
      </div>
      <!--<div class="credits">-->
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
      <!--</div>-->
    </div>
  </footer><!-- End Footer -->
</div>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() ?>/assets/template/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url() ?>/assets/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/template/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/template/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url() ?>/assets/template/assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url() ?>/assets/template/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() ?>/assets/template/assets/js/main.js"></script>
  <!-- DataTables  & Plugins -->
 
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/magicsearch/dist/js/jquery.magicsearch.js"></script>

<script>
  $(function () {
    $('#example1').DataTable();
  });
  </script>
</body>
<?php 
if($session->getFlashdata('sukses')) { ?>
<script>
  swal("Berhasil", "<?php echo $session->getFlashdata('sukses'); ?>", "success");
</script>
<?php } ?>

<?php if($session->getFlashdata('warning')) {?>
<script>
  swal("Whoops...", "<?php echo $session->getFlashdata('warning'); ?>", "warning");
</script>
<?php } ?>
</html>
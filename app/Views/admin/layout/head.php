<?php 
use App\Models\Konfigurasi_model;
$konfigurasi  = new Konfigurasi_model;
$site         = $konfigurasi->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $title ?></title>
  <!-- Favicons -->
  <link href="<?php echo icon() ?>" rel="icon">
  <link href="<?php echo icon() ?>" rel="apple-touch-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.css">
  <!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.css">
  <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
  <link href="<?php echo base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <style type="text/css" media="screen">
    .ui-timepicker-container{ 
         z-index:1151 !important; 
    }

    /* salesCampaign */
    .salesCampaign .dataTables_wrapper {
      display: none;
    }
    .salesCampaign {
      background: #E5E5E5;
    }
    .salesCampaign aside, .salesCampaign .breadcrumb, .salesCampaign .card-header, .salesCampaign .content-header, .salesCampaign .nav-item, .salesCampaign .fa-sign-out-alt {
      display: none !important;
    }
    .salesCampaign .main-header {
      background: transparent;
      padding: 0;
    }
    .salesCampaign .nav-item:nth-child(4) {
      display: block !important;
      right: 33%;
      top: 0.7em;
      position: absolute;
      font-size: 14px;
    }
    .salesCampaign .nav-item:nth-child(4) a:hover {
      color: #dc3545!important;
    }
    .salesCampaign .navbar-sales {
      padding: 0 15px;
      height: 48px;
      width: 680px;
      height: 48px;
      margin-left: -15px;
      background: white;
      box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);
      position: relative;
      z-index: 1;
    }
    .salesCampaign .navbar-sales a span {
      background-image: url('data:image/png;base64,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');
      background-size: cover;
      background-position: center;
      height: 40px;
      width: 132px;
      display: block;
    }
    .salesCampaign .banner-sales {
      background-image: url('https://i.ibb.co/qNRhfLn/BANNER.jpg');
      background-size: cover;
      background-position: center;
      width: 100%;
      height: 235px;
      margin-bottom: 30px;
    }
    .salesCampaign h1 {
      opacity: 0;
      visibility: hidden;
      height: 0;
    }
    .salesCampaign .card-body {
      padding: 0;
    }
    .salesCampaign .content-wrapper, .salesCampaign footer {
      max-width: 680px;
      margin: 0 auto;
      margin-left: auto !important;
      background: white;
    }
    .salesCampaign .card, .salesCampaign .card-header {
      border: 0;
      box-shadow: 0 0 0 0;
    }
    .salesCampaign footer {
      background: #eee;
      padding: 30px 0;
      text-align: center;
    }
    .salesCampaign .btn {
      color: white !important;
      background: #161616 !important;
      border: 1px solid black !important;
      box-sizing: border-box;
      border-radius: 5px;
      width: 90%;
    }

    @media screen and (max-width: 767px) {
      .salesCampaign .nav-item:nth-child(4) {
        right: 2%;
      }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" alt="AdminLTELogo" height="60" width="60">
  </div> -->

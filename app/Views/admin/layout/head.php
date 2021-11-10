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
      background-size: cover;
      background-position: center;
      height: 40px;
      width: 132px;
      display: block;
    }
    .salesCampaign .banner-sales {
      background-size: cover;
      background-position: center;
      width: 100%;
      height: 380px;
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

<?php 
use App\Models\Konfigurasi_model;
$session = \Config\Services::session();
$konfigurasi  = new Konfigurasi_model;
$site         = $konfigurasi->listing();
?>
<style type="text/css" media="screen">
  .nav-item a:hover {
    color: yellow !important;
  }
</style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link">
      <img src="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $site['namaweb'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('admin/akun') ?>" class="d-block"><?php echo $session->get('nama') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dahboard -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- pengguna -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/customer') ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>Customers</p>
            </a>
          </li>
          <!-- pengguna -->
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('voucher') ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>Vouchers</p>
            </a>
          </li> -->
          <!-- Galeri -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/galeri') ?>" class="nav-link">
              <i class="fas fa-table nav-icon"></i>
              <p>Banner</p>
            </a>
          </li>
          <?php if ($session->get('akses_level') == 'admin_sales') {?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/campaigns') ?>" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>Campaign Sales</p>
            </a>
          </li>
          <?php } ?>
          <?php if ($session->get('akses_level') == 'Admin') {?>
          <!-- pengguna -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/user') ?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Pengguna Website</p>
            </a>
          </li>
          <!-- Konfigurasi -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>Setting Website
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Konfigurasi Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link">
                  <i class="fas fa-image nav-icon"></i>
                  <p>Update Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link">
                  <i class="fas fa-leaf nav-icon"></i>
                  <p>Update Icon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/seo') ?>" class="nav-link">
                  <i class="fab fa-google nav-icon"></i>
                  <p>Konfigurasi SEO &amp; Metatext</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/termandcondition') ?>" class="nav-link">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Konfigurasi Syarat &amp; Ketentuan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <!-- logout -->
          <li class="nav-item">
            <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dasbor') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="min-height: 500px;">


<?php 
$validation = \Config\Services::validation();
    $errors = $validation->getErrors();
    if(!empty($errors))
    {
        echo '<span class="text-danger">'.$validation->listErrors().'</span>';
    }
?>

<?php if (session('msg')) : ?>
     <div class="alert alert-info alert-dismissible">
         <?= session('msg') ?>
         <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
     </div>
 <?php endif ?>
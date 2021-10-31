<?php 
$session = \Config\Services::session();
use App\Models\Dasbor_model;
$m_dasbor = new Dasbor_model();
?>
<div class="alert alert-info">
	<h4>Hai <em class="text-warning"><?php echo $session->get('nama') ?></em></h4>
	<hr>
	<p>Selamat datang di website <strong><?php echo namaweb() ?></strong>.</p>
</div>

 <!-- Info boxes -->
<div class="row">
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Customers</span>
        <span class="info-box-number"><?php echo angka($m_dasbor->customer()) ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Staff</span>
        <span class="info-box-number"><?php echo angka($m_dasbor->user()) ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
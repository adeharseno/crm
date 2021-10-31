<?php 
echo form_open(base_url('admin/konfigurasi/termandcondition')); 
echo csrf_field(); 
?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi['id_konfigurasi'] ?>">
<div class="form-group row">
	<label class="col-3">Syarat &amp; Ketentuan</label>
	<div class="col-9">
		<textarea name="syaratketentuan" class="form-control konten" rows="5"><?php echo $konfigurasi['syaratketentuan'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>
<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<?php 
echo form_open(base_url('admin/campaigns/submit')); 
echo csrf_field(); 
?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Baru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Customer Title Code</label>
					<div class="col-9">
						<input type="text" name="customer_title_code" class="form-control" placeholder="Customer Title Code" value="<?php echo set_value('customer_title_code') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Customer Title</label>
					<div class="col-9">
						<input type="text" name="customer_title" class="form-control" placeholder="Customer Title Name" value="<?php echo set_value('customer_title') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Customer Name</label>
					<div class="col-9">
						<input type="text" name="customer_name" class="form-control" placeholder="Customer Name" value="<?php echo set_value('customer_name') ?>" required>
					</div>
				</div>

                <div class="form-group row">
					<label class="col-3">Customer Email</label>
					<div class="col-9">
						<input type="email" name="customer_email" class="form-control" placeholder="Customer Email" value="<?php echo set_value('customer_email') ?>" required>
					</div>
				</div>

                <div class="form-group row">
					<label class="col-3">Phone Number</label>
					<div class="col-9">
						<input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="<?php echo set_value('phone_number') ?>" required>
					</div>
				</div>

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo form_close(); ?>
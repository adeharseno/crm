<div class="formSalesCampaign">
	<div class="navbar-sales">
		<a href="" class="logo me-auto"><span></span></a>
	</div>
	<div class="banner-sales"></div>
	<?php 
		echo form_open(base_url('admin/campaigns/submit')); 
		echo csrf_field(); 
	?>
		
		<div class="form-group row">
			<div class="col-12">
				<label font-weight: bold; font-size: 15px; >Customer Name</label>
				<input type="text" name="customer_name" class="form-control" value="<?php echo set_value('customer_name') ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-12">
				<label font-weight: bold; font-size: 15px; >Customer Email</label>
				<input type="email" name="customer_email" class="form-control" value="<?php echo set_value('customer_email') ?>" required>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-12">
				<label font-weight: bold; font-size: 15px; >Phone Number</label>
				<input type="text" name="phone_number" class="form-control" value="<?php echo set_value('phone_number') ?>" required>
			</div>
		</div>
		<hr class="solid mt-4 mb-4">
		<div class="form-group row">
			<div class="col-12 text-center">
				<button type="submit" class="btn btn-success">Kirim</button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>
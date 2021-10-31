<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="30%">Voucher</th>
			<th width="30%">Campaign</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($data as $row) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $row['voucher'] ?>
				<small>
					<br><i class="fa fa-paper-plane"></i> Status: <?php echo $row['status'] ?>
				</small>
			</td>
			<td>
				<small>
					<i class="fa fa-home"></i> Campaign: <?php echo $row['campaign'] ?><br>
					<i class="fa"></i> Prefiks: <?php echo $row['prefiks'] ?><br>
					<i class="fa"></i> Start: <?php echo $row['start_periode'] ?><br>
					<i class="fa"></i> End: <?php echo $row['finish_periode'] ?>
				</small>
			</td>
			<td>	
				<a href="<?php echo base_url('admin/voucher/edit/'.$row['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/voucher/delete/'.$row['id']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
<?php include('add.php'); ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th>Customer Title Code</th>
			<th>Customer Title Name</th>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Phone Number</th>
			<th>Admin</th>
			<th width="10%"></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($data as $row) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $row['customer_title_code'] ?></td>
			<td><?php echo $row['customer_title'] ?></td>
			<td><?php echo $row['customer_name'] ?></td>
			<td><?php echo $row['customer_email'] ?></td>
			<td><?php echo $row['phone_number'] ?></td>
			<td><?php echo $row['admin_name'] ?></td>
            <td>
				<!-- <a href="<?php echo base_url('admin/campaigns/edit/'.$row['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> -->
				<a href="<?php echo base_url('admin/campaigns/delete/'.$row['id']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th>Customer</th>
			<th>Alamat</th>
			<th>Produk</th>
			<th>Kritik & Saran</th>
			<th>Invoice</th>
			<th width="10%"></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($data as $row) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $row['nama'] ?>
				<small>
					<br><i class="fa fa-user"></i> Title: <?php echo $row['title_name'] ?>
					<br><i class="fa fa-paper-plane"></i> Email: <?php echo $row['email'] ?>
					<br><i class="fa fa-mobile"></i> Mobile: <?php echo $row['handphone'] ?>
					<br><i class="fa fa-phone"></i> Telepon: <?php echo $row['telepon'] ?>
				</small>
			</td>
			<td>
				<small>
					<i class="fa fa-home"></i> Alamat: <?php echo $row['alamat'] ?><br>
					<i class=""></i> Provinsi: <?php echo $row['province'] ?><br>
					<i class=""></i> Kota/Kab: <?php echo $row['type'] . ' '. $row['districts'] ?><br>
					<i class=""></i> Kecamatan: <?php echo $row['subdistricts'] ?><br>
					<i class=""></i> Kelurahan: <?php echo $row['village'] ?><br>
					<i class=""></i> Kode Pos: <?php echo $row['postalcode'] ?>
				</small>
			</td>
			<td>
				<?php echo $row['produk'] ?>
			</td>
			<td>
				<?php echo $row['kritiksaran'] ?>
			</td>
			<td>
				<?php if($row['file']=="") { echo '-'; }else{ ?>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$row['file']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<!-- <td><?php echo $row['nama'] ?></td> -->
			<td>	
				<!-- <a href="<?php echo base_url('admin/customer/edit/'.$row['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> -->
				<a href="<?php echo base_url('admin/customer/delete/'.$row['id']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
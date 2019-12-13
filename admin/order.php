
<div class="card">
	<div class="card-body">
	<div class="card-title text-center mb-5"><h3><strong>Order List</strong></h3></div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<a href="preview.php" target="_blank" class="btn btn-primary mb-5">
					Export to Excel
					<i class="material-icons">exit_to_app</i>
				</a>
				<!-- <a href="" class="btn btn-primary mb-5">
					Preview
					<i class="material-icons">visibility</i>
				</a> -->
				<thead align="center">
	        		<th>Order ID</th>
	        		<th>Customer</th>
	        		<th>Order Date</th>
	        		<th>Total</th>
	        		<th>Handle</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	          			$sql = $koneksi->query("SELECT * FROM orders JOIN customer ON orders.id_customer = customer.id_customer");
	          			while ($hm = $sql->fetch_assoc()) {
	        		?>
	        		<tr>
	          			<td ><?php echo $hm['id_order'];?></td>
	          			<td ><?php echo $hm['fullname'];?></td>
	          			<td ><?php echo $hm['tgl_order'];?></td>
	          			<td >Rp <?php echo number_format($hm['total_order']);?></td>
	          			<td ><a href="index.php?pages=detail&id=<?php echo $hm['id_order']; ?>" class="btn btn-primary">Detail</a></td>
	        		</tr>         
	        		<?php } ?>
	      		</tbody>
	    	</table>
	  	</div>
	</div>
</div>               
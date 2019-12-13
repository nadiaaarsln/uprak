<h3 class="text-center">Detail Order</h3>
<?php 
$hm = $koneksi->query("SELECT * FROM orders JOIN customer ON orders.id_customer = customer.id_customer WHERE orders.id_order = '$_GET[id]'");
$detail = $hm->fetch_assoc();
?>

<strong><?php echo $detail['fullname']; ?></strong>

<p>
	Username &nbsp;	: <?php echo $detail['username']; ?><br>
	Order Date &nbsp;	: <?php echo $detail['tgl_order']; ?><br>
	Total Price &nbsp;	: Rp <?php echo number_format($detail['total_order']); ?>
</p>

<div class="card">
	<div class="card-body">
	<div class="card-title text-center mb-5"><h3><strong>Order List</strong></h3></div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead align="center">
	        		<th>No</th>
	        		<th>Order ID</th>
	        		<th>Menu</th>
	        		<th>Price</th>
	        		<th>Quantity</th>
	        		<th>Subtotal</th>
	        		<th>Status</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	        		$no =1;
	          			$sql = $koneksi->query("SELECT * FROM detail_order JOIN menu ON detail_order.id_menu = menu.id_menu WHERE detail_order.id_order = '$_GET[id]'");
	          			while ($hm = $sql->fetch_assoc()) {
	        		?>
	        		<tr>
	          			<td ><?php echo $no;?></td>
	          			<td ><?php echo $hm['id_order'];?></td>
	          			<td ><?php echo $hm['menu'];?></td>
	          			<td ><?php echo number_format($hm['price']);?></td>
	          			<td ><?php echo $hm['quantity'];?></td>
	          			<td >Rp <?php echo number_format($hm['price'] * $hm['quantity']);?></td>
	          			<td><?php echo $hm['status'] ?></td>
	        		</tr>         
	        		<?php $no++; } ?>
	        		<tr align="center">
	        			<td colspan="2">
	        				<a href="index.php?pages=order" class="btn btn-primary btn-block">Back</a>
	        			</td>
	        			<td colspan="5">
	        				<?php
	          			$sql = $koneksi->query("SELECT * FROM orders JOIN customer ON orders.id_customer = customer.id_customer");
	          			$hm = $sql->fetch_assoc();
	        		?>
	          				<form method="POST">
	          					<button class="btn btn-success btn-block" name="confirm">Confirm Payment</button>
	          				</form>

	          				<?php 
	          				if (isset($_POST['confirm'])) {
	          					// $id_order = 

	          					$koneksi->query("UPDATE detail_order JOIN orders ON detail_order.id_order = orders.id_order SET detail_order.status = 'Already Paid' WHERE detail_order.id_order = '$_GET[id]'");

	          					// echo "<meta http-equiv='refresh' content='1;url=index.php?pages=detail&id='>";
	          				}
	          				?>
	          			</td>
	        		</tr>
	      		</tbody>
	    	</table>
	  	</div>
	</div>
</div>               
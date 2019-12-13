<?php 
session_start();
include '../admin/koneksi.php'; 
if (!isset($_SESSION['customer'])) {
	echo "<script>alert('You must login first!');</script>";
	echo "<script>location='login.php';</script>";
}
if (empty($_SESSION['cart']) OR !isset($_SESSION['cart'])) {
	echo "<script>alert('Cart is empty. Please order now!');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Menu Resto</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>
<body>
	<!-- Navbar --> 
	<?php include 'navbar.php'; ?>

	<pre><?php print_r($_SESSION['customer']); ?></pre>
	<section class="content">
		<div class="container ml-auto mr-auto mt-5 table-responsive">
			<h2><u>Checkout</u></h2>
			<table class="table table-hover table-striped mt-5 mb-5">
				<thead align="center">
	        		<th>No.</th>
	        		<th>Menu</th>
	        		<th>Price</th>
	        		<th>Quantity</th>
	        		<th>Subtotal</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	        		$no = 1;
	        		$total_shop = 0;
	        		foreach ($_SESSION['cart'] as $id_menu => $quantity) :
	        			$sql = $koneksi->query("SELECT*FROM menu WHERE id_menu = '$id_menu'");
	        			$hm = $sql->fetch_assoc();
	        			$total = $hm['price']*$quantity;
	        		?>
	        		<tr>
	          			<td ><?php echo $no; ?></td>
	          			<td ><?php echo $hm['menu']?></td>
	          			<td >Rp <?php echo number_format($hm['price'])?></td>
	          			<td ><?php echo $quantity; ?></td>
	          			<td >Rp <?php echo number_format($total); ?></td>
	        		</tr>         
	        		<?php $no++; $total_shop+=$total; endforeach ?>
	      		</tbody>
	      		<tfoot>
	      			<th class="text-center" colspan="4">Total</th>
	      			<th class="text-center">Rp <?php echo number_format($total_shop); ?></th>
	      		</tfoot>
	    	</table>
	    	<form method="POST">
	    		<div class="row">
	    			<div class="col-md-4">
	    				<div class="form-group">
	    					<input type="text" class="form-control text-center" value="<?php echo($_SESSION['customer']['fullname']); ?>" readonly>
	    				</div>
	    			</div>
	    			<div class="col-md-4">
	    				<div class="form-group">
	    					<input type="text" class="form-control text-center" value="<?php echo($_SESSION['customer']['username']); ?>" readonly>
	    				</div>
	    			</div>
	    			<div class="col-md-4">
	    				<div class="form-group">
	    					<select name="id_meja" class="form-control" required>
	    						<option value="">-- Choose Table --</option>
	    						<?php 
	    						$sql = $koneksi->query("SELECT*FROM meja");
	    						while ($hm = $sql->fetch_assoc()) {
	    						?>
	    						<option value="<?php echo $hm['id_meja']; ?>">Table - <?php echo $hm['id_meja']; ?></option>
	    						<?php } ?>
	    					</select>
	    				</div>
	    			</div>
	    		</div>
	    		<button class="btn btn-success" name="checkout">Checkout</button>
	    	</form>
	    	<?php if (isset($_POST['checkout'])) {
	    		$id_customer = $_SESSION['customer']['id_customer'];
	    		$id_meja = $_POST['id_meja'];
	    		$tgl_order = date("Y:m:d H:i:s");

	    		$sql = $koneksi->query("INSERT INTO orders(id_customer, id_meja, total_order, tgl_order) VALUES('$id_customer', '$id_meja', '$total_shop', '$tgl_order')");

	    		$id_order_now = $koneksi->insert_id;
	    		foreach ($_SESSION['cart'] as $id_menu => $quantity) {
	    			$sql1 = $koneksi->query("INSERT INTO detail_order(id_order, id_menu, quantity) VALUES('$id_order_now', '$id_menu', '$quantity')");

	    			$sql2 = $koneksi->query("UPDATE menu SET stock = stock - $quantity WHERE id_menu='$id_menu'");
	    		}

	    		unset($_SESSION['cart']);

	    		echo "<script>alert('Success Order Menu!');</script>";
	    		echo "<script>location='bill.php?id=$id_order_now';</script>";
	    	} ?>
	    	<!-- <pre><?php print_r($_SESSION['cart']); ?></pre> -->
		</div>
	</section>

</body>
</html>
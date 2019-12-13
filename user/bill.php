<?php 
session_start();
include '../admin/koneksi.php'; 
if (!isset($_SESSION['customer'])) {
	echo "<script>alert('You must login first!');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bill Order</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>
<body>
	<!-- Navbar --> 
	<?php include 'navbar.php'; ?>

	<section class="content">
		<div class="container mt-5">
			<h3 class="text-center">Bill Order</h3>
			<?php 
			$hm = $koneksi->query("SELECT * FROM orders JOIN customer ON orders.id_customer = customer.id_customer WHERE orders.id_order = '$_GET[id]'");
			$detail = $hm->fetch_assoc();
	    	$tgl_order = date('d-m-Y H:i:s');

	    	// $id_was_buy = $detail['id_customer'];
	    	// $id_was_login = $_SESSION['customer']['id_customer'];
	    	// if ($id_was_buy1!=$id_was_login) {
	    	// 	echo "<script>alert('Dont try to sneak in');</script>";
	    	// 	echo "<script>location='history.php'</script>";
	    	// }
			?>

			<strong><?php echo $detail['fullname']; ?></strong>

			<p>
				Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: <?php echo $detail['username']; ?><br>
				Table Number &nbsp;	: <?php echo $detail['id_meja']; ?><br>
				Order Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: <?php echo $detail['tgl_order']; ?><br>
				Total Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: RP <?php echo number_format($detail['total_order']); ?>
			</p>

			<div class="card">
				<div class="card-body">
				<div class="card-title text-center mb-5"><h3><strong>Order List</strong></h3></div>
					<div class="content table-responsive table-full-width">
						<table class="table table-hover table-striped">
							<thead align="center">
				        		<th>Detail Order ID</th>
				        		<th>Order ID</th>
				        		<th>Menu</th>
				        		<th>Price</th>
				        		<th>Quantity</th>
				        		<th>Subtotal</th>
				      		</thead>
				      		<tbody align="center">
				        		<?php
				          			$sql = $koneksi->query("SELECT * FROM detail_order JOIN menu ON detail_order.id_menu = menu.id_menu WHERE detail_order.id_order = '$_GET[id]'");
				          			while ($hm = $sql->fetch_assoc()) {
				        		?>
				        		<tr>
				          			<td ><?php echo $hm['id_detail_order'];?></td>
				          			<td ><?php echo $hm['id_order'];?></td>
				          			<td ><?php echo $hm['menu'];?></td>
				          			<td ><?php echo number_format($hm['price']);?></td>
				          			<td ><?php echo $hm['quantity'];?></td>
				          			<td >Rp <?php echo number_format($hm['price'] * $hm['quantity']);?></td>
				        		</tr>         
				        		<?php } ?>
				      		</tbody>
				    	</table>
				    	<div class="row">
				    		<div class="col-md-12 alert alert-success text-center m-3">
				    			<p>Please make payment of Rp <?php echo number_format($detail['total_order']); ?> - Pay with cash!</p>
				    		</div>
				    	</div>
				  	</div>
				</div>
			</div>               
		</div>
	</section>
</body>
</html>
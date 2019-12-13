<?php 
session_start();
include '../admin/koneksi.php';
if (empty($_SESSION['cart']) OR !isset($_SESSION['cart'])) {
	echo "<script>alert('Cart is empty. Please order now!');</script>";
	echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cart Order</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>
<body>
	<!-- Navbar --> 
	<?php include 'navbar.php'; ?>

	<!-- Content -->
	<section class="content">
		<div class="container ml-auto mr-auto mt-5 table-responsive">
			<h2><u>Cart Order</u></h2>
			<table class="table table-hover table-striped mt-5">
				<thead align="center">
	        		<th>No.</th>
	        		<th>Menu</th>
	        		<th>Price</th>
	        		<th>Quantity</th>
	        		<th>Subtotal</th>
	        		<th>Handle</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	        		$no = 1;
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
	          			<td ><a href="delete_cart.php?id=<?php echo $id_menu; ?>" onclick="return confirm('Delete this menu from cart?');" class="btn btn-danger">Delete</a></td>
	        		</tr>         
	        		<?php $no++; endforeach ?>
	      		</tbody>
	    	</table>
	    	<a href="index.php" class="btn btn-outline-info mt-5">Continue Order</a>
	    	<a href="checkout.php" class="btn btn-success mt-5">Checkout</a>
		</div>
	</section>
</body>
</html>
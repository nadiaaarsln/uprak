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
	<title>History Order</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>
<body>
	<!-- Navbar --> 
	<?php include 'navbar.php'; ?>
	<section class="content m-5">
		<div class="container ml-auto mr-auto mt-5 table-responsive">
			<h2>History Order - <?php echo $_SESSION['customer']['fullname']; ?></h2>
			<table class="table table-hover table-striped mt-4 mb-5">
				<thead align="center">
	        		<th>No.</th>
	        		<th>Date Order</th>
	        		<th>Total</th>
	        		<th>Status</th>
	        		<th>Option</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	        		$no = 1;
	        		$id_customer = $_SESSION['customer']['id_customer'];
				    $sql = $koneksi->query("SELECT * FROM orders JOIN detail_order ON orders.id_order = detail_order.id_order WHERE orders.id_customer = $id_customer");
			  		while ($hm = $sql->fetch_assoc()) {
			  		?>
				    <tr>
				        <td ><?php echo $no;?></td>
				        <td ><?php echo $hm['tgl_order'];?></td>
				        <td ><?php echo number_format($hm['total_order']);?></td>
				        <td ><?php echo $hm['status'];?></td>
				        <td >
				        	<a href="bill.php?id=<?php echo $hm['id_order'] ?>" class="btn btn-info">Bill</a>
				        	<!-- <a href="payment.php?id=<?php echo $hm['id_order'] ?>" class="btn btn-success">Payment</a> -->
				        </td>
				    </tr>         
				    <?php $no++; } ?>
	      		</tbody>
	    	</table>
	    </div>
	</section>

</body>
</html>
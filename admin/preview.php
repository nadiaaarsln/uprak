<?php
include 'koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Order Report.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Resto
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body>
<div class="card">
	<div class="card-body">
	<div class="card-title text-center mb-5"><h3><strong>Order List</strong></h3></div>
		<div class="content table-responsive table-full-width">
			<table class="table table-bordered table-striped">
				<thead align="center">
	        		<th>Order ID</th>
	        		<th>Customer</th>
	        		<th>Order Date</th>
	        		<th>Total</th>
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
	        		</tr>         
	        		<?php } ?>
	      		</tbody>
	    	</table>
	  	</div>
	</div>
</div> 
</body>
</html>              
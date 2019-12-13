<?php 
session_start();
include '../admin/koneksi.php'; ?>
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

	<!-- Content -->
	<section class="content">
		<div class="container ml-auto mr-auto mt-5">
			<h2><u>Our Menus - Food & Beverage</u></h2>
			<div class="row mt-5 text-center">
				<?php
	              $sql = $koneksi->query("select * from menu");
	              while ($hm = $sql->fetch_assoc()) {
	              # code...
	            ?>
				<div class="col-md-3 mb-4">
					<div class="card rounded" style="width: 18rem;">
					  <img src="../admin/assets/img/<?php echo $hm['foto'] ?>" class="card-img-top" alt="..."  width="100%" height="200px">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $hm['menu'] ?></h5>
					    <p class="card-text">Rp <?php echo number_format($hm['price']); ?></p>
						<a href="detail.php?id=<?php echo $hm['id_menu'] ?>" class="btn btn-outline-success">Order Menu</a>
						<!-- <a href="order.php?id=<?php echo $hm['id_menu'] ?>" class="btn btn-outline-success">Order Menu</a> -->
					  </div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
</body>
</html>
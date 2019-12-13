<?php 
session_start();
include '../admin/koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Detail Menu</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>
<body>
	<!-- Navbar --> 
	<?php include 'navbar.php'; ?>

	<!-- Content -->
	<section class="content">
		<div class="container ml-auto mr-auto mt-3">
			<h3><u>Detail Menu</u></h3>
			<?php 
			$id_menu = $_GET['id'];

			$sql = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
			$hm = $sql->fetch_assoc();

			?>

			<div class="row">
				<div class="col-md-5">
					<img src="../admin/assets/img/<?php echo $hm['foto'] ?>" class="img-responsive" width="100%">
				</div>
				<div class="col-md-7">
					<h2><?php echo $hm['menu'] ?>
					<h4>Rp <?php echo number_format($hm['price']); ?></h4>
					<form method="POST" class="mb-5">
						<div class="form-group">
							<div class="input-group">
								<input type="number" min="1" class="form-control rounded" name="quantity" max="<?php echo $hm['stock'] ?>">&nbsp;
								<div class="input-group-btn">
									<button class="btn btn-success" name="order">Order Now</button>
								</div>
							</div>
						</div>
					</form>
					<h4>Stock	: <?php echo $hm['stock'] ?></h4>
					<?php 
					if (isset($_POST['order'])) {
						$quantity = $_POST['quantity'];
						$_SESSION['cart'][$id_menu] = $quantity;

						echo "<script>alert('Menu was added to the cart!');</script>";
						echo "<script>location='cart.php'</script>";
					}
					?>
					<a href="index.php" class="btn btn-outline-danger btn-block mt-5">Back to Home</a>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
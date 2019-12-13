<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<ul class="nav navbar-nav ml-auto" align="right">
				<li class="nav-item">
					<a href="index.php" class="nav-link"><strong>HOME</strong></a>
				</li>
				<?php if (isset($_SESSION['customer'])) : ?>
					
					<li class="nav-item">
						<a href="logout.php" onclick="return confirm('Are you sure to logout?')" class="nav-link"><strong>Logout</strong></a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a href="login.php" class="nav-link"><strong>Login</strong></a>
					</li>

				<?php endif ?>
				<li class="nav-item">
					<a href="checkout.php" class="nav-link"><strong>Check-Out</strong></a>
				</li>
				<li class="nav-item">
					<a href="history.php" class="nav-link"><strong>History Order</strong></a>
				</li>
				<li class="nav-item">
					<a href="cart.php" class="nav-link"><strong><i class="material-icons">shopping_cart</i></strong></a>
				</li>
			</ul>
		</div>
	</nav>
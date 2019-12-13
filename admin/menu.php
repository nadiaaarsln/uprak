<div class="card">
	<div class="card-body">
	<div class="card-title text-center mb-5"><strong><h3>Our Menu</h3></strong></div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
	    		<a href="index.php?pages=add_menu" class="btn btn-primary">[+] Add Menu</a><br>
				<thead align="center">
	        		<th>Menu ID</th>
	        		<th>Menu</th>
	        		<th>Picture</th>
	        		<th>Price</th>
	        		<th>Stock</th>
	        		<th>Handle</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	          			$sql = $koneksi->query("SELECT * FROM menu");
	          			while ($hm = $sql->fetch_assoc()) {
	        		?>
	        		<tr>
	          			<td ><?php echo $hm['id_menu']?></td>
	          			<td ><?php echo $hm['menu']?></td>
	          			<td ><img src="assets/img/<?php echo $hm['foto']?>" width="150px" height="auto"></td>
	          			<td >Rp <?php echo number_format($hm['price'])?></td>
	          			<td ><?php echo $hm['stock']?></td>
	          			<td ><a href="index.php?pages=edit_menu&id=<?php echo $hm['id_menu'] ?>" class="btn btn-primary">Edit</a><a href="index.php?pages=delete_menu&id=<?php echo $hm['id_menu']?>" class="btn btn-danger" onclick="return confirm('Delete this menu?')">Delete</a></td>
	        		</tr>         
	        		<?php } ?>
	      		</tbody>
	    	</table>
	  	</div>
	</div>
</div>               
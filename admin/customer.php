<div class="card">
	<div class="card-body">
	<div class="card-title text-center mb-5"><h3><strong>Customer Data</strong></h3></div>
		<div class="content table-responsive table-full-width">
			<table class="table table-hover table-striped">
				<thead align="center">
	        		<th>Customer ID</th>
	        		<th>Name</th>
	        		<th>Username</th>
	        		<th>Password</th>
	        		<th>Handle</th>
	      		</thead>
	      		<tbody align="center">
	        		<?php
	          			$sql = $koneksi->query("SELECT * FROM customer");
	          			while ($hm = $sql->fetch_assoc()) {
	        		?>
	        		<tr>
	          			<td ><?php echo $hm['id_customer']?></td>
	          			<td ><?php echo $hm['fullname']?></td>
	          			<td ><?php echo $hm['username']?></td>
	          			<td ><?php echo $hm['password']?></td>
	          			<td ><a href="" class="btn btn-primary">Delete</a></td>
	        		</tr>         
	        		<?php } ?>
	      		</tbody>
	    	</table>
	  	</div>
	</div>
</div>               
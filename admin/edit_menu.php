<?php 
// session_start();
$sql = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$_GET[id]'");
$hm = $sql->fetch_assoc();

?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title"><h4><strong>Edit Menu - Turkish Food</strong></h4></div>
        <div class="content table-responsive ">
          <form  name="form_menu" class="p-3" enctype="multipart/form-data" method="POST" >
            <div class="row">
              <div class="col-md-12">
                <label for="menu">Menu's Name</label>
                <input type="text" name="menu" class="form-control" value="<?php echo $hm['menu'] ?>"> <br>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
              	<img src="assets/img/<?php echo $hm['foto'] ?>" width="150px" height="auto"><br>
              </div>
              <div class="col-md-9">
                <label for="foto">Change Photo</label>
                <input type="file" name="foto" class="form-control"> <br>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-6">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $hm['price'] ?>"> <br>
              </div>
              <div class="col-md-6">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" value="<?php echo $hm['stock'] ?>"> <br>
              </div>
            </div>
            <button class="btn btn-primary" name="edit">Update Menu</button>
            <a href="index.php?pages=menu" class="btn btn-secondary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 

<?php 
if (isset($_POST['edit'])) {
	$filename=$_FILES['foto']['name'];
	$path=$_FILES['foto']['tmp_name'];

	if (!empty($path)) {
		move_uploaded_file($path, "assets/img/$filename");

		$koneksi->query("UPDATE menu SET menu = '$_POST[menus]', foto = '$filename', price = '$_POST[prices]', stock = '$_POST[stock]' WHERE id_menu = '$_GET[id]'");

	} else {

		$koneksi->query("UPDATE menu SET menu = '$_POST[menu]', price = '$_POST[price]', stock = '$_POST[stock]' WHERE id_menu = '$_GET[id]'");
		
	}

	echo "<br><div class='alert alert-primary text-center'>Success update menu!</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?pages=menu'>";
}
?> 
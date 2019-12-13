<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title"><h4><strong>Add Menu - Turkish Food</strong></h4></div>
        <div class="content table-responsive ">
          <form  name="form_menu" class="p-3" enctype="multipart/form-data"  method="POST" >
            <div class="row">
              <div class="col-md-8">
                <label for="menu">Menu's Name</label>
                <input type="text" name="menu" class="form-control"> <br>
              </div>
              <div class="col-md-4">
                <label for="foto">Menu's Photo</label>
                <input type="file" name="foto" class="form-control"> <br>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control"> <br>
              </div>
              <div class="col-md-6">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control"> <br>
              </div>
            </div>
            <button class="btn btn-primary" name="save">Add Menu</button>
            <a href="index.php?pages=menu" class="btn btn-secondary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>         

<?php 
if (isset($_POST['save'])) {
	$filename=$_FILES['foto']['name'];
	$path=$_FILES['foto']['tmp_name'];
	move_uploaded_file($path, "assets/img/".$filename);
	$koneksi->query("INSERT INTO menu(menu, foto, price, stock) VALUES('$_POST[menu]', '$filename', '$_POST[price]', '$_POST[stock]')");

	echo "<br><div class='alert alert-primary text-center'>Success added menu!</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?pages=menu'>";
}
?>
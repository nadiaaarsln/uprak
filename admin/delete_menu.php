<?php 

$sql = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$_GET[id]'");
$hm = $sql->fetch_assoc();
$foto = $hm['foto'];

if (file_exists("assets/img/$foto")) {
	unlink("assets/img/$foto");
}

$koneksi->query("DELETE FROM menu WHERE id_menu = '$_GET[id]'");

echo "<script> location='index.php?pages=menu'; </script>";
?>

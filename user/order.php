<?php 

session_start();

//Mendapatkan id-menu
$id_menu = $_GET['id'];

if (isset($_SESSION['cart'][$id_menu])) {

	$_SESSION['cart'][$id_menu] +=1;

}else{

	$_SESSION['cart'][$id_menu] =1;

}

echo "<script>alert('Menu was added to cart!');</script>";
echo "<script>location='cart.php';</script>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>
<?php 
session_start();
$id_menu = $_GET['id'];
unset($_SESSION['cart'][$id_menu]);

echo "<script>location='cart.php'</script>";
?>
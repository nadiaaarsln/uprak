<?php 
include 'koneksi.php';

$sql = $koneksi->query("SELECT * FROM menu");
while ($hm = $sql->fetch_assoc()) {
	$item[] = array(
		"id_menu" => $hm["id_menu"],
		"menu" => $hm["menu"],
		"foto" => $hm["foto"],
		"price" => $hm["price"],
		"stock" => $hm["stock"]
	);
}

$json = array(
	'result' => 'Success',
	'item' => $item
);

echo json_encode($json);
?>
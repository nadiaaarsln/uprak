<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "up_resto";

$koneksi    = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
	die("Connection failed: ".$koneksi->connect_error);
}
?>
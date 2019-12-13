<?php 
session_start();
session_destroy();

echo "<br><div class='alert alert-primary text-center'>Success to logout!</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php'>";
?>
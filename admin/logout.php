<?php 
session_destroy();
echo "<div class='alert alert-primary text-center'>Success to logout!</div>";
echo "<meta http-equiv='refresh' content='1;url=login.php'>";
?>
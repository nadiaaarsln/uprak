<?php include 'header.php'; ?>

  <div class="content">
    <div class="container-fluid">
        <?php 
          if (isset($_GET['pages'])) {
            if ($_GET['pages'] == "menu") {
              include 'menu.php';
            } elseif ($_GET['pages'] == "customer") {
              include 'customer.php';
            } elseif ($_GET['pages'] == "order") {
              include 'order.php';
            } elseif ($_GET['pages'] == "detail") {
              include 'detail.php';
            } elseif ($_GET['pages'] == "add_menu") {
              include 'add_menu.php';
            } elseif ($_GET['pages'] == "delete_menu") {
              include 'delete_menu.php';
            } elseif ($_GET['pages'] == "edit_menu") {
              include 'edit_menu.php';
            } elseif ($_GET['pages'] == "logout") {
              include 'logout.php';
            } 
          }else{
            include 'home.php';
          }
        ?>
    </div>
  </div>

<?php include 'footer.php'; ?>
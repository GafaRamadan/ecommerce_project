<?php

session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit();
}
require_once("connect.php");
$id = $_SESSION['admin_id'];
$selectionQuery = "SELECT * FROM admins WHERE id = $id";
$selectionQuery = $conn -> query($selectionQuery);
$selectadminname = $selectionQuery -> fetch_assoc();
$admin = $selectadminname['name'];
$current = "products";
require_once("inc/saidebar.php");
require_once("inc/navbar.php")
?>


        <?php

        if (!isset($_GET['action'])) {

            include 'pages/product/index.php';
        } elseif ($_GET['action'] == 'add') {

            include 'pages/product/create.php';

        } 
         elseif ($_GET['action'] == 'edit') {

             include 'pages/product/Edit.php';
         }

        ?>
    </div>

</div>






<?php
include 'inc/footer.php';
?>
   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
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
    $selectUsername = $selectionQuery -> fetch_assoc();
    $user = $selectUsername['name'];
    $current = "admins";

    require_once("inc/saidebar.php");
    require_once("inc/navbar.php")

?>


<?php
    if(!isset($_GET['action'])){
        require_once("pages/admins/index.php");
    }elseif($_GET['action'] == 'add'){
        require_once("pages/admins/create.php");
    }elseif($_GET['action'] == 'edit'){
        require_once("pages/admins/edit.php");
    }
?>


<?php
    require_once("inc/footer.php");
?>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
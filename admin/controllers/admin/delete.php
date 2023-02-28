<?php
    require_once("../../connect.php");
    $id = $_GET['id'];
    $DeleteQuery = "DELETE  FROM admins WHERE id= $id";
    $delete = $conn -> query($DeleteQuery);
    if($delete){
        header("Location: ../../admin.php");
        exit();
    }else{
        echo $conn -> error;
    }

?>
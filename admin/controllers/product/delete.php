<?php
require_once ("../../connect.php");
    $id = $_GET['id'];
    $DeleteQuery = "DELETE  FROM product WHERE id= $id";
    $delete = $conn -> query($DeleteQuery);
    if($delete){
        header("Location: ../../product.php");
        
    }else{
        echo $conn -> error;
    }

?>
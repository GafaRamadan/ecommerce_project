<?php 
require_once '../../connect.php';

    $name       = $_POST['name'];
    $password   = md5($_POST['password']);
    $email      = $_POST['Email'];
    $address    = $_POST['address'];
    $phone      = $_POST['phone'];
    
    $insertQuery = "INSERT INTO admins(name, password, Email, address, Phone) 
        VALUES ('$name','$password','$email','$address','$phone')";

    $insert = $conn -> query($insertQuery);
    if(isset($insert)){
        header("Location:../../admin.php");
        exit();
    }else{
        header("Location: ../../admin.php?action=add");
    }

?>
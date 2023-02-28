<?php
    require_once("../../connect.php");
    

    $id         = $_POST['id'];
    $name       = $_POST['name'];

    $retrievePasswordQuery = "SELECT Password FROM admins WHERE id = $id";
    $retrievePassword = $conn -> query($retrievePasswordQuery);
    $retrievePassword = $retrievePassword -> fetch_assoc(); 
    if(empty($_POST['Password'])){
        $password = $retrievePassword['Password'];
    }else{
        $password   = md5($_POST['Password']);
    }
    $email      = $_POST['Email'];
    $address    = $_POST['address'];
    $phone      = $_POST['Phone'];

    $updateQuery = "UPDATE admins SET 
        name='$name',
        Password='$password',
        Email='$email',
        address='$address',
        Phone='$phone'
         WHERE id = $id";

    $update = $conn -> query($updateQuery);
    if(isset($update)){
        header("Location: ../../admin.php");
        exit();
    }else{
        header("Location: ../../admin.php?action=edit");
    }

?>
<?php 
require_once('../../connect.php');

$name       = $_POST['firstName'] . ' ' . $_POST['lastName'];
$email      = $_POST['email'];
if($_POST['password'] === $_POST['confirmPassword']){
    $password = md5($_POST['password']);
    
}else {
    header ("Location:../../register.php?error=passwordNotIdentical");
    exit();

}
$address = $_POST['address'];
$phone = $_POST['phone'];


$registerAdmin = "INSERT INTO admins (name , password , Email, address, Phone)
 VALUES('$name', '$password' , '$email' , '$address', '$phone')";
 $insert = $conn -> query($registerAdmin);
 if(isset($insert)){
    header("Location: ../../login.php");
    exit();

 }else{
    header("Location:../../register.php");
 }
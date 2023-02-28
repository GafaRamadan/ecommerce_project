<?php
session_start();
require_once 'admin/connect.php';
$id = $_GET['id'];
$product_quantity = 1;

$session = $_SESSION['user'];

$select_cart = "SELECT * FROM cart WHERE pro_id = $id";
$query = $conn -> query($select_cart);


    $insert = "INSERT INTO cart (pro_id,user_id,qty)
 VALUES ('$id','$session','$product_quantity')";
         $query= $conn -> query($insert);

  if($query){

header('location:cart.php');
  }
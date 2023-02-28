<?php 
session_start();
require_once ('admin/connect.php');
$email = $_POST['Email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE  Email = '$email' AND password = '$password'";
$query = $conn -> query($sql);
$row = $query -> fetch_assoc();
$id = $row['id'];
$num = mysqli_num_rows($query);
if($num > 0){
    $_SESSION['user'] =$id;
    header ('location:shop.php');

}else{
    echo "ألاميل خطا";
}
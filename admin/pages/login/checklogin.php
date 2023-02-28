<?php 

session_start();
require_once '../../connect.php';
$errors =  [];
if (!isset($_POST['Email'] ) && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
    $errors ['Email'] = 'Email';

}
if (!isset($_POST['Password']) && !empty($_POST['Password'])) {
    $errors ['Password'] = 'Password';
}
    if(!$errors){

    $email = $conn -> real_escape_string($_POST['Email']);
    $password = md5($_POST['Password']);

    $selectLogin = "SELECT * FROM admins WHERE Email = '$email' AND Password = '$password'";
    $loginQuery = $conn -> query($selectLogin);
    $admin = $loginQuery -> fetch_assoc();


    if ($loginQuery -> num_rows > 0) {
        $id = $admin['id'] ;
        $_SESSION['admin_id'] = $id;
        $_SESSION['Email'] = $admin['Email'] ;
        header("Location: ../../index.php");
        exit();
    } else {
        $errors = "Invalid Email or Password" ;
        $_SESSION['error_invalid'] = $errors ;
        header("Location: ../../login.php");
        exit();
    }
}else{
$_SESSION['errors'] = $errors ;
header("Location: ../../login.php");
exit();
}

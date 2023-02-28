<?php 
//  session_start();


define ('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DBNAME', 'shop');

$conn = new mysqLI(HOST , USER , PASSWORD , DBNAME);

$conn -> set_charset('utf8');

if (!$conn){
    echo $conn->connect_error;
}
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$con = new mysqli('localhost', 'root', '','stories');
// $con = new mysqli('localhost', 'u406245781_root1', 'Tralala1107','u406245781_nesmonde');

if (!$con){
    die(mysqli_error($con));
}
?>
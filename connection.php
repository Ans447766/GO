<?php
    $host = 'localhost';
$username = 'root';
$password = '';
$database = 'forTest';
$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
    die("<div id='load2'>Connection failed: " . mysqli_connect_error() ."<br><a href='cdtb.php'>CREATE DATABASE forTest</a></div>");
}else{
    echo "<script>console.log('data base connected  successfully')</script>";
}

?>

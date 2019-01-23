<?php
    $host = 'localhost';
$username = 'root';
$password = '';
$database = '';
$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "<script>console.log('data base connected  successfully')</script>";
}

?>

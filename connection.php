<?php
    $host = 'localhost';
$username = 'root';
$password = '';
$database = '';
$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
    throw new exception mysqli_connect_error();
    die();
}else{
    echo "<script>console.log('data base is connected  successfully')</script>";
}

?>

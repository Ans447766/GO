<?php
    $host = 'localhost';
$username = 'root';
$password = '';
$database = 'forTest';
$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
    trigger_error(mysqli_connect_error($conn));
}else{
    echo "<script>console.log('data base connected  successfully')</script>";
}

?>

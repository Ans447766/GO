<?php
    $host = 'localhost';
$username = 'root';
$password = '';
$database = 'forTest';
$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn){
<<<<<<< HEAD
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "<script>console.log('data base connected  successfully')</script>";
=======
    throw new exception mysqli_connect_error();
    die();
}else{
    echo "<script>console.log('data base is connected  successfully')</script>";
>>>>>>> abb3ae26b32cf2bc26cc3841dec4e41dc9924812
}

?>

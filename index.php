<?php
//check table if existed go to the preview page directly
include 'connection.php';
$sql = "SELECT * FROM test WHERE id=999";
$res = mysqli_query($conn,$sql);
if($res -> num_rows > 0){
    header('location:go.php');
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
       #load2{
        background-color:red;
        height:100%;
        width:100%;
        font-size:40px;
        text-align:center;
        overflow:hidden;
        transition:1s;
        color:white;
        position:fixed;
        top:0px;
        left:0px;
        padding-top:25%;
        font-weight:bold;
        font-family:monospace;
        display:inline-block;
    }
    </style>
    <title>GO STACK</title>
</head>
<body>
    <ul>
        <li><a target='_blank' href='insert fake.php'>insert fake records</a></li>
        <li><a target='_blank' href='go.php'>GO preview</a></li>
    </ul>
</body>
</html>

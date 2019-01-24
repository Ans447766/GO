<html>
<head>
    <style>
    body{
        background-color:lightblue;
    }
    #load{
        background-color:blue;
        height:100%;
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
</head>
<body>
    <span id='load'>LOADING...</span>
<?php
include 'connection.php';
if(!$conn){
    echo mysqli_error($conn);
    die();
}
for($i = 1;$i < 1000;$i++){
    $sql = "INSERT INTO test (`name`,`descriptions`,`class`,`phn`,`email`,`address`) VALUES ('User$i','desc$i','1$i','$i$i$i$i$i$i','$i@$i.com','lahore home $i')";
    // echo $i."<br>";
    if(mysqli_query($conn,$sql)){
        // echo "inserted $i <br>";
        $ij = $i/10;
        echo "<script>document.getElementById('load').style.width = '$ij%'</script>";
    }else{
        echo mysqli_error($conn) . "<br>";
        die();
    }
    
}
echo "<script>document.getElementById('load').innerHTML = 'INSERTING COMPLETIED SUCCESSFULY'</script>";
?>
</body>
</html>
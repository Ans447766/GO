<?php
$con = mysqli_connect("localhost","root","","forTest");
if(!$con){
    echo mysqli_error($con);
    die();
}
for($i = 1;$i < 100;$i++){
    $sql = "INSERT INTO test (`name`,`descriptions`,`class`,`phn`,`email`,`address`) VALUES ('User$i','desc$i','1$i','$i$i$i$i$i$i','$i@$i.com','lahore home $i')";
    // echo $i."<br>";
    if(mysqli_query($con,$sql)){
        echo "inserted $i <br>";
    }else{
        echo mysqli_error($con) . "<br>";
    }
    
}
?>
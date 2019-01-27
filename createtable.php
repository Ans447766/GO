<html>
<head>
    <style>
    body{
        background-color:lightblue;
    }
    #load{
        background-color:blue;
        height:100%;
        width:0%;
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
    a{
        color:blue;
    }
    </style>
</head>
<body>
<?php
include 'connection.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE test (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30),
descriptions VARCHAR(30),
class VARCHAR(50),
phn VARCHAR(50),
email VARCHAR(50),
`address` VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table test created successfully <br>
    <a href='go.php'>View</a><br><a href='insert fake.php'>insert fake data</a>
    ";
} else {
    echo "Error creating table: " . $conn->error;
    echo "<br><a href='go.php'>View</a><br><a href='insert fake.php'>insert fake data</a>";
}

$conn->close();
?>
</body>
</html>
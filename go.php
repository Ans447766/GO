<html>
    <head>
        <style>
        body{
            font-family:monospace;
            font-size:20px;
        }
        .update{
            background-color:#c8e9ff;
            color:black;
            border-radius:4px;
            padding:4px;
        }
        .delete{
            background-color:red;
            color:white;
            border-radius:4px;
            padding:4px;
        }
        table tr td{
            border-collapse:collapse;
            border:0px;
        }
        table tr:nth-child(even){
            background-color:#fff;
        }
        </style>
    </head>
<?php
// include 'connection.php';
$conn = mysqli_connect('localhost','root','','forTest');if(!$conn){die();}
//database MYSQL
//del, edit, add, and run query
function run($conn,$sql){
    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return mysqli_error($conn);
    }
}
//get result
function getResult($conn,$sql){
    if($r = mysqli_query($conn,$sql)){
        return array(true,$r);
    }else{
        return array(false,mysqli_error($conn));
    }
}
//insert
function insertJson($json){
    
}
//get table view
function getTable($conn,$sql,$headings = null,$admin = false){
    if (null === $headings) {
        $headings = "HEADINGS NOT PROVIDED";
    }
    $res = getResult($conn,$sql);
    if($res[0]){
        $noOfCols = mysqli_num_fields($res[1]);
        $noOfRows = mysqli_num_rows($res[1]);
        if($noOfRows > 0){
            echo "<table><tr>";
            $hs = explode(',',$headings);
            foreach ($hs as $key => $value) {
                if(Count($hs) == 1 AND true === $admin){
                    $x = $noOfCols + 2;
                    echo "<th colspan='$x'>$value</th>";
                }elseif(Count($hs) == 1 AND true !== $admin){
                    echo "<th colspan='".$noOfCols."'>$value</th>";
                }else{
                    echo "<th>$value</th>";
                }
            }
            echo "</tr>";
            for($a = 0;$a < $noOfRows;$a++){
                //each row here
                while($row = mysqli_fetch_array($res[1])){
                    echo '<tr>';
                    for($b = 0;$b < $noOfCols;$b++){
                        echo '<td>'.$row[$b].'</td>';
                    }
                    if(true === $admin){
                        echo "<td row-id='{$row[0]}' class='update'>UPDATE</td><td row-id='{$row[0]}' class='delete'>DELETE</td>";
                    }
                    echo '</tr>';
                }
            }
            echo "</table>";
        }else{
            echo "0 results";
        }
    }else{
        echo mysqli_error($conn);
    }
}
//getList($conn,$sql,$tag) function if $tag = u:unorder list will print if o:ordered list will print if d:datalist will print if (default)b:line breaks will print.
function getList($conn,$sql,$tagging = 'b'){
    $res = getResult($conn,$sql);
    if($res[0] === true){
        if(preg_match('/SELECT/',$sql) AND preg_match('/FROM/',$sql) AND !preg_match('/ id /',$sql)){
            function viewList($res,$tag){
                if ($res->num_rows > 0) {
                    // output data of each row
                    while($row = $res->fetch_array()) {
                        if($tag == 'option'){
                            if(array_key_exists(1,$row)){
                                echo "<$tag value='".$row[1]."' data-id='".$row[0]."'>";
                            }else{
                                echo "<$tag value='".$row[0]."'>";
                            }
                        }else{
                            if(array_key_exists(1,$row)){
                                echo "<$tag data-id='".$row[0]."'>".$row[1]."</$tag>";
                            }else{
                                echo "<$tag>".$row[0]."</$tag>";
                            }
                        }
                    }
                } else {
                    die();
                }
            }
            switch ($tagging) {
                case 'l'://means list
                $tag = 'li';
                break;
                case 's'://means span
                $tag = 'span';
                break;
                case 'dt'://means datalist
                $tag = 'option';
                break;
                default:
                $tag = 'div';
                break;
            }
            viewList($res[1],$tag);
        }else{
            die('only select query allowed must not containe id individually');
        }
    }else{
        echo $res[1];
    }
}

// VIEW PAGE LINKED BELOW .....
include 'view.php';
?>
</html>

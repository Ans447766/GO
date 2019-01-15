<?php
include 'connection.php';
//database MYSQL
    //insert
    function insertJson($json){

    }
    //get table view
    function getTable($conn,$sql,$headings = null,$admin = false){
        if (null === $headings) {
            $headings = "HEADINGS NOT PROVIDED";
        }
        $res = mysqli_query($conn,$sql);
        if($res){
            $noOfCols = mysqli_num_fields($res);
            $noOfRows = mysqli_num_rows($res);
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
                    while($row = mysqli_fetch_array($res)){
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
    //del, edit, add, and run query
    function run($conn,$sql){
        if(mysqli_query($conn,$sql)){
            return true;
        }else{
            return mysqli_error($conn);
        }
    }

    //date and time

// EXAMPLES
getTable($conn,"SELECT * FROM test",null,true);

//



?>

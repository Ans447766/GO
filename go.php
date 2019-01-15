<?php
include 'connection.php';
//database
    //insert
    function insert($json){

    }
    //get table view
    function getTable($conn,$sql,$headings){
        $res = mysqli_query($conn,$sql);
        if($res){
            $noOfCols = mysqli_num_fields($res);
            $noOfRows = mysqli_num_rows($res);
            if($noOfRows > 0){
                echo "<table><tr>";
                $hs = explode(',',$headings);
                foreach ($hs as $key => $value) {
                    echo "<th>".$value."</th>";
                }
                echo "</tr>";
                for($a = 0;$a < $noOfRows;$a++){
                    //each row here
                    while($row = mysqli_fetch_array($res)){
                        echo '<tr>';
                        for($b = 0;$b < $noOfCols;$b++){
                            echo '<td>'.$row[$b].'</td>';
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
    //run query
    function run($conn,$sql){
        if(mysqli_query($conn,$sql)){
            return true;
        }else{
            return mysqli_error($conn);
        }
    }
    //edit
    //update
    //del
//date and time


//



?>

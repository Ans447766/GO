<?php
include 'connection.php';
//database
    //insert
    function insert($json){

    }
    //get table view
    function getTable($conn,$sql,$headings){
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $noOfCols = ;
        $noOfRows = $res -> num_rows;
        if($row > 0){
            echo "<table><tr>";
            $hs = explode(',',$headings);
            foreach ($hs as $key => $value) {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            for($a = 0;$a < $noOfRows;$a++){
                //each row here
                echo '<tr>';
                for($b = 0;$b < $noOfCols;$b++){
                    echo '<td>'.$row[].'</td>';
                }
                echo '</tr>';
            }
            echo "</table>";
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

<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //This is for testing purposes
   // $tbl = "tbl_marvel";
    //getAll($tbl);

    /*$tbl = "tbl_marvel";
    $col = "marvel_id";
    $id = "1";
    getSingle($tbl, $col, $id);
    */

    //Get all of something
    function getAll($tbl) {
        include("connect.php");
        $queryAll = "SELECT * FROM {$tbl}";
        //echo $queryAll;
        $runAll = mysqli_query($link, $queryAll);
        if($runAll){
            return $runAll;
        }else{
            $error = "there is an error ";
            return $error;
        }
        mysqli_close($link);
    }


?>
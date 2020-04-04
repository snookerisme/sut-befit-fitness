<?php
require ("config.php");
    $response = 0;
    $id = $_GET['code_fitness'];

    $sql = "SELECT * FROM fitness WHERE id = ".$id;
    $result = mysqli_query($conn,"set NAMES utf8");
    $result = mysqli_query($conn,$sql);
   
    $output = array();
   // if($id=$result['code_fitness']){
        $output = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($output);
    /*}else{
        $out = 1;
        echo $out;
    }*/
    
    $conn->close();
?>
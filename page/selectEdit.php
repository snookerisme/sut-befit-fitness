<?php
require ("config.php");
    $response = 0;
    $id = $_GET['id'];

    $sql = "SELECT * FROM booking WHERE id = ".$id;
    $result = mysqli_query($conn,"set NAMES utf8");
    $result = mysqli_query($conn,$sql);
   
    $output = array();
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
    $conn->close();
?>
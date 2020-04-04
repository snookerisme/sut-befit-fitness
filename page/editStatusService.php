<?php
require ("config.php");
    $data = json_decode($_GET["json"], false);
    $response = 0;
    $id = $data->id;
    $day = $data->day;
    $time = $data->time;
    $user = $data->user;
    $ex = $data->ex;
    $status = $data->status;
     
     $sql = "UPDATE booking "
            ."SET booking_day = '".$day."' ,"
            ."booking_time = '".$time."' ,"
            ."booking_user = '".$user."' ,"
            ."code_exercise = '".$ex."' ,"
            ."status = '" .$status."' "
            ."WHERE id = '".$id."'";

     $result = mysqli_query($conn,"set NAMES utf8");
     $result = mysqli_query($conn,$sql);

	 if($result){
        $response =  1;
     }else{
        $response = 2;
     }
     echo "".$response;
	 $conn->close();
?>
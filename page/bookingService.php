<?php
require ("config.php");
	 $str = $_GET['str'];
     $sql = "SELECT * FROM booking WHERE code_exercise = ".$str;
     $result = mysqli_query($conn,"set NAMES utf8");
	 $result = mysqli_query($conn,$sql) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
     while($row = mysqli_fetch_array($result)) {
   
        $sql2 = "SELECT * FROM exercise_machine WHERE code_exercise = ".$str;
        $result2 = mysqli_query($conn,$sql2) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql2");
        while($row2 = mysqli_fetch_array($result2)) {
                    echo '<tr>';
                    //echo '<td>'.$_SESSION["id"].'</td>';
                    echo '<td>'.$row["code_exercise"].'</td>';
                    echo '<td>'.$row2["name_exercise"].'</td>';
                    echo '<td>'.$row["id_mem"].'</td>';
                   // echo '<td>'.$row3["name"]." - ".$row3["lastnamee"].'</td>';
                    echo '<td>'.$row["booking_day"].'</td>';
                    echo '<td>'.$row["booking_time_start"].'</td>';
                    echo '<td>'.$row["booking_time_end"].'</td>';
                    if($row["booking_status"] == 'running'){
                        echo '<td><button type="button" class="btn btn-danger disabled btn-sm">'.$row["booking_status"].'</button></td>';
                    }else if($row["booking_status"] == 'booking'){
                        echo '<td><button type="button" class="btn btn-warning disabled btn-sm">'.$row["booking_status"].'</button></td>';
                    }else if($row["booking_status"] == 'empty'){
                        echo '<td><button type="button" class="btn btn-success disabled btn-sm">'.$row["booking_status"].'</button></td>';
                    }
                    echo "<td><button type='button' class='btn btn-primary' onclick='editStatus(".$row['id'].")'>Edit</button></td>";
                    echo '</tr>';
            //}
        
            
			//echo 'hello';

        }
   
           
		
	
	 }
     $conn->close(); 
     ?>


<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
            
        </div>


     

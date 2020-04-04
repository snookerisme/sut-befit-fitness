<?php
require ("config.php");
	 $date = $_GET['date'];
	 $sql = "SELECT * FROM checkIn WHERE date = ".$date;
	 $result = mysqli_query($conn,$sql) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
	 while($row = mysqli_fetch_array($result)) {

        /*$sql2 = "SELECT * FROM fitness WHERE code_fitness = ".$row['code_fitness'];
        $result2 = mysqli_query($conn,$sql2) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql2");
        while($row2 = mysqli_fetch_array($result2)) {*/


            echo "<tr>";
                echo "<td>".$row['id_mem']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['time']."</td>";
               // echo "<td>".$row['code_fitness']." - ".$row2['name_fitness']."</td>";
                echo "<td>".$row['code_fitness']."</td>";
                echo "<td><button type='button' class='btn btn-success' onclick='showDetail(".$row['id'].")'>รายละเอียด</button>&nbsp;";
                echo "<button type='button' class='btn btn-success' onclick='showDataFitness(".$row['id'].")'>ข้อมูลฟิตเนส</button></td>";

                //echo "<button type='button' class='btn btn-success' onclick='showDataFitness(".$row['code_fitness'].")'>ข้อมูลฟิตเนส</button></td>";
            echo "</tr>";

     //   }
        /*$output = array();
        $output = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($output);
        $conn->close();*/
		
	
	 }

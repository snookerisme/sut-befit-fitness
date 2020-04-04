<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='https://fullcalendar.io/js/fullcalendar-3.8.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://fullcalendar.io/js/fullcalendar-3.8.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='https://fullcalendar.io/js/fullcalendar-3.8.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-3.8.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-3.8.0/fullcalendar.min.js'></script>
<script>

<?php

//Database
$data = array();
$title = '';

$link = mysqli_connect("localhost", "root", "", "sutbefit");

mysqli_set_charset($link, 'utf8');

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$query = "SELECT id,code_exercise,booking_time_start,booking_time_end,id_mem FROM booking";
if ($result = $link->query($query)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
       // $title = $result['code_exercise'] + $result['id_mem'];
       $data[] = array(
        'id' => $obj->id,
        'title'=> $obj->code_exercise,
        'start'=> $obj->booking_time_start,
        'end'=> $obj->booking_time_end
                    );
    }

    /* free result set */
    $result->close();
}

mysqli_close($link);

/*
$array = array(
            array('title'=> 'Long Event',
                    'start'=> '2015-02-07',
                    'end'=> '2015-02-10'),
            array('id'=> 999,
                    'title'=> 'Repeating Event',
                    'start'=> '2015-02-16T16:00:00')
         );
         */

?>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '<?php echo date('Y-m-d');?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?php echo json_encode($data);?>
      
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>    
</head>
    
    
    <?php
           /* require ("config.php");
            function search_exercise($conn){
            $output='';
            $sql = "SELECT * FROM exercise_machine  ";
            $result = mysqli_query($conn,$sql) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
            while($row = mysqli_fetch_array($result)) {
                $sql2 = "SELECT * FROM booking WHERE id = ".$row["id"];
                $result2 = mysqli_query($conn,$sql2) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql2");
                while($row2 = mysqli_fetch_array($result2)){
                    $output .= '<option value="'.$row["code_exercise"].'">'.$row2["code_exercise"].' '.$row["name_exercise"].'</option>';

                }

            }
            return $output;
        }
        */
        
    ?>

  
       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตรวจสอบข้อมูลการจอง</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--<div class="row w3-center">
          
            </div>
            <center>
                <select id="searchBooking"  name="searchBooking" onchange="searchBooking(this.value)"> 
                        <option value="">กรุณาเลือกเครื่องอุปกรณ์ออกกำลังกาย</option>   
                        <?php// echo search_exercise($conn); ?>
                </select>
                <br/><br/>
                <table width="100%" class="table table-striped table-bordered table-hover"  >
                    <tr>
                        <td><b>รหัสเครื่องอุปกรณ์ออกกำลังกาย</b></td>
                        <td><b>ชื่อเครื่องอุปกรณ์ออกกำลังกาย</b></td>
                        <td><b>ชื่อผู้ใช้ที่จอง</b></td>
                        <td><b>วันที่จอง</b></td>
                        <td><b>เวลาที่เริ่มจอง</b></td>
                        <td><b>เวลาที่เลิกจอง</b></td>
                        <td><b>สถานะการจอง</b></td>

                        <td></td>

                    </tr>
                    <tbody id="showdata" class="center">
                    </tbody>

                                
                </table>
                
            </center>-->
            <div id='calendar'></div>
     
       
        </div>

        <!-- Modal -->
<div class="modal fade" id="editBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title" id="editModalLabel" style="display:none">แก้ไขสถานะการจอง</h4>
            </div>
            <div class="modal-body">
                <div class="row padding-row" id="rowCode" style="display:none">
                    <div class="col-md-3 text-right">
                        รหัสการจอง :
                    </div>
                    <div class="col-md-8 ">
                        <input class="form-control" id="idBooking" disabled/>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row padding-row">
                    <div class="col-md-3 text-right">
                        ชื่อผู้ใช้ที่จอง­ :
                    </div>
                    <div class="col-md-8 ">
                        <input class="form-control" id="userBooking" disabled/>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row padding-row">
                    <div class="col-md-3 text-right">
                        วันที่จอง­ :
                    </div>
                    <div class="col-md-8 ">
                        <input class="form-control" id="dayBooking" disabled/>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row padding-row">
                    <div class="col-md-3 text-right">
                        เวลาที่จอง :
                    </div>
                    <div class="col-md-8 ">
                        <input class="form-control" id="timeBooking" disabled/>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row padding-row">
                    <div class="col-md-3 text-right">
                        เครื่องออกกำลังกายที่จอง :
                    </div>
                    <div class="col-md-8 ">
                        <input class="form-control" id="exBooking" disabled/>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row padding-row">
                    <div class="col-md-3 text-right">
                        สถานะการจอง :
                    </div>
                    <div class="col-md-8 ">
                        <input class="form-control" placeholder="กรอกสถานะการจอง (running, booking หรือ empty)..." id="statusBooking">
                        </select>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <div class="modal-footer">
                <button id="saveEdit" type="button" class="btn btn-success" onclick="saveEdit()" style="display:none">บันทึก</button>              
                <button type="cancel" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
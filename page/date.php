
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
    background-color: #76b852;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>

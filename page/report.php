<!DOCTYPE html>
<html>
<title>BeFit</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item"><strong>&nbsp;&nbsp;Admin: UserName</strong></span><a href="index.php" class="w3-bar-item w3-button w3-right"><!--<span class="w3-bar-item w3-right">-->Logout<!--</span>--></a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/logo.png" class="w3-circle w3-margin-center" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      
    <span><strong><h2>BeFit Fitness</h2></strong></span><br>
    <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Profile</a>-->
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="home.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i>  Home</a>
    <a href="booking.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-calendar-check-o"></i>  Booking Information</a>
    <a href="cancelbooking.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-minus-o"></i>  Cancel Booking</a>
    <a href="member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Member Information</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Exercise Machine Information</a>-->
    <a href="qrcode.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-qrcode fa-fw"></i>  QR Code</a>
    <a href="task.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Report a Problem</a>
    <a href="report.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-bar-chart"></i>  Report</a>

    <br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<style>
.dotU {
    height: 10px;
    width: 10px;
    background-color: #f44336;
    border-radius: 50%;
    display: inline-block;
}
.dotB {
    height: 10px;
    width: 10px;
    background-color: #ff9800;
    border-radius: 50%;
    display: inline-block;
}
.dotE {
    height: 10px;
    width: 10px;
    background-color: #4CAF50;
    border-radius: 50%;
    display: inline-block;
}
</style>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-bar-chart"></i> Report</b></h5>
  </header>


  <div class="w3-panel w3-center">
          <!--<div class="w3-twothird ">-->
          <form name='bookingform'>

            <select class="w3-white" name="exMachine" >
            <option value="" disabled selected>Select a Report</option>
            <option value="1">รายงานยอดการเข้าใช้งาน Fitness</option>
            <option value="2">รายงานยอดการใช้งาน Fitness Application </option>
            <option value="3">รายงานยอดการจองของแต่ละเครื่องออกกำลังกาย</option>
            <option value="4">รายงานยอดการใช้งานของแต่ละบุคคลที่เป็นสมาชิก</option>
            </select>
            </from>
            
            <br/><br/>
        
            <center><div id="piechart"></div></center>
          
        <!--</div>-->
      </div>
      
      
    
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
  ['Rowing Machine', 8],
  ['Treadmill', 15],
  ['Spin Bike', 10],
  ['Upright Bike', 10],
  ['Elliptical', 20]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'ยอดการจองเครื่องออกกำลังกายต่อวัน', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>



</body>
</html>

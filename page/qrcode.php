<!DOCTYPE html>
<html>
<title>BeFit</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="qrcode/jquery.min.js"></script>
<script type="text/javascript" src="qrcode/qrcode.js"></script>


<style type="text/css">
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
    <a href="booking.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-check-o"></i>  Booking Information</a>
    <a href="cancelbooking.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-minus-o"></i>  Cancel Booking</a>
    <a href="member.php" class="w3-bar-item w3-button w3-padding  "><i class="fa fa-users fa-fw"></i>  Member Information</a>
    <!--<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Exercise Machine Information</a>-->
    <a href="qrcode.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-qrcode fa-fw"></i>  QR Code</a>
    <a href="task.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Report a Problem</a>
    <a href="report.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart"></i>  Report</a>

    <br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-qrcode fa-fw"></i> Create QR Code</b></h3>
  </header>
<center> 
    <from name="creatQRCode">

    <input id="text" type="text"style="width:50%" value="Enter URL or Text..." /><br />
    <div id="qrcode" style="width:1000px; height:1000px; margin-top:15px; "></div>
    </from>
</center>

<script  type="text/javascript">
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

var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});

</script>



</body>
</html>

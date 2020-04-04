<!DOCTYPE html>
<html lang="en" >
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/index.js"></script>
<script src="../js/login.js"></script>
<script src="../js/sweetalert2.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>


<head>
  <meta charset="UTF-8">
  <title>BeFit</title>
      <link rel="stylesheet" href="../css/style.css">
      <link href="../css/sweetalert2.css" rel="stylesheet" type="text/css">

</head>
<body>

  <div class="login-page">

  <div class="form">
    
	<img src="../img/logo2.png" weight="300" height="100"/><br/>
	<h3>ลงชื่อเข้าใช้</h3>
      <input type="text" placeholder="ชื่อผู้ใช้" id="username"/>
    <input type="password" placeholder="รหัสผ่าน" id="password"/>
    <div class="form-group" id="textWarning" style="display: none;">
      <label style="color:#4CAF50;font-size: 10px">กรุณากรอกชื่อผู้ใช้และรหัสผ่าน</label>
    </div> <br/>
	  <button id="login" onclick="goToLogin()">เข้าสู่ระบบ</button>	 
      <p class="message"><a href="#">ลืมรหัสผ่าน ?</a></p>
  </div>
</div>
  




</body>

</html>





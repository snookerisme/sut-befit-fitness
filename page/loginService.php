<?php
require ("config.php");
	 $username = $_GET['username'];
	 $password = $_GET['password'];
	 $sql = "SELECT count(id) as count FROM user WHERE username = ".$username." AND password = ".$password;
	 $result = mysqli_query($conn,$sql) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
	 while($row = mysqli_fetch_array($result)) {

		
			echo ''.$row['count'];
			//echo 'hello';
		
	
	 }
	 $conn->close();


	 /* include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die("MySQL error: " . mysqli_error($db) . "<hr>\nQuery: $sql");  
      $row = mysqli_fetch_array($result);
      if(!$row){
		$message = "Username and Password Incorrect!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	  }else{
		
		$_SESSION["user_type"] = $row["user_type"];
		if($row["user_type"] == "Admin")
		{
			header("location:home.php");
		}
		else if($row["user_type"] == "AdminApp")
		{
			header("location:homeAdminApp.php");
		}else {
			$message = "You not Admin!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	  }
		  
   }*/
?>


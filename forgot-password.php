<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reset</title>
		<link rel="stylesheet" href="css/style.css">
		<link href="css/font-awesome.min.css" rel="stylesheet">

	</head>
	<body>
		<div class="login">
			<h1>RESET PASSWORD</h1>
      <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
				<form role="form" action="" method="post" id="" name="login">
					<label for="username">
						<i class="fa fa-envelope"></i>
					</label>
					<input type="email" name="email" placeholder="Email" id="email" required>
					<label for="password">
						<i class="fa fa-lock"></i>
					</label>
					<input type="number" name="password" placeholder="Phone Number"  required>
					<input type="submit" value="Reset" name="login">
				</form>
				</div>
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	session_start();
	// error_reporting(0);
	include('includes/dbconnection.php');
	if (strlen($_SESSION['sessionid']==0))
	{
		header('location:logout.php');
	}
	else
	{
		$userid=$_SESSION['sessionid'];
		$query=mysqli_query($con,"SELECT  role  FROM tbluser WHERE  ID ='$userid' ");
		$result=mysqli_fetch_array($query);
		$role =  $result['role'];
	}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>INFORSERVE</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/forms.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<script src="jquery-3.5.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

		
		
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-hospital-o"></i>
				<span>INFORSERVE</span>
			</div>
			<!-- <img src="big.jpg" alt=""> -->
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-hospital-o"></i>
				<span>INFORSERVE</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="dashboard.php">
							<span><i class="fa fa-tachometer"></i></span>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="manage-patients.php">
							<span><i class="fa fa-users"></i></span>
							<span>Patients</span>
						</a>
					</li>
					
					<?php  
						if($role < 2){
							?>
							<li>
								<a href="add-patient.php">
									<span><i class="fa fa-user"></i></span>
									<span>New Patient</span>
								</a>
							</li>
							<li>
								<a href="add-hospital.php">
									<span><i class="fa fa-plus-square"></i></span>
									<span>New Hospital</span>
								</a>
							</li>
						<?php } ?>		
					<li>
							<a href="add-user.php">
								<span><i class="fa fa-plus"></i></span>
								<span>New User</span>
							</a>
						</li>		
					
					<li>
						<a href="manage-hospitals.php">
							<span><i class="fa fa-hospital-o"></i></span>
							<span>Hospitals</span>
						</a>
                    </li>
                    <li>
						<a href="user-profile.php">
							<span><i class="fa fa-power-off"></i></span>
							<span>Update Profile</span>
						</a>
                    </li>
                    <li>
						<a href="change-password.php">
							<span><i class="fa fa-clone"></i></span>
							<span> Change Password</span>
						</a>
                    </li>
                    <li>
						<a href="logout.php">
							<span><i class="fa fa-power-off"></i></span>
							<span>Logout</span>
						</a>
                    </li>
				</ul>
			</nav>
		</div>
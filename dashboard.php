<?php
include('includes/dbconnection.php');
	$hospitalquery = "SELECT COUNT(*) FROM hospitals";
	$hospitalresult = mysqli_query($con,$hospitalquery);
	$hospitalCount = mysqli_fetch_array($hospitalresult)[0];

	$usersquery = "SELECT COUNT(*) FROM tbluser";
	$usersresult = mysqli_query($con,$usersquery);
	$usersCount = mysqli_fetch_array($usersresult)[0];

	$patientsquery = "SELECT COUNT(*) FROM patients";
	$patientsresult = mysqli_query($con,$patientsquery);
	$patientsCount = mysqli_fetch_array($patientsresult)[0];
	
	$activePatientsquery = "SELECT COUNT(*) FROM patients WHERE status = 1";
	$activePatientsresult = mysqli_query($con,$activePatientsquery);
	$activePatientsCount = mysqli_fetch_array($activePatientsresult)[0];


?>

<?php include 'includes/header.php';?>
		<div class="main-content">
			<div class="title">
				Analytics
			</div>
			<div class="main">
				<div class="widget" style="background-color:    #05A85C">
					<div class="title" style="background-color: #008C4D; color: #fff">Number of Patients</div>
					<i class="fa fa-users fa-5x" style="color: #49DE94; padding:10px"></i>
					<h1 style="margin-left:50%; font-size: 100px;  bottom: 50px; right: 5px; color:#28D17C;"><?php echo $patientsCount?></h1>
				</div> 
				<div class="widget" style="background-color:   #F2353C">
					<div class="title" style="background-color:  #E62020;color: #fff">Number of Hospitals</div>
					<i class="fa fa-h-square fa-5x" style="color: #FF4C52; padding:10px"></i>
					<h1 style="margin-left:50%; font-size: 100px; bottom: 50px; right: 5px; color:  #FF8589;"><?php echo $hospitalCount?></h1>

				</div>
				<div class="widget" style="background-color:  #247CF0">
					<div class="title" style="background-color: #0B69E3; color: #fff">Number of Doctors</div>
					<i class="fa fa-user-md fa-5x" style="color: #3E8EF7; padding:10px" ></i>
					<h1 style="margin-left:50%; font-size: 100px;  bottom: 50px; right: 5px; color: #B8D7FF;"><?php echo $usersCount?></h1>

				</div>
				<div class="main">
				<div class="widget" style="background-color: #EB2F71">
					<div class="title" style="color: #fff; background-color: #F74584">Active Patients</div>
					<i class="	fa fa-heart-o fa-5x" style="color: #e07bcf; padding:10px" ></i>
					<h1 style="margin-left:10%; font-size: 100px;  bottom: 50px; right: 5px; color:  #FF5E97;">
					<?php echo $activePatientsCount?></h1>
					
				</div>
				<div class="widget" style="background-color: #FAA700">
					<div class="title" style="background-color: #FCB900; color: #fff">Inactive Patients</div>
					<i class="fa fa-heartbeat fa-5x" style="color: #ff8c00; padding:10px" ></i>
					<h1 style="margin-left:50%; font-size: 100px;  bottom: 50px; right: 5px; color: #FFDC2E;">
					<?php echo $patientsCount -$activePatientsCount?></h1>

				</div>
				</div>
				
			</div>
		</div>
<?php include 'includes/footer.php';?>

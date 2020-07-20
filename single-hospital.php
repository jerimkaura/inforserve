<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sessionid']==0))
{
    header('location:logout.php');
} 
else
{
    $hospital_id = $_GET['hospital_id'];
    
    $query = "SELECT * FROM hospitals WHERE id ='$hospital_id'";    
    $result = mysqli_query($con,$query); 
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['hospital_name'];
        $regNo = $row['reg_number'];
        $county = $row['subcounty'];
        // $patientsNo = $row[''];
    }

    $patientsquery = "SELECT COUNT(*) FROM patients WHERE hospital_id = $hospital_id";
	$patientsresult = mysqli_query($con,$patientsquery);
    $patientsCount = mysqli_fetch_array($patientsresult)[0];
    
    $usersquery = "SELECT COUNT(*) FROM tbluser WHERE hospital_id = $hospital_id";
	$usersresult = mysqli_query($con,$usersquery);
	$usersCount = mysqli_fetch_array($usersresult)[0];

    ?>    
        <?php include 'includes/header.php';?>
        <div class="main-content">
            <div class="title">
                <?php echo  $name ?> Hospital Information.
            </div>
            <div class="main">
            <div class="widget" style="background-color:    #05A85C">
					<div class="title" style="background-color: #008C4D; color: #fff">Registration  Number</div>
					<i class="fa fa-users fa-5x" style="color: #49DE94"></i>
					<h1 style="margin-left:50%;   bottom: 50px; right: 5px; color:#28D17C;"><?php echo $regNo; ?></h1>
				</div> <div class="widget" style="background-color:    #05A85C">
					<div class="title" style="background-color: #008C4D; color: #fff">Number of Number of Medics</div>
					<i class="fa fa-users fa-5x" style="color: #49DE94"></i>
					<h1 style="margin-left:50%;   bottom: 50px; right: 5px; color:#28D17C;"><?php echo $usersCount; ?></h1>
				</div><div class="widget" style="background-color:    #05A85C">
					<div class="title" style="background-color: #008C4D; color: #fff">Current Capacity</div>
					<i class="fa fa-users fa-5x" style="color: #49DE94"></i>
					<h1 style="margin-left:50%;   bottom: 50px; right: 5px; color:#14D17C;"><?php echo $patientsCount; ?></h1>
				</div>
            <div class="profile">
                    <div class="patient-info">
                        <div class="info-one">
                            <h4>Name: <p><?php echo $name;?></p></h4>
                            <h4>RegNo: <p><?php echo $regNo;?></p></h4>
                            <h4>County: <p ><?php echo $county;?></p></h4>                         
                            <h4>Capacity: <p><?php echo $patientsCount;?></p></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    <?php include_once('includes/footer.php');?>     
   <?php
   
}
?>

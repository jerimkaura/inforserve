<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sessionid']==0))
 {
    header('location:logout.php');
    } else
{
    if(isset($_POST['change_info']))
    {
    $userid=$_SESSION['sessionid'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobno=$_POST['phone'];
    $username=$_POST['username'];
    $idnum=$_POST['idnumber'];
    $query=mysqli_query($con, "UPDATE tbluser SET FullName ='$fullname', MobileNumber='$mobno', Email='$email',Username='$username',ID_Number='$idnum' WHERE ID='$userid'");
    if ($query) {
    $msg="User profile has been updated.";
    }
    else
    {
    $msg="Something Went Wrong. Please try again.";
    }
    }       

?>

    <?php include 'includes/header.php';?>
		<div class="main-content">
			<div class="title">
				User Profile
			</div>
			<div class="main"> 
                <div class="form-container">
                    <p style="font-size:16px; color:green" align="center"> <?php if($msg){ echo $msg; }  ?> </p>
                    <?php
                        $userid=$_SESSION['sessionid'];
                        $ret=mysqli_query($con,"SELECT *FROM tbluser WHERE ID='$userid'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($ret))
                        {
                        ?>
                            <form role="form" method="post" action="" class="form">
                                <p class="form-title">Your Profile</p>
                                <div class="item">
                                    <label for="Fullname">Fullname:</label>
                                    <input type="text" name="fullname" value="<?php echo $row['FullName'];?>"  class="input" required>
                                </div>
                                <div class="item">
                                    <label for="email">Email:</label>
                                    <input type="email"class="input" value="<?php echo $row['Email'];?>" name="email" required>
                                </div>
                                <div class="item">
                                    <label for="phone">Mobile Number:</label>
                                    <input type="number"class="input" value="<?php echo $row['MobileNumber'];?>" name="phone" required>
                                </div>
                                <div class="item">
                                    <label for="username">Username:</label>
                                    <input type="text"class="input" value="<?php echo $row['Username'];?>" name="username" required>
                                </div>
                                <div class="item">
                                    <label for="idnumber">Id Number:</label>
                                    <input type="number"class="input" value="<?php echo $row['ID_Number'];?>" name="idnumber" required>
                                </div>
                                <div class="btn-block">
                                    <button type="submit" value="Submit" class="input button" name="change_info">Change</button>                   `
                                </div>
                </div>
                <?php } ?>
                            </form></div>
            </div>
        </div>
    <?php include_once('includes/footer.php');?>                  
    <?php 
}?>    
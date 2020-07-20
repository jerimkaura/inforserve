<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['sessionid']==0)) 
{
    header('location:logout.php');
}
 else
{
    if(isset($_POST['change_pass']))
    {
        $userid=$_SESSION['sessionid'];
        $cpassword=md5($_POST['currentpassword']);
        $newpassword=md5($_POST['newpassword']);
        $query=mysqli_query($con,"SELECT ID FROM tbluser WHERE ID='$userid' AND   Password='$cpassword'");
        $row=mysqli_fetch_array($query);
        if($row>0)
        {
            $ret=mysqli_query($con,"UPDATE tbluser SET Password='$newpassword' WHERE ID='$userid'");
            $msg= "Your password successully changed"; 
        }
        else
        {
        $msg="Your current password is wrong";
        }
    }

    
    ?>
    <script type="text/javascript">
        function checkpass()
        {
        if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
        {
        alert('New Password and Confirm Password field does not match');
        document.changepassword.confirmpassword.focus();
        return false;
        }
        return true;
        } 
    </script>
    
    <?php include 'includes/header.php';?>
		<div class="main-content">
			<div class="title">
                Change Password
			</div>
			<div class="main"> 
                <div class="form-container">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p> 
                    <form  role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
                        <p class="form-title">Change Your Password</p>
                        <div class="item">
                        <label for="current">Current Password:</label>
                            <input type="password" name="currentpassword"  class="input" required>
                        </div>
                        <div class="item">
                        <label for="new">New Password:</label>
                            <input type="password" name="newpassword" class="input" required>
                        </div>
                        <div class="item">
                        <label for="confirm">Confirm Password:</label>
                            <input type="password"class="input" required>
                        </div>
                        <div class="btn-block">
                        <button type="submit" value="Submit" class="input button" name="change_pass">Change</button>                   `
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php include_once('includes/footer.php');?>                  
    <?php 
}?>    
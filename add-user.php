<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sessionid']==0))
{
    header('location:logout.php');
}else{
    if(isset($_POST['add_user']))
    {
    
        $name=$_POST['name'];
        $mobno=$_POST['phone'];
        $email=$_POST['email'];
        $idnum = $_POST['id'];
        $password=md5($_POST['password']);
        $hospitalid = $_POST['hospital_id'];
        $username = $_POST['username'];
        $ret=mysqli_query($con, "SELECT Email FROM tbluser WHERE Email='$email' ");
        $result=mysqli_fetch_array($ret);
        if($result>0){
        $msg="This email  associated with another account";
        }
        else{
        $query=mysqli_query($con, "INSERT INTO tbluser(FullName, MobileNumber, Email,  Password,hospital_id,ID_Number,Username) VALUES('$name', '$mobno', '$email', '$password','$hospitalid','$idnum','$username' )");
        if ($query) {
        echo "You have successfully registered";
        // header('location:index.php');
        }
        else
        {
            echo "Something Went Wrong. Please try again".mysqli_error($con);
        }
        }
    }
    
     ?>
  <?php include 'includes/header.php';?>
  <div class="main-content">
            <div class="title">
				Add New User
			</div>
			<div class="main">
                <div class="form-container">
                    <form action="" method="post" class="form">
                        <p class="form-title">Add new User</p>
                        <div class="item">
                            <input type="text" name="name" placeholder="fullname" id="email" class="input" required>
                        </div>     
                        <div class="item">    
                            <input type="email" name="email" placeholder="Email" id="email" class="input" required>
                        </div>
                        <div class="item">
                            <input type="text" name="phone" placeholder="phone" id="phone" class="input" required>
                        </div>
                        <div class="item">
                            <input type="number" placeholder="ID Number" name="id" class="input" required>
                        </div> 
                        <div class="item">    
                            <input placeholder="Password" name="password" type="password" value="" required="true">                     
                        </div>                                 
                        <div class="item">    
                            <input type="password"  id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
                        </div>
                        <div class="item">    
                            <input type="text"  id="username" name="username" placeholder="usernaname" required="true">
                        </div>
                        <div class="item">  
                        <select name="hospital_id" id="input" class="input" required> 
                        <option value="">Select user's hospital</option>
                            <?php 
                                $query = "SELECT * FROM hospitals";
                                $result = mysqli_query($con,$query); 

                                while( $row = mysqli_fetch_assoc($result))
                                    {               
                                        $hos_id = $row['id'];
                                        $name = $row['hospital_name'];
                                        ?>
                                         <option value="<?php echo $hos_id; ?>"><?php echo $name; ?></option>
                            <?php   } ?>
                               
                        </select> 
                        </div>
                        <div class="btn-block">
                        <button type="submit" value="Submit" class="input button" name="add_user">Submit</button>                   `
                        </div>
                    </form>
                </div>
            </div>
        </div>   
        <?php include_once('includes/footer.php');?>                
        <?php }?>
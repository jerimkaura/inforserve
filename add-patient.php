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
        function add_patient()
            {
                global $con,$userid;
                $userid=$_SESSION['sessionid'];
                $hospiotalSql = "SELECT hospital_id FROM tbluser WHERE ID= '$userid'";
                $getHospitals = mysqli_query($con,$hospiotalSql);
                $hospitalRow = mysqli_fetch_assoc($getHospitals);
                $hospitalID=$hospitalRow['hospital_id'];
                if(isset($_POST['add_patient'])){
                $name = $_POST['fullname']; 
                $dob = $_POST['dob']; 
                $residence = $_POST['residence']; 
                $guardian = $_POST['guardian']; 
                $phone = $_POST['phone'];
                $bloodgroup = $_POST['bloodgroup'];
                $gender = $_POST['gender'];
                $identification = $_POST['identification']; 


                $query = "INSERT INTO patients(patient_name,identification,blood,gender,phone,residence,guardian,hospital_id,dob) 
                VALUES('$name','$identification','$bloodgroup','$gender','$phone','$residence','$guardian','$hospitalID','$dob')";
                $result = mysqli_query($con,$query);

                if(!$result){
                    die("Error could not insert data  " .mysqli_error($con));
                }else{
                    echo "Data entered succesfully";
                    header('Location: dashboard.php');
                }
                }
            }
            add_patient();
   
 ?>
   <?php include 'includes/header.php';?>
        <div class="main-content">
            <div class="title">
				Add New Patient
			</div>
			<div class="main">
                <div class="form-container">
                    <form action="add-patient.php" method="post" class="form">
                        <p class="form-title">Add new patient</p>
                        <div class="item">
                            <input type="text" name="fullname" placeholder="Enter patient fullname" class="input" required>
                        </div>     
                        <div class="item">    
                            <input type="text" placeholder="Enter date of Birth" onfocus="(this.type  ='date')" onblur="(this.type  ='text')" name="dob" class="input" required>
                        </div>
                        <div class="item">
                            <input type="text"placeholder="Place of Residence " name="residence" class="input" required>
                        </div>    
                        <div class="item">    
                            <input type="text" placeholder="Guardian name" name="guardian" class="input" required>                     
                        </div>                                 
                        <div class="item">
                            <input type="number" placeholder="ID Number" name="identification" class="input" required>
                        </div> 
                        <!-- <div class="item">
                            <input type="file" accept="image/*"  placeholder="ID Number" capture="camera" />
                        </div>    -->
                        <div class="item">    
                            <input type="number" placeholder="Phone number in the format +254.." name="phone" class="input" required>
                        </div>
                        <div class="item">
                            <select name="bloodgroup" id="input" class="input"" required>
                                <option value="">Bloodgroup</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="item">
                            <select name="gender" id=""class="input" required>
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="btn-block">
                        <button type="submit" value="Submit" class="input button" name="add_patient">Submit</button>                   `
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php include_once('includes/footer.php');?>                
        <?php }?>
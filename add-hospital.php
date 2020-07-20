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
                global $con;
                if(isset($_POST['add_hospital'])){
                $name = $_POST['hospitalname']; 
                $reg_number = $_POST['regnumber']; 
                $subcounty = $_POST['subcounty']; 
                $date = date('Y-m-d');

                $query = "INSERT INTO hospitals(hospital_name,reg_number,subcounty,created_at) 
                VALUES('$name',' $reg_number',' $subcounty','$date')";
                $result = mysqli_query($con,$query);

                if(!$result){
                    die("Error could not insert data  " .mysqli_error($con));
                }else{
                    echo "Data entered succesfully";
                    header('Location: manage-hospitals.php');
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
                    <form action="add-hospital.php" method="post" class="form">
                        <p class="form-title">Add New Hospital</p>
                        <div class="item">
                            <input type="text" name="hospitalname" placeholder="Hospital Name" class="input" required>
                        </div>     
                        <div class="item">
                            <input type="text" placeholder="Registration Number" name="regnumber" class="input" required>
                        </div>
                        <div class="item">
                            <select name="subcounty" id="input" class="input" required>
                                <option value="">Subcounty</option>
                                <option value="rongo">Rongo</option>
                                <option value="awendo">Awendo</option>
                                <option value="sunaeast">Suna East</option>
                                <option value="ntimaru"> Ntimaru</option>
                                <option value="mabera">Mabera</option>
                                <option value="kuriawest">Kuria West</option>
                                <option value="kuriaeast">Kuria East</option>
                                <option value="nyatike">Nyatike</option>
                                <option value="sunawest">Suna West</option>
                                <option value="uriri">Uriri</option>
                            </select>              
                        <div class="btn-block">
                            <button type="submit" value="Submit" class="input button" name="add_hospital">Submit</button>                   `
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php include_once('includes/footer.php');?>                
        <?php }?>
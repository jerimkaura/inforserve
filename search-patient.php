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
        function delete_patient(){
           
        }
        function fetch_patient()
        {
            global $con,$total_pages,$pageno,$userid,$hospitalID;
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $userid=$_SESSION['sessionid'];
            $hospitalSql = "SELECT hospital_id FROM tbluser WHERE ID= '$userid'";
            $getHospitals = mysqli_query($con,$hospitalSql);
            $hospitalRow = mysqli_fetch_assoc($getHospitals);
            $hospitalID=$hospitalRow['hospital_id'];
            if(isset($_POST['idnumber'])) {      
                $idnum = $_POST['idnumber'];     
                $sql = "SELECT * FROM patients WHERE identification = '$idnum'";
            $res_data = mysqli_query($con,$sql);}
            $count = 0;
            if(!$res_data){
                echo $idnum; 
                echo $idnum; 
                die ("Error fetching data" .mysqli_error(($con)));
            }
           
            while( $row = mysqli_fetch_assoc($res_data))
            {                
                $id = $row['id'];
                $name = $row['patient_name'];
                $identification = $row['identification'];
                $bloodgroup = $row['blood'];
                $gender = $row['gender'];
                $phone = $row['phone'];
                $guardian = $row['guardian'];
                $residence = $row['residence'];
                $count = $count+1;
                ?>
                
                <tr>
                    <td data-label="Serial"><?php echo $count?></td>
                    <td data-label="name"><?php echo $name?></td>
                    <td data-label="identification"><?php echo $identification?></td>
                    <td data-label="phone"><?php echo $phone?></td>
                    <td data-label="residence"><?php echo $residence?></td>
                    <td data-label="guardian"><?php echo $guardian?></td>
                    <td data-label="action"><a href="single-patient.php?patient_id=<?php echo $id; ?>"><button style="padding:5px;">View</button></a></td>
                </tr>   
                
                <?php
            }
        }

        ?>

        <?php include 'includes/header.php';?>
        <div class="main-content">
            <div class="title">
                <!-- <div class="search-box">
                <form action="search-patient.php" class="search-box">
                    <input type="text" placeholder="Enter patient ID Number" name="idnumber">  
                    <button type="submit" value="Submit" name="search_patient">Submit</button>                   `
                    <i class="fa fa-search"></i>
                </form>
                </div> -->
			</div>
			<div class="main">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Phone Number</th>
                        <th>Residence</th>
                        <th>Guardian</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php              
                        fetch_patient();
                        ?>   
                                
                    </tbody>            
                </table>         
            </div>    
        </div>  
        <?php include_once('includes/footer.php');?>                 

        <?php
    }
    ?>
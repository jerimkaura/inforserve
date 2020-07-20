<?php
    session_start();
    if (!isset($_SESSION['patientId'])) {
        header("Location: dashboard.php");
    }

    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['sessionid']==0)) {
    header('location:logout.php');
    } else
    { 
        $patient_id = $_GET['patient_id'];
        if ($_SESSION['patientId'] != $patient_id) {
            header("Location: dashboard.php");
        }
        
        if(isset($_GET['patient_id']))
            {
                $query = "SELECT * FROM patients WHERE id ='$patient_id'";    
                $result = mysqli_query($con,$query); 
            }
        else
            {
                header('location:manage-patients.php');
            }
        
        ?>
        <?php 
            while($row = mysqli_fetch_assoc($result)){
                $patientName= $row['patient_name'];
                $patientEmail = $row['email'];
                $phoneNumber = $row['phone'];
                $idNumber = $row['identification'];
                $gender = $row['gender'];
                $guardian = $row['guardian'];
                $residence = $row['residence'];
                if($row['status'] ==1){
                    $status = "Active";
                }else{
                    $status = "Inactive";
                }
                $bloodgroup = $row['blood'];
                $date = $row['dob'];
            }
        ?>
        <?php include 'includes/header.php';?>
		<div class="main-content">
			<div class="title">
				Patient's Information
			</div>
			<div class="main"> 
                <div class="profile">
                    <div class="patient-photo">
                        <div class="profile-image">
                            <img src="assets/images/big.jpg" alt="">
                            <p> Name:  <?php echo $patientName;  ?></p>
                            <p>Phone:  <?php echo $phoneNumber;  ?></p>
                        </div>
                    </div>
                    <div class="patient-info">
                        <div class="info-one">
                            <h4>Name: <p><?php echo $patientName;?></p></h4>
                            <h4>IDNumber: <p><?php echo $idNumber;?></p></h4>
                            <h4>Gender: <p ><?php echo $gender;?></p></h4>
                            <h4>Status:<p style="color: #3bac2c; id="status";> <?php echo $status;?></p></h4>
                        </div>
                        <div class="info-two">                          
                            <h4>Guardian: <p><?php echo $guardian;?></p></h4>
                            <h4>Residence:<p> <?php echo $residence?></p></h4>
                            <h4>DoB: <p><?php echo $date;?></p></h4>
                            <h4>Bloodgroup:<p><?php echo $bloodgroup;?></p></h4>
                        </div>
                    </div>
                </div>
                <div class="info-header">
                    <ul>
                        <li><p><?php echo $patientName?>'s  Medical History</p></li> 
                        <li ><a href="record-visit.php?patient_id=<?php echo $patient_id?>" class="right"> <button>Record</button> </a></li>
                        <li><button  onclick="changeStatus()">Discharge</button> </a></li>
                        <script>
                            function changeStatus()
                            {
                                let xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function()
                                {
                                    if(this.readyState ==4 && this.status ==200)
                                    {
                                    document.getElementById("status").innerText = 0;
                                    }
                                };
                                xmlhttp.open("GET","change-status.php?patient_id=<?php echo $patient_id ?>", true);
                                xmlhttp.send();
                                let reload = window.location.reload();
                            }
                        </script>
                    </ul>                
                </div>
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Date Admited</th>
                        <th>Diagnosed With</th>
                        <th>Hospital Admitted</th>
                        <th>Medication</th>
                        <th>Date Discharged</th>
                    </thead>
                    <tbody>   
                        <?php 
                         if (isset($_GET['pageNo'])) {
                            $pageNo = $_GET['pageNo'];
                        } else {
                            $pageNo = 1;
                        }
                        $per_page = 10;
                        $offset = ($pageNo-1) * $per_page;   
                        $query = "SELECT COUNT(*) FROM tblvisits WHERE patient_id = '$patient_id'";
                        $result = mysqli_query($con,$query);
                        $rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($rows / $per_page);
                        $sql = "SELECT * FROM tblvisits WHERE patient_id = '$patient_id' ORDER BY visit_id DESC  LIMIT $offset, $per_page";
                        $result = mysqli_query($con,$sql);
                        $count= 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $date1 = $row['admision_date'];
                            $hospital = $row['hospital_id'];
                            $hssql = "SELECT * FROM hospitals WHERE id = '$hospital'";
                            $hsresult = mysqli_query($con,$hssql);
                            $hsRow = mysqli_fetch_assoc($hsresult);
                            $hsname = $hsRow['hospital_name'];
                            $medicine = $row['drugs'];
                            $disease = $row['diagnosed_with'];
                            $date2 = $row['date_discharged'];
                            $count+= 1;                                                
                        ?>                    
                        <tr>
                            <td data-label="Serial"><?php echo $count;?></td>
                            <td data-label="Date Admitted"><?php echo $date1; ?></td>
                            <td data-label="Disease"><?php echo $disease; ?></td>
                            <td data-label="Hospital"><?php echo $hsname; ?></td>
                            <td data-label="Medicine"><?php echo $medicine; ?></td>
                            <td data-label="Date Discharged"><?php echo $date2; ?></td>
                        </tr> 
                        <?php }?>                       
                    </tbody>  
                </table>      
            </div>
        </div>
        <?php include_once('includes/footer.php');?>                
    <?php
}?>               
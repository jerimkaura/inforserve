<?php  
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
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
            $userid=$_SESSION['sessionid'];
            $hospitalSql = "SELECT hospital_id FROM tbluser WHERE ID= '$userid'";
            $getHospitals = mysqli_query($con,$hospitalSql);
            $hospitalRow = mysqli_fetch_assoc($getHospitals);
            $hospitalID=$hospitalRow['hospital_id'];
            if(isset($_POST['idnumber'])) {      
                $idnum = $_POST['idnumber'];     
                $sql = "SELECT * FROM patients WHERE identification = '$idnum' ORDER BY id DESC";
            }else{
            
                $sql = "SELECT * FROM patients WHERE hospital_id = '$hospitalID'ORDER BY id DESC  ";
            }
            $res_data = mysqli_query($con,$sql);
            $count = 0;
            if(!$res_data){
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
                    <?php 
                        $query=mysqli_query($con,"SELECT  role  FROM tbluser WHERE  ID ='$userid' ");
                        $result=mysqli_fetch_array($query);
                        $role =  $result['role'];
                        if($role < 2 ){
                                ?>
                            <td data-label="action"><button id="<?php echo $id; ?>" class="modalButton" style="padding:5px;">View</button></td>
                        <?php } ?>                   
                    
                   
            </tr>                   
            <?php
            }
        }

        ?>
        <div id="authModal" class="authModal">
            <div class="authModal-content">
                <span id= "closeButton" class="closeButton">&times;</span>
                <p>Enter code sent to patient to view their profile</p>                            
                <input type ="number" id="inputCode" placeholder="Enter 6 digit code">
                <button id="codeButton" type="submit" >Submit</button>
            </div>
        </div> 
        <?php include 'includes/header.php';?>
           
        <div class="main-content">        
            <div class="title" id="title">
                <div class="search-box">
                <form action="" class="search-box" method="post">
                    <input   type="text" placeholder="<?php echo $code ?>" name="idnumber">                    
                    <button type="submit">Submit</button>                   
                    <i class="fa fa-search"></i>
                </form>
                </div>
			</div>
			<div class="main">
                <?php  $userid=$_SESSION['sessionid']; ?>
                <a href="patients-pdf.php?userid=<?php echo $userid?>" class="right" id="export"><button>Export</button> </a>
                <table class="table" id="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Phone Number</th>
                        <th>Residence</th>
                        <th>Guardian</th>
                        <?php 
                           if($role < 2 ){
                                ?>
                        <th>Action</th>
                           <?php }?>
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
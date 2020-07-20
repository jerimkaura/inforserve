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
        function fetch_hospital()
        {
            global $con,$userid,$hospitalID;
            $userid=$_SESSION['sessionid'];
            $per_page = 10;
            $offset = ($pageno-1) * $per_page;   
            $query = "SELECT COUNT(*) FROM hospitals";
            $result = mysqli_query($con,$query);
            $rows = mysqli_fetch_array($result)[0];
            $sql = "SELECT * FROM hospitals ORDER BY id DESC";
            $res_data = mysqli_query($con,$sql);
            $count = 0;
            if(!$res_data){
                die ("Error fetching data" .mysqli_error(($con)));
            }
            while( $row = mysqli_fetch_assoc($res_data))
            {            
                $hospitalID = $row['id'];    
                $name = $row['hospital_name'];
                $regnumber = $row['reg_number'];
                $subcounty = $row['subcounty'];
                $count = $count+1;
                ?>
                
                <tr>
                    <td data-label="Serial"><?php echo $count ?></td>
                    <td data-label="name"><?php echo $name?></td>
                    <td data-label="identification"><?php echo $regnumber?></td>
                    <td data-label="gender"><?php echo $subcounty?></td>
                 <td data-label="action"><a href="single-hospital.php?hospital_id=<?php echo $hospitalID ?>"><button style="padding:3px;">view</button></a></td>
                </tr>   
                
                <?php
            }
        }

        ?>

    <?php include 'includes/header.php';?>
        <div class="main-content">
            <div class="title">
                Hospitals' Records
            </div>
            <div class="main">
                <a href="hospital-pdf.php" class="right"><button>Export</button> </a>
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Hospital Name</th>
                        <th>Reg Number</th>
                        <th>SubCounty</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php              
                        fetch_hospital();
                        ?>                                   
                    </tbody>            
                </table> 
            </div>     
        </div>  
        <?php include_once('includes/footer.php');?>                 

        <?php
    }
    ?>
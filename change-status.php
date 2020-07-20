<?php
 session_start();
 // error_reporting(0);
 include('includes/dbconnection.php');
 if (strlen($_SESSION['sessionid']==0)) {
 header('location:logout.php');
 }else{
    $date = date("Y-m-d");
    $patient_id = $_GET['patient_id'];
    // $patient_id = 20;
    $query ="UPDATE patients  SET status = 0 WHERE id = '$patient_id'";    
    $result = mysqli_query($con,$query); 

    $queryLastVisistId = "SELECT MAX(visit_id) FROM tblvisits WHERE patient_id = '$patient_id'" ;
    $resultLastVisistId = mysqli_query($con, $queryLastVisistId);
    $row=mysqli_fetch_array($resultLastVisistId);
    $vistId = $row[0];

    $queryDate = "UPDATE tblvisits SET date_discharged = '$date' WHERE visit_id = ' $vistId' AND patient_id = '$patient_id' ";
    $resultDate = mysqli_query($con, $queryDate);
    echo $vistId;
?>
<?php
}?>
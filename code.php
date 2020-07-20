<?php
    session_start();
    include('includes/dbconnection.php');
    $patient_id = $_GET['patient_id'];
    $sql = "SELECT code FROM tblcodes WHERE patient_id = '$patient_id'";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_array($query);
    $code = $result[0];

    if ($code == $_GET['inputCode']) {
        echo 1;
        $_SESSION['patientId'] = $patient_id;
    } else {
        echo 0;
    }

    // print_r($_GET);
?>
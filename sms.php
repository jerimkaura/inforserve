<?php 
    require 'vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;
    
    include('includes/dbconnection.php');
    $patient_id = $_GET['patient_id'];
    $sql = "SELECT phone FROM patients WHERE id ='$patient_id' ";

    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $phoneNumber = $row['phone'];
    $randomid = mt_rand(100000,999999);   

    // Set your app credentials
    $username   = "hospicare";
    $apiKey     = "42983a3e1c4dc21db7a7be5552875bf3b0391d88a25c793e914c6cb99ecb188e";
    

    // Initialize the SDK
    $AT = new AfricasTalking($username, $apiKey);

    // Get the SMS service
    $sms        = $AT->sms();

    // Set the numbers you want to send to in international format
    $recipients =   $phoneNumber;

    // Set your message
    $message    = $randomid;

    // Set your shortCode or senderId
    //$from    = "Hospicare";

    try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
    'to'      => $recipients,
    'message' => 'Here is the access code from Hospicare '.$message.' If this code was requested without you consent, please igonore'
    //'from'    => $from
    ]);
    print_r($result['status']); 
    } catch (Exception $e) {
        //echo 'fail', $e->getMessage(); 
    }


    $query = "SELECT * FROM tblcodes WHERE patient_id = '$patient_id'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) == 0 ){
        $sql = "INSERT INTO tblcodes(code, patient_id) VALUES('$randomid','$patient_id')";
    }else {       
        $sql = "UPDATE tblcodes SET code = '$randomid' WHERE  patient_id = '$patient_id'";
    }  
    $query = mysqli_query($con, $sql);
    echo $randomid;

?>
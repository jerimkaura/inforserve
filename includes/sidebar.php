$patientsquery = "SELECT COUNT(*) FROM tbluser";
	$patientsresult = mysqli_query($con,$patientsquery);
	$patientsCount = mysqli_fetch_array($patientsresult)[0];
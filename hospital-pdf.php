<?php 
require ('fpdf.php');
include('includes/dbconnection.php');
$sql = "SELECT * FROM hospitals";
$query = mysqli_query($con,$sql);


$pdf = new FPDF();
$pdf-> AddPage();
$pdf->SetFont('Arial','',9);
$pdf->Cell(15,8,"S/NO",1);
$pdf->Cell(45,8,"Name",1);
$pdf->Cell(40,8,"Reg No.",1);
$pdf->Cell(40,8,"Subcounty",1);
$pdf->Cell(40,8,"Date Registered",1);
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $name = $row['hospital_name'];
    $number = $row['reg_number'];
    $subcounty = $row['subcounty'];
    $date = $row['created_at'];
    $pdf->Ln();
    $pdf->Cell(15,8,$id,1,0,'C');
    $pdf->Cell(45,8,$name,1);
    $pdf->Cell(40,8,$number,1);
    $pdf->Cell(40,8,$subcounty,1);
    $pdf->Cell(40,8,$date,1,0,'C');
    
}
   
$pdf->output();

?>
<?php
require '../../Libraries/fpdf/fpdf.php';

$refrenceNumber = "PCE/B1/383/2022-23";
$date = "13/09/2022";
$applicationID = "16";
$academicYear = "2022-23";
$company = "BARC";
$companyaddress = "BARC Training School, Anushakti Nagar, Mumbai-400 088 (MH)";
$coordinator = "The Office In-charge, Practical Training/Project work, HRDD, BARC";
$numInterns = 4; // Change this to the number of interns in the group
$start_date = "09/10/2022";
$end_date = "09/01/2023";
$internNames = array("Pratik Sunil Pendurkar", "Mohammad Faizan Mulla", "Ashish Faizan", "John Dope"); // Change these to the names of the interns
$degree = "Bachelor of Engineering";
$degreeYears = "4 Years";
$discipline = "Computer Engineering";

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetLeftMargin(25);
$pdf->SetRightMargin(25);
$pdf->SetTopMargin(25);

$pdf->AddPage();
$pdf->SetFont('Times', '');
$pdf->Cell(70, 20, "Ref. No.: " . $refrenceNumber, 0, 0, "L");
$pdf->Cell(90, 20, "Date: " . $date, 0, 1, "R");
$pdf->SetFont('Times', 'B');
$pdf->Cell(60, 6, "The Office In-charge,", 0, 1, "L");
$pdf->Cell(60, 6, "Practical Training/Project work,", 0, 1, "L");
$pdf->Cell(60, 6, "HRDD, BARC", 0, 1, "L");
$pdf->Cell(60, 6, $companyaddress, 0, 1, "L");
$pdf->SetFont('Times', '');
$pdf->Cell(0, 5, "", 0, 1);
$pdf->Cell(50, 15, "Subject :", 0, 0, "R");
$pdf->SetFont('Times', 'BU');
$pdf->Cell(80, 15, "Permission for Internship Training.", 0, 1, "L");
$pdf->SetFont('Times', '');
$pdf->Cell(70, 15, "Dear Sir,", 0, 1, "L");

$pdf->Write(8, "With reference to the above subject, the following students of Final Year Computer Engineering would like to undertake internship training in your esteemed organization:");
$pdf->Cell(0, 10, "", 0, 1);
$pdf->SetLeftMargin(35);
$pdf->SetFont('Times', 'B');
$pdf->Cell(10, 10, "1) Full Name of the Students:", 0, 1);
$pdf->SetLeftMargin(35);
for ($i = 0; $i < $numInterns; $i++) {
    $pdf->SetLeftMargin(45);  
    $pdf->Write(8, chr(97 + $i) . ") " . $internNames[$i]);
    $pdf->Ln(8);
}
$pdf->SetLeftMargin(35);
$pdf->Cell(0, 2, "", 0, 1);

$pdf->SetLeftMargin(35);
$pdf->Cell(0, 10, "2) Degree: " . $degree, 0, 1);
$pdf->Cell(0, 10, "3)Total No. of Years of the Degree Programme: " . $degreeYears, 0, 1);
$pdf->Cell(0, 10, "4) Discipline/Subject: " . $discipline, 0, 1);
$pdf->Cell(0, 10, "5) Desirable Period of Training/Internship: " . $start_date . " to " . $end_date, 0, 1);
$pdf->SetLeftMargin(25);
$pdf->SetFont('Times', '');
$pdf->Cell(0,5, "", 0, 1);
$pdf->Write(8, "We will be grateful if your esteemed organization would help us to provide practical training to our students.");
$pdf->Cell(0,10, "", 0, 1);
$pdf->Write(8, "This certificate is issued on request of the students for Internship purpose.");
$pdf->Cell(0, 10, "", 0, 1);
$pdf->Write(8, "Thank you.");
$pdf->Cell(0, 10, "", 0, 1);

$pdf->Cell(0, 10, "Yours faithfully,", 0, 1, "L");

$pdf->Output("I", "Intern_Application_" . $applicationID);
?>






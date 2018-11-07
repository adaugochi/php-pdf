<?php 
 require "db.php";

 	$query = "SELECT * FROM customer";
	$query_run = mysql_query($query);

 
require "fpdflibrary/fpdf.php";
	$pdf = new fpdf('p', 'mm', 'A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B', 12);
	$pdf->Cell(40,10,"FULL NAME",1,0);
	$pdf->Cell(60,10,"EMAIL",1,0);
	$pdf->Cell(40,10,"MOBILE NUMBER",1,0);
	$pdf->Cell(40,10,"DOB",1,1);

	$pdf->SetFont('Arial', '', 10);

		if (mysql_num_rows($query_run) != NULL) {
			while ($row = mysql_fetch_array($query_run)) {
				$pdf->Cell(40,10,$row['FullName'],1,0);
				$pdf->Cell(60,10,$row['Email'],1,0);
				$pdf->Cell(40,10,$row['MobileNumber'],1,0);
				$pdf->Cell(40,10,$row['DOB'],1,1);
			}
		}
	
	$pdf->OutPut();

?>
<?php 	
	use App\tbl_applicants;		
	use App\tbl_programmes;

	$appObj = tbl_applicants::find(15)->first();	

	
	$proObj = tbl_programmes::find($appObj->programme_id);	
	$programme_name = $proObj->programme_name;

	
	
	try{
		require('../public/assets/FPDF/fpdf.php');
				$surname 			= $appObj->surname;
				$first_name			= $appObj->first_name;
				$other_name 		= $appObj->other_name;
				$phone_number 		=$appObj->phone_number;
				$email_address 		=$appObj->email_address;
				$application_number = $appObj->application_number;
				$programme_id 		= $appObj->programme_id;

		$pdf = new FPDF();
		$pdf->AddPage();
		
			
			$pdf->Image('img/logo.jpg',95,5,20,20);
			//wa
			//$pdf->Image('img/logo.jpg',5,60,200,150);

			$pdf->setTextColor(21, 37, 79);
			$pdf->setFont('Arial','B','14');
			$pdf->Ln(15);
			$pdf->Cell(0,6,strtoupper('Grand Plus College of Health Tech and Management Sciences'),0,1,'C');
			$pdf->setFont('Arial','I','12');
			$pdf->Cell(0,5,'	(Advancing Health Innovation)',0,1,'C');
			$pdf->setFont('Arial','','12');
			$pdf->Cell(0,5,'P.M.B 12, ILORIN, KWARA STATE',0,1,'C');
			$pdf->setFont('Arial','B','14');
			$pdf->Cell(0,5,' 2020/2021 APPLICATION EXERCISE',0,1,'C');
			$pdf->Cell(65,10,'',0,0,'C');
			$pdf->setTextColor(255,255,255);
			$pdf->SetFillColor(21, 37, 79);
			$pdf->Cell(65,10,'Payment Instruction Slip',0,0,'C',1);
			$pdf->setFont('Times','B','12');	
			$pdf->Cell(0,10,'',0,1,'C');
			$pdf->setTextColor(21, 37, 79);
			$pdf->Ln(10);
			
			
			
			
			////// APPLICATION NUMBER
			$pdf->setFont('Arial','','10');
			$pdf->Cell(45,8,'Application Number: ',1,0,'L');
			$pdf->Cell(0,8,$application_number,1,1,'L');
			////// NAME
			$pdf->Cell(45,8,'Full Name: ',1,0,'L');
			$pdf->Cell(0,8,strtoupper($surname.' '.$first_name.' '.$other_name),1,1,'L');
			///// PROGRAMME NAME
			$pdf->Cell(45,8,'Programme: ',1,0,'L');
			$pdf->Cell(0,8,$programme_name,1,1,'L');
			/// EMAIL ADDRESS
			$pdf->Cell(45,8,'Phone Number: ',1,0,'L');
			$pdf->Cell(0,8,$phone_number,1,1,'L');
			
			/// EMAIL ADDRESS
			$pdf->Cell(45,8,'E-mail: ',1,0,'L');
			$pdf->Cell(0,8,$email_address,1,1,'L');
			$pdf->setTextColor(21, 37, 79);
			
			/// AMOUT PAYABLE
			$pdf->Cell(45,8,'Amout Payable: ',1,0,'L');
			$pdf->setFont('Arial','UB','10');
			$pdf->Cell(0,8,'N10,000',1,1,'L');
			$pdf->setTextColor(21, 37, 79);
			
			$pdf->setFont('Arial','','10');
			$pdf->Cell(45,8,'Payment Description: ',1,0,'L');
			$pdf->setFont('Arial','UB','10');
			$pdf->Cell(0,8,'Application Form Fee',1,1,'L');
			$pdf->setTextColor(21, 37, 79);
			
			
			$pdf->Ln(5);
			
			$pdf->setFont('Arial','UB','10');
			$pdf->Cell(0,5,'INSTRUCTIONS TO APPLICANTS:',0,1,'L');
			
			
			$pdf->setFont('Arial','','8');
			$pdf->Cell(0,4,'- All applicants are to print this slip and take it to any designated bank to make payment',0,1,'L');
			$pdf->Cell(0,4,'- Applicants are to write the application number above on the NAME OF DEPOSITOR\'s place on the bank teller',0,1,'L');
			$pdf->Cell(0,4,'- DO NOT WRITE YOUR NAME ON THE NAME OF DEPOSITOR PLACE  ON THE TELLER , WRITE YOUR APPLICATION NUMBER ONLY',0,1,'L');
			$pdf->Cell(0,4,'- Failure to comply with the instructions above, your application form will end up not being activated',0,1,'L');
			$pdf->Cell(0,4,'- All applicants are further instructed to return to their portal to complete their application and print acknowlegement slip',0,1,'L');
			$pdf->MultiCell(0,4,'- AFTER MAKING PAYMENT AND SUCCESSFUL COMPLETION OF APPLICATION ONLINE, APPLICANTS ARE TO SUBMIT THE ACKNOWLEGEMENT SLIP AND TELLER IN THE SCHOOL ','L');
			$pdf->Ln(3);
			
			$pdf->Cell(0,4,'- Applicants can make payment into the listed banks',0,1,'L');
			$pdf->Ln(10);
			
		
			
			
			////// APPLICATION NUMBER
			$pdf->setFont('Arial','B','10');
			$pdf->Cell(20,8,'   SN',1,0,'L');
			$pdf->Cell(45,8,'   Bank Name',1,0,'L');
			$pdf->Cell(65,8,'   Account Name ',1,0,'L');
			$pdf->Cell(0,8,'   Account Number ',1,1,'L');
			
			$pdf->setFont('Arial','','10');
			$pdf->Cell(20,8,'   1',1,0,'L');
			$pdf->Cell(45,8,'   GT Bank ',1,0,'L');
			$pdf->Cell(65,8,'   Account Name Here  ',1,0,'L');
			$pdf->Cell(0,8,'   xxxx-xxxx-xx ',1,1,'L');
			
			$pdf->Cell(20,8,'   2',1,0,'L');
			$pdf->Cell(45,8,'   UBA ',1,0,'L');
			$pdf->Cell(65,8,'   Account Name Here  ',1,0,'L');
			$pdf->Cell(0,8,'   xxxx-xxxx-xx ',1,1,'L');
			
			$pdf->Ln(10);
			$pdf->Cell(0,8,'** NB:',0,1,'L');
			$pdf->Output();
	}
	catch(Exception $e){
		dd($e);
	}
	
?>


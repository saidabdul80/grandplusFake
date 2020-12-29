<?php 
	use App\tbl_applicants;		
	use App\tbl_departments;		
	use App\tbl_lga;		
	use App\tbl_states;		
	use App\tbl_programmes;
	$appObj = tbl_applicants::find(session('id'))->first();	
	$deptObj = tbl_departments::get();



	$form_fee	 		= $appObj->form_fee;
	$surname 			= $appObj->surname;
	$first_name			= $appObj->first_name;
	$other_name 		= $appObj->other_name;
	$phone_number 		= $appObj->phone_number;
	$email_address 		= $appObj->email_address;
	$ss_email_address 	= $appObj->email_address;
	$application_number = $appObj->application_number;
	$programme_id 		= $appObj->programme_id;
	$biodata_status 	= $appObj->biodata_status;
	$result_status 		= $appObj->result_status;
	$print_ack_slip 	= $appObj->print_ack_slip;
	$passport_dd 		= $appObj->passport;
	$sex_dd 			= $appObj->sex;
	$marital_status 	= $appObj->marital_status;
	$date_of_birth_dd	= $appObj->date_of_birth;
	$state_id 			= $appObj->state_id;
	$lga_id 			= $appObj->lga_id;
	$address 			= $appObj->address;
	$sponsor_name 		= $appObj->sponsor_name;
	$sponsor_type 		= $appObj->sponsor_type;
	$nok_name 			= $appObj->nok_name;
	$nok_phone_number	= $appObj->nok_phone_number;
	$nok_relationship 	= $appObj->nok_relationship;
	$result_type_two 	= $appObj->result_type_two;
	$result_type_one 	= $appObj->result_type_one;
	$result_type_one_year = $appObj->result_type_one_year;
	$result_type_two_year = $appObj->result_type_two_year;
	$result_one_examination_number = $appObj->result_one_examination_number;
	$result_two_examination_number = $appObj->result_two_examination_number;
	$name = $surname.' '.$first_name.' '.$other_name;

	$lga_dd = tbl_lga::find($appObj->lga_id)->first()->name;
	$state_dd = tbl_states::find($appObj->state_id)->first()->id;
	$proObj = tbl_programmes::find($appObj->programme_id);	
	$programme_by_id = $proObj->id;
	$programme_name = $proObj->programme_name;

	
	
	require('../public/assets/FPDF/fpdf.php');
	
	try{
		$pdf = new FPDF();
		$pdf->AddPage();
		
			$pdf->Image('/img/logo.jpg',95,5,20,20);
			//wa
			$pdf->Image('/img/bg_logo.png',5,60,200,150);
			
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
			$pdf->Cell(65,10,'Aknowledgement Slip',0,0,'C',1);
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
			
			$pdf->Cell(15,8,'Sex: ',1,0,'L');
			$pdf->Cell(25,8,$sex_dd,1,0,'L');
			
			$pdf->Cell(35,8,'Date of Birth: ',1,0,'L');
			$pdf->Cell(35,8,$date_of_birth_dd,1,0,'L');
			
			$pdf->Cell(35,8,'Marital Status: ',1,0,'L');
			$pdf->Cell(0,8,$marital_status,1,1,'L');
			
			/// EMAIL ADDRESS
			$pdf->Cell(45,8,'E-mail: ',1,0,'L');
			$pdf->Cell(0,8,$email_address,1,1,'L');
			$pdf->setTextColor(21, 37, 79);
			
			$pdf->Cell(25,8,'Sponsor Type: ',1,0,'L');
			$pdf->Cell(30,8,$sponsor_type,1,0,'L');
			
			$pdf->Cell(35,8,'Sponsor Name: ',1,0,'L');
			$pdf->Cell(0,8,$sponsor_name,1,1,'L');
			
			$pdf->Cell(45,8,'Next of Kin: ',1,0,'L');
			$pdf->Cell(0,8,$nok_name,1,1,'L');
			
			
			$pdf->Cell(35,8,'Nex of Kin Phone: ',1,0,'L');
			$pdf->Cell(40,8,$nok_phone_number,1,0,'L');
			
			$pdf->Cell(45,8,'Next of Kin Relationship: ',1,0,'L');
			$pdf->Cell(0,8,$nok_relationship,1,1,'L');
			
			
			
			
			$pdf->Ln(5);
			
			
			$check = $db->prepare("select r.id,r.grade,r.exam_type,r.exam_year,s.subject_name from tbl_applicant_results r inner join tbl_subjects s on r.subject_id=s.id where r.applicant_id='$session_applicant_id' and r.exam_type='$result_type_one' and r.exam_year='$result_type_one_year'");
			$check->execute();
			$rows=$check->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows)){
				$pdf->setFont('Arial','UB','10');
				$pdf->Cell(0,5,'O\' LEVEL RESULTS:',0,1,'L');
				$pdf->Ln(2);
				
				$pdf->setFont('Arial','','10');
				
				$pdf->Cell(10,8,'SN',1,0,'C');
				$pdf->Cell(90,8,'SUBJECT',1,0,'L');
				$pdf->Cell(15,8,'GRADE',1,0,'C');
				$pdf->Cell(20,8,'EXAM',1,0,'C');
				$pdf->Cell(0,8,'YEAR',1,1,'C');
				$sn=1;
				foreach($rows as $key=>$result){
					$pdf->Cell(10,8,$sn++,1,0,'C');
					$pdf->Cell(90,8,$result['subject_name'],1,0,'L');
					$pdf->Cell(15,8,$result['grade'],1,0,'C');
					$pdf->Cell(20,8,$result['exam_type'],1,0,'C');
					$pdf->Cell(0,8,$result['exam_year'],1,1,'C');
				}
			}
			$pdf->Ln(5);
			
			
			$check = $db->prepare("select r.id,r.grade,r.exam_type,r.exam_year,s.subject_name from tbl_applicant_results r inner join tbl_subjects s on r.subject_id=s.id where r.applicant_id='$session_applicant_id' and r.exam_type='$result_type_two' and r.exam_year='$result_type_two_year'");
			$check->execute();
			$rows=$check->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows)){
				$pdf->setFont('Arial','UB','10');
				$pdf->Cell(0,5,'O\' LEVEL RESULTS (others):',0,1,'L');
				$pdf->Ln(2);
				
				$pdf->setFont('Arial','','10');
				$pdf->Cell(10,8,'SN',1,0,'C');
				$pdf->Cell(90,8,'SUBJECT',1,0,'L');
				$pdf->Cell(15,8,'GRADE',1,0,'C');
				$pdf->Cell(20,8,'EXAM',1,0,'C');
				$pdf->Cell(0,8,'YEAR',1,1,'C');
				$sn=1;
				foreach($rows as $key=>$result){
					$pdf->Cell(10,8,$sn++,1,0,'C');
					$pdf->Cell(90,8,$result['subject_name'],1,0,'L');
					$pdf->Cell(15,8,$result['grade'],1,0,'C');
					$pdf->Cell(20,8,$result['exam_type'],1,0,'C');
					$pdf->Cell(0,8,$result['exam_year'],1,1,'C');
				}
			}
				
			
			$pdf->Ln(2);
			$pdf->Cell(0,8,'** NB:',0,1,'L');
			
				$stmt = tbl_applicants::find(session('id'));
				$stmt->print_ack_slip = '1';
				$stmt->save();				
			
			$pdf->Output();
	}
	catch(Exception $e){
		
	}
	
?>


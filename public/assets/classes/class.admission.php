<?php
class Admission{
	private $id;
	private $admission_id;
	private $session;
	private $applicant_id;
	private $programme_id;
	private $status;


	function set_id($id){ $this->id = $id;}
	function set_applicant_id($applicant_id){ $this->applicant_id = $applicant_id;}
	function set_admission_id($admission_id){ $this->admission_id = $admission_id;}
	function set_programme_id($programme_id){ $this->programme_id = $programme_id;}
	function set_session($session){ $this->session = $session;}
	function set_status($status){ $this->status = $status;}

	function get_id(){ return $this->id;}
	function get_admission_id(){ return $this->id;}

	public function __construct(){

		 try{
				 $this->dbCon = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
				 $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'Database Error: '.$e->getMessage();
			 }
	}

	public function publish_admission(){

		$admission_id = $this->id;
		$applicant_id = $this->applicant_id;
		
		$stmt= $this->dbCon->prepare("UPDATE  tbl_admission_list SET publish_status = '1' WHERE applicant_id=:applicant_id AND admission_id=:admission_id");
		$stmt->bindParam(':applicant_id',$this->applicant_id, PDO::PARAM_STR);
		$stmt->bindParam(':admission_id',$admission_id, PDO::PARAM_STR);
			if($stmt->execute()){
				return true;
			 }else{
				return false;
			 }
	 }


	 




}

?>

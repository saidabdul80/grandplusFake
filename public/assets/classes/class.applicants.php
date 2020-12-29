<?php
class Applicant{
	private $id;
	private $application_number;
	private $programme_id;
	private $session;
	private $login_status;
	private $password;
	private $address;
	private $first_name;
	private $surname;
	private $other_name;
	private $lga_id;
	private $date_time_apply;
	private $phone_number;
	private $email_address;
	private $dbCon;
	private $nationality;
	private $state_id;
	private $city;
	private $sponsor_type;
	private $sponsor_name;
	private $nok_name;
	private $nok_phone_number;
	private $nok_relationship;
	private $sex;
	private $passport;
	private $blood_group;
	private $genotype;
	private $level;
	private $previous_level;
	private $number_of_years_inschool;
	private $previous_level_session;
	private $current_level_session;
	private $status;


	function set_id($id){ $this->id = $id;}
	function set_application_number($application_number){ $this->application_number = $application_number;}
	function set_first_name($first_name){ $this->first_name = $first_name;}
	function set_surname($surname){ $this->surname = $surname;}
	function set_other_name($other_name){ $this->other_name = $other_name;}
	function set_programme_id($programme_id){ $this->programme_id = $programme_id;}
	function set_phone_number($phone_number){ $this->phone_number = $phone_number;}
	function set_email_address($email_address){ $this->email_address = $email_address;}
	function set_password($password){ $this->password = $password;}
	function set_date_time_apply($date_time_apply){ $this->date_time_apply = $date_time_apply;}
	function set_session($session){ $this->session = $session;}
	function set_status($status){ $this->status = $status;}

	function get_id(){ return $this->id;}
	function get_application_number(){ return $this->application_number;}

	public function __construct(){

		 try{
				 $this->dbCon = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
				 $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'Database Error: '.$e->getMessage();
			 }
	}

	public function applicant_login(){

		$hash_password = $this->password;
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE application_number=:application_number AND password=:hash_password AND status='1'");
		$stmt->bindParam(':application_number',$this->application_number, PDO::PARAM_STR);
		$stmt->bindParam(':hash_password',$hash_password, PDO::PARAM_STR);
			if($stmt->execute()){

				if($stmt->rowCount() > 0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$this->id = $row['id'];
					return $row;
				 }
					return 'Incorrect application number or password';
			 }else{
				return 'Couldn\'t login';
			 }
	 }


	
	 public function initiate_application_payment($id,$amount){
		 $stmt= $this->dbCon->prepare("UPDATE tbl_applicants set app_fee=?, form_fee='1' WHERE id=?");
			if($stmt->execute(array($amount,$id))){
				return true;
			}
			return false;
	 }
	 
	 
	 public function clear_applicant_payment($id,$clear_status){
		 
		  $stmt= $this->dbCon->prepare("UPDATE tbl_applicants set form_fee=? WHERE id=?");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute(array($clear_status,$id))){
				if($clear_status == 0){
					$stmt= $this->dbCon->prepare("UPDATE tbl_applicants set app_fee=0 WHERE id=?");
					$stmt->execute(array($clear_status,$id));
				}
				return true;
			 }else{
				return false;
			 }
	 }
	 
	 public function total_paid_applicants($session){
		 $stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE session=? AND form_fee='1' AND status='1'");
			if($stmt->execute(array($session))){
				if($stmt->rowCount() > 0){
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $rows;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }
	 
	 public function all_applicant_ready_for_admission($session){
		 $stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE session=? AND is_cleared='1' AND form_fee='1' AND status='1'");
			if($stmt->execute(array($session))){
				if($stmt->rowCount() > 0){
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $rows;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }
	 public function all_applicant_by_session($session){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE session=? AND status='1'");
			if($stmt->execute(array($session))){
				if($stmt->rowCount() > 0){
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $rows;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }
	 
	 
	 
	 
	  public function applicants_ready_for_screening($session){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE result_status='1' and biodata_status='1' and session=? and is_cleared='0' and status='1'");
			if($stmt->execute(array($session))){
				if($stmt->rowCount() > 0){
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $rows;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }
	 
	 
	  public function screened_applicants($session){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE is_cleared='1' and session=? and status='1'");
			if($stmt->execute(array($session))){
				if($stmt->rowCount() > 0){
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $rows;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }
	 
	  public function all_applicant(){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE status='1'");
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $rows;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }

	 
	 public function all_applicant_by_programme($programme_id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE programme_id=:programme_id AND status='1'");
		$stmt->bindParam(':programme_id',$programme_id, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $row;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }

	 public function applicant_by_id($id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE id=:id AND status='1'");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					return $row;
				 }
					return 'ID_NOT_FOUND';
			 }else{
				return 'QUERY_FAILED';
			 }
	 }
	 
	 public function application_number_exist($application_number){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE application_number=:application_number AND status='1'");
		$stmt->bindParam(':application_number',$application_number, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					return true;
				 }
					return false;
			 }else{
				return false;
			 }
	 }

	 public function applicant_by_app_number($application_number){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE application_number=:application_number AND status='1'");
		$stmt->bindParam(':application_number',$application_number, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					return $row;
				 }
					return 'ID_NOT_FOUND';
			 }else{
				return 'QUERY_FAILED';
			 }
	 }

	 public function applicant_admission_status($application_number){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE application_number=:application_number AND admission_status='1' AMD status='1'");
		$stmt->bindParam(':application_number',$application_number, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					return $row;
				 }
					return false;
			 }else{
				return false;
			 }
	 }

	
	 public function clear_reject_applicant($id,$clear_status,$is_not_cleared_reason){
		 $stmt= $this->dbCon->prepare("UPDATE tbl_applicants set is_cleared=?,is_not_cleared_reason=? WHERE id=?");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute(array($clear_status,$is_not_cleared_reason,$id))){
				return true;
			 }else{
				return false;
			 }
	 }
	 
	 public function confirm_applicant_form_fee($id){
		$stmt= $this->dbCon->prepare("UPDATE tbl_applicants set form_fee='1' WHERE id=:id");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				return true;
			 }else{
				return false;
			 }
	 }

	 public function revoke_applicant_form_fee($id){
		$stmt= $this->dbCon->prepare("UPDATE tbl_applicants set form_fee='0' WHERE id=:id");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				return true;
			 }else{
				return false;
			 }
	 }
	 

	 public function admit_applicant($id){
		$stmt= $this->dbCon->prepare("UPDATE tbl_applicants set admission_status='1' WHERE id=:id");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				return true;
			 }else{
				return false;
			 }
	 }

	 public function revoke_applicant_admission($id){
		$stmt= $this->dbCon->prepare("UPDATE tbl_applicants set admission_status='0' WHERE id=:id");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				return true;
			 }else{
				return false;
			 }
	 }


	public function application_programmes_by_school($id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_programmes WHERE school_id=:id AND status='1'");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
					return $row;
				 }
					return array();
			 }else{
				return array();
			 }
	 }
	 
	 public function generate_application_number($programme_id){
		 $programme_abbr = '';
		 $serial_number=0;
		 $application_number ='';
		 $preceeding_zero ='';
		 $year = date('Y');
		 
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_programmes WHERE id=:id AND status='1'");
		$stmt->bindParam(':id',$programme_id, PDO::PARAM_STR);
			if($stmt->execute()){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$programme_abbr = $row['programme_abbr'];
			}
			
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_applicants WHERE programme_id=:id AND status='1'");
		$stmt->bindParam(':id',$programme_id, PDO::PARAM_STR);
			if($stmt->execute()){
				$serial_number = $stmt->rowCount() + 1;
			}
			
			if(strlen($serial_number) < 3){
				for($i=1;$i <= (3 - strlen($serial_number));$i++){
					$preceeding_zero .= '0';
				}
			}
			$serial_number = $preceeding_zero.$serial_number;
			$application_number = 'APP/'.$year.'/'.$programme_abbr.'/'.$serial_number;
			return $application_number;
	 }
	 
	 
	public function create_account(){
		$year = date('Y');
			$stmt_create_user_account = $this->dbCon->prepare("INSERT INTO tbl_applicants
			(application_number,programme_id, session,password, first_name, surname, other_name, phone_number, email_address, year)
			  VALUES (:application_number,:programme_id, :session, :password, :first_name, :surname, :other_name, :phone_number, :email_address, :year) ");

			$stmt_create_user_account->bindParam(':application_number',$this->application_number);
			$stmt_create_user_account->bindParam(':programme_id',$this->programme_id);
			$stmt_create_user_account->bindParam(':password',$this->password);
			$stmt_create_user_account->bindParam(':first_name',$this->first_name);
			$stmt_create_user_account->bindParam(':surname',$this->surname);
			$stmt_create_user_account->bindParam(':other_name',$this->other_name);
			$stmt_create_user_account->bindParam(':phone_number',$this->phone_number);
			$stmt_create_user_account->bindParam(':email_address',$this->email_address);
			$stmt_create_user_account->bindParam(':session',$this->session);
			$stmt_create_user_account->bindParam(':year',$year);
			
			if($create_user_account = $stmt_create_user_account->execute()){
				$this->id = $this->dbCon->lastInsertId();
				return true;
			}
			return false;
	}





}

?>

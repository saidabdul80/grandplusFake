<?php
class User{
	private $id;
	private $staffid;
	private $programme_id;
	private $login_status;
	private $password;
	private $address;
	private $first_name;
	private $surname;
	private $other_name;
	private $phone_number;
	private $email_address;
	private $status;


	function set_id($id){ $this->id = $id;}
	function set_staffid($staffid){ $this->staffid = $staffid;}
	function set_first_name($first_name){ $this->first_name = $first_name;}
	function set_surname($surname){ $this->surname = $surname;}
	function set_other_name($other_name){ $this->other_name = $other_name;}
	function set_phone_number($phone_number){ $this->phone_number = $phone_number;}
	function set_email_address($email_address){ $this->email_address = $email_address;}
	function set_password($password){ $this->password = $password;}
	function set_status($status){ $this->status = $status;}

	function get_id(){ return $this->id;}
	function get_staffidr(){ return $this->staffid;}

	public function __construct(){

		 try{
				 $this->dbCon = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
				 $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'Database Error: '.$e->getMessage();
			 }
	}

	public function user_login(){

		$hash_password = $this->password;
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_users WHERE staffid=:staffid AND password=:hash_password AND status='1'");
		$stmt->bindParam(':staffid',$this->staffid, PDO::PARAM_STR);
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


	 public function login($staffid,$password){
		 $stmt= $this->dbCon->prepare("SELECT * FROM tbl_users WHERE staffid=:staffid AND password=:password AND status='1'");
		$stmt->bindParam(':staffid',$staffid, PDO::PARAM_STR);
		$stmt->bindParam(':password',$password, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					return $row;
				 }
					return 'INCORRECT_ID_OR_PASSWORD';
			 }else{
				return 'SYSTEM_NOT_RESPONDING';
			 }
	 }
	 
	 
	 public function user_by_id($id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_users WHERE id=:id AND status='1'");
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
	 




}

?>

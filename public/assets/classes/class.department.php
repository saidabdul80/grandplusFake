<?php
class Department{
	private $id;
	private $department_name;
	private $school_id;
	private $department_abbr;
	private $dbCon;
	private $status;


	function set_id($id){ $this->id = $id;}
	function set_department_name($department_name){ $this->department_name = $department_name;}
	function set_status($status){ $this->status = $status;}

	function get_id(){ return $this->id;}
	function get_department_name(){ return $this->department_name;}

	public function __construct(){

		 try{
				 $this->dbCon = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
				 $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'Database Error: '.$e->getMessage();
			 }
	}

	
	 
	 public function all_departments(){
		$stmt= $this->dbCon->prepare("SELECT * FROM  tbl_departments WHERE status='1'");
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
	 
	  public function department_by_id($id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_departments WHERE id=:id AND status='1'");
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					return $row;
				 }
				 return array();
			 }else{
				return array();
			 }
	 }

	 





}

?>

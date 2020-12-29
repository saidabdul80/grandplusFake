<?php
class Programme{
	private $id;
	private $programme_name;
	private $dbCon;
	private $status;


	function set_id($id){ $this->id = $id;}
	function set_programme_name($programme_name){ $this->programme_name = $programme_name;}
	function set_status($status){ $this->status = $status;}

	function get_id(){ return $this->id;}
	function get_programme_name(){ return $this->programme_name;}

	public function __construct(){

		 try{
				 $this->dbCon = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
				 $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'Database Error: '.$e->getMessage();
			 }
	}

	
	  public function all_programmes_select_options(){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_programmes WHERE status='1'");
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
	 
	 public function all_programmes(){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_programmes WHERE status='1'");
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
	 
	  public function programmes_by_department_id($department_id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_programmes WHERE department_id=:department_id AND status='1'");
		$stmt->bindParam(':department_id',$department_id, PDO::PARAM_STR);
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
	 
	  public function programme_by_id($id){
		$stmt= $this->dbCon->prepare("SELECT * FROM tbl_programmes WHERE id=:id AND status='1'");
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

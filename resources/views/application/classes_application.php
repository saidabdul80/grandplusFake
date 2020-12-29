<?php session_start();
	
	/////////////////////////////////////// Create Instance of Objects////////////

	$appObj = tbl_applicants::get();
	$proObj = tbl_programmes::get();	
	$deptObj = tbl_departments::get();
?>
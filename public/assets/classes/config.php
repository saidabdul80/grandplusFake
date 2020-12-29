<?php

//////////////////// DATABASE CONSTANTS ///////////////////////////
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'grandplus.edu.ng');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	date_default_timezone_set('Africa/Lagos');
/////////////////////////////////////////////////////////////////


//////////////////////// LINK CONSTANTS //////////////////////////////
	define('BASE_NAME', 'localhost');
	define('HOME_PATH', 'index.php');
	define('ABOUT_PATH', 'about.php');
	define('PRINCIPAL_OFFICERS_PATH', 'officers.php');
	define('COUNCILS_PATH', 'council.php');
	define('DEPARTMENTS_PATH', 'departments.php');
	define('ADMISSION_PATH', 'admission.php');
	define('NEWS_PATH', 'news.php');
	define('APPLY_PATH', './application/index.php');
	define('ADMISSION_STATUS_PATH', 'status.php');
	define('NEW_APPLICATION_PATH', 'apply.php');
	define('CONTINUE_APPLICATION_PATH', 'login.php');
	
	define('PROCESS_APPLICATION', 'process_application.php');
	define('DESKTOP_PATH', 'desktop.php');
	
	
////////////////////////////////////////////////////////////////////////


/////////////////////// SCHOOLS CONSTANTS //////////////////////////////////
	//define('SCHOOL_NAME', 'Brighter College of Health Science and Technology , Minna');
	define('SCHOOL_NAME', 'Grand Plus College of Health Science and Technlogy, Ilorin');
	//define('SCHOOL_MOTTO', 'Training for life.');
	define('SCHOOL_MOTTO', 'Advancing Health Innovation.');
	define('ND_SCHOOL_VALUE', 1);
	define('HND_SCHOOL_VALUE', 2);
///////////////////////////////////////////////////////////////////////////

////////////////////////// PAYSCKTACK ///////////////////////////////////////
define('PAYSTACK_SECRET_KEY', 'sk_live_dcf2f8811b0318597572d228a37ee4d24aca6763');
define('PAYSTACK_PUBLIC_KEY', 'pk_live_7f488bc1f51d748106335294fc86fbcc0ae1458a');
///////////////////////////////////////////////////////////////////////////
	
	
	//error_reporting(0);
?>

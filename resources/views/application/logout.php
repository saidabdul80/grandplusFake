<?php session_start();
unset($_SESSION['SESSION_APPLICANT_ID']);
unset($_SESSION['SESSION_APPLICATION_NUMBER']);
?>
	<script type="text/javascript">
	 location="login.php";
	</script>
<?php
exit;
?>
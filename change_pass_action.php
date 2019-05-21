<?php
session_start();
include "auth.php";
include "Common/Connection/connection.php"; 

include "Common/Model/functionPage.php";
$objLogin=new pollManager();

if(isset($_POST['cpass'])=="cpass")
{
	$changePwd=$objLogin->getPwdChange();

	if ($changePwd == 'Incorrect') {
		$error = "<center><h4><font color='#FF0000'>Incorrect Current Password!</h4></center></font>";
		include ("change_pass.php");
	}
	else if ($changePwd == 'successfully'){
		$error = "<center><h4><font color='green'>Password successfully changed!</h4></center></font>";
		include ("change_pass.php");
	}
	else {
		$error = "<center><h4><font color='#FF0000'>New Password and Confirm Password does not match!</h4></center></font>";
		include ("change_pass.php");
	}
}
else {
	$error = "<center><h4><font color='#FF0000'>Error!</h4></center></font>";
	include ("change_pass.php");
}
?>
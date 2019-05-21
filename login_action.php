<?php
session_start();
include "Common/Connection/connection.php"; 

include "Common/Model/functionPage.php";
$objLogin=new pollManager();

if(isset($_POST['login'])=="login")
{
	$login=$objLogin->getLogin();
	
	if($login == 'administrator'){
		header("location: admin.php");
	}
	else if($login == 'voter'){
		header("location: voter.php");
	}
	else{
		$error = "<center><h4><font color='#FF0000'>Incorrect Username or Password</h4></center></font>";
		include "login.php";		
	}		
	
}


?>
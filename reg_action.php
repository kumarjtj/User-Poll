<?php
session_start();
$captcha = "" ;
include "Common/Connection/connection.php"; 
include "Common/Model/functionPage.php";
$objLogin=new pollManager();

if(isset($_POST['submit'])=="Submit")
{
	$login=$objLogin->getRegister();
	
	if($login == 'exist')
	{
		$nam="<center><h4><font color='#FF0000'>The username already exist, peak another.</h4></center></font>";
		include('register.php');
		exit();		
	}
	else
	{
		$nam="<center><h4><font color='#FF0000'>Successfully Registered!.</h4></center></font>";
		include('login.php');
		exit();
	}

}
else
{
	 $error="<center><h4><font color='#FF0000'>Registration Failed Due To Error !</h4></center></font>";
     include"register.php";
}

?>

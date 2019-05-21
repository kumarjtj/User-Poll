<?php
include "Common/Connection/connection.php";
session_start();
if(empty($_POST['lan'])){
$error="<center><h4><font color='#FF0000'>Please select a library to vote!</h4></center></font>";
include"voter.php";
exit();
}
include "Common/Model/functionPage.php";
$objLogin=new pollManager();

$vote=$objLogin->checkVote();

if($vote == 'exist')
{
	$msg="<center><h4><font color='#FF0000'>You have already been voted, No need to vote again</h4></center></font>";
	include 'voter.php';
	exit();	
}else
{
	$msg="<center><h4><font color='#FF0000'>Congratulation, you have made your vote.</h4></center></font>";
	include 'voter.php';
	exit();

}
?>

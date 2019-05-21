<?php 
ini_set('display_errors', 0); 
$server="localhost";
$username="root";
$password="";
$dbname="polltest";
$conn=mysql_connect($server,$username,$password)or die("connection error:".mysql_error());
mysql_select_db($dbname,$conn);

?>

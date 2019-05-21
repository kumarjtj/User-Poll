<?php 
include "Common/CommonPage/header.php";
if(!isset($_SESSION)) {
session_start();
}
if (isset($_SESSION['SESS_NAME'])!="") {
	header("Location: voter.php");
}
?>

<br>
<br>
<center>
<legend> <h3> Register </h3></legend> </center>
<?php global $nam; echo $nam; ?> 
<?php global $error; echo $error; ?>
<center><font size="4" >
<form action= "reg_action.php" method= "post" id="myform" >
Firstname:
<input type="text" name="firstname" value="" />
<br>
<br>
Lastname: 
<input type="text" name="lastname" value="" />
<br>
<br>
Username: 
<input type="text" name="username" value="" />
<br>
<br>
Password: 
<input type="password" name="password" value="" />
<br>
<br>
<div class="g-recaptcha" data-sitekey="6LeD3hEUAAAAAKne6ua3iVmspK3AdilgB6dcjST0"></div> 
<br>
<br>
<input type="submit" name="submit" value="Submit" />
</form>
</font>
</center>

<script src="<?php echo $jsLink;?>/validation.js" type="text/javascript"></script>
<script src='<?php echo $jsLink;?>/api.js'></script>
<script src='<?php echo $jsLink;?>/RegValidation.js'></script>
<?php include "Common/CommonPage/footer.php" ;?>

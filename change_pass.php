<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "Common/CommonPage/header_voter.php"; 
?>
<br>
<br>
<center><h3>Change Password</h3></center>
<h4 style="color:#e60808;"><?php global $nam; echo $nam;?> </h4> 
<?php global $error; echo $error;?>                  

<center><form action="change_pass_action.php" method="post" id="myform">
Current Password :
<input type="password" name="cpassword" value="" >
<br>
<br>
New Password:
<input type="password" name="npassword" value="" >
<br>
<br>
Confirm New Password:
<input type="password" name="cnpassword" value="" >
<br>
<br>
<input type="submit" name="cpass" value="UPDATE" >
</form></center>
<script src='<?php echo $jsLink;?>/cpwdValidation.js'></script>
<br>
<br>
<?php include "Common/CommonPage/footer.php";?>

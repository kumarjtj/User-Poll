<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "Common/CommonPage/header_voter.php"; 
?>
<h4> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h4>
<h3>Make a Vote </h3>
<form action="submit_vote.php" name="vote" method="post" id="myform" >
<table style="width: 480px; height: 117px;"align="center">
<tbody>
<tr style="height: 23px;">
<td style="height: 23px; width: 509px;"  colspan="2"><h2>What is your favourite JavaScript Library?</h2></td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px; width: 52px; text-align: center;"><input name="lan" type="radio" value="JQuery" /></td>
  <td style="height: 23px; width: 457px;"><b>JQuery</b></td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px; width: 52px; text-align: center;"><input name="lan" type="radio" value="MooTools" /></td>
<td style="height: 23px; width: 457px;"><b>MooTools</b></td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px; width: 52px; text-align: center;"><input name="lan" type="radio" value="YUI" /></td>
<td style="height: 23px; width: 457px;"><b>YUI Library</b></td>
</tr>
<tr style="height: 12px;">
<td style="height: 12px; width: 52px; text-align: center;"><input name="lan" type="radio" value="Glow" /></td>
  <td style="height: 12px; width: 457px;"><b>Glow</b></td>
</tr>
</tbody>
</table>

<?php global $msg; echo $msg; ?>
<?php global $error; echo $error; ?>
<center><input type="submit" value="Submit Vote" name="submit" style="height:30px; width:100px" /></center>
</form>

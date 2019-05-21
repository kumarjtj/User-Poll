<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "Common/CommonPage/header_voter.php";
?>
<center><h3> Voting So Far  </h3></center>
<?php
include "Common/Connection/connection.php";

include "Common/Model/functionPage.php";
$objLogin=new pollManager();

$voteView=$objLogin->voteResultView();

if (count($voteView) == 0 ) {
	echo '<font color="red">No results found</font>';
}
else {
	echo '<center><table><tr bgcolor="#FF6600">
<td width="30px">ID</td>		
<td width="100px">LANGAUAGE</td>
<td width="100px">ABOUT</td>
<td width="30px">VOTE</td>
</tr>';
	foreach($voteView as $row)
	{
		
			$id=$row['lan_id'];
			$name=$row['fullname'];
			$about=$row['about'];
			$vote=$row['votecount'];
			echo '<tr bgcolor="#BBBEFF">';
			echo '<td>'.$id.'</td>';		
			echo '<td>'.$name.'</td>';
			echo '<td>'.$about.'</td>';
			echo '<td>'.$vote.'</td>';
			echo "</tr>";
	}
			echo'</table></center>';
}
?>
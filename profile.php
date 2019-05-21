<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "Common/CommonPage/header_voter.php";
include "Common/Connection/connection.php";

include "Common/Model/functionPage.php";
$objLogin=new pollManager();

$profile=$objLogin->getProfile();


?>
<h4> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h4>
<?php
if($profile == 'Novote')
{
	echo "You have not voted yet. Please submit your vote!";
}
else{
	echo "You have voted for: " . " " . $profile;
}

        
?>
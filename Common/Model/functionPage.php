<?php
class pollManager
{
	
	/* User Register Function */
	/* Start */
	
	function getRegister()
	{

		$name 	= mysql_real_escape_string($_POST['firstname']);
		$name2 	= mysql_real_escape_string($_POST['lastname']);
		$name3 	= mysql_real_escape_string($_POST['username']);
		$pass 	= mysql_real_escape_string($_POST['password']);
		
		$selectQuery="SELECT username FROM loginusers WHERE username= '{$name3}'";
		$executeQuery=mysql_query($selectQuery);
		$row = mysql_num_rows($executeQuery);
		if($row == 1)
		{
			unset($username);
			$rValue = 'exist';
			return $rValue;
		}
		else
		{
			$query = 'INSERT INTO voters
								SET		
									firstname    = \''.$name.'\',
									lastname 	 = \''.$name2.'\',
									username 	 = \''.$name3.'\'';
			$exQuery = mysql_query($query);
			
			$query1 = 'INSERT INTO loginusers
								SET		
									username   		= \''.$name3.'\',
									password 	 	= \''.md5($pass).'\'';
			$exQuery1 = mysql_query($query1);
			
			$rValue = 'true';
			return $rValue;			
		}
		
	}
	/* End */
	
	/* User Login Check Function */
	/* Start */
	function getLogin()
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$username = addslashes($username);
		$password = addslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);		
		$password = md5($password);
		
		$selectQuery="SELECT * FROM loginusers WHERE username='{$username}' AND password='{$password}' AND status='ACTIVE'";
		$executeQuery=mysql_query($selectQuery);
		if(mysql_num_rows($executeQuery)>0)
		{
			$member = mysql_fetch_array($executeQuery);
			$_SESSION['SESS_NAME'] = $member['username'];
			$_SESSION['SESS_RANK'] = $member['rank'];
			
			return $member['rank'];
		}else{
			
			$rValue = 'exist';
			return $rValue;			
		}
	}
   /* End */
   
   /* User Vote Check Function */
   /* Start */
	function checkVote()
	{
		$lan = $_POST['lan'];
		$sess = $_SESSION['SESS_NAME'] ;
		$lan = addslashes($_POST['lan']);
		$lan = mysql_real_escape_string($lan);
		
		$selectQuery="SELECT * FROM voters WHERE username='{$sess}' AND status='VOTED'";
		$executeQuery=mysql_query($selectQuery);
		$row = mysql_num_rows($executeQuery);
		if($row == 1)
		{
			$rValue = 'exist';
			return $rValue;
		}
		else
        {
			
			
			$query = 'UPDATE languages SET votecount = votecount + 1 
							WHERE fullname = "'.$lan.'"';
			$exQuery = mysql_query($query);

			$query1 = 'UPDATE voters SET status="VOTED" 
							WHERE username="'.$_SESSION['SESS_NAME'].'"';
			$exQuery1 = mysql_query($query1);

			$query2 = 'UPDATE voters SET voted= "'.$_POST['lan'].'" 
							WHERE username="'.$_SESSION['SESS_NAME'].'"';
			$exQuery2 = mysql_query($query2);
			
			
			$rValue = 'true';
			return $rValue;	
			
		}			
		
	}
	/* End */
	
	/* Display User Vote Function */
	/* Start */
	
	function voteResultView()
	{
		$arrDatas = array();
		$query = 'SELECT * FROM languages';
		$exquery = mysql_query($query);
		$i = 0;
		while($row = mysql_fetch_array($exquery))
		{
			$arrDatas[$i]['lan_id'] 		= $row['lan_id'];
			$arrDatas[$i]['fullname']    	= $row['fullname'];
			$arrDatas[$i]['about'] 			= $row['about'];
			$arrDatas[$i]['votecount']    	= $row['votecount'];			
			$i++;
		}
		return $arrDatas;
	}	
	/* End */
	
	/* View User Profile */
	/* Start */
	
	function getProfile()
	{
		
		$selectQuery ='SELECT status FROM voters WHERE username="'.$_SESSION['SESS_NAME'].'" AND status = "VOTED"';
		$executeQuery = mysql_query($selectQuery);
		if(mysql_num_rows($executeQuery)>0)
		{
			
			$selectQuery1 ='SELECT voted from voters WHERE username="'.$_SESSION['SESS_NAME'].'"';
			$executeQuery1 = mysql_query($selectQuery1);
			$member = mysql_fetch_array($executeQuery1);
			
			return $member['voted'];
		}else{
			
			$rValue = 'Novote';
			return $rValue;			
		}
	}
	/* End */
	
	/* User Change Password Function */
	/* Start */
	
	function getPwdChange()
	{

		$currentpass = md5($_POST['cpassword']) ;
		$newpass = md5($_POST['npassword']);
		$cnewpass = md5($_POST['cnpassword']);
		$currentpass = addslashes($currentpass);
		$newpass = addslashes($newpass);
		$cnewpass = addslashes($cnewpass); 
		$currentpass = mysql_real_escape_string($currentpass);
		$newpass = mysql_real_escape_string($newpass);
		$cnewpass = mysql_real_escape_string($cnewpass);
		
		$sql =  mysql_query('SELECT password FROM loginusers WHERE username="'.$_SESSION['SESS_NAME'].'" ');
		$row = mysql_fetch_assoc($sql);
		$pass = $row['password'];

		$selectQuery ='SELECT password FROM loginusers WHERE username="'.$_SESSION['SESS_NAME'].'"';
		$executeQuery = mysql_query($selectQuery);
		$member = mysql_fetch_array($executeQuery);
		$pass = $member['password'];
		if ($currentpass != $pass) {
			
			$rValue = 'Incorrect';
			return $rValue;				
		}
		else if ($currentpass == $pass && $newpass == $cnewpass){
			
			$query = 'UPDATE loginusers SET password="'. md5($_POST['npassword']).'" 
								WHERE username="'.$_SESSION['SESS_NAME'].'" ';
			$exQuery = mysql_query($query);	
			
			$rValue = 'successfully';
			return $rValue;	
			
		}
		else{
			$rValue = 'not';
			return $rValue;				
		}
	
	}
	/* End */
}
?>
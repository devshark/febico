<?php
session_start();
ob_start();
// require_once('includes/connect.php');
require_once('classes/class.user.php');

if(count($_POST) > 1)
{
	$user = '';
	$pass = '';
	$result = array();
	if(isset($_POST['user_id']))
	{
		$user = (new User())->get_user($_POST['user_id']);
		if($user != null)
		{
			// print_r($user->password);
			if($user->password == sha1($_POST['user_pw']))
			{
				$_SESSION['user']['username'] = $user->username;
				$result = array('status'=>'success','message'=>'Logged-In Successfully');
			}
			else
			{
				$_SESSION['user']['username'] = null;
				$result = array('status'=>'failed','message'=>'Username and password does not match!');
			}
		}
		else
		{
			$_SESSION['user']['username'] = null;
			$result = array('status'=>'failed','message'=>'Username does not exist!');
		}
		$extra = ob_get_contents();
		ob_end_clean();
		print json_encode(array_merge($result,array('extra'=>$extra)));
	}
}
else
{
	die('No direct scripting allowed.');
}

?>
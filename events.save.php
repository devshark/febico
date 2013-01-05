<?php
session_start();
// ob_start();

require_once('classes/class.database.php');

if( ! isset($_SESSION['user']['username']) || $_SESSION['user']['username'] == null)
{
	die( json_encode( array('status'=>'failed','message'=>'You are not logged in.') ) );
}

if(count($_POST) > 1)
{
	$db = new Database();
	$contents = stripslashes($_POST['contents']);
	$fields = array(
		'title'=>$_POST['title'],
		'contents'=>$_POST['contents'],
		'author'=>$_SESSION['user']['username']
	);
	$db->insert('events',$fields);
	print json_encode( array('status'=>'success','message'=>'Successfully added event.') );
}
else
{
	print json_encode( array('status'=>'failed','message'=>'Insufficient data.') );
}
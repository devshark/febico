<?php
require_once('classes/class.database.php');

class User
{
	protected $db;
	public function __construct()
	{
		$this->db = new Database();
	}
	
	public function get_user($username)
	{
		$result = $this->db->get_where('auth_users',array('username'=>$username));
		if($result->num_rows() > 0)
		{
			return $result->row();
		}
		else{
			return null;
		}
	}
}
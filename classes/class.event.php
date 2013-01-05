<?php
require_once('classes/class.database.php');

class Event
{
	protected $db;
	public function __construct()
	{
		$this->db = new Database();
	}
	
	public function get_event($event_id)
	{
		return $this->db->get_where('events',
			array('id',$event_id))->row();
	}
	
	public function get_events($count='all',$order='desc')
	{
		$allowed_order = array('desc','asc','RANDOM()');
		if( ! in_array($order,$allowed_order) )
		{
			throw new Exception('Order arrangement is not available.');
		}
		$sql = '';
		if($count == 'all')
		{
			$sql = 'select * from events order by id '.$order;
		}
		elseif(is_numeric($count))
		{
			$sql = 'select * from events order by id '.$order.' limit '.$count;
		}
		else
		{
			throw new Exception('Count given is not yet supported.');
		}
		return $this->db->query($sql)->result();
	}
	
}
<?php
require_once('includes/connect.php');

public class Database
{
	protected $_host = 'localhost';
	protected $_user = 'root';
	protected $_pass = '';
	protected $_db = '';
	protected $_port = 3306;
	protected $_conn;
	protected $result;
	
	public __construct($db='',$host='localhost',$user='root',$pass='',$port=3306)
	{
		$this->_host = $host;
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_db = $db;
		$this->_port = $port;
		$this->connect();
	}
	public function connect()
	{
		$this->_conn = mysqli_connect($this->_host,
			$this->_user,
			$this->_pass,
			$this->_db,
			$this->_port);
	}
	
	public function escape($string)
	{
		return mysqli_real_escape_string($this->_conn,$string);
	}
	
	public function query($sql)
	{
		return mysqli_query($this->_conn,$sql);
	}
	
	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}
	
	public function fetch_object($sql)
	{
		$result = array();
		foreach(mysqli_fetch_assoc($this->query($sql)) as $field=>$value)
		{
			$row->$field = $value;
			$result[] = $row;
		}
		return $result;
	}
	public function fetch_array($sql)
	{
		$result = array();
		foreach(mysqli_fetch_assoc($this->query($sql)) as $field=>$value)
		{
			$row[$field] = $value;
			$result[] = $row;
		}
		return $result;
	}
	
	public function get($table,$limit=1000,$offset=0)
	{
		return $this->query("select * from {$this->escape($table)} limit $offset, $limit");
	}
	
}

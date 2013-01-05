<?php
require_once('classes/class.database.php');
require_once('classes/ExamType.php');
    
    function get_exam_by_type(ExamType $type){
        $db = new Database();
        $id = $type->get_exam_type_id();
        return $this->db->query("select * from exam_question where exam_type={$id} order by RAND()");
    }
    /**
     * Valid Email
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function valid_email($str)
    {
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    
    function email_exists($email){
	$db = new Database();
	$result = $db->query("Select * from appform where email='{$email}';");
	if($result->num_rows() > 0){
	    return true;
	}else{
	    return false;
	}
    }
/*
    
    function user_matches($email,$name){
	$db = new Database();
	$result = $db->query("Select * from appform where email='{$email}' and app_name='{$name}';");
	if($result->num_rows() > 0){
	    return true;
	}else{
	    return false;
	}
    }
    
*/
    function exam_taken($email){
	$sql = "
	    select *
	    from applicant_account
	    where email='{$email}'
	    and date_taken is not null;
	";
	$db = new Database();
	$result = $db->query($sql);
	if($result->num_rows()>0){
	    return true;
	}else{
	    return false;
	}
    }
    
    function get_name_from_email($email){
	if(email_exists($email)){
	    $db = new Database();
	    return $db->query("select CONCAT(firstname,' ',CONCAT(middlename,' ',surname)) as app_name from appform where email='{$email}';")->row()->app_name;
	}else{
	    return false;
	}
    }
    
    
/* CI Common Helpers
 * 
 * ?
 */
    function is_really_writable($file)
    {
	// If we're on a Unix server with safe_mode off we call is_writable
	if (DIRECTORY_SEPARATOR == '/' AND @ini_get("safe_mode") == FALSE)
	{
		return is_writable($file);
	}

	// For windows servers and safe_mode "on" installations we'll actually
	// write a file then read it.  Bah...
	if (is_dir($file))
	{
		$file = rtrim($file, '/').'/'.md5(mt_rand(1,100).mt_rand(1,100));

		if (($fp = @fopen($file, FOPEN_WRITE_CREATE)) === FALSE)
		{
			return FALSE;
		}

		fclose($fp);
		@chmod($file, DIR_WRITE_MODE);
		@unlink($file);
		return TRUE;
	}
	elseif ( ! is_file($file) OR ($fp = @fopen($file, FOPEN_WRITE_CREATE)) === FALSE)
	{
		return FALSE;
	}

	fclose($fp);
	return TRUE;
    }
    
    function course_choices(){
	$db = new Database();
	$courses = $db->get('course_list order by crs_code ASC');
	return $courses->result();
    }
    
    function set_value($field,$default = null){
	return (isset($_POST[$field]) ? (is_array($_POST[$field]) ? array_shift($_POST[$field]) : $_POST[$field]) : $default);
    }
    
    /**
     * Integer
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function integer($str)
    {
	    return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
    }
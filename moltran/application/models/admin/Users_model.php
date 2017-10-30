<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);
class Users_model extends CI_Model {
    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	public function validate($userName, $password){
		
		$this->db->select('*');
		$this->db->from('fl_person');
		$this->db->where('Email', $userName);
		$this->db->where('PasswordHash', $password);	
		
		$query = $this->db->get();	
		
		return $query->result_array(); 
	}	
	
    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	public function user_by_user_name($userName)
    { 
		$this->db->select('*');
		$this->db->from('fl_person');
		$this->db->where('Email', $userName);
		$this->db->limit(1);
		$query = $this->db->get();	
		
		return $query->result_array(); 	
	}
	public function addUser($data)
	{ 
		$insert = $this->db->insert('fl_person',$data);		
		return $this->db->insert_id();
	}
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['userName'] = $udata['userName']; 
			$user['adminID'] = $udata['adminID']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	
	function create_user($data){
		$insert = $this->db->insert('tbl_user',$data);
		return $this->db->insert_id();
	}//create_member
	function create_ads($data)
	{
		$insert = $this->db->insert('tbl_ads',$data);
		return $this->db->insert_id();
	}
	function create_helpfullinfo($data)
	{
		$insert = $this->db->insert('tbl_helpfullinfo',$data);
		return $this->db->insert_id();
	}
	
	
	/**
    * Get user by his is
    * @param int $id 
    * @return array
    */
	public function update_user($data,$id)
	{
		return $this->db->update('tbl_user', $data, array('id'=>$id));
	}
	
	public function get_password($id)
	{
		$this->db->select('pass,password');
		$this->db->from('tbl_user');
		$this->db->where('id', $id);
		$query = $this->db->get();	
		return $query->result_array(); 
	}
	public function update_helpfullinfo($data,$id)
	{
		return $this->db->update('tbl_helpfullinfo', $data, array('id'=>$id));
	} 
	public function get_user_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id', $id);
		$query = $this->db->get();	
		return $query->result_array(); 
		
    }
	public function get_helpfullinfo_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_helpfullinfo');
		$this->db->where('id', $id);
		$query = $this->db->get();	
		return $query->result_array(); 
	}
	public function get_mult_user_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('userID IN ('.$id.')');
		$query = $this->db->get();	
		return $query->result_array(); 
	} 

	public function get_user()
    {		
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id <>',1);
	//	$this->db->order_by('userID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	public function get_helpfull_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_helpfullinfo');
	//	$this->db->order_by('userID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 
	}	
	public function get_advertisement_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_ads');
	//	$this->db->order_by('userID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 
	}
	function delete_helpfullinfo($id){
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_helpfullinfo'); 
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function get_ads_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_ads');
		$this->db->where('id',$id);
		$query = $this->db->get();	
		return $query->result_array(); 
	}
	function delete_user($id){
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_user'); 
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function delete_ads($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_ads'); 
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
}

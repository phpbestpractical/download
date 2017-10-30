<?php
class Account_model extends CI_Model {
    
	public function getAccount()
    {
		$this->db->from('fl_account');
		$this->db->order_by('AccountID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	function addAccount($data){
		$insert = $this->db->insert('fl_account',$data);
		return $this->db->insert_id();
	}
	function deleteAccount($id)
	{
		$this->db->where('AccountID',$id);
		$this->db->delete('fl_account');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function getAccountbyId($id)
	{
		$this->db->from('fl_account');
		$this->db->where('AccountID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateAccount($data,$id)
	{
		return $this->db->update('fl_account', $data,array('AccountID'=>$id));	
	}	
}

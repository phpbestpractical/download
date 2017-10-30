<?php
class Display_model extends CI_Model {
    
	public function getDisplay()
    {
		$this->db->from('fl_displaytype');
		$this->db->order_by('DisplayTypeID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	function addDisplay($data){
		$insert = $this->db->insert('fl_displaytype',$data);
		return $this->db->insert_id();
	}
	function deleteDisplay($id)
	{
		$this->db->where('DisplayTypeID',$id);
		$this->db->delete('fl_displaytype');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function getDisplaybyId($id)
	{
		$this->db->from('fl_displaytype');
		$this->db->where('DisplayTypeID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateDisplay($data,$id)
	{
		return $this->db->update('fl_displaytype', $data,array('DisplayTypeID'=>$id));	
	}	
}

<?php
class Category_model extends CI_Model {
    
	public function getCategory()
    {
		$this->db->from('fl_category');
		$this->db->order_by('CategoryID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	function addCategory($data){
		$insert = $this->db->insert('fl_category',$data);
		return $this->db->insert_id();
	}
	function deleteCategory($id)
	{
		$this->db->where('CategoryID',$id);
		$this->db->delete('fl_category');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function getCatebyId($id)
	{
		$this->db->from('fl_category');
		$this->db->where('CategoryID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateCategory($data,$id)
	{
		return $this->db->update('fl_category', $data,array('CategoryID'=>$id));	
	}	
}

<?php
class Store_model extends CI_Model {
    
	public function getStore()
    {
		$this->db->from('fl_store');
		$this->db->order_by('StoreID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	function addStore($data){
		$insert = $this->db->insert('fl_store',$data);
		return $this->db->insert_id();
	}
	function deleteStore($id)
	{
		$this->db->where('StoreID',$id);
		$this->db->delete('fl_store');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function getStorebyId($id)
	{
		$this->db->from('fl_store');
		$this->db->where('StoreID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateStore($data,$id)
	{
		return $this->db->update('fl_store', $data,array('StoreID'=>$id));	
	}	
}

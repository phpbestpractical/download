<?php
class Service_model extends CI_Model {
    
	public function getService()
    {
		$this->db->from('fl_service');
		$this->db->order_by('ServiceID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	function addService($data){
		$insert = $this->db->insert('fl_service',$data);
		return $this->db->insert_id();
	}
	function deleteServiceById($id)
	{
		$this->db->where('ServiceID',$id);
		$this->db->delete('fl_service');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function getAccountNameById($id)
	{
		$this->db->select('AccountID,AccountName');
		$this->db->from('fl_account');
		$this->db->where('AccountID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function getAccount()
	{
		$this->db->from('fl_account');		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			$accArr = array();
			
			foreach($post as $val)
			{
				$accArr[''.$val['AccountID'].''] = $val['AccountName'];
			}
			
			return $accArr;
		}
		return false;
	}
	function getServiceById($id)
	{
		$this->db->from('fl_service');
		$this->db->where('ServiceID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateService($data,$id)
	{
		return $this->db->update('fl_service', $data,array('ServiceID'=>$id));	
	}
	function getCategory()
	{
		$this->db->from('fl_category');		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			$accArr = array();			
			foreach($post as $val)
			{
				$accArr[''.$val['CategoryID'].''] = $val['Name'];
			}
			
			return $accArr;
		}
		return false;
	}
	function getCategoryDrpByServiceId($id)
	{
		$this->db->from('fl_servicecategory');
		$this->db->where('ServiceID',$id);		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			
			foreach($post as $val)
			{
				 $selectie[] = $val['CategoryID'];
			}
			
			return $selectie;
		}
		return false;
	}	
	function getAccountDrpByServiceId($id)
	{
		$this->db->from('fl_serviceaccounttype');
		$this->db->where('ServiceID',$id);		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			
			foreach($post as $val)
			{
				 $selectie[] = $val['AccountID'];
			}
			
			return $selectie;
		}
		return false;
	}
	function deleteCategoryById($id)
	{
		$this->db->where('ServiceID',$id);
		$this->db->delete('fl_servicecategory');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function deleteAccountById($id)
	{
		$this->db->where('ServiceID',$id);
		$this->db->delete('fl_serviceaccounttype');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
}

<?php

class API_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->library('AES');
    }

    /* For get all Service Ads details */

    function getAllServiceAdsDetails() {
       
        $this->db->from("fl_serviceadsdetail");  
        $this->db->where("ServiceID <>",'0');  
        $posts = $this->db->get()->result_array();

        if (count($posts) > 0) {
            

            return $posts;
        }
        return false;
    }
    
	function getServiceById($id)
	{
		$this->db->from("fl_service");  
        $this->db->where('ServiceID',$id);
		$this->db->limit(1);	
		$posts = $this->db->get()->result_array();
		if (count($posts) > 0) {
				
		  return $posts;
		}
       return false;
	}
}

?>

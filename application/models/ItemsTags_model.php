<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ItemsTags_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 
    function getAllTagsByItem($id) {
       
        $this->db->select('*');
		$this->db->where("item_id",$id);	
        $this->db->from('items_tags');
        $this->db->join('tags', 'items_tags.tag_id = tags.id');

		$query = $this->db->get();
		

        return $query->result();
    }
	
	function insert($data){
		
		$this->db->insert('items_tags', $data);
		$id = $this->db->insert_id();
		if($id){
			return $id;
		}
		return false;
	}
	
	
	

	
	




    
  

}

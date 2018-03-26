<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Items_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 
    function getAllItems() {
       
	   
	   $this->db->select('items.*,tags.name as tag_name');
	   $this->db->from('items');
	   $this->db->join('items_tags', 'items.id = items_tags.item_id', 'left');
	   $this->db->join('tags', 'tags.id = items_tags.tag_id ','left');

        $query = $this->db->get();

        return $query->result();
    }
	
	function insert($data){
		
		$this->db->insert('items', $data);
		$id = $this->db->insert_id();
		if($id){
			return $id;
		}
		return false;
	}
	
	
	function update($id,$data){
		$this->db->where('id', $id);
        $this->db->update('items', $data); 
	}

	
	




    
  

}

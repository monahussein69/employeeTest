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
       
        $query = $this->db->get('items');

        return $query->result();
    }
	
	function insertItem($data){
		
		$this->db->insert('items', $data);
		$id = $this->db->insert_id();
		if($id){
			return $id;
		}
		return false;
	}





    
  

}

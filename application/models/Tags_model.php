<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tags_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 
    function getAllTags() {
       
        $query = $this->db->get('tags');

        return $query->result();
    }
	
	function insert($data){
		
		$this->db->insert('tags', $data);
		$id = $this->db->insert_id();
		if($id){
			return $id;
		}
		return false;
	}
	
	
	function update($id,$data){
		$this->db->where('id', $id);
        $this->db->update('tags', $data); 
	}
	
	function get($id){
		$this->db->select('*');
        $this->db->where("id",$id);		
		$this->db->from('tags');
		$query = $this->db->get();
        return $query->result(); 
	}
	
	function getByName($name){
		$this->db->select('*');
        $this->db->like('name', $name); 
		$this->db->from('tags');
		$query = $this->db->get();
        return $query->result(); 
	}

	
	




    
  

}

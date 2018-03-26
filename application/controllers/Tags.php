<?php
  
  class Tags extends CI_Controller {
	     
		 
		 function __construct() {
			
			parent::__construct();
			$this->load->model('Tags_model');
			
		}
	  
		public function getTags()
		{	
		    $tag = $this->input->post('tag');
			$data = $this->Tags_model->getByName($tag);
			echo json_encode($data);
		}
		
		
			
			
			
		
		
		}

?>
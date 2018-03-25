<?php
  
  class Items extends CI_Controller {
	     
		 
		 function __construct() {
			
			parent::__construct();
			$this->load->model('Items_model');
			
		}
	  
		public function index()
		{	
			$data = $this->Items_model->getAllItems();
			echo json_encode($data);
		}
		
		public function store()
			{
				
			$myData = $this->input->post('myData');
			$myData = json_decode($myData);			
			$result = $this->Items_model->insertItem($myData);
		    echo json_encode($result);
			}
			
			public function uploadPhoto(){
				
				$json = array();
				$config['upload_path'] = 'assets/pictures/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('file') )
				{
					$json = array('error' => true, 'message' => $this->upload->display_errors());
				}
				else
				{
					$upload_details = $this->upload->data();

					$json = array('success' => true, 'message' => 'File transfer completed', 'newfilename' => $upload_details['file_name']);
				}

				echo json_encode($json);
			}
			
		
		
		}

?>
<?php
  
  class Items extends CI_Controller {
	     
		 
		 function __construct() {
			
			parent::__construct();
			$this->load->model('Items_model');
			$this->load->model('ItemsTags_model');
			$this->load->model('Tags_model');
			
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
			$itemData = array(
			'name' =>isset($myData->name) ? $myData->name:'',
			'description' =>isset($myData->description) ? $myData->description:''
			);
           		
			$result = $this->Items_model->insert($itemData);
			if($result){
				 if(array_key_exists("tag",$myData)){
					if(array_key_exists("tag_id",$myData)){
						$this->ItemsTags_model->insert(array('tag_id'=>$myData->tag_id,'item_id'=>$result));
					}else{
						$tag_id = $this->Tags_model->insert(array('name'=>$myData->tag));
						$this->ItemsTags_model->insert(array('tag_id'=>$tag_id,'item_id'=>$result));
					}
				}	
			 $response = array('id'=>$result,'success'=>true);
			}else{
			  $response = array('success'=>false);	
			}
		    echo json_encode($response);
			}
			
			public function uploadPhoto(){
				
				$json = array();
				$id = $this->input->post('id');
				$config['upload_path'] = 'assets/pictures/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				$this->upload->initialize($config);
				

				if ( ! $this->upload->do_upload('files') )
				{
					$json = array('error' => true, 'message' => $this->upload->display_errors());
				}
				else
				{   
			        
					$upload_details = $this->upload->data();
					
					$this->Items_model->update($id,array('picture'=>$upload_details['file_name']));

					$json = array('success' => true, 'message' => 'File transfer completed', 'newfilename' => $upload_details['file_name']);
				}

				echo json_encode($json);
			}
			
		
		
		}

?>
<?php

class Encoder_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
		date_default_timezone_set("Asia/Hong_Kong");

        if ($_SESSION['user_logged'] == FALSE) {
        	$this->session->set_flashdata("error", "Please login to continue to this page.");
        	redirect(base_url() . 'login', "refresh");
        }
    }

	function log_data($data){
		$log_data = array(
		    	'log_name' 		=> $_SESSION['uploader'],
		    	'log_user_role' => $_SESSION['role'],
		    	'log_activity'  => $data,
		    	'log_date'		=> date('Y-m-d H:i:s')
		    );
		$this->Main_model->insert_activity($log_data);  
	}
    
	public function encoder_home(){
		$data = [];

		$query_material_encoded = $this->db->query("SELECT 
									(SELECT COUNT(*) as total FROM tbl_material
									WHERE material_uploader = '" . $_SESSION['uploader'] . "') + (SELECT COUNT(*) as total FROM tbl_to_publish
									WHERE publish_uploader = '" . $_SESSION['uploader'] . "') as total");
		$record_material_encoded = $query_material_encoded->result();

		$query_published_materials = $this->db->query("SELECT COUNT(*) as total 
													 FROM tbl_material
													 WHERE material_uploader = '" . $_SESSION['uploader'] . "'");
		$record_published_materials = $query_published_materials->result();

		$query_pending_materials = $this->db->query("SELECT COUNT(*) as total 
													 FROM tbl_to_publish
													 WHERE publish_uploader = '" . $_SESSION['uploader'] . "'");
		$record_pending_materials = $query_pending_materials->result();


		foreach ($record_material_encoded as $row_material_encoded){
			$data['total_material'] = $row_material_encoded->total;
		}

		foreach ($record_pending_materials as $row_pending_materials){
			$data['total_pending_material'] = $row_pending_materials->total;
		}

		foreach ($record_published_materials as $row_published_materials){
			$data['total_published_material'] = $row_published_materials->total;
		}

		$_SESSION['total_material'] = $data['total_material'];
		$_SESSION['total_pending'] = $data['total_pending_material'];
		$_SESSION['total_publish'] = $data['total_published_material'];


		//Total number of materials encoded to each categories
		$queryCateg = $this->db->query("SELECT material_category , COUNT(material_title) as countt 
										FROM tbl_material 
										WHERE material_uploader = '" . $_SESSION['uploader'] . "'
										GROUP BY material_category");
		$recordCateg = $queryCateg->result();

		foreach($recordCateg as $row) {
            $data['label2'][] = $row->material_category; ;
            $data['data2'][] = (int) $row->countt;
	    }

	    // $data['chart_data_categ'] = json_encode($data);
	    $data['chart_data'] = json_encode($data);

		$this->load->view('main/header');
		$this->load->view('main/encoder_home',$data);
		$this->load->view('main/footer');
	}
	public function encoder_addMaterial(){
		$this->load->view('main/header');
		$this->load->view('main/encoder_addMaterial');
		$this->load->view('main/footer');
	}
	public function encoder_pendingMaterial(){
		$this->load->view('main/header');
		$this->load->view('main/encoder_pendingMaterial');
		$this->load->view('main/footer');
	}
	
	public function encoder_profile(){
		$this->load->view('main/header');
		$this->load->view('main/encoder_profile');
		$this->load->view('main/footer');
	}

	public function fetch_own_material(){  
		$fetch_data = $this->Main_model->make_own_datatables();  
		$data = array();  
		foreach($fetch_data as $row)  
		{  
		    $sub_array 	 = array();  
		    $sub_array[] = $row->publish_title;  
		    $sub_array[] = $row->publish_description;  
		    $sub_array[] = $row->publish_category;  
 
		    $sub_array[] = $row->publish_source; 
		    $sub_array[] = $row->publish_uploader;  
		    $sub_array[] = $row->publish_division;  
		    // $sub_array[] = $row->publish_fileName;  

		    $sub_array[] = '<button type="button" name="update" id="'.$row->publish_id.'" class="btn btn-warning btn-xs update">Update</button>';  
		    $sub_array[] = '<button type="button" name="delete" id="'.$row->publish_id.'" class="btn btn-danger btn-xs delete">Delete</button>';    

		    $data[]		 = $sub_array;  
		}  
		$output = array(  
		    "draw"                    	=>     intval($_POST["draw"]),  
		    "recordsTotal"          	=>     $this->Main_model->get_all_own_material(),  
		    "recordsFiltered"     		=>     $this->Main_model->get_filtered_own_material(),  
		    "data"                    	=>     $data  
		);  
		echo json_encode($output);  
	}  

	// function fetch_single_publish_material(){  
	//    $output = array();  
	//    $data = $this->Main_model->fetch_single_publish_material($_POST["user_id"]);  
	//    foreach($data as $row){  
	//         $output['publish_title'] 		= $row->publish_title;  
	//         $output['publish_description'] 	= $row->publish_description; 
	//         $output['publish_category'] 	= $row->publish_category; 
	//         $output['publish_source'] 		= $row->publish_source;    
	//    }  
	//    echo json_encode($output);  
	// } 

	// function fetch_material_home(){  
	// 	$fetch_data = $this->Main_model->make_datatables();  
	// 	$data = array();  
	// 	foreach($fetch_data as $row)  
	// 	{  
	// 	    $sub_array 	 = array();  
	// 	    $sub_array[] = $row->material_title;  
	// 	    $sub_array[] = $row->material_description;  
	// 	    $sub_array[] = $row->material_startDate;  
	// 	    $sub_array[] = $row->material_endDate;   
	// 	    $sub_array[] = $row->material_source; 
	// 	    $sub_array[] = $row->material_uploader;  
	// 	    $sub_array[] = $row->material_division;  
	// 	    $sub_array[] = $row->material_fileName;  
	// 	    $sub_array[] = $row->material_fileType;  
	// 	    // $sub_array[] = '<img src="'.base_url().'upload/'.$row->file.'" class="img-thumbnail" width="50" height="35" />';  
	// 	    // $sub_array[] = '<button type="button" name="update" id="'.$row->material_id.'" class="btn btn-warning btn-xs update">Update</button>';  
	// 	    // $sub_array[] = '<button type="button" name="delete" id="'.$row->material_id.'" class="btn btn-danger btn-xs delete">Delete</button>';    
	// 	    $sub_array[] = '<button type="button" name="download" id="'.$row->material_id.'" class="btn btn-success btn-xs download">Download</button>';  
	// 	    $data[]		 = $sub_array;  
	// 	}  
	// 	$output = array(  
	// 	    "draw"                    	=>     intval($_POST["draw"]),  
	// 	    "recordsTotal"          	=>     $this->Main_model->get_all_material(),  
	// 	    "recordsFiltered"     		=>     $this->Main_model->get_filtered_material(),  
	// 	    "data"                    	=>     $data  
	// 	);  
	// 	echo json_encode($output);  
	// }

	function material_action(){  
		$info = $this->upload_material();
		if($_POST["action"] == "Add"){  

		    $this->log_data("Added a Material");

		    $insert_data = array(  
		         'material_title'          			=>     $this->input->post('material_title'),  
		         'material_description'          	=>     $this->input->post('material_description'),  
		         'material_startDate'               =>     $this->input->post("material_startDate"),  
		         'material_endDate'               	=>     $this->input->post("material_endDate"),  
		         'material_source'               	=>     $this->input->post("material_source"),    
		         'material_uploader'               	=>     $this->input->post("material_uploader"),  
		         'material_division'               	=>     $_SESSION['division'], 
		         'material_fileName'                =>     $info['original_name'], 
		         'material_fileType'               	=>     $info['extension'][1],
		         'file'                     =>     $info['new_name']
		    );  
		    $this->Main_model->insert_material($insert_data);  
		    echo  $info['extension'][1]; 
		}  

		if($_POST["action"] == "Edit"){  

		    $this->log_data("Edited a Material");

		    $material_file = '';  
		    if($_FILES["material_file"]["name"] != ''){  
		         $material_file = $this->upload_material(); 
		    }  
		    else{  
		         $material_file = $this->input->post("hidden_material_file");  
		    }  
		    $updated_data = array(  
		         'material_title'          			=>     $this->input->post('material_title'),
		         'material_description'          	=>     $this->input->post('material_description'),    
		         'material_startDate'               =>     $this->input->post('material_startDate'), 
		         'material_endDate'              	=>     $this->input->post('material_endDate'),  
		         'material_source'               	=>     $this->input->post("material_source"),   
		         'material_uploader'               	=>     $this->input->post("material_uploader"),  
		         'material_division'               	=>     $_SESSION['division'], 
		         'material_fileName'               	=>     $info['original_name'], 
		         'material_fileType'               	=>     $info['extension'][1],
		         'file'                     		=>     $info['new_name']
		    );   
		    $this->Main_model->update_material($this->input->post("user_id"), $updated_data);  
		    echo 'Data Updated';  
		}		
	} 

	function upload_material(){
		if(isset ($_FILES['material_file'])){
			$file_info = array();
			$file_info['original_name'] =  ($_FILES['material_file']['name']);
			$file_info['extension'] =  explode('.', $file_info['original_name']);
			$file_info['new_name'] =  rand() . '.' . $file_info['extension'][1];
			$file_info['destination'] =  './upload/' . $file_info['new_name'];
			move_uploaded_file($_FILES['material_file']['tmp_name'], $file_info['destination']);

			return $file_info;
		}
	}

	function fetch_single_material(){  
	   $output = array();  
	   $data = $this->Main_model->fetch_single_material($_POST["user_id"]);  
	   foreach($data as $row){  
	        $output['material_title'] 		= $row->material_title;  
	        $output['material_description'] = $row->material_description; 
	        $output['material_startDate'] 	= $row->material_startDate;  
	        $output['material_endDate'] 	= $row->material_endDate; 
	        $output['material_source'] 		= $row->material_source;   
	        $output['material_uploader'] 	= $row->material_uploader;  
	        $output['material_division'] 	= $row->material_division;  
	        $output['material_fileName'] 	= $row->material_fileName;  
	        $output['material_fileType'] 	= $row->material_fileType;  
	        if($row->file != ''){  
	        	$output['material_file'] = '<img src="'.base_url().'upload/'.$row->file.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_material_file" value="'.$row->file.'" />';  
	        }  
	        else{  
	             $output['material_file'] = '<input type="hidden" name="hidden_material_file" value="" />';  
	        }  
	   }  
	   echo json_encode($output);  
	}  

	function delete_single_material(){  
		$this->Main_model->delete_single_material($_POST["user_id"]);  

		$this->log_data("Deleted a Material");

		echo 'Data Deleted';  
	} 

	public function get_top_category(){
		$data = [];
		
		$record4 = $this->Main_model->encoder_top_category();
		foreach ($record4 as $row4) {
			$data['top_category'] = $row4->categ;
			$data['top_category_material'] = $row4->final_total;
			echo
				"	
				    <p>
				        <i class='fa fa-file-text fa-1x' width='50'></i>
				    </p>
				    <p>
				        <b>" . $data['top_category'] .  "</b>
				    </p>
				    <div class='row'>
				        <div class='col-md-12'>
				            <p class='small '>" . $data['top_category_material'] .  " Materials</p>
				        </div>
				    </div>
				";
		}
	}

	public function update_profile(){

	 	$user_id = $this->input->post('user_id');

    	$update_data = array(
		         'user_firstName'          			=>     $this->input->post('user_firstName'),  
		         'user_lastName'          			=>     $this->input->post('user_lastName'),  
		         'user_fullName'          			=>     $this->input->post('user_firstName')." ".  $this->input->post('user_lastName'),
		         'user_position'          			=>     $this->input->post('user_position'), 
		         'user_email'               		=>     $this->input->post("user_email"),  
		         'user_username'               		=>     $this->input->post("user_username"),  
		         'user_password'               		=>     $this->input->post("user_password"),    
		         'user_confirmPassword'             =>     $this->input->post("user_confirmPassword")
    	);
    	$this->Main_model->update_profile($user_id, $update_data);
    	echo $this->input->post('user_id');


		$this->log_data("Update Profile");
    }

}

?>

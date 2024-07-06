<?php

class Admin_controller extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->database();
		date_default_timezone_set("Asia/Hong_Kong");

		if ($_SESSION['user_logged'] != TRUE) {
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

	public function superadmin_home(){
		$this->load->view('main/header');
		$this->load->view('main/superadmin_home');
		$this->load->view('main/footer');
	}

	public function admin_home(){
		$data = [];

		//Total number of materials encoded by each users
		$query = $this->db->query("SELECT material_uploader , COUNT(material_title) as count FROM tbl_material GROUP BY material_uploader");
		$record = $query->result();

		foreach($record as $row) {
            $data['label'][] = $row->material_uploader; ;
            $data['data'][] = (int) $row->count;
	    }

		//Total number of materials encoded to each categories
		$queryCateg = $this->db->query("SELECT material_category , COUNT(material_title) as countt FROM tbl_material GROUP BY material_category");
		$recordCateg = $queryCateg->result();

		foreach($recordCateg as $row) {
            $data['label2'][] = $row->material_category; ;
            $data['data2'][] = (int) $row->countt;
	    }

		//Total number of materials encoded to each categories
		$queryCategOfUploader = $this->db->query("	SELECT material_category , COUNT(material_title) as counttt
													FROM tbl_material 
													WHERE material_uploader = '" . $_SESSION['uploader'] . "'
													GROUP BY material_category");
		$recordCategOfUploader = $queryCategOfUploader->result();

		foreach($recordCategOfUploader as $row) {
            $data['label3'][] = $row->material_category; ;
            $data['data3'][] = (int) $row->counttt;
	    }

	    // $data['chart_data_categ'] = json_encode($data);
	    $data['chart_data'] = json_encode($data);

		//Total number of downloads
		$query2 = $this->db->query("SELECT COUNT(*) as total from tbl_downloads");
		$record2 = $query2->result();

		//Total number of materials encoded
		$query3 = $this->db->query("SELECT COUNT(*) as total from tbl_material");
		$record3 = $query3->result();

		//Get top encoder
		$query4 = $this->db->query("SELECT name, MAX(total) as final_total FROM
									(SELECT material_uploader as name,  COUNT(material_title) as total from tbl_material GROUP BY material_uploader)
									AS new_table
									GROUP BY total
									ORDER BY total DESC
									LIMIT 1");
		$record4 = $query4->result();

		//Total number of users
		$query5 = $this->db->query("SELECT COUNT(*) as total from tbl_users");
		$record5 = $query5->result();

		$query6 = $this->db->query("SELECT COUNT(*) as total from tbl_visit");
		$record6 = $query6->result();


		foreach ($record2 as $row2) {
			$data['total_download'] = $row2->total;
		}

		foreach ($record3 as $row3) {
			$data['total_material'] = $row3->total;
		}

		foreach ($record4 as $row4) {
			$data['top_encoder'] = $row4->name;
			$data['top_encoder_material'] = $row4->final_total;
		}

		foreach ($record5 as $row5) {
			$data['total_users'] = $row5->total;
		}

		foreach ($record6 as $row6) {
			$data['total_visit'] = $row6->total;
		}

		$_SESSION['total_d'] = $data['total_download'];
		$_SESSION['total_m'] = $data['total_material'];
		$_SESSION['top_e'] = $data['top_encoder'];
		$_SESSION['top_e_m'] = $data['top_encoder_material'];
		$_SESSION['total_u'] = $data['total_users'];
		$_SESSION['total_v'] = $data['total_visit'];

		$this->load->view('main/header');
		$this->load->view('main/admin_home',$data);
		$this->load->view('main/footer');
	}

	public function admin_addMaterial(){
		$this->load->view('main/header');
		$this->load->view('main/admin_addMaterial');
		$this->load->view('main/footer');
	}

	public function admin_verifyMaterial(){
		$this->load->view('main/header');
		$this->load->view('main/admin_verifyMaterial');
		$this->load->view('main/footer');
	}

	public function admin_publishedMaterial(){
		$this->load->view('main/header');
		$this->load->view('main/admin_publishedMaterial');
		$this->load->view('main/footer');
	}

	public function admin_addUser(){
		$this->load->view('main/header');
		$this->load->view('main/admin_addUser');
		$this->load->view('main/footer');
	}

	public function admin_viewUser(){
		$this->load->view('main/header');
		$this->load->view('main/admin_viewUser');
		$this->load->view('main/footer');
	}
	public function admin_profile(){
		$this->load->view('main/header');
		$this->load->view('main/admin_profile');
		$this->load->view('main/footer');
	}


	function fetch_division_material(){  
		$fetch_data = $this->Main_model->make_division_datatables();  
		$data = array();  
		foreach($fetch_data as $row)  
		{  
		    $sub_array 	 = array();  
		    $sub_array[] = $row->material_title;  
		    $sub_array[] = $row->material_description;
		    $sub_array[] = $row->material_category;    
		     
		    $sub_array[] = $row->material_source; 
		    $sub_array[] = $row->material_uploader;  
		    $sub_array[] = $row->material_division;  
		    $sub_array[] = $row->date_created; 
		    $sub_array[] = $row->material_fileType;  
		      
		    $sub_array[] = '<button type="button" name="update" id="'.$row->material_id.'" class="btn btn-warning btn-xs update">Update</button>';  
		    $sub_array[] = '<button type="button" name="unpublish" id="'.$row->material_id.'" class="btn btn-success btn-xs unpublish">Unpublish</button>';  
		    $sub_array[] = '<button type="button" name="delete" id="'.$row->material_id.'" class="btn btn-danger btn-xs delete">Delete</button>';    
		    
		    $data[]		 = $sub_array;  
		}  
		$output = array(  
		    "draw"                    	=>     intval($_POST["draw"]),  
		    "recordsTotal"          	=>     $this->Main_model->get_all_division_material(),  
		    "recordsFiltered"     		=>     $this->Main_model->get_filtered_division_material(),  
		    "data"                    	=>     $data  
		);  
		echo json_encode($output);  
	} 


	function fetch_material(){  
		$fetch_data = $this->Main_model->make_datatables();  
		$data = array();  
		foreach($fetch_data as $row)  
		{  
		    $sub_array 	 = array();  
		    $sub_array[] = $row->material_title;  
		    $sub_array[] = $row->material_description;
		    $sub_array[] = $row->material_category;    
		     
		    $sub_array[] = $row->material_source; 
		    $sub_array[] = $row->material_uploader;  
		    $sub_array[] = $row->material_division;  
		    $sub_array[] = $row->material_fileType;  
		      
		    $sub_array[] = '<button type="button" name="update" id="'.$row->material_id.'" class="btn btn-warning btn-xs update">Update</button>';  
		    $sub_array[] = '<button type="button" name="delete" id="'.$row->material_id.'" class="btn btn-danger btn-xs delete">Delete</button>';    
		    
		    $data[]		 = $sub_array;  
		}  
		$output = array(  
		    "draw"                    	=>     intval($_POST["draw"]),  
		    "recordsTotal"          	=>     $this->Main_model->get_all_material(),  
		    "recordsFiltered"     		=>     $this->Main_model->get_filtered_material(),  
		    "data"                    	=>     $data  
		);  
		echo json_encode($output);  
	} 

	// function fetch_publish_material(){  
	// 	$fetch_data = $this->Main_model->make_datatables_publish();  
	// 	$data = array();  
	// 	foreach($fetch_data as $row)  
	// 	{  
	// 	    $sub_array 	 = array();  
	// 	    $sub_array[] = $row->publish_title;  
	// 	    $sub_array[] = $row->publish_description;  
	// 	    $sub_array[] = $row->publish_category;  
		      
	// 	    $sub_array[] = $row->publish_source; 
	// 	    $sub_array[] = $row->publish_uploader;  
	// 	    $sub_array[] = $row->publish_division;  
	// 	    $sub_array[] = $row->publish_fileType;  
		       
	// 	    $sub_array[] = '<button type="button" name="update" id="'.$row->publish_id.'" class="btn btn-warning btn-xs update">Update</button>';  
	// 	    $sub_array[] = '<button type="button" name="publish" id="'.$row->publish_id.'" class="btn btn-success btn-xs publish">Publish</button>';   
	// 	    $sub_array[] = '<button type="button" name="delete" id="'.$row->publish_id.'" class="btn btn-danger btn-xs delete">Delete</button>';   
		     
	// 	    $data[]		 = $sub_array;  
	// 	}  
	// 	$output = array(  
	// 	    "draw"                    	=>     intval($_POST["draw"]),  
	// 	    "recordsTotal"          	=>     $this->Main_model->get_all_material_publish(),  
	// 	    "recordsFiltered"     		=>     $this->Main_model->get_filtered_material_publish(),  
	// 	    "data"                    	=>     $data  
	// 	);  
	// 	echo json_encode($output);  
	// }  

	function fetch_division_publish_material(){  
		$fetch_data = $this->Main_model->make_division_datatables_publish();  
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
		    $sub_array[] = $row->date_created;  
		    $sub_array[] = $row->publish_fileType;  
		       
		    $sub_array[] = '<button type="button" name="update" id="'.$row->publish_id.'" class="btn btn-warning btn-xs update">Update</button>';  
		    $sub_array[] = '<button type="button" name="publish" id="'.$row->publish_id.'" class="btn btn-success btn-xs publish">Publish</button>';   
		    $sub_array[] = '<button type="button" name="delete" id="'.$row->publish_id.'" class="btn btn-danger btn-xs delete">Delete</button>';   
		     
		    $data[]		 = $sub_array;  
		}  
		$output = array(  
		    // "draw"                    	=>     intval($_POST["draw"]),  
		    "recordsTotal"          	=>     $this->Main_model->get_all_division_material_publish(),  
		    "recordsFiltered"     		=>     $this->Main_model->get_division_filtered_material_publish(),  
		    "data"                    	=>     $data  
		);  
		echo json_encode($output);  
	}

	// function fetch_material_home(){  
	// 	$fetch_data = $this->Main_model->make_datatables();  
	// 	$data = array();  
	// 	foreach($fetch_data as $row)  
	// 	{  
	// 	    $sub_array 	 = array();  
	// 	    $sub_array[] = $row->material_title;  
	// 	    $sub_array[] = $row->material_description;  
	// 	    $sub_array[] = $row->material_category;  
		       
	// 	    $sub_array[] = $row->material_source; 
	// 	    $sub_array[] = $row->material_uploader;  
	// 	    $sub_array[] = $row->material_division;  
	// 	    $sub_array[] = $row->material_fileName;  
	// 	    $sub_array[] = $row->material_fileType;  
		     
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
		         'publish_title'          			=>     $this->input->post('material_title'),  
		         'publish_description'          	=>     $this->input->post('material_description'),  
		         'publish_category'          		=>     $this->input->post('material_category'),  
		         
		         'publish_source'               	=>     $this->input->post("material_source"),    
		         'publish_uploader'               	=>     $_SESSION['uploader'],  
		         'publish_division'               	=>     $_SESSION['division'], 
		         
		         'publish_fileName'                 =>     $info['original_name'], 
		         'publish_fileType'               	=>     $info['extension'],
		         'file'                     		=>     $info['new_name']
		    );  
		    $this->Main_model->insert_material($insert_data);  
		    // echo  $info['extension'][1]; 
		    // $this->load->view('main/admin_addMaterial');
		    // redirect(base_url() . 'admin/material/add', "refresh");
		}  

		if($_POST["action"] == "Edit"){  

		    $this->log_data("Edited a Published Material");
 
		    $updated_data = array(  
		         'material_title'          			=>     $this->input->post('material_title'),
		         'material_description'          	=>     $this->input->post('material_description'),  
		         'material_category'          		=>     $this->input->post('material_category'),  
		           
		         'material_source'               	=>     $this->input->post("material_source"),   
		         
		    );   
		    $this->Main_model->update_material($this->input->post("user_id"), $updated_data);  
		    echo 'Data Updated';  
		}		
	} 

	function publish_material(){  
	   $data = $this->Main_model->fetch_publish_material($_POST["user_id"]); 

	   $this->log_data("Published a Material");


	   foreach ($data as $row) {
	   		$output = array(
	   			'material_title'  		=> $row->publish_title,
	   			'material_description'	=> $row->publish_description,
	   			'material_category'		=> $row->publish_category,
	   			'material_source'		=> $row->publish_source,
	   			'material_uploader'		=> $row->publish_uploader,
	   			'material_division'		=> $row->publish_division,
	   			'material_fileName'		=> $row->publish_fileName,
	   			'material_fileType'		=> $row->publish_fileType,
	   			'file'					=> $row->file,
	   			'date_created'			=> $row->date_created
	   		);
	   }
	    
	   $this->Main_model->insert_publish_material($output);
	   $this->Main_model->delete_publish_material($_POST["user_id"]);  
	   echo "Published!!";
	} 

	function unpublish_material(){  
	   $data = $this->Main_model->fetch_unpublish_material($_POST["user_id"]); 

	   $this->log_data("Unpublished a Material");

	   foreach ($data as $row) {
	   		$output = array(
	   			'publish_title'  		=> $row->material_title,
	   			'publish_description'	=> $row->material_description,
	   			'publish_category'		=> $row->material_category,
	   			'publish_source'		=> $row->material_source,
	   			'publish_uploader'		=> $row->material_uploader,
	   			'publish_division'		=> $row->material_division,
	   			'publish_fileName'		=> $row->material_fileName,
	   			'publish_fileType'		=> $row->material_fileType,
	   			'file'					=> $row->file,
	   			'date_created'			=> $row->date_created
	   		);
	   }
	    
	   $this->Main_model->insert_unpublish_material($output);
	   $this->Main_model->delete_unpublish_material($_POST["user_id"]);  
	   echo "Published!!";
	} 

	function published_action(){  
		if($_POST["action"] == "Edit"){  

		    $this->log_data("Edited a material");
 
		    $updated_data = array(  
		         'publish_title'          			=>     $this->input->post('publish_title'),
		         'publish_description'          	=>     $this->input->post('publish_description'),  
		         'publish_category'          		=>     $this->input->post('publish_category'),  
		           
		         'publish_source'               	=>     $this->input->post("publish_source"),   
		         
		    );   
		    $this->Main_model->update_to_publish_material($this->input->post("user_id"), $updated_data);  
		    echo 'Data Updated';  
		}		
	}

	function upload_material(){
		
		if(isset ($_FILES['material_file'])){
			$file_info = array();
			$file_info['original_name'] =  ($_FILES['material_file']['name']);
			// $file_info['extension'] =  explode('.', $file_info['original_name']);

			$a = explode(".", $_FILES['material_file']['name']);
			$count = count($a);
			$file_info['extension'] = $a[$count-1];
			

			$file_info['new_name'] =  rand() . 'AAA' . '.' . $file_info['extension'];
			$file_info['destination'] =  './upload/' . $file_info['new_name'];

			// move_uploaded_file($_FILES['new_name']['tmp_name'], $file_info['destination']);
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
	        $output['material_category'] 	= $row->material_category; 
	        
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

	function fetch_to_publish_material(){  
	   $output = array();  
	   $data = $this->Main_model->fetch_to_publish_material($_POST["user_id"]);  
	   foreach($data as $row){  
	        $output['publish_title'] 		= $row->publish_title;  
	        $output['publish_description']	= $row->publish_description; 
	        $output['publish_category'] 	= $row->publish_category; 
	        
	        $output['publish_source'] 		= $row->publish_source;   
	        $output['publish_uploader'] 	= $row->publish_uploader;  
	        $output['publish_division'] 	= $row->publish_division;  
	        $output['publish_fileName'] 	= $row->publish_fileName;  
	        $output['publish_fileType'] 	= $row->publish_fileType;  
	        
	   }  
	   echo json_encode($output);  
	}  

	function delete_single_material(){  
	   $this->Main_model->delete_single_material($_POST["user_id"]);  
	   echo 'Data Deleted';  
	   $this->log_data("Deleted a published material");
	} 

	function delete_single_publish_material(){  
	   $this->Main_model->delete_single_publish_material($_POST["user_id"]);  
	   echo 'Data Deleted';  
	   $this->log_data("Deleted a material");
	} 



	// ==================================== //
	// USER
	// ==================================== //

	function fetch_user(){  
		$fetch_data = $this->Main_model->make_datatables_user();  
		$data = array();  
		foreach($fetch_data as $row)  
		{  
		    $sub_array 	 = array();  
		    // $sub_array[] = $row->user_firstName;  
		    // $sub_array[] = $row->user_lastName;  
		    $sub_array[] = $row->user_firstName ." " .$row->user_lastName;  
		    $sub_array[] = $row->user_position; 
		    $sub_array[] = $row->user_sex;   
		    $sub_array[] = $row->user_email; 
		    $sub_array[] = $row->user_username;   
		    // $sub_array[] = $row->user_password; 
		    // $sub_array[] = $row->user_confirmPassword; 
		    $sub_array[] = $row->user_division;  
		    // $sub_array[] = $row->user_role;    
		    $sub_array[] = date('Y-m-d H:i:s'); 
		    $sub_array[] = '<button type="button" name="update" id="'.$row->id_user.'" class="btn btn-warning btn-xs update">Update</button>';  
		    $sub_array[] = '<button type="button" name="delete" id="'.$row->id_user.'" class="btn btn-danger btn-xs delete">Delete</button>';    
		    $data[]		 = $sub_array;  
		}  
		$output = array(  
		    "draw"                    	=>     intval($_POST["draw"]),  
		    "recordsTotal"          	=>     $this->Main_model->get_all_user(),  
		    "recordsFiltered"     		=>     $this->Main_model->get_filtered_user(),  
		    "data"                    	=>     $data  
		);  
		echo json_encode($output);  
	}

	function user_action(){  
		if($_POST["action"] == "Add"){  

		    $this->log_data("Added a User");

		    $insert_data = array(  
		         'user_firstName'          			=>     $this->input->post('user_firstName'),  
		         'user_lastName'          			=>     $this->input->post('user_lastName'),  
		         'user_fullName'          			=>     $this->input->post('user_firstName')." ".  $this->input->post('user_lastName'),
		         'user_position'          			=>     $this->input->post('user_position'),
		         'user_sex'          				=>     $this->input->post('user_sex'), 
		         'user_email'               		=>     $this->input->post('user_email'),  
		         'user_username'               		=>     $this->input->post('user_username'),  
		         'user_password'               		=>     $this->input->post('user_password'),    
		         'user_confirmPassword'             =>     $this->input->post('user_confirmPassword'),  
		         'user_division'               		=>      $_SESSION['division'], 
		         'user_role'                		=>     "Encoder",
		         'date_created' 					=>		date('Y-m-d H:i:s')
		    );  
		    $this->Main_model->insert_user($insert_data);  
		    echo  "User Added"; 
		}  

		if($_POST["action"] == "Edit"){  

		    $this->log_data("Edited a User");

		    $updated_data = array(  
		         'user_firstName'          			=>     $this->input->post('user_firstName'),  
		         'user_lastName'          			=>     $this->input->post('user_lastName'),  
		         'user_fullName'          			=>     $this->input->post('user_firstName')." ".  $this->input->post('user_lastName'),
		         'user_position'          			=>     $this->input->post('user_position'),
		         'user_sex'          				=>     $this->input->post('user_sex'), 
		         'user_email'               		=>     $this->input->post('user_email'),  
		         'user_username'               		=>     $this->input->post('user_username'),  
		         'user_password'               		=>     $this->input->post('user_password'),    
		         'user_confirmPassword'             =>     $this->input->post('user_confirmPassword'),  
		         'user_division'               		=>     $this->input->post('user_division') 
		         // 'user_role'                		=>     $this->input->post("user_role")
		    );  
		    $this->Main_model->update_user($this->input->post("user_id"), $updated_data);  
		    echo 'User Updated';  
		}		
	} 

	function fetch_single_user(){  
	   $output = array();  
	   $data = $this->Main_model->fetch_single_user($_POST["user_id"]);  
	   foreach($data as $row){  
	        $output['user_firstName'] 		= $row->user_firstName;  
	        $output['user_lastName'] 		= $row->user_lastName; 
	        $output['user_position'] 		= $row->user_position; 
	        $output['user_sex'] 			= $row->user_sex; 
	        $output['user_email'] 			= $row->user_email;  
	        $output['user_username'] 		= $row->user_username; 
	        $output['user_password'] 		= $row->user_password;   
	        $output['user_confirmPassword']	= $row->user_confirmPassword;  
	        $output['user_division'] 		= $row->user_division;  
	        // $output['user_role'] 			= $row->user_role;  
	   }  
	   echo json_encode($output);  
	}

	function delete_single_user(){  
		$this->Main_model->delete_single_user($_POST["user_id"]);  

		$this->log_data("Deleted a User");

		echo 'User Deleted';  
	} 

	

	public function get_top_encoder(){
		$data = [];

		$record4 = $this->Main_model->top_encoder();

		foreach ($record4 as $row4) {
			$data['top_encoder'] = $row4->name;
			$data['top_encoder_material'] = $row4->final_total;
			echo
				"	
				    <p>
				        <i class='fa fa-user fa-2x' width='50' style='color: #01579B'></i>
				    </p>
				    <p>
				        <b>" . $data['top_encoder'] .  "</b>
				    </p>
				    <div class='row'>
				        <div class='col-md-12'>
				            <p class='small '>" . $data['top_encoder_material'] .  " Materials</p>
				        </div>
				    </div>
				";
		}
	}

	public function get_top_category(){
		$data = [];
		
		$record4 = $this->Main_model->top_category();
		foreach ($record4 as $row4) {
			$data['top_category'] = $row4->categ;
			$data['top_category_material'] = $row4->final_total;
			echo
				"	
				    <p>
				        <i class='fa fa-file-text fa-2x' width='50' style='color: #01579B'></i>
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

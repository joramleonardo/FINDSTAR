<?php

class Main_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->database();
		date_default_timezone_set("Asia/Hong_Kong");
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

	public function home(){
		$this->load->view('main/search_home');
	}

	public function present(){
		$this->load->view('main/present');
	}

	public function search_result(){
		if(isset($_POST['search'])){

			$search_val = $_POST['search_term'];
 

			if ($search_val != ""){
				$data['record'] = $this->Main_model->get_search($search_val);

				
				$_SESSION['highlighted_text'] = "<span style='font-weight:bold;background-color: #6CAFE5;'>$search_val</span>";
				$_SESSION['search_phrase'] = $search_val;
				
				$_SESSION['total_search'] = count($data['record']);

				$this->load->view('main/search_display', $data);
			}
			else{
				$this->load->view('main/search_home');
			}
		}
	}

	public function advance_search_result(){
		if(isset($_POST['advance_search'])){

			$search_val = $_POST['search_term_advance'];
			$search_year = $_POST['material_year'];
			$search_categ = $_POST['material_category'];
 

			// $insert_data = array(
			// 		'try_term'		=> 	$search_val, 
			// 		'try_categ'		=>  $search_year, 
			// 		'try_date'		=>  $search_categ
			// );
			// $this->Main_model->insert_try($insert_data); 

			if 		($search_val != "" && $search_year != "" && $search_categ != ""){	// keyword + year + category
				
			}
			else if ($search_val != "" && $search_year != "" && $search_categ == ""){	// keyword + year 

			}
			else if ($search_val != "" && $search_year == "" && $search_categ != ""){	// keyword + category
				
			}
			else if ($search_val == "" && $search_year != "" && $search_categ != ""){	// year + category
				
			}
			else if ($search_val == "" && $search_year != "" && $search_categ == ""){	// year
				
			}
			else if ($search_val == "" && $search_year == "" && $search_categ != ""){	// category
				
			}
			else if ($search_val != "" && $search_year == "" && $search_categ == ""){	// keyword
				
			}

			// if ($search_val != "" && $search_year != "" && $search_categ == ""){
			// 	$data['record'] = $this->Main_model->get_search_advance_year($search_val, $search_categ);

			// 	$_SESSION['highlighted_text'] = "<span style='font-weight:bold;background-color: #6CAFE5;'>$search_val</span>";
			// 	$_SESSION['search_phrase'] = $search_val;
				
			// 	$_SESSION['total_search'] = count($data['record']);

			// 	$this->load->view('main/search_display', $data);
			// }
			// else if($search_val != "" && $search_categ != "" && $search_year == ""){
			// 	$data['record'] = $this->Main_model->get_search_advance_categ($search_val, $search_categ);
			// }
			// else if($search_val == "" && $search_categ != "" && $search_year != ""){
			// 	$data['record'] = $this->Main_model->get_search_advance_keyword($search_val, $search_categ);
			// }
			// else if($search_val == "" && $search_categ == "" && $search_year == ""){
			// 	$this->load->view('main/search_home');
			// }
		}
	}

	public function logout(){
		unset($_SESSION);
		session_destroy();
		$this->load->view('main/header_login');
		$this->load->view('main/login');
	}

	public function login(){
		$this->load->view('main/header_login');
		$this->load->view('main/login');
	}

	//count total download and then insert to database the data.
    public function total_download(){
		$insert_data = array(
				'material_id'		=>     $this->input->post('material_id')
		);
		$this->Main_model->total_download($insert_data);  
    }

	//count total visit and then insert to database the data.
    public function total_visit(){
		$insert_data = array(
				'visit_term'		=> 	$this->input->post('text'), 
				'visit_date'		=>  date('Y-m-d H:i:s')
		);
		$this->Main_model->total_visit($insert_data);  
    }

	public function get_total_materials(){
		$query = $this->db->query("SELECT COUNT(*) FROM tbl_material");
		$record = $query->result();
		echo $record;
	}

	public function fetch_single_search(){
		$user_id = $_POST['user_id'];
		$output = array();
		$data = $this->Main_model->fetch_single_search($user_id);
		foreach ($data as $row){
			$output['material_title'] = $row->material_title;
			$output['material_description'] = $row->material_description;
			$output['material_fileName'] = $row->material_fileName;
			$output['material_id'] = $row->material_id;
		}
		echo json_encode($output);
	}

	public function login_validation(){

		$this->form_validation->set_rules('user_username', 'Username', 'required');
		$this->form_validation->set_rules('user_password', 'Passowrd', 'required');

		if ($this->form_validation->run() == TRUE) {
			 	$user_username = $this->input->post('user_username');
				$user_password = $this->input->post('user_password');

				$role = $this->Main_model->can_login($user_username, $user_password);
				
				if ($role != "") {
					$_SESSION['user_logged'] = TRUE;

					if ($role == 'Encoder') {
						$this->log_data("Login");
				 		redirect(base_url() . 'encoder', "refresh");
					}
					else if ($role == 'Admin') {
						$this->log_data("Login");
				 		redirect(base_url() . 'admin', "refresh");
					}
					else if ($role == 'Super Admin') {
						$this->log_data("Login");
				 		redirect(base_url() . 'superadmin', "refresh");
					}

				}
				else if($role == FALSE){
					$this->session->set_flashdata('error', 'Invalid Username and Password');
			 		redirect(base_url() . 'login', "refresh");
				}
		}
		else{
			$this->login();
		}
	}

	public function check_username_exist(){

	 	$user_username = $this->input->post('user_username');

		$data = $this->Main_model->can_add_user($user_username);
				
		if ($data == TRUE){
			echo "taken";
		}
		else{
			echo "not";
		}
	}

	public function check_rate_record(){
		$user_email  = $this->input->post('user_email');
		$material_id = $this->input->post('material_id');

		$data = $this->Main_model->check_rate_record($user_email, $material_id);

		if ($data == TRUE) {
			echo "old";
		}
		else{
			echo "new";
		}
	}

	public function submit_rate_form(){
		$insert_data = array(  
				'user_name'          			=>     $this->input->post('user_name'),  
				'user_email'          			=>     $this->input->post('user_email'), 
				'material_id'          		=>     $this->input->post('material_id'), 
				'material_title'          		=>     $this->input->post('material_title'),
				'rate'          				=>     $this->input->post('rate')

		    );  
		    $this->Main_model->insert_rate($insert_data);  
		    echo  "Thank you for rating!"; 
	}

	public function update_rate_form(){
		$user_email  = $this->input->post('user_email');
		$material_id = $this->input->post('material_id');

		$update_data = array(  
		        'rate'          				=>     $this->input->post('rate')
	    );  
	    $this->Main_model->update_rate($user_email, $material_id, $update_data);  
	    echo  "Thank you for rating!"; 
	}



	// public function recent_activity(){
	// 	$query = $this->db->query("SELECT TIME_FORMAT(log_date, '%s') as date_log, 
	// 							   log_name as name_log, 
	// 							   log_activity as activity_log
	// 							   FROM tbl_logs 
	// 							   ORDER BY log_date ASC
	// 							   LIMIT 5 ");

	// 	$record = $query->result();
	// 	$data = [];
	// 	foreach($record as $row){
	// 		$data['date'] = $row->date_log;
	// 		$data['name'] = $row->name_log;
	// 		$data['act'] = $row->activity_log;

	// 		echo
	// 			"<div class='desc'>
	//               <div class='thumb'>
	//                 <span class='badge bg-theme'><i class='fa fa-clock-o'></i></span>
	//               </div>
	//               <div class='details'>
	//                 <p>
	//                   <muted>" . $data['date'] .  " SECONDS AGO </muted>
	//                   <br/>
	//                   <a href='#'>" . $data['name'] . "</a> " . $data['act'] ."<br/>
	//                 </p>
	//               </div>
	//             </div>";
	// 	}
	// }



}

?>

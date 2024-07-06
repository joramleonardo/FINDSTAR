<?php

class SuperAdmin_controller extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->database();
		if ($_SESSION['user_logged'] != TRUE) {
			$this->session->set_flashdata("error", "Please login to continue to this page.");
			redirect(base_url() . 'login', "refresh");
		}
    }

	public function superadmin_home(){
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

		$_SESSION['total_d'] 	= $data['total_download'];
		$_SESSION['total_m'] 	= $data['total_material'];
		$_SESSION['top_e'] 		= $data['top_encoder'];
		$_SESSION['top_e_m'] 	= $data['top_encoder_material'];
		$_SESSION['total_u'] 	= $data['total_users'];


		$this->load->view('main/header');
		$this->load->view('main/superadmin_home',$data);
		$this->load->view('main/footer');
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
				        <i class='fa fa-user fa-4x' width='50'></i>
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
				        <i class='fa fa-bars fa-4x' width='50'></i>
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


}

?>

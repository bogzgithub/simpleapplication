<?php

class Home extends MY_Controller{

	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');

		if ($this->session->userdata('email_address') == null){
			redirect('login');
		}

		$this->load->model("users/UsersModel");
	}

	public function index(){
		$data["title"] = "Homepage";
		// load the header
		$this->load->view("template/header_template_v",$data);

		$this->load->view("home_v");

		// load modal
		$this->load->view("template/modal_template_v");
		// load the footer
		$this->load->view("template/footer_template_v");
	}

	public function logout(){
		if (isset($_GET["confirm_logout"])
			&& $_GET["confirm_logout"] == "Yes"){	

			$data = array(
				"user_id" => $this->session->userdata("user_id")
			);

			$users_class = new UsersModel;
			$users_class->updateLogoutStatus($data);

			$this->session->unset_userdata("email_address");
			redirect('login');

		}
		else {
			echo "Not Authorized!";
		}
	}

	public function updateProfileForm(){
		if (isset($_POST["update"])){
			$this->load->view("update_profile_pic_v");
		}
		else {
			echo "Not Authorized!";
		}
	}

	public function changeProfilePicScript(){
		if (isset($_FILES["profile_pic_file"])){
			$config['upload_path']   = './assets/img/profile_image'; 
			$path = "assets/img/profile_image/";
			$file_ext = pathinfo($_FILES["profile_pic_file"]["name"], PATHINFO_EXTENSION);
			$file_name = $this->session->userdata('user_id') . "_" . $this->session->userdata('last_name') . "_" . date("YmdHis");
			$config['file_name'] = $this->session->userdata('user_id') . "_" . $this->session->userdata('last_name') . "_" . date("YmdHis");
	        $config['allowed_types'] = 'gif|jpg|png'; 
	        $config['max_size']      = 1000; 
	        $config['max_width']     = 1024; 
	        $config['max_height']    = 768;  
        	$this->load->library('upload', $config);
			
         	if (!$this->upload->do_upload('profile_pic_file')) {
	            $error = array('error' => $this->upload->display_errors()); 

	            echo json_encode($error);
         	}
			
	        else { 

	        	if ($this->session->userdata('profile_path') != ""){
	        		unlink( "./" . $this->session->userdata('profile_path')); // This is a relative path to the file
	        	}

	            $data = array('upload_data' => $this->upload->data()); 

	            // update profile name and profile path
	           	$users_class = new UsersModel;

	           	$data = array(
					"user_id" => $this->session->userdata('user_id'),
					"profile_name" => $file_name,
					"profile_path" => $path."/".$file_name .".".$file_ext
				);

	           	$this->session->set_userdata('profile_path',$path."/".$file_name .".".$file_ext);

	            $users_class->updateProfilePictureInfo($data);
	            
	            $this->session->set_flashdata('success','Successfully Updated Profile Picture');
	        	// go the homepage
	        	$data  = array('success' => "success" , "errors" => ""); 

	        	echo json_encode($data);

	        } 


		}
		else {
			echo "Not Authorized!";
		}
	}
}


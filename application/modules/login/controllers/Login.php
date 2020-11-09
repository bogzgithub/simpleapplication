<?php

class Login extends MY_Controller{

	function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Manila');
		
		if ($this->session->userdata('email_address') != null){
			redirect('home');
		}

		$this->load->model("users/UsersModel");
	}

	public function index(){
		$data["title"] = "Log In Form";
		// load the header
		$this->load->view("template/header_template_v",$data);

		$this->load->view("login_v");

		// load modal
		$this->load->view("template/modal_template_v");
		// load the footer
		$this->load->view("template/footer_template_v");
	}

	public function checkExistEmailAddress(){

		if (isset($_POST["email_address"])){

			$email_address = $this->input->post("email_address");

			//echo $email_address;

			$users_class = new UsersModel;

			$locked_status = 0;
			foreach($users_class->getUserByEmailAddress($email_address) as $row){
				$locked_status = $row->locked_status;
			}

			$result = array(
							"count" => $users_class->checkExistEmailAddress($email_address),
							"locked_status" => $locked_status
							);
			echo json_encode($result);
				
		}
		else {
			echo "Not Authorized!";
		}
	}


	public function loginScript(){
		if (isset($_POST["email_address"]) && isset($_POST["password"]) && isset($_POST["attempt"])){
			
			$users_class = new UsersModel;
			$email_address = $this->input->post("email_address");
			$password = $this->input->post("password");
			$attempt = $this->input->post("attempt");

			$correct_pass = 0;
			foreach($users_class->getUserByEmailAddress($email_address) as $row){

				$data = array(
					"user_id" => $row->user_id,
					"email_address" => $row->email_address,
					"first_name" => $row->first_name,
					"middle_name" => $row->middle_name,
					"last_name" => $row->last_name,
					"suffix" => $row->suffix,
					"profile_name" => $row->profile_name,
					"profile_path" => $row->profile_path,
					"login_status" => 1,
					"role" => $row->role,
					"login_date" => date("Y-m-d H:i:s")
				);

				if (password_verify($password, $row->password)) {
				    $correct_pass = 1;

				    // setting session
				    $this->session->set_userdata($data);

				    // update login status
				    $users_class->updateLoginStatus($data);
				}	
			}

			if ($attempt == 2 && $correct_pass == 0){ // it means 3 attems na
				// for locking accounts
				$data  = array(
					"email_address" => $email_address
				);
				$users_class->lockedUsersByEmailAddress($data);
			}

			echo $correct_pass;

		}
		else {
			echo "Not Authorized!";
		}
	}


}


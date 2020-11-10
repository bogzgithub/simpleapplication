<?php

class Register extends MY_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model("users/UsersModel");

	}

	public function index(){
		
	}

	public function getRegistrationForm(){

		if (isset($_POST["register"])){
			$this->load->view("register_v");
		}
		else {
			echo "Not Authorized!";
		}
	}

	public function checkExistEmailAddress(){

		if (isset($_POST["email_address"])){

			$email_address = $this->input->post("email_address");

			//echo $email_address;

			$users_class = new UsersModel;

			echo $users_class->checkExistEmailAddress($email_address);
		}
		else {
			echo "Not Authorized!";
		}
	}

	public function registerScript(){

		if (isset($_POST["first_name"]) && isset($_POST["middle_name"]) && isset($_POST["last_name"]) &&
			isset($_POST["suffix"]) && isset($_POST["email_address"]) && isset($_POST["password"])){

			$data = array(
						'first_name'=>$this->input->post("first_name"),
                    	'middle_name'=>$this->input->post("middle_name"),
                    	'last_name'=>$this->input->post("last_name"),
                    	'suffix'=>$this->input->post("suffix"),
                    	'email_address'=>$this->input->post("email_address"),
                    	'password'=>password_hash($this->input->post("password"), PASSWORD_DEFAULT)
                    	);

			$users_class = new UsersModel;

			$users_class->insertUser($data);

		}
		else {
			echo "Not Authorized!";
		}
	}
}


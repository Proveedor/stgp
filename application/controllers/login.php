<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('login',TRUE);
	}

	public function validate_user() {
		$this->load->model('user_model');	
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//creo el nuevo usuario
		$response = $this->user_model->login_user($email, $password);
		var_dump($response);
		if($response == TRUE) {
			$data = array(
	            'is_logued_in' 	=> 		TRUE,
	            'id'			=>		$response->id,
	            'name' 			=> 		$response->name,
	            'perfil' 		=> 		'usuario'
    		);		
			$this->session->set_userdata($data);
			redirect('main/index');
		} else {

		}

	}
}

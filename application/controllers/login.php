<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/TcgTrade.php';

class Login extends TcgTrade_Controller {

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
		$response = $this->user_model->login_user($email, $password);
		if($response == TRUE) {
			$data = array(
	            'is_logued_in' 	=> 		TRUE,
	            'id'			=>		$response->id,
	            'name' 			=> 		$response->name,
	            'perfil' 		=> 		'usuario'
    		);		
			$this->session->set_userdata($data);
			echo json_encode(array('result' => true ));
		} else {
			echo json_encode(array('result' => false, 'message' => 'Usuario o contraseña invalidos' ));
		}

	}
}

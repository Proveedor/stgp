<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/TcgTrade.php';

class Register extends TcgTrade_Controller {

	public function __construct() {
        parent::__construct();
        //Cargo la libreria de validacion de formulario
		$this->load->library('form_validation');
    }

	public function index()
	{		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_conf]|min_length[5]');
		$this->form_validation->set_rules('password_conf', 'Confirmacion Password', 'trim|required');
		$this->form_validation->set_rules('country', 'Pais', 'trim|required');

		//Obtengo los parametros pasados por post
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$country = $this->input->post('country');


		if ($this->form_validation->run() == FALSE) {
		   //Acción a tomar si existe un error el en la validación
			$data = array(
				'v_email' => $email,
				'v_password' => $password,
				'v_name' => $name,
				'v_city' => $city,
				'v_country' => $country
			);
			$this->template->load('template', 'register_form', $data);
		} else {
			//Acción a tomas si no existe ningun error
			$result = $this->create_user($email, $password,$name,$city,$country);
			$this->_data['result'] = $result;
			if($result){
				$this->template->load('template', 'register_success', $this->_data);
			} else {
				$this->template->load('template', 'register_error', $this->_data);
			}
		}

	}

	private function create_user($email, $password,$name,$city,$country) {
		//Cargo el model
		$this->load->model('user_model');	
		//creo el nuevo usuario
		$response = $this->user_model->new_user($email, $password,$name,$city,$country);
		return $response;
	}
}
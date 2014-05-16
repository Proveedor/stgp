<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data = array();
		$data['is_logued_in'] = $this->session->userdata('is_logued_in');
		if($data['is_logued_in'] == TRUE) {
			$data['name'] = $this->session->userdata('name');
		}
		$this->template->set('login' , $this->load->view('login', $data , TRUE) );
		$this->template->load('template', 'main_index', $data);
	}

}

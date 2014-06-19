<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TcgTrade_Controller extends CI_Controller {

	protected $_data = array();

	public function __construct() {
		
		parent::__construct();

		$this->_data['is_logued_in'] = $this->session->userdata('is_logued_in');
		if($this->_data['is_logued_in'] == TRUE) {
			$this->_data['name'] = $this->session->userdata('name');
			$this->_data['perfil'] = $this->session->userdata('perfil');
			$this->_data['enable_sidebar'] = true;

		}
		$this->template->set('login' , $this->load->view('login', $this->_data , TRUE) );
		$this->template->set('sidebar' , $this->load->view('sidebar', $this->_data , TRUE) );
    }

}

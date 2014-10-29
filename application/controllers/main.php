<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/TcgTrade.php';

class Main extends TcgTrade_Controller {

	public function __construct() {
		parent::__construct();
    }

	public function index()
	{
		$this->template->load('template', 'main_index', $this->_data);
	}

	public function my_cards()
	{

		$this->security_check();
		$this->load->model('cards_model');
		$response = $this->cards_model->get_cards_for($this->session->userdata('id'));
		$this->_data['card_list'] = $response;
		$this->load->helper('get_img');
		$this->template->load('template', 'my_cards', $this->_data);
	}	

}

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data_session_set = array('logged' => 1, 'username' => 'admin');
		$this->session->set_userdata($data_session_set);
		$this->load->view('welcome_message');
	}
}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data = [];
		$data['title'] = 'Index page';
		$this->load->view('main', $data);
	}
}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Main extends Admin_Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'Admin page';
        $this->load->view('main', $data, 'admin');
    }
}

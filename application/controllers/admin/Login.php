<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends Admin_Controller
{
    public function index()
    {
        $data = [];
        show_error('ошибка', 500);
        $data['title'] = 'Login page';
        $this->load->view('main', $data);
    }
}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends Admin_Controller
{
    public function index()
    {
        $data = [];

        $data['title'] = 'Login page';
        $this->load->view('main', $data);
    }

    public function error(){
        show_error('Ошибка', 500, 'Произошла ошибка');
    }
}
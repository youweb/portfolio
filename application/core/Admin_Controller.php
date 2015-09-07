<?php

if ( !defined('BASEPATH') ) {
    exit('No direct script access allowed');
}

/**
 * Class Admin_Controller
 * @property Admin_Controller $admin_controller
 */
class Admin_Controller extends MY_Controller
{
    protected $_admin = false;

    /**
     * @return bool
     */
    public function check_admin_login()
    {
        if ( $this->session->userdata('logged_admin') ) {
            return true;
        }
        return false;
    }

    /**
     * @param null $url
     */
    public function redirect($url = null)
    {
        $url = (is_null($url)) ? $this->router->default_controller : $url;
        redirect('/' . $this->config->item('admin_page') . '/' . $url);
    }

    public function __construct()
    {
        parent::__construct();
        if ( !$this->check_admin_login() ) {
            if ( $this->router->class != 'login' ) {
                $this->redirect('login');
            }else{

            }
        }else{
            $this->_admin = true;
        }
    }
}
<?php

if ( !defined('BASEPATH') ) {
    exit('No direct script access allowed');
}

/**
 * Class MY_Controller
 * @property MY_Controller $my_controller
 */
class MY_Controller extends CI_Controller
{
    /**
     * @var int|null
     */
    protected $_id = null;

    /**
     * @return bool
     */
    public function check_user_login()
    {
        if ( $this->session->userdata('logged_in') ) {
            return true;
        }
        return false;
    }

    /**
     * @return int|null
     */
    public function get_user_id()
    {
        if ( $this->check_user_login() ) {
            return $this->session->userdata('user_id');
        }
        return null;
    }

    public function __construct()
    {
        parent::__construct();
        $this->_id = $this->get_user_id();
    }

}
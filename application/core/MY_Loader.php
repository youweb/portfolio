<?php

 if (!defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

class MY_Loader extends CI_Loader
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($view, $vars = array(), $return = false)
    {
        $CI = get_instance();
        if (isset($CI->router->uri->segments[1]) && $CI->router->uri->segments[1] == $CI->config->item('admin_page')) {
            $vars['theme_path'] = $CI->config->item('admin_page');
            $vars['theme'] = $CI->config->item('admin_theme');
        } else {
            $vars['theme_path'] = $CI->config->item('theme_path');
            $vars['theme'] = $CI->config->item('theme');
        }
        $view = $vars['theme_path'].'/themes/template/'.$vars['theme'].'/'.$view;
        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
}

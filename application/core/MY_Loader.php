<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    function __construct()
    {
        parent::__construct();
    }

	public function view($view, $vars = array(), $site = FALSE, $return = FALSE)
	{
        if ($site == 'admin'){
            $view='admin/themes/template/'.get_instance()->config->item('admin_theme').'/'.$view;
        }else{
            $view='site/themes/template/'.get_instance()->config->item('theme').'/'.$view;
        }
		return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}
}
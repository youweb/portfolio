<?php

if ( !defined('BASEPATH') ) {
    exit('No direct script access allowed');
}

if ( !function_exists('theme_url') ) {

    /**
     * @param string $uri
     * @param null $protocol
     * @return string
     */
    function theme_url($uri = '', $protocol = null)
    {
        $uri = theme_path($uri);
        return get_instance()->config->site_url($uri, $protocol);
    }
}

if ( !function_exists('theme_path') ) {

    /**
     * @param string $uri
     * @return string
     */
    function theme_path($uri = '')
    {
        $CI = get_instance();
        if (isset($CI->router->uri->segments[1]) && $CI->router->uri->segments[1] == $CI->config->item('admin_page') ) {
            $theme_path = $CI->config->item('admin_page');
        } else {
            $theme_path = $CI->config->item('theme_path');
        }
        $uri = $theme_path.'_theme/'.$uri;
        return $uri;
    }
}
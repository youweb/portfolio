<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Settings_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load_config();
    }
    // load settings
    public function load_config()
    {
        // if (!$this->db->table_exists('settings')) {
        //     $this->install();
        // } else {
        //     $this->load->library('session');
        // }
        $query = $this->db->get('settings');
        $sets = $query->result();
        foreach ($sets as $row) {
            $val = $row->value;
            if (is_numeric($val)) // if the value is number
            {
                $val = $val + 0; // converted to a number of numeric type with the addition operation
            }
            $this->config->set_item($row->param, $val);
        }
        //$this->form_validation->set_error_delimiters($this->config->item('validation_prefix'), $this->config->item('validation_suffix'));
    }
    // public function install()
    // {
    //     // name file SQL
    //     $sql_file = 'application/social.sql';
    //     $buffer = file_get_contents($sql_file);
    //     if (empty ($buffer)) {
    //         die ('Невозможно прочитать SQL-файл!');
    //     }
    //     $prev = 0;
    //     $i = 0;
    //     while ($next = strpos($buffer, ";", $prev + 1)) {
    //         $i++;
    //         $a = substr($buffer, $prev + 1, $next - $prev);
    //         $this->db->query($a);
    //         $prev = $next;
    //     }
    //     redirect('');
    // }
}
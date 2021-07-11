<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth_model extends CI_Model{
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function cek_login($email)
    {
        $hasil = $this->db->where('email', $email)->limit(1)->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    } 
}
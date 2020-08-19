<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function register_account($data)
    {
        return $this->db->insert('accounts', $data);
    }
}

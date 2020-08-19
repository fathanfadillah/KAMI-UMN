<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_request_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get()
    {
        return $this->db->get('account_requests')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('account_requests', array('id' => $id))->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('account_requests', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('account_requests', array('id' => $id));
    }
}
?>

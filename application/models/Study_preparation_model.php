<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Study_preparation_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->get('study_preparation');

        if ($query)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_details($id)
    {
        $query = $this->db->get_where('study_preparation', array('id' => $id));

        if ($query)
        {
            return $query->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_by_account($account_id)
    {
        return $this->db
            ->order_by('study_year', 'ASC')
            ->get_where('study_preparation', array('account_id' => $account_id))
            ->result_array();
    }

    public function delete($id)
    {
        return $this->db->delete('study_preparation', array('id' => $id));
    }

    public function set($data)
    {
        $data['last_update'] = Date('Y-m-d H:i:s');
        if (isset($data['id']) && $this->db->get_where('study_preparation', array('id' => $data['id'])))
        {
            $this->db->replace('study_preparation', $data);
        }
        else
        {
            $this->db->insert('study_preparation', $data);
        }
    }
}

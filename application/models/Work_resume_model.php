<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_resume_model extends CI_Model {

    public function update($data)
    {
        $query = $this->db->get_where('work_resume', array('id' => $data['id']));

        if ($data['id'] != '' && $query->result())
        {
            if ($this->db->replace('work_resume', $data))
            {
                return $this->db->get_where('work_resume', array('id' => $data['id']))->result();
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            if ($this->db->insert('work_resume', $data))
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }
        }
    }

    public function get_details($id)
    {
        $query = $this->db
            ->order_by('hire_date', 'ASC')
            ->get_where('work_resume', array('id' => $id));

        if ($query)
        {
            return $query->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_by_user($account_id)
    {
        return $this->db->get_where('work_resume', array('account_id' => $account_id))->result_array();
    }

    public function delete($id)
    {
        return $this->db->delete('work_resume', array('id' => $id));
    }
}

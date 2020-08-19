<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->get('accounts');

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
        $query = $this->db->get_where('accounts', array('id' => $id));

        if ($query)
        {
            return $query->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_by_email($email)
    {
        return $this->db->get_where('accounts', array('email' => $email))->row_array();
    }

    public function set($data)
    {
        $this->db->replace('accounts', $data);
    }

    public function reset_password($id, $hash)
    {
        $query = $this->db->get_where('accounts', array('id' => $id));
        $data = $query->result_array();

        $data[0]['hash'] = $hash;

        $query = $this->db->replace('accounts', $data[0]);
    }

    public function does_user_exist($email)
    {
        $query = $this->db->get_where('accounts', array('email' => $email))->row();

        return $query;
    }

    public function does_name_exist($fname, $lname)
    {
        return $this->db
            ->like('fname', $fname)
            ->like('lname', $lname)
            ->get('accounts')->result_array();
    }

    public function create_admin()
    {
        $has_admin = $this->db->get_where('accounts', array('access_level' => '1'));
        if ( ! $has_admin->num_rows())
        {
            $admin_account = array(
                'fname' => 'Admin',
                'lname' => 'Global',
                'email' => 'alumni.umn@umn.ac.id',
                'is_active' => 1,
                'access_level' => 1,
                'hash' => sha1('unimedia')
            );
            $this->db->insert('accounts', $admin_account);
        }
    }

    public function delete($id)
    {
        return $this->db->delete('accounts', array('id' => $id));
    }

    public function is_admin($id)
    {
        $this->load->library('session');

        // Redirect if not logged in
        if ( ! $this->session->logged_in)
        {
            return FALSE;
        }

        // Redirect if not admin
        $is_admin = $this->session->access_level == 1;
        return $is_admin;
    }
}

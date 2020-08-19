<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careers_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        return $this->db->where(array(
                'end_date > ' => date('Y-m-d'),
                'publish' => 1
            ))
            ->order_by('end_date', 'ASC')
            ->get('careers')
            ->result_array();
    }

    public function get_all()
    {
        return $this->db->get('careers')->result_array();
    }

    public function get_page($limit, $start)
    {
        return $this->db->where(array(
                'end_date > ' => date('Y-m-d'),
                'publish' => 1
            ))
            ->order_by('end_date', 'ASC')
            ->get('careers', $limit, $start)
            ->result_array();
    }

    public function get_latest($limit)
    {
        $this->db->limit($limit);
        $this->db->where('end_date >= ', date('Y-m-d'));
        $this->db->order_by('end_date', 'ASC');
        return $this->db->get_where('careers', array('publish' => 1))->result_array();
    }

    public function get_details($id)
    {
        $this->db->limit(20);
        $query = $this->db->get_where('careers', array('id' => $id, 'publish' => 1));
        if ($query)
        {
            return $query->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_unpublished($limit)
    {
        $this->db->limit($limit);
        $this->db->where('end_date <', date('d-m-Y'));
        return $this->db->get_where('careers', array('publish' => 0))->result_array();
    }

    public function publish($id)
    {
        $data = $this->db->get_where('careers', array('id' => $id))->row_array();
        $data['publish'] = 1;
        $this->db->replace('careers', $data);
        return $data;
    }

    public function delete($id)
    {
        $this->db->delete('careers', array('id' => $id));
    }

    public function top_10()
    {
        $this->db->limit(10);
        $this->db->where('end_date >= ', date('d-m-Y'));
        $this->db->order_by('end_date', 'ASC');
        return $this->db->get_where('careers', array('publish' => 1))->result_array();
    }

    public function set($data)
    {
        if (isset($data['id']))
        {
            $this->db->replace('careers', $data);
            return $data;
        }
        else
        {
            $this->db->insert('careers', $data);
            return $this->db->get_where(
                'careers',
                array('id' => $this->db->insert_id())
            )->row_array(1);
        }
    }
}

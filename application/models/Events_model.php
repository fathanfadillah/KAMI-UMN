<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->get('events');

        if ($query)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_latest_update()
    {
        return $this->db
            ->order_by('last_update', 'DESC')
            ->get('events')
            ->result_array();
    }

    public function get_latest_update_page($start, $limit)
    {
        return $this->db
            ->order_by('last_update', 'DESC')
            ->get('events', $limit, $start)
            ->result_array();
    }

    public function get_page($start, $limit)
    {
        return $this->db->order_by('start_date', 'DESC')
            ->get('events', $limit, $start)
            ->result_array();
    }

    public function get_latest($count = 10)
    {
        $this->db->order_by('start_date', 'ASC');
        $this->db->where('end_date > CURDATE()');
        $this->db->limit($count);
        return $this->db->get('events')->result_array();
    }

    public function get_latest_ending_date($count)
    {
        return $this->db->order_by('end_date', 'ASC')
            ->where('end_date > CURDATE()')
            ->get('events', $count, 0)->result_array();
    }

    public function get_details($slug)
    {
        $query = $this->db->get_where('events', array('slug' => $slug));

        if ($query)
        {
            return $query->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function set($data)
    {
        if ($this->db->get_where('events', array('id' => $data['id'])))
        {
            $this->db->replace('events', $data);
        }
        else
        {
            $this->db->insert('events', $data);
        }
    }

    public function delete($id)
    {
        $this->db->delete('events', array('id' => $id));
    }
}

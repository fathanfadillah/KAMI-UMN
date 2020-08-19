<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($start, $limit)
    {
        $this->db->order_by('last_update', 'DESC');
        return $this->db->get('news', $limit, $start)->result_array();
    }

    public function get_all($offset = 0)
    {
        $this->db->order_by('last_update', 'DESC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('news', 10, $offset)->result_array();
    }

    public function get_latest($count = 10)
    {
        $this->db->where('published_date <= sysdate()');
        $this->db->order_by('published_date', 'DESC');
        return $this->db->get('news', $count)->result_array();
    }

    public function get_where($slug)
    {
        $query = $this->db->get_where('news', array('slug' => $slug));
        return empty($query) ? FALSE : $query->row_array();
    }

    public function set($data)
    {
        $query = $this->db->get_where('news', array('slug' => $data['slug']));

        if ( ! $query->row_array())
        {
            $this->db->insert('news', $data);
        }
        else
        {
            $this->db->replace('news', $data);
        }

    }

    public function delete($id)
    {
        $this->db->delete('news', array('id' => $id));
    }
}

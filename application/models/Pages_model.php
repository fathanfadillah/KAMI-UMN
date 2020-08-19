<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($slug = NULL)
    {
        if ($slug == NULL)
        {
            $query = $this->db->get('pages');

            return $query->result_array();
        }
        else
        {
            // $flag = array ('alumni-relations', 'sambutan-rektor', 'tentang-kami-umn', 'events');
            $flag = array('legalisir-dokumen', 'kartu-alumni', 'surat-keterangan-alumni', 'faq');
            
            if(!in_array($slug, $flag))
            {
                $query = $this->db->get_where('pages', array('slug' => $slug));

                return $query->row_array();
            }
            else
            {
                if($this->session->logged_in == FALSE)
                {
                    redirect(base_url('account/signin'));
                }
                else 
                {
                    $query = $this->db->get_where('pages', array('slug' => $slug));

                    return $query->row_array();
                }
            }
        }
    }

    public function set($data)
    {
        return $this->db->insert('pages', $data);
    }

    public function update($data)
    {
        return $this->db->replace('pages', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('pages', array('id' => $id));
    }
}

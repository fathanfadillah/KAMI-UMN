<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getListField() {
        $data = $this->db->list_fields('profiles');
        return $data;
    }

    public function insert($data)
    {
        return $this->db->insert('profiles', $data);
    }

    public function update($data)
    {
        $query = $this->db->get_where('profiles', array('id' => $data['id']));

        if ($query->result())
        {
            if ($this->db->replace('profiles', $data))
            {
                return $this->db->get_where('profiles', array('id' => $data['id']))->result();
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            if ($this->db->insert('profiles', $data))
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }
        }
    }

    public function get($start)
    {
        return $this->db->get('profiles', $start, 10000)->result_array();
    }

    public function get_details($id)
    {
        $query = $this->db->get_where('profiles', array('id' => $id));

        return $query->row_array();
    }

    // function baru untuk download excel
    public function get_all_details()
    {
        $query = $this->db->get('profiles')->result_array();

        return $query;
    }

    public function get_by_faculty($faculty)
    {
        $profiles = array();

        $this->db->like('faculty', $faculty);
        $this->db->select('*, testimony.content as testimony');
        $this->db->from('profiles');
        $this->db->join('(select * from (select * from work_resume order by hire_date desc) as w group by account_id) as work_resume', 'profiles.id = work_resume.account_id');
        $this->db->join('testimony', 'profiles.id = testimony.id');
        $query = $this->db->get();
        $profiles = $query->result_array();

        return $profiles;
    }

    public function filter_by_faculty($faculty)
    {
        $profiles = $this->db->get_where('profiles', array('faculty' => $faculty))->result_array();
        return $profiles;
    }

    public function filter_by_subject_area($subject_area)
    {
        $this->db->like('subject_area', $subject_area);
        $profiles = $this->db->get('profiles')->result_array();
        return $profiles;
    }

    public function get_by_subject_area($subject_area, $is_without_testimony = false)
    {
        $this->db->like('subject_area', $subject_area);
        if ($is_without_testimony == false)
        {
            $this->db->select('*, testimony.content as testimony');
        }
        $this->db->from('profiles');
        $this->db->join('(select * from (select * from work_resume order by hire_date desc) as w group by account_id) as work_resume', 'profiles.id = work_resume.account_id');
        if ($is_without_testimony == false)
        {
            $this->db->join('testimony', 'profiles.id = testimony.id');
        }
        $query = $this->db->get();
        $profiles = $query->result_array();

        return $profiles;
    }

    public function set_testimony($testimony)
    {
        $query = $this->db->get_where('testimony', array('id' => $testimony['id']));
        if ($query->result())
        {
            $this->db->replace('testimony', $testimony);
        }
        else
        {
            $this->db->insert('testimony', $testimony);
        }
    }

    public function search($query = '', $faculty = '')
    {
        $query = strtolower($query);
        return $this->db->where(array('faculty' => $faculty))
            ->like('LOWER(fname)', $query, 'after')
            ->or_like('LOWER(lname)', $query, 'before')
            ->where(array('faculty' => $faculty))
            ->select('*, testimony.content as testimony')
            ->from('profiles')
            ->join('(select * from (select * from work_resume order by hire_date desc) as w group by account_id) as work_resume', 'profiles.id = work_resume.account_id')
            ->join('testimony', 'profiles.id = testimony.id')
            ->get()
            ->result_array();
    }

    public function search_without_testimony($query = '', $faculty = '')
    {
        $query = strtolower($query);
        return $this->db->where(array('faculty' => $faculty))
            ->like('LOWER(fname)', $query, 'after')
            ->or_like('LOWER(lname)', $query, 'before')
            ->where(array('faculty' => $faculty))
            ->from('profiles')
            ->join('(select * from (select * from work_resume order by hire_date desc) as w group by account_id) as work_resume', 'profiles.id = work_resume.account_id')
            ->get()
            ->result_array();
    }

    public function get_testimony($id)
    {
        $query = $this->db->get_where('testimony', array('id' => $id));
        return $query->row_array();
    }

    public function is_last_update_less_than_n_month($n, $id) {

        // return $this->db
        //     ->select(
        //         "datediff(now(), min(work_resume.last_update)) as 'last_work'"
        //         . ", datediff(now(), min(study_preparation.last_update)) as 'last_study'")
        //     ->from('profiles')
        //     ->join('work_resume', 'profiles.id = work_resume.account_id', 'left')
        //     ->join('study_preparation', 'profiles.id = study_preparation.account_id', 'left')
        //     ->where('profiles.id = ', $id)
        //     ->group_by('profiles.id')
        //     ->having('last_work < '.($n * 30))
        //     ->or_having('last_study < '.($n * 30))
        //     ->get()
        //     ->result_array();

        return $this->db
            ->select(
                "work_resume.id as 'last_work'"
                . ", study_preparation.id as 'last_study'")
            ->from('profiles')
            ->join('work_resume', 'profiles.id = work_resume.account_id', 'left')
            ->join('study_preparation', 'profiles.id = study_preparation.account_id', 'left')
            ->where('profiles.id = ', $id)
            ->having('last_work is NOT NULL', NULL, FALSE)
            ->or_having('last_study is NOT NULL', NULL, FALSE)
            ->group_by('profiles.id')
            ->get()
            ->result_array();
    }

    public function is_last_update_less_than_three_month($id) {
        return $this->is_last_update_less_than_n_month(3, $id);
    }

    public function delete($id)
    {
        return $this->db->delete('profiles', array('id' => $id));
    }
}

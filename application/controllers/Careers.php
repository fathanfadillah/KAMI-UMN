<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('careers_model');
        $this->load->model('profile_model');
        $this->lang->load('careers');
    }

    public function index()
    {
        if ($this->session->logged_in == FALSE)
        {
            redirect(base_url('account/signin'));
        }
        else {
            $this->load->model('profile_model');
            
            // Pindah ke HOME

            if ($this->profile_model->is_last_update_less_than_three_month($this->session->id) == FALSE) {
                $extra_content = $this->load->view('common/_ask_for_update', array(), TRUE);
            }
        }

        // Paginations
        $start = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = 5;
        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'base_url' => base_url('careers'),
            'total_rows' => count($this->careers_model->get()),
            'per_page' => $per_page,
            'page_query_string' => TRUE,
            'use_page_numbers' => TRUE,
            'query_string_segment' => "page",
            'full_tag_open' => '<div class="pagination">',
            'full_tag_close' => '</div>',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="#">',
            'cur_tag_close' => '</a></li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            ));
        $pagination = $this->pagination->create_links();

        $careers = $this->careers_model->get_page($per_page, ($start - 1) * $per_page);
        $data = array(
            'header' => $this->lang->line('careers_all_careers'),
            'content' => $this->load->view(
                'careers/list',
                array(
                    'careers' => $careers,
                    'pagination' => $pagination
                ),
                TRUE
            ) . $extra_content,
            'alerts' => array(),
        );
        $this->load->view('app', $data);
    }

    public function view($id)
    {
        if ($this->session->logged_in == FALSE)
        {
            redirect(base_url('account/signin'));
        }

        $career = $this->careers_model->get_details($id);
        $career['career']  = $career;
        $data = array(
            'header' => $this->lang->line('careers_all_careers'),
            'content' => $this->load->view('careers/single', $career, TRUE),
            'alerts' => array(),
        );

        $this->load->view('app', $data);
    }

    public function add()
    {
        if ($this->session->logged_in == FALSE)
        {
            redirect(base_url());
        }

        $data = array(
            'header' => $this->lang->line('careers_add_career'),
            'nav' => $this->load->view('common/nav', NULL, TRUE),
            'content' => $this->load->view('careers/form', NULL, TRUE),
            'alerts' => array(),
        );

        $this->lang->load('form_careers');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('header', $this->lang->line('form_careers_label_header'), 'required');
        $this->form_validation->set_rules('company_name', $this->lang->line('form_careers_label_company_name'), 'required');
        $this->form_validation->set_rules('end_date', $this->lang->line('form_careers_label_end_date'), 'required');
        if ($this->form_validation->run())
        {
            $career = array();
            $career_id = $this->input->post('id');
            if ($career_id) {
                $career['id'] = $career_id;
            }
            $career['header'] = $this->input->post('header');
            $career['post_by'] = $this->session->id;
            $career['description'] = mb_convert_encoding($this->input->post('description'), 'UTF-8');
            $career['company_name'] = $this->input->post('company_name');
            $career['end_date'] = $this->input->post('end_date');
            $career['for_teknik_informatika'] = $this->input->post('for_teknik_informatika') ? $this->input->post('for_teknik_informatika') : '0';
            $career['for_sistem_informasi'] = $this->input->post('for_sistem_informasi') ? $this->input->post('for_sistem_informasi') : '0';
            $career['for_sistem_komputer'] = $this->input->post('for_sistem_komputer') ? $this->input->post('for_sistem_komputer') : '0';
            $career['for_manajemen'] = $this->input->post('for_manajemen') ? $this->input->post('for_manajemen') : '0';
            $career['for_akuntansi'] = $this->input->post('for_akuntansi') ? $this->input->post('for_akuntansi') : '0';
            $career['for_ilmu_komunikasi'] = $this->input->post('for_ilmu_komunikasi') ? $this->input->post('for_ilmu_komunikasi') : '0';
            $career['for_desain_komunikasi_visual'] = $this->input->post('for_desain_komunikasi_visual') ? $this->input->post('for_desain_komunikasi_visual') : '0';
            $career['last_update'] = date('Y-m-d H:i:s');
            $career['short_description'] = $this->input->post('short_description');
            $career['publish'] = $this->session->access_level == 1 ? 1 : 0;

            $career = $this->careers_model->set($career);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/company_logo',
                'file_name' => sha1($career['id'] . 'logo'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );
            $this->upload->initialize($config);
            if ($this->upload->do_upload('company_logo'))
            {
                $career['company_logo'] = $this->upload->data('file_name');
                $career = $this->careers_model->set($career);
            }
            else {
                array_push(
                    $alerts
                    , array(
                        'type' => 'danger',
                        'content' => 'Image Upload Error: '.$this->upload->display_errors()
                    )
                );
            }

            $config = array(
                'upload_path' => getcwd().'/assets/images/careers',
                'file_name' => sha1($career['id'] . 'document'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );
            $this->upload->initialize($config);
            if ($this->upload->do_upload('document'))
            {
                $career['document'] = $this->upload->data('file_name');
                $career = $this->careers_model->set($career);
            }

            if ($this->session->access_level == 1)
            {
                array_push($data['alerts'], array('type' => 'success', 'content' => $this->lang->line('careers_career_added')));
            }
            else
            {
                array_push($data['alerts'], array('type' => 'success', 'content' => $this->lang->line('careers_career_checking')));
            }

        }
        else
        {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type' => 'danger', 'content' => $err));
            }
        }

        $this->load->view('app', $data);
    }

    public function publish($id)
    {
        if ($this->session->access_level != 1)
        {
            redirect(base_url());
        }

        $this->load->model('careers_model');
        $this->careers_model->publish($id);

        redirect(base_url('admin'));
    }

    public function delete($id)
    {
        if ($this->session->access_level != 1 && $this->session->id != $career['post_by'])
        {
            redirect(base_url());
        }

        $this->load->model('careers_model');
        $this->careers_model->delete($id);

        redirect(base_url('admin/careers/history'));
    }

    public function edit($id)
    {
        $career = $this->careers_model->get_details($id);
        if ($this->session->access_level != 1 && $this->session->id != $career['post_by'])
        {
            redirect(base_url());
        }

        $data = array(
            'header' => $this->lang->line('careers_add_career'),
            'nav' => $this->load->view('common/nav', NULL, TRUE),
            'content' => $this->load->view('careers/edit', array('career' => $career), TRUE),
            'alerts' => array(),
        );

        $this->lang->load('form_careers');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('header', $this->lang->line('form_careers_label_header'), 'required');
        $this->form_validation->set_rules('company_name', $this->lang->line('form_careers_label_company_name'), 'required');
        $this->form_validation->set_rules('end_date', $this->lang->line('form_careers_label_end_date'), 'required');
        if ($this->form_validation->run())
        {
            $career = array();
            $career['id'] = $this->input->post('id');
            $career['header'] = $this->input->post('header');
            $career['post_by'] = $this->session->id;
            $career['description'] = mb_convert_encoding($this->input->post('description'), 'UTF-8');
            $career['company_name'] = $this->input->post('company_name');
            $career['end_date'] = $this->input->post('end_date');
            $career['for_teknik_informatika'] = $this->input->post('for_teknik_informatika') ? $this->input->post('for_teknik_informatika') : '0';
            $career['for_sistem_informasi'] = $this->input->post('for_sistem_informasi') ? $this->input->post('for_sistem_informasi') : '0';
            $career['for_sistem_komputer'] = $this->input->post('for_sistem_komputer') ? $this->input->post('for_sistem_komputer') : '0';
            $career['for_manajemen'] = $this->input->post('for_manajemen') ? $this->input->post('for_manajemen') : '0';
            $career['for_akuntansi'] = $this->input->post('for_akuntansi') ? $this->input->post('for_akuntansi') : '0';
            $career['for_ilmu_komunikasi'] = $this->input->post('for_ilmu_komunikasi') ? $this->input->post('for_ilmu_komunikasi') : '0';
            $career['for_desain_komunikasi_visual'] = $this->input->post('for_desain_komunikasi_visual') ? $this->input->post('for_desain_komunikasi_visual') : '0';
            $career['last_update'] = date('Y-m-d H:i:s');
            $career['short_description'] = $this->input->post('short_description');
            $career['publish'] = $this->session->access_level == 1 ? 1 : 0;

            $career = $this->careers_model->set($career);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/company_logo',
                'file_name' => sha1($career['id'] . 'logo'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );
            $this->upload->initialize($config);
            if ($this->upload->do_upload('company_logo'))
            {
                $career['company_logo'] = $this->upload->data('file_name');
            }
            else {
                array_push(
                    $alerts
                    , array(
                        'type' => 'danger',
                        'content' => 'Image Upload Error: '.$this->upload->display_errors()
                    )
                );
            }

            $config = array(
                'upload_path' => getcwd().'/assets/images/careers',
                'file_name' => sha1($career['id'] . 'document'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );
            $this->upload->initialize($config);
            if ($this->upload->do_upload('document'))
            {
                $career['document'] = $this->upload->data('file_name');
            }
            //$this->careers_model->set($career);

            if ($career['publish'] == 1)
            {
                array_push($data['alerts'], array('type' => 'success', 'content' => $this->lang->line('careers_career_added')));
            }
            else
            {
                array_push($data['alerts'], array('type' => 'success', 'content' => $this->lang->line('careers_career_checking')));
            }

        }
        else
        {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type' => 'danger', 'content' => $err));
            }
        }

        $this->load->view('app', $data);
    }

    public function admin_history()
    {
        if ($this->session->access_level != 1)
        {
            redirect(base_url('/'));
        }

        $this->load->model('careers_model');
        $careers = $this->careers_model->get_all();
        $data = array(
            'careers' => $careers
        );
        $content = $this->load->view('careers/admin_history', $data, TRUE);

        $this->lang->load('nav');
        $data = array(
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'page_heading' => $this->lang->line('careers'),
            'alerts' => array(),
            'content' => $content
        );
        $this->load->view('admin/app', $data);
    }
}

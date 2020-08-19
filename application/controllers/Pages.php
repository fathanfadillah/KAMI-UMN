<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        if ($this->session->logged_in) {
            $this->load->model('profile_model');
            if ($this->profile_model->get_details($this->session->id) == FALSE) {
                redirect(base_url('profile'));
            }
        }
        setlocale(LC_TIME, "id_ID");
    }

    public function index()
    {
        if ($this->session->access_level != 1) redirect(base_url());
        $this->load->model('pages_model');
        $this->lang->load('pages');

        $pages = $this->pages_model->get();

        $data = array(
            'page_heading' => $this->lang->line('pages_all_pages'),
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'content' => $this->load->view('pages/table', array('pages' => $pages), TRUE),
            'alerts' => array(),
        );
        
        $this->load->view('admin/app', $data);
    }

    public function home()
    {

        $this->lang->load('pages');
        $this->load->model('news_model');
        $this->load->model('events_model');
        $this->load->model('pages_model');
        $this->load->model('careers_model');
        $this->load->model('profile_model');

        if ($this->profile_model->is_last_update_less_than_three_month($this->session->id) == FALSE && $this->session->logged_in) {
            $extra_content = $this->load->view('common/_ask_for_update', array(), TRUE);
        }
        else{
            $extra_content = '';

        }
        
        $data = array(
            'header' => $this->lang->line('pages_header_home'),
            'nav' => $this->load->view('common/nav', NULL, TRUE),
            'content' => $this->load->view('pages/home', array(
                'news' => $this->news_model->get_latest(5),
                'careers' => $this->careers_model->get_latest(5),
                'events' => $this->events_model->get_latest_ending_date(5),
                'rector' => $this->pages_model->get('sambutan-rektor'),
                'relation' => $this->pages_model->get('alumni-relations'),
            ), TRUE) . $extra_content,
            'alerts' => array(),
        );

        $this->load->view('single', $data);
    }

    public function view($slug = NULL)
    {
        if ($this->session->access_level != 1) redirect(base_url());
        $this->load->model('pages_model');
        $this->lang->load('pages');
        
        if ($slug == NULL)
        {
            $pages = $this->pages_model->get();

            $data = array(
                'page_heading' => $this->lang->line('pages_all_pages'),
                'nav' => $this->load->view('admin/nav', NULL, TRUE),
                'content' => $this->load->view('pages/table', array('pages' => $pages), TRUE),
                'alerts' => array(),
            );

            $this->load->view('admin/app', $data);
        }
    }

    public function show($slug)
    {
        $this->load->model('pages_model');
        
        $slugArr = array('legalisir-dokumen', 'kartu-alumni', 'surat-keterangan-alumni', 'faq');
        if(in_array($slug, $slugArr))
        {
            $flag = true;
        }
        
        $this->load->model('profile_model');
        if ($this->profile_model->is_last_update_less_than_three_month($this->session->id) == FALSE && $flag == true) {
            $extra_content = $this->load->view('common/_ask_for_update', array(), TRUE);
        }
        
        $page = $this->pages_model->get($slug);
        if ($page)
        {
            $data = array(
                'header' => $page['header'],
                'content' => $this->load->view('pages/show', array('page' => $page), TRUE) . $extra_content,
                'alerts' => array(),
            );
            
            $this->load->view('app', $data);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function add()
    {
        if ($this->session->access_level != 1) redirect(base_url());
        $this->lang->load('pages');

        $data = array(
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'page_heading' => $this->lang->line('pages_add_new_page'),
            'alerts' => array(),
            'content' => $this->load->view('pages/form', NULL, TRUE)
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            foreach ($this->form_validation->error_array() as $err_message)
            {
                array_push($data['alerts'], array('type' => "danger", 'content' => $err_message));
            }
        }
        else
        {
            $this->load->helper('string');
            $page = array(
                'header' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'slug' => url_title(strtolower($this->input->post('title'))),
                'footer' => '-',
                'last_update' => date('Y-m-d')
            );

            $this->load->model('pages_model');

            if ($this->pages_model->get($page['slug']) == FALSE)
            {
                $this->pages_model->set($page);
            }
            else
            {
                $this->pages_model->update($page);
            }

            $page = $this->pages_model->get($page['slug']);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/page',
                'file_name' => sha1($page['id'] . 'main'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );

            $this->upload->initialize($config);
            if ($this->upload->do_upload('photo'))
            {
                $page['photo'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
                $this->pages_model->update($page);
            }

            $alerts = array();
            $alerts["success"] = array(
                'type' => 'success',
                'content' => 'Pages has been changed'
            );
            $data['alerts'] = $alerts;
        }

        $this->load->view('admin/app', $data);
    }

    public function edit($slug = FALSE)
    {
        if ($this->session->access_level != 1) redirect(base_url());
        if ($slug == FALSE) redirect(base_url());

        $this->lang->load('pages');
        $this->load->model('pages_model');
        $pages = $this->pages_model->get($slug);

        $this->load->library('upload');
        $config = array(
            'upload_path' => getcwd().'/assets/images/page',
            'file_name' => sha1($pages['id'] . 'main'),
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => '1000',
            'overwrite' => TRUE,
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photo'))
        {
            $pages['photo'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            $this->pages_model->update($data);
        }

        $data = array(
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'page_heading' => $this->lang->line('pages_edit_page'),
            'alerts' => array(),
            'content' => $this->load->view('pages/form', array('title' => $pages['header'], 'content' => $pages['content']), TRUE)
        );

        $this->load->view('admin/app', $data);
    }
}

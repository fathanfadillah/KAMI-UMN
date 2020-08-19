<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
        $start = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = 5;

        $this->lang->load('news');
        $this->load->model('news_model');
        $news = $this->news_model->get(($start - 1) * $per_page, $per_page);

        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'base_url' => base_url('news'),
            'total_rows' => count($this->news_model->get_all()),
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

        $data = array(
            'header' => $this->lang->line('news_all_news'),
            'content' => $this->load->view('news/short', array('news' => $news, 'pagination' => $pagination), TRUE),
            'alerts' => array(),
        );

        $this->load->view('app', $data);
    }

    public function admin_index()
    {
        $this->lang->load('news');
        $this->load->model('news_model');
        $news = $this->news_model->get_all();

        $start = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = 10;

        $this->lang->load('news');
        $this->load->model('news_model');
        $news = $this->news_model->get(($start - 1) * $per_page, $per_page);

        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'base_url' => base_url('admin/news'),
            'total_rows' => count($this->news_model->get_all()),
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

        $data = array(
            'page_heading' => $this->lang->line('news_latest_news'),
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'content' => $this->load->view('news/list', array('news' => $news, 'pagination' => $pagination), TRUE),
            'alerts' => array(),
        );
        $this->load->view('admin/app', $data);
    }

    public function view($slug = FALSE)
    {
        $this->load->model('news_model');

        // View all if no slug provided
        if ($slug == FALSE)
        {
            $this->index();
        }
        // View individual item
        else
        {
            $news = $this->news_model->get_where($slug);
            $data = array(
                'header' => $news['header'],
                'content' => $this->load->view('news/item', $news, TRUE),
                'alerts' => array(),
            );

            $this->load->view('app', $data);
        }
    }

    public function add()
    {
        if ($this->session->access_level != 1)
            redirect(base_url('news'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('header', '', 'required');
        $this->form_validation->set_rules('content', '', 'required');

        $alerts = array();
        if ($this->form_validation->run() === TRUE)
        {
            $alerts["success"] = array(
                'type' => 'success',
                'content' => 'News has been added'
            );

            $this->load->helper('url');

            $data = array(
                'slug' => url_title($this->input->post('header'), 'dash', TRUE),
                'header' => $this->input->post('header'),
                'sub_header' => $this->input->post('sub_header'),
                'content' => $this->input->post('content'),
                'footer' => $this->input->post('footer'),
                'author' => $this->session->id,
                'last_update' => date('Y-m-d H:i:s'),
                'published_date' => date('Y-m-d H:i:s', strtotime($this->input->post('published_date')))
            );

            $this->load->model('news_model');
            $this->news_model->set($data);

            $data = $this->news_model->get_where($data['slug']);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/n',
                'file_name' => sha1($data['id'] . 'main'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2000',
                'overwrite' => TRUE,
            );

            $this->upload->initialize($config);
            if ($this->upload->do_upload('main_photo'))
            {
                $data['main_photo_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $config['file_name'] = sha1($data['id'] . 'side_photo_1');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('side_photo_1'))
            {
                $data['side_photo_1_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $config['file_name'] = sha1($data['id'] . 'side_photo_2');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('side_photo_2'))
            {
                $data['side_photo_1_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $config['file_name'] = sha1($data['id'] . 'side_photo_3');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('side_photo_3'))
            {
                $data['side_photo_1_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $this->news_model->set($data);
        }

        $data = array(
            'page_heading' => 'Add News',
            'nav' => $this->load->view('admin/nav', '', TRUE),
            'content' => $this->load->view('news/form_news', '', TRUE),
            'alerts' => $alerts
        );

        $this->load->view('admin/app', $data);
    }

    public function edit($slug)
    {
        if ($this->session->access_level != 1)
            redirect(base_url('news'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('header', '', 'required');
        $this->form_validation->set_rules('content', '', 'required');

        $alerts = array();
        if ($this->form_validation->run() === TRUE)
        {
            $alerts["success"] = array(
                'type' => 'success',
                'content' => 'News has been changed'
            );

            $this->load->helper('url');

            $data = array(
                'slug' => url_title($this->input->post('header'), 'dash', TRUE),
                'header' => $this->input->post('header'),
                'sub_header' => $this->input->post('sub_header'),
                'content' => $this->input->post('content'),
                'footer' => $this->input->post('footer'),
                'author' => $this->session->id,
                'last_update' => date('Y-m-d H:i:s'),
                'published_date' => date('Y-m-d H:i:s', strtotime($this->input->post('published_date')))
            );

            $this->load->model('news_model');
            $this->news_model->set($data);

            $data = $this->news_model->get_where($data['slug']);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/n',
                'file_name' => sha1($data['id'] . 'main'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2000',
                'overwrite' => TRUE,
            );

            $this->upload->initialize($config);
            if ($this->upload->do_upload('main_photo'))
            {
                $data['main_photo_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
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

            $config['file_name'] = sha1($data['id'] . 'side_photo_1');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('side_photo_1'))
            {
                $data['side_photo_1_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $config['file_name'] = sha1($data['id'] . 'side_photo_2');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('side_photo_2'))
            {
                $data['side_photo_1_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $config['file_name'] = sha1($data['id'] . 'side_photo_3');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('side_photo_3'))
            {
                $data['side_photo_1_path'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
            }

            $this->news_model->set($data);
        }

        $data = array(
            'page_heading' => 'Edit News',
            'nav' => $this->load->view('admin/nav', '', TRUE),
            'content' => $this->load->view('news/form_news_edit', $this->news_model->get_where($slug), TRUE),
            'alerts' => $alerts
        );

        $this->load->view('admin/app', $data);
    }

    public function delete()
    {
        $this->load->library('session');
        if ( ! $this->session->logged_in && $this->access_level != 1)
        {
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'required');

        if ($this->form_validation->run()) {
            $this->load->model('news_model');
            $this->news_model->delete($this->input->post('id'));
        }

        redirect(base_url('admin/news'));
    }
}

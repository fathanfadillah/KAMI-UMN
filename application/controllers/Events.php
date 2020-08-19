<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model');
        $this->load->model('profile_model');
        $this->load->helper('string');
        $this->lang->load('events');
    }

    public function index()
    {
        $start = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = 5;
        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'base_url' => base_url('events'),
            'total_rows' => count($this->events_model->get()),
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
            'header' => $this->lang->line('events_all_events'),
            'nav' => $this->load->view('common/nav', NULL, TRUE),
            'content' => $this->load->view('events/short'
                , array('events' => $this->events_model->get_page(($start - 1) * $per_page, $per_page), 'pagination' => $pagination)
                , TRUE
            ),
            'alerts' => array(),
        );

        $this->load->view('app', $data);
    }

    public function admin_index()
    {
        if ($this->session->access_level > 1)
        {
            redirect(base_url());
        }

        $start = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = 10;
        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'base_url' => base_url('admin/events'),
            'total_rows' => count($this->events_model->get_latest_update()),
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
            'page_heading' => $this->lang->line('events_all_events'),
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'content' => $this->load->view(
                'events/admin_index',
                array(
                    'events' => $this->events_model->get_latest_update_page(($start - 1) * $per_page, $per_page),
                    'pagination' => $pagination
                ),
                TRUE
            ),
            'alerts' => array(),
        );

        $this->load->view('admin/app', $data);
    }

    public function view($slug = FALSE)
    {
        if ($slug == FALSE)
        {
            redirect(base_url('events'));
        }
        $event = $this->events_model->get_details($slug);
        $data = array(
            'header' => $event['header'],
            'content' => $this->load->view('events/detail', $event, TRUE),
            'alerts' => array(),
        );

        $this->load->view('app', $data);
    }

    public function add()
    {
        if ($this->session->access_level != 1)
        {
            redirect(base_url());
        }

        $data = array(
            'page_heading' => $this->lang->line('events_add_event'),
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'content' => $this->load->view('events/form', NULL, TRUE),
            'alerts' => array(),
        );

        $this->lang->load('form_events');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('header', $this->lang->line('form_events_label_header'), 'required|is_unique[events.header]');
        $this->form_validation->set_rules('description', $this->lang->line('form_events_label_description'), 'required');
        $this->form_validation->set_rules('start_date', $this->lang->line('form_events_label_start_date'), 'required');
        $this->form_validation->set_rules('end_date', $this->lang->line('form_events_label_end_date'), 'required');
        if ($this->form_validation->run())
        {
            $event = array();
            $event['id'] = $this->input->post('id');
            $event['header'] = $this->input->post('header');
            $event['description'] = $this->input->post('description');
            $event['start_date'] = $this->input->post('start_date');
            $event['end_date'] = $this->input->post('end_date');
            $event['slug'] = url_title(strtolower($this->input->post('header')));
            $event['last_update'] = date('Y-m-d H:i:s');

            $this->events_model->set($event);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/e',
                'file_name' => sha1($event['id'] . 'main'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );

            $this->upload->initialize($config);
            if ($this->upload->do_upload('photo'))
            {
                $event['photo'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
                $this->events_model->set($event);
            }

            array_push($data['alerts'], array('type' => 'success', 'content' => $this->lang->line('form_events_events_added')));
        }
        else
        {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type' => 'danger', 'content' => $err));
            }
        }

        $this->load->view('admin/app', $data);
    }

    public function edit($slug)
    {
        if ($this->session->access_level != 1)
        {
            redirect(base_url());
        }

        $event = $this->events_model->get_details($slug);

        $data = array(
            'page_heading' => $this->lang->line('events_add_event'),
            'nav' => $this->load->view('admin/nav', NULL, TRUE),
            'content' => $this->load->view('events/_edit', $event, TRUE),
            'alerts' => array(),
        );

        $this->lang->load('form_events');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('description', $this->lang->line('form_events_label_description'), 'required');
        $this->form_validation->set_rules('start_date', $this->lang->line('form_events_label_start_date'), 'required');
        $this->form_validation->set_rules('end_date', $this->lang->line('form_events_label_end_date'), 'required');
        if ($this->form_validation->run())
        {
            $event = array();
            $event['id'] = $this->input->post('id');
            $event['header'] = $this->input->post('header');
            $event['description'] = $this->input->post('description');
            $event['start_date'] = $this->input->post('start_date');
            $event['end_date'] = $this->input->post('end_date');
            $event['last_update'] = date('Y-m-d H:i:s');
            $event['slug'] = url_title(strtolower($this->input->post('header')));

            $this->events_model->set($event);

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/e',
                'file_name' => sha1($event['id'] . 'main'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );

            $this->upload->initialize($config);
            if ($this->upload->do_upload('photo'))
            {
                $event['photo'] = $this->upload->data('raw_name') . $this->upload->data('file_ext');
                $this->events_model->set($event);
            }

            array_push($data['alerts'], array('type' => 'success', 'content' => $this->lang->line('form_events_events_changed')));
        }
        else
        {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type' => 'danger', 'content' => $err));
            }
        }

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
            $this->load->model('events_model');
            $this->events_model->delete($this->input->post('id'));
        }

        redirect(base_url('admin/events'));
    }

    public function api()
    {
        $this->load->model('events_model');
        $objs = array();
        $colors = array('tomato', 'yellowgreen', 'dodgerblue', 'orange');
        $i = 0;
        foreach ($this->events_model->get_latest(20) as $event) {
            $i = $i + 1;
            $obj = array(
                'title' =>  $event['header'],
                'start' =>  date('Y-m-d', strtotime($event['start_date'])),
                'end' =>  date('Y-m-d', strtotime($event['start_date'])),
                'url' =>  base_url('events/'.$event['slug']),
                'allDay' =>  TRUE,
                'color' => $colors[$i % count($colors)]
            );
            array_push($objs, $obj);
            $obj = array(
                'title' =>  $event['header'],
                'start' =>  date('Y-m-d', strtotime($event['end_date'])),
                'end' =>  date('Y-m-d', strtotime($event['end_date'])),
                'url' =>  base_url('events/'.$event['slug']),
                'allDay' =>  TRUE,
                'color' => 'white',
                'textColor' => $colors[$i % count($colors)]
            );
            array_push($objs, $obj);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($objs));
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->require_admin();

        $this->load->model('careers_model');
        $unpublished_job = $this->careers_model->get_unpublished(10);
        $unpublished_job = $unpublished_job ? $unpublished_job : array();
        $unpublished_view = $this->load->view('careers/unpublished_list', array('unpublished_job' => $unpublished_job), TRUE);

        $this->load->model('account_model');
        $this->load->model('account_request_model');
        $account_request = $this->account_request_model->get();
        $account_request = $account_request ? $account_request : array();
        $account_request_list_view = $this->load->view('account_request/list', array('account_requests' => $account_request), TRUE);

        $data = array(
            'page_heading' => 'Dashboard',
            'content' => $this->load->view('admin/dashboard', array('unpublished' => $unpublished_view, 'account_request_list_view' => $account_request_list_view), TRUE),
            'nav' => $this->load->view('admin/nav', null, TRUE),
            'alerts' => array(),
        );
        $this->load->view('admin/app', $data);
    }

    public function create_admin()
    {
        $this->load->model('account_model');
        $this->account_model->create_admin();
        redirect(base_url('account/signin'));
    }

    public function initialize() {
        $this->load->model('account_model');
        $this->account_model->create_admin();
        redirect(base_url());
    }

    private function require_admin()
    {
        $this->load->library('session');

        // Redirect if not logged in
        if ( ! $this->session->logged_in)
        {
            redirect(base_url());
        }

        // Redirect if not admin
        $is_admin = $this->session->access_level == 1;
        if ( ! $is_admin)
        {
            redirect(base_url());
        }
    }
}

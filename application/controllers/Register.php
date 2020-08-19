<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function create()
    {
        $this->load->database();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');

        $this->lang->load('form_register');

        // Set validation rules
        $this->lang->load('form_profile');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', $this->lang->line('form_profile_placeholder_fname'), 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('lname', $this->lang->line('form_profile_placeholder_lname'), 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('email', $this->lang->line('form_profile_placeholder_email'), 'required|min_length[1]|max_length[100]|valid_email|is_unique[accounts.email]');
        $this->form_validation->set_rules('student_id', $this->lang->line('form_profile_placeholder_student_id'), 'required');
        $this->form_validation->set_rules('year_enroll', $this->lang->line('form_profile_placeholder_year_enroll'), 'required|min_length[4]');
        $this->form_validation->set_rules('year_graduate', $this->lang->line('form_profile_placeholder_year_graduate'), 'required|min_length[4]');
        $this->form_validation->set_rules('address', $this->lang->line('form_profile_placeholder_address'), 'required');
        if ($this->form_validation->run() == FALSE)
        {
            // View form if failed
            $this->load->view('account/register');
        }
        else
        {
            // Add new account and profile
            $this->load->model('');
        }
    }

    public function register_new()
    {
        $this->load->model('register_model');
        $this->load->helper('string');

        // Create hash from user password
        $password = random_string('alnum', 8);
        $hash = sha1($password);
        $account = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'is_active' => 1,
            'access_level' => 2,
            'hash' => $hash
        );
        // Add new account
        if ($this->register_model->register_account($account))
        {
            $account_id = $this->register_model->db->insert_id();
            $account['password'] = $password;
            $this->send_mail($account);

            // Default account profile
            $this->load->model('account_model');
            $account = $this->account_model->get_by_email($this->input->post('email'));
            $profile = array(
                'id' => $account['id'],
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'gender' => $this->input->post('gender'),
                'faculty' => $this->input->post('faculty'),
                'subject_area' => $this->input->post('subject_area'),
                'student_id' => $this->input->post('student_id'),
                'year_enroll' => $this->input->post('year_enroll'),
                'year_graduate' => $this->input->post('year_graduate'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'phone_home' => $this->input->post('phone_home'),
                'phone_mobile1' => $this->input->post('phone_mobile1'),
                'phone_mobile2' => $this->input->post('phone_mobile2'),
                'is_active' => 0,
                'last_update' => date('Y-m-d: H:i:s')
            );
            $this->load->model('profile_model');
            $this->profile_model->insert($profile);
        }
    }

    public function send_mail($data)
    {
        $this->load->library('email');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'alumni.umn@umn.ac.id',
            'smtp_pass' => 'KAMIUMNoke',
            'smtp_port' => '465',
            'smtp_timeout' => '7',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'mailtype' => 'text',
            'smtp_crypto' => 'ssl',
        ));

        $this->email->from('alumni.umn@umn.ac.id', 'Admin');
        $this->email->to($this->input->post('email'));
        $this->email->cc('');
        $this->email->bcc('');

        $this->email->subject('Welcome to KAMI UMN Web Site');
        $this->email->message($this->get_mail_script($data));

        if ($this->email->send(FALSE))
        {
            redirect(base_url('admin/register'));
        }
        else
        {
            $data = array(

                'page_heading' => 'OOPS',
                'nav' => $this->load->view('admin/nav', NULL, TRUE),
                'alerts' => array(array('type' => 'danger', 'content' => $this->email->print_debugger())),
                'content' => '',
            );

            $this->load->view('admin/app', $data);
        }
    }

    public function get_mail_script($data)
    {
        $this->load->helper('file');
        $file = file_get_contents(base_url().'email_scripts/account_welcome.txt');
        $file = str_replace('%usr_fname%', $data['fname'], $file);
        $file = str_replace('%usr_lname%', $data['lname'], $file);
        $file = str_replace('%password%', $data['password'], $file);

        return $file;
    }

}

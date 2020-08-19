<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fastregister extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
        $this->lang->load('form_profile');
        $this->form_validation->set_rules('fname', $this->lang->line('form_profile_label_fname'), 'required|max_length[40]');
        $this->form_validation->set_rules('lname', $this->lang->line('form_profile_label_lname'), 'required|max_length[40]');
        $this->form_validation->set_rules('email', $this->lang->line('form_profile_label_email'), 'required|is_unique[accounts.email]|valid_email|min_length[5]|max_length[125]');
        $this->form_validation->set_rules('student_id', $this->lang->line('form_profile_label_student_id'), 'required|is_unique[profiles.student_id]|max_length[11]');
        $this->form_validation->set_rules('year_enroll', $this->lang->line('form_profile_label_year_enroll'), 'required|max_length[4]');
        $this->form_validation->set_rules('year_graduate', $this->lang->line('form_profile_label_year_graduate'), 'required|max_length[4]');
        $this->form_validation->set_rules('student_id', $this->lang->line('form_profile_label_student_id'), 'required|max_length[11]');
        $this->form_validation->set_rules('phone_mobile1', $this->lang->line('form_profile_label_phone_mobile1'), 'required|max_length[13]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        $alerts = array();
        if ($this->form_validation->run()) {
            $this->register_new(array(
                'id' => $this->session->id,
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
                'last_update' => date('Y-m-d H:i:s')
                ,'password' => $this->input->post('password')
                ,'passconf' => $this->input->post('passconf')
            ));

            // redirect to home
            $this->session->set_flashdata('alert-home', 'Selamat anda telah berhasil terdaftar!');
            $this->session->set_flashdata('alert-home-type', 'success');
            
            redirect(base_url());
        }
        else {
            foreach ($this->form_validation->error_array() as $field => $message) {
                array_push($alerts, array(
                    'type' => 'danger',
                    'content' => $message
                ));
            }
            array_push($alerts, array(
                'type' => 'danger',
                'content' => 'Hubungi <b>alumni.umn@umn.ac.id</b> apabila email atau nim Anda sudah digunakan'
            ));
        }

        $data = array(
            'alerts' => $alerts,
            'content' => $this->load->view('fastregister/form_create', array(), TRUE)
        );

        $this->load->view('simple', $data);
    }

    public function register_new($request)
    {
        $this->load->model('register_model');
        $this->load->helper('string');

        // Create hash from user password
        // $password = random_string('alnum', 8);
        // $hash = sha1($password);
        
        // Ubah logic password, user input password mereka sendiri
        $password = $request['password'];
        $hash = sha1($password);

        $account = array(
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'is_active' => 1,
            'access_level' => 2,
            'hash' => $hash
        );

        // Add new account
        if ($this->register_model->register_account($account))
        {
            // Ubah logic password, user input password mereka sendiri
            // $account_id = $this->register_model->db->insert_id();
            // $account['password'] = $password;
            // $this->send_mail($account);

            $account_id = $this->register_model->db->insert_id();
            $account['password'] = $password;


            // Default account profile
            $this->load->model('account_model');
            $account = $this->account_model->get_by_email($request['email']);
            $profile = array(
                'id' => $account['id'],
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'gender' => $request['gender'],
                'faculty' => $request['faculty'],
                'subject_area' => $request['subject_area'],
                'student_id' => $request['student_id'],
                'year_enroll' => $request['year_enroll'],
                'year_graduate' => $request['year_graduate'],
                'email' => $request['email'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'phone_home' => $request['phone_home'],
                'phone_mobile1' => $request['phone_mobile1'],
                'phone_mobile2' => $request['phone_mobile2'],
                'is_active' => 0,
                'last_update' => date('Y-m-d: H:i:s'),
            );
            $this->load->model('profile_model');
            $this->profile_model->insert($profile);
        }
    }

    public function send_mail($data)
    {
        /* Email Solution */
        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'alumni.umn@umn.ac.id',
        //     'smtp_pass' => 'KAMIUMNoke',
        //     'mailtype'  => 'text', 
        //     'charset'   => 'iso-8859-1'
        // );
        // $this->load->library('email', $config);
        // $this->email->set_newline("\r\n");
        
        // // Set to, from, message, etc.
                
        // $result = $this->email->send();

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
        $this->email->to($data['email']);
        $this->email->cc('');
        $this->email->bcc('');

        $this->email->subject('Welcome to KAMI UMN Web Site');
        $this->email->message($this->get_mail_script($data));

        if ($this->email->send(FALSE))
        {

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

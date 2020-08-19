<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->helper('string');
    }

    public function reset()
    {
        $data = $this->account_model->get_details($this->input->post('id'));
        $password = random_string('alnum', 8);
        $data['hash'] = sha1($password);

        $this->account_model->set($data);
        
        $this->send_mail(array(
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => $password
        ));
    }

    public function change()
    {
        if ( ! $this->session->logged_in) {
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');

        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('check_password', 'Check Password', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('account/change_password');
        }
        else
        {
            $this->load->model('account_model');
            $this->account_model->reset_password($this->session->id, sha1($this->input->post('new_password')));

            redirect(base_url());
        }
    }

    public function send_mail($data)
    {
        $this->load->library('email');
        $this->lang->load('email_lang');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'alumni.umn@umn.ac.id',
            'smtp_pass' => 'KAMIUMNoke',
            'smtp_port' => '465',
            'smtp_timeout' => 5,
            'mailtype'  => 'text',
            'charset'   => 'utf-8'
        ));
        $this->email->set_newline("\r\n");
        $this->email->from('alumni.umn@umn.ac.id', 'Admin');
        $this->email->to($data['email']);
        $this->email->cc('');
        $this->email->bcc('');

        $this->email->subject('Password Reset - KAMI UMN');
        $this->email->message($this->get_mail_script($data));
        // Pengiriman email berhasil atau tidak akan diabaikan, password tetap dirubah dan hanya dapat dilihat oleh admin. 06/01/2019

        $fname = isset($data['fname']) ? $data['fname'] : null;
        $lname = isset($data['lname']) ? $data['lname'] : null;
        $email = isset($data['email']) ? $data['email'] : null;
        $password = isset($data['password']) ? $data['password'] : null;
        
        if ($this->email->send(FALSE))
        {
            // Kalau pengiriman email berhasil
            // redirect(base_url('account'));
            $data = array(
                'page_heading' => 'DONE',
                'nav' => $this->load->view('admin/nav', NULL, TRUE),
                // Tampilan diganti dengan yang baru, tanpa kirim email 06/01/2019
                'alerts' => array(
                    array('type' => 'danger', 'content' => $this->email->print_debugger())
                ),
                'content' => '',
            );
            $this->load->view('admin/app', $data);
        }
        else
        {
            // Kalau pengiriman email gagal
            $data = array(
                'page_heading' => 'DONE',
                'nav' => $this->load->view('admin/nav', NULL, TRUE),
                // Tampilan diganti dengan yang baru, tanpa kirim email 06/01/2019
                'alerts' => array(
                    array('type' => 'success', 'content' => '<b>Password telah berhasil diubah</b>')
                ),
                'content' => 'Email pengguna : <h3>'. $email .'</h3>Password baru : <h3>' . $password . '</h3>',
            );
            $this->load->view('admin/app', $data);
        }
    }

    public function get_mail_script($data)
    {
        $this->load->helper('file');
        $file = file_get_contents(base_url().'email_scripts/reset_password.txt');
        $file = str_replace('%usr_fname%', $data['fname'], $file);
        $file = str_replace('%usr_lname%', $data['lname'], $file);
        $file = str_replace('%password%', $data['password'], $file);

        return $file;
    }
}

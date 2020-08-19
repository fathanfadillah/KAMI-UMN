<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {
        // Allow only admin
        $this->load->model('account_model');
        if ( ! $this->account_model->is_admin($this->session->id))
        {
            redirect(base_url());
        }

        // Set up views
        $data = array(
            'page_heading' => 'All Accounts',
            'content' => '',
            'nav' => $this->load->view('admin/nav', null, TRUE),
            'alerts' => array(),
        );

        $details = $this->account_model->get();
        $data['content'] .= $this->load->view('account/detail', array('accounts' => $details), TRUE);

        $this->load->view('admin/app', $data);
    }

    public function signin()
    {
        $this->load->library('session');
        if ($this->session->logged_in)
        {
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
        $this->lang->load('form_signin');
        $this->form_validation->set_rules('email', $this->lang->line('form_signin_label_email'), 'required|valid_email|min_length[5]|max_length[125]');
        $this->form_validation->set_rules('password', $this->lang->line('form_signin_label_password'), 'required|min_length[5]|max_length[30]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('alert', 'Email and password does not match. <p>If persist, contact alumni.umn@umn.ac.id for further support.</p>');
            $this->session->set_flashdata('alert-type', 'danger');
            $this->load->view('account/signin');
        }
        else
        {
            $usr_email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('account_model');

            $this->load->database();
            $user = $this->account_model->does_user_exist($usr_email);
            if ($user)
            {
                if ($user)
                {
                    $hash = sha1($password);
                    if ($user->is_active != 0) { // See if the user is active or not
                        // Compare the generated hash with that in the database
                        if ($hash != $user->hash) {
                            // Didn't match so send back to login
                            $data['login_fail'] = true;
                            $this->load->view('account/signin', $data);
                        } else {
                            $data = array(
                                'id' => $user->id,
                                'email' => $user->email,
                                'fullname' => $user->fname." ".$user->lname,
                                'access_level' => $user->access_level,
                                'logged_in' => TRUE
                            );
                            // Save data to session
                            $this->session->set_userdata($data);
                            // var_dump($this->session);
                            // var_dump($this->session->logged_in);

                            if ($data['access_level'] == 2) {
                                redirect(base_url());
                            } elseif ($data['access_level'] == 1) {
                                redirect('admin');
                            } else {
                                redirect(base_url());
                            }
                        }
                    } else {
                        $this->load->view('account/signin', array("login_fail" => TRUE));
                    }
                }
            } else {
                $this->load->view('account/signin', array("login_fail" => TRUE));
            }
        }
    }

    public function reset_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');

        $this->form_validation->set_rules(
            'old_password', 'Old Password', 'required');
        $this->form_validation->set_rules(
            'new_password', 'New Password', 'required');
        $this->form_validation->set_rules(
            'check_password', 'Check Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('account/reset_password');
        }
        else
        {
            $this->load->model('account_model');
            $this->account_model->reset_password(
                $this->session->id,
                sha1($this->input->post('new_password')));

            redirect(base_url());
        }
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

        if ($this->form_validation->run())
        {
            $this->load->model('account_model');
            $this->account_model->delete($this->input->post('id'));
            $this->load->model('profile_model');
            $this->profile_model->delete($this->input->post('id'));
        }

        redirect('account');
    }

    public function signout()
    {
        $this->session->sess_destroy();
        redirect('account/signin');
    }
}

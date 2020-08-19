<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('profile');
        if ($this->session->logged_in)
        {
            $this->load->model('account_model');
            $this->account = $this->account_model->get_details($this->session->id);
        }
        else
        {
            redirect('account/signin');
        }
    }

    public function index()
    {

        $this->load->model('profile_model');
        
        $profile = $this->profile_model->get_details($this->session->id);

        $data = array(
            'header' => $this->lang->line('profile_my_profile'),
            'content' => '',
            'alerts' => array(),
        );

        if ($profile)
        {
            $data['content'] = $this->load->view('profile/show_profile', $profile, TRUE);

            $this->load->view('app', $data);
        }
        else
        {
            $this->edit();
        }
    }

    public function admin_index($start = 0) {
        if ($this->session->access_level != 1) redirect(base_url());
        
        $this->load->model('profile_model');
        $profiles = $this->profile_model->get($start);
        if ($this->input->get('faculty') != null) {
            $faculty = $this->input->get('faculty');
            $this->faculty = $faculty;
            $profiles = $this->profile_model->filter_by_faculty($faculty);
        }
        if ($this->input->get('subject_area') != null) {
            $subject_area = $this->input->get('subject_area');
            $this->subject_area = $subject_area;
            $profiles = $this->profile_model->filter_by_subject_area($subject_area, true);
        }
        
        // For each profiles
        $profile_work_resumes = array();
        $this->load->model('work_resume_model');
        foreach ($profiles as $profile) {
            $profile_work_resumes[$profile["id"]] = $this->work_resume_model->get_by_user($profile["id"]);
        }
        $profile_study_preparations = array();
        $this->load->model('study_preparation_model');
        foreach ($profiles as $profile) {
            $profile_study_preparations[$profile["id"]] = $this->study_preparation_model->get_by_account($profile["id"]);
        }

        $data = array(
            'page_heading' => $this->lang->line('profile_all_profile'),
            'nav' => $this->load->view('admin/nav', null, TRUE),
            'content' => $this->load->view(
                'profile/admin_index',
                array(
                    'profiles' => $profiles,
                    'profile_work_resumes' => $profile_work_resumes,
                    'profile_study_preparations' => $profile_study_preparations
                ),
                TRUE
            ),
            'alerts' => array(),
        );
        if ($this->input->get('faculty') != null) {
            $data['page_heading'] .= " - ".$this->input->get('faculty');
        }
        if ($this->input->get('subject_area') != null) {
            $data['page_heading'] .= " - ".$this->input->get('subject_area');
        }
        
        $this->load->view('admin/app', $data);
    }

    public function view()
    {
        $this->lang->load('profile');

        $data = array(
            'header' => $this->lang->line('profile_my_profile'),
            'content' => $this->load->view('profile/my', $this->profile_model->get_details($this->session->id), TRUE),
            'alerts' => array(),
        );

        $this->load->view('app', $data);
    }

    public function edit()
    {
        $this->lang->load('profile');
        $this->lang->load('form_profile');
        $this->load->library('form_validation');
        $this->load->model('profile_model');

        $this->form_validation->set_rules('fname', $this->lang->line('form_profile_label_fname'), 'required');
        $this->form_validation->set_rules('student_id', $this->lang->line('form_profile_label_student_id'), 'required');

        if ($this->profile_model->get_details($this->session->id)) {
            $profile = $this->profile_model->get_details($this->session->id);
            if ($profile['student_id'] != $this->input->post('student_id'))
                $this->form_validation->set_rules('student_id', $this->lang->line('form_profile_label_student_id'), 'required|is_unique[profiles.student_id]');
        }

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->model('profile_model');
            $data = array(
                'content' => $this->load->view('profile/edit_profile', $this->profile_model->get_details($this->session->id), TRUE),
                'alerts' => array(),
            );

            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type'=>'danger', 'content'=>$err));
            }

            $data['content'] = $data['content'];

            $this->load->view('app', $data);
        }
        else
        {
            $this->load->helper('date');
            $data = array(
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
            );

            $this->load->library('upload');
            $config = array(
                'upload_path' => getcwd().'/assets/images/p',
                'file_name' => sha1($this->session->id . 'photos'),
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '1000',
                'overwrite' => TRUE,
            );
            $this->upload->initialize($config);
            $this->upload->do_upload('photo');

            $data['photo_path'] = sha1($this->session->id . 'photos') . $this->upload->data('file_ext');

            $this->load->model('profile_model');
            if ($this->profile_model->update($data))
            {
                redirect('profile');
            }
            else
            {
                $data = array(
                    'content' => $this->load->view('profile/edit_profile', $this->profile_model->get_details($this->session->id), TRUE),
                    'alerts' => array(),
                );
                foreach ($this->form_validation->error_array() as $err)
                {
                    array_push($data['alerts'], array('type'=>'danger', 'content'=>$err));
                }
                $this->load->view('app', $data);
            }
        }
    }

    public function work()
    {
        $this->load->model('work_resume_model');
        $this->load->library('form_validation');
        $this->lang->load('work_resume');

        $this->form_validation->set_rules('company_name', $this->lang->line('form_work_label_company_name'), 'required');
        $this->form_validation->set_rules('business_area', $this->lang->line('form_work_label_business_area'), 'required');
        $this->form_validation->set_rules('hire_date', $this->lang->line('form_work_label_hire_date'), 'required');

        $works = $this->work_resume_model->get_by_user($this->session->id);

        $data = array(
            'header' => $this->lang->line('profile_my_profile'),
            'content' => '',
            'alerts' => array(),
        );

        $this->load->model('profile_model');
        $data['content'] = $this->load->view('profile/work', array('works' => $works
            , 'is_last_update_less_than_three_month' => $this->profile_model->is_last_update_less_than_three_month($this->session->id)
        ), TRUE);

        // Alert when validation failed
        if ($this->form_validation->run() === FALSE)
        {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type'=>'danger', 'content'=>$err));
            }

        }
        // Create new work resume if validation succeed
        else
        {
            $work_resume = $this->create_work_resume_from_post();
            $update_result = $this->work_resume_model->update($work_resume);
            if($update_result == FALSE)
            {
                array_push($data['alerts'], array('type'=>'danger', 'content'=>'Perubahan tidak disimpan.'));
            }

            redirect('profile/work');
        }

        $this->load->view('app', $data);
    }

    private function create_work_resume_from_post()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'account_id' => $this->session->id,
            'company_name' => $this->input->post('company_name'),
            'business_area' => $this->input->post('business_area'),
            'department' => $this->input->post('department'),
            'phone_number' => $this->input->post('phone_number'),
            'hire_date' => $this->input->post('hire_date'),
            'is_match_subject_area' => $this->input->post('is_match_subject_area'),
            'first_salary_range' => $this->input->post('first_salary_range'),
            'last_update' => date('Y-m-d'),
        );

        return $data;
    }

    public function study_preparation()
    {
        $this->load->model('profile_model');
        $this->load->model('study_preparation_model');
        $this->lang->load('profile');

        $study_preparation = $this->study_preparation_model->get_by_account($this->session->id);
        $data = array(
            'header' => $this->lang->line('profile_my_profile'),
            'content' => $this->load->view(
                'profile/study_preparation'
                , array(
                    'study_preparation' => $study_preparation
                    , 'is_last_update_less_than_three_month' => $this->profile_model->is_last_update_less_than_three_month($this->session->id)
                ), TRUE),
            'alerts' => array(),
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('overseas_type', $this->lang->line('study_preparation_label_overseas_type'), 'required');
        $this->form_validation->set_rules('type', $this->lang->line('study_preparation_label_type'), 'required');
        $this->form_validation->set_rules('institute_name', $this->lang->line('study_preparation_label_institute_name'), 'required');
        $this->form_validation->set_rules('subject_area', $this->lang->line('study_preparation_label_subject_area'), 'required');
        if ($this->form_validation->run() === FALSE)
        {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type'=>'danger', 'content'=>$err));
            }
        }
        else
        {
            $study = array(
                'id' => $this->input->post('id'),
                'account_id' => $this->session->id,
                'overseas_type' => $this->input->post('overseas_type'),
                'type' => $this->input->post('type'),
                'institute_name' => $this->input->post('institute_name'),
                'subject_area' => $this->input->post('subject_area'),
                'study_year' => $this->input->post('study_year'),
            );
            $this->study_preparation_model->set($study);

            $study_preparation = $this->study_preparation_model->get_by_account($this->session->id);
            $data['content'] = $this->load->view(
                'profile/study_preparation'
                , array(
                    'study_preparation' => $study_preparation
                    , 'is_last_update_less_than_three_month' => $this->profile_model->is_last_update_less_than_three_month($this->session->id)
                ), TRUE);
        }

        $this->load->view('app', $data);
    }

    public function faculty($faculty_name)
    {
        $this->load->model('profile_model');
        if ($this->profile_model->is_last_update_less_than_three_month($this->session->id) == FALSE) {
            $extra_content = $this->load->view('common/_ask_for_update', array(), TRUE);
        }

        switch ($faculty_name) {
            case 'ict':
                # code...
                $faculty = 'ICT';
                $header = 'ICT';
                break;

                case 'bisnis':
                # code...
                $faculty = 'BISNIS';
                $header = 'Bisnis';
                break;

                case 'ilkom':
                # code...
                $faculty = 'KOMUNIKASI';
                $header = 'Komunikasi';
                break;

                case 'dkv':
                # code...
                $faculty = 'DESAIN_KOMUNIKASI_VISUAL';
                $header = 'DKV';
                break;

                default:
                # code...
                $this->index();
                break;
        }
        $query = $this->input->get('q');

        $this->load->model('profile_model');
        $profiles = $this->profile_model->search($query, $faculty);
        $data = array(
            'header' => $this->lang->line('profile_alumni_profiles') . ' ' . $header,
            'content' => $this->load->view('profile/faculty', array('profiles' => $profiles), TRUE) . $extra_content,
            'alerts' => array(),
        );

        $this->load->view('app', $data);
    }

    public function testimony()
    {
        if ( ! $this->session->logged_in)
        {
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->lang->load('form_testimony');

        $this->load->model('profile_model');

        $this->form_validation->set_rules('content', $this->lang->line('form_testimony_content'), 'required');
        $data = array(
            'header' => $this->lang->line('profile_my_profile'),
            'content' => $this->load->view('profile/testimony', $this->profile_model->get_testimony($this->session->id), TRUE),
            'alerts' => array(),
        );

        if ($this->form_validation->run() == TRUE)
        {
            $testimony = array(
                'id' => $this->session->id,
                'content' => $this->input->post('content'),
            );
            $this->profile_model->set_testimony($testimony);
        }
        else {
            foreach ($this->form_validation->error_array() as $err)
            {
                array_push($data['alerts'], array('type' => 'danger', 'content' => $err));
            }
        }

        $this->load->view('app', $data);
    }

    public function delete_work() {

    }

    public function download($start = 0) {
        $url = urldecode(uri_string());
        $urlArr = explode('/',substr($url, 17));
        
        if($urlArr[1] == 'faculty')
            $faculty = $urlArr[2];
        else {
            $subject_area = $urlArr[1];
        }
        
        $this->load->model('profile_model');
        
        $profiles = $this->profile_model->get($start);
        $allProfiles = $this->profile_model->get_all_details();
        if ($faculty != null) {
            $profiles = $this->profile_model->filter_by_faculty($faculty);
        }
        if ($subject_area != null) {
            $profiles = $this->profile_model->filter_by_subject_area($subject_area, true);
        }
        
        // Start Excel
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Users list');
 
        // load database
        $this->load->database();
 
        // load model
        // $this->load->model('userModel');
 
        // get all users in array formate
        // $users = $this->userModel->get_users();
        
        // get list field
        
        // $header = $this->profile_model->getListField();
        $header = array('ID', 'First Name', 'Last Name', 'Gender' ,'Faculty', 'Subject Area', 'Student ID', 'Year Enroll', 'Year Graduate', 'Email', 'Address', 'City', 'State', 'Phone Home', 'Phone Mobile 1', 'Phone Mobile 2', 'Is Active', 'Last Update', 'Photo Path');
        array_unshift($profiles, $header);
        
        // read data to active sheet
        $this->excel->getActiveSheet()->fromArray($profiles);
 
        $filename='PROFILE.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as.XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        // End Excel
    }
}

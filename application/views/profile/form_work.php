<?php $this->lang->load('work_resume'); ?>

<?php $this->load->view('profile/nav', array('number' => 2)); ?>

<div class="col-xs-12">

<h2 class="page-header"><?php echo $this->lang->line('profile_work_resume') ?></h2>

    <?php $this->load->view('profile/_form_work', [
            'id' => $id,
            'company_name' => $company_name,
            'business_area' => $business_area,
            'department' => $department,
            'phone_number' => $phone_number,
            'hire_date' => $hire_date,
            'is_match_subject_area' => $is_match_subject_area,
            'first_salary_range' => $first_salary_range,
        ]) ?>

</div>

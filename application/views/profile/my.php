<?php $this->lang->load('profile'); ?>

<h3 class="page-header"><?php echo $this->lang->line('profile_self_profile'); ?>
<a href="<?php echo base_url('profile/edit'); ?>" class="btn btn-success pull-right"><?php echo  $this->lang->line('profile_edit_button');  ?></a>
</h3>

<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <a href="<?php echo base_url('assets/images/p').'/'.$photo_path; ?>" class="thumbnail">
            <img src="<?php echo base_url('assets/images/p').'/'.$photo_path; ?>"/>
        </a>
    </div>
    <div class="col-xs-12">
        <table class="table">
            <tr>
                <th><?php echo $this->lang->line('profile_fullname'); ?></th>
                <td class="col-md-8"><?php echo $fname." ".$lname; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_gender'); ?></th>
                <td class="col-md-8"><?php echo $gender == 'M' ? $this->lang->line('profile_gender_male') : $this->lang->line('profile_gender_female'); ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_faculty'); ?></th>
                <td class="col-md-8"><?php echo $faculty; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_subject_area'); ?></th>
                <td class="col-md-8"><?php echo $subject_area; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_student_id'); ?></th>
                <td class="col-md-8"><?php echo $student_id; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_year_enroll_graduate'); ?></th>
                <td class="col-md-8"><?php echo $year_enroll; ?> - <?php echo  $year_graduate;  ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_email'); ?></th>
                <td class="col-md-8"><?php echo $this->session->email; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_address'); ?></th>
                <td class="col-md-8"><?php echo $address; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_city'); ?></th>
                <td class="col-md-8"><?php echo $city; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_state'); ?></th>
                <td class="col-md-8"><?php echo $state; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_phone_home'); ?></th>
                <td class="col-md-8"><?php echo $phone_home; ?></td>
            </tr>
            <tr>
                <th><?php echo $this->lang->line('profile_phone_mobile'); ?></th>
                <td class="col-md-8"><?php echo $phone_mobile1; ?></td>
            </tr>
            <tr>
                <td colspan="2"><a href="<?php echo base_url('profile/edit'); ?>" class="btn btn-success pull-right"><?php echo  $this->lang->line('profile_edit_button');  ?></a></td>
            </tr>
        </table>
    </div>
</div>

<?php
    $this->load->model('account_model');
    $data = $this->account_model->get_details($this->session->id);

    $this->lang->load('profile');
?>
<div class="row">

    <?php $this->load->view('profile/nav', array('number' => 1)); ?>
    <div class="col-md-12">
        <hr />
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2" style="text-align: center;">
                <a href="<?php echo base_url('assets/images/p').'/'.(file_exists(getcwd().'/assets/images/p/'.$photo_path) ? $photo_path : 'blank-face.jpg'); ?>"
                        class="thumbnail"
                        style="max-width: 4cm;max-height: 6cm;display: inline-block;">
                    <img class="img-responsive" src="<?php echo base_url('assets/images/p').'/'.(file_exists(getcwd().'/assets/images/p/'.$photo_path) ? $photo_path : 'blank-face.jpg'); ?>"/>
                </a>
            </div>
            <div class="col-xs-12 fontregular">
                <h5>
                    <table class="table">
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_fullname'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $fname." ".$lname; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_gender'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $gender == 'M' ? $this->lang->line('profile_gender_male') : $this->lang->line('profile_gender_female'); ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_faculty'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $faculty; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_subject_area'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $subject_area; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_student_id'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $student_id; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_year_enroll_graduate'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $year_enroll; ?> - <?php echo  $year_graduate;  ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_email'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $this->session->email; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_address'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $address; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_city'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $city; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_state'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $state; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_phone_home'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $phone_home; ?></td>
                        </tr>
                        <tr>
                            <th class="robotomedium"><?php echo $this->lang->line('profile_phone_mobile'); ?></th>
                            <td class="col-md-8 robotoregular"><?php echo $phone_mobile1; ?></td>
                        </tr>
                    </table>
                </h5>
                <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                    <a href="<?php echo base_url('profile/edit'); ?>" class="btn btn-success btn-block btn-lg"><?php echo  $this->lang->line('profile_edit_button');  ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

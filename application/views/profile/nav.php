<div class="col-md-12">
    <ul class="nav nav-pills">
        <li <?php if (isset($number) && $number == 1): ?>class="active"<?php endif; ?>><a href="<?php echo base_url('profile'); ?>"><?php echo  $this->lang->line('profile_my_data')  ?></a></li>
        <li <?php if (isset($number) && $number == 2): ?>class="active"<?php endif; ?>><a href="<?php echo base_url('profile/work'); ?>"><?php echo  $this->lang->line('profile_work_resume')  ?></a></li>
        <li <?php if (isset($number) && $number == 3): ?>class="active"<?php endif; ?>><a href="<?php echo base_url('profile/study_preparation'); ?>"><?php echo  $this->lang->line('profile_education')  ?></a></li>
        <li <?php if (isset($number) && $number == 4): ?>class="active"<?php endif; ?>><a href="<?php echo base_url('profile/testimony'); ?>"><?php echo  $this->lang->line('global_testimony')  ?></a></li>
    </ul>
</div>

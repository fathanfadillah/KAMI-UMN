
<h3>
    <div class="robotoregular fontcolor">
        <?php echo $this->lang->line('profile') ?>
    </div>
</h3>
<hr />
<h4>
    <div class="robotomedium fontcolor">
        <div>
            <?php echo $fname.' '.$lname ?>
            <?php if ($this->session->access_level == 1): ?>
                [
                    <a href="<?php echo base_url('admin') ?>">
                        <?php echo $this->lang->line('admin_panel') ?>
                    </a>
                ]
            <?php endif; ?>
        </div>
        <br />

        <div style="text-align: center">
            <a href="<?php echo base_url('assets/images/p').'/'.$photo_path; ?>" class="thumbnail" style="width: 3cm; height: 4cm; display: inline-block">
                <img src="<?php echo base_url('assets/images/p').'/'.$photo_path; ?>" alt="profpic">
            </a>
        </div>

        <div class="row">
            <div class="col-xs-offset-2 col-xs-10">
                <h4>
                    <div class="robotomedium fontcolor">
                        <i class="fa  fa-user"></i>
                        <a href="<?php echo base_url('profile') ?>">
                            <?php echo $this->lang->line('my_profile') ?>
                        </a>
                    </div>
                </h4>
                <h4>
                    <div class="robotomedium fontcolor">
                        <i class="fa  fa-gear"></i>
                        <a href="<?php echo base_url('password/change') ?>">
                            <?php echo $this->lang->line('change_password') ?>
                        </a>
                    </div>
                </h4>
                <h4>
                    <div class="robotomedium fontcolor">
                        <i class="fa  fa-sign-out"></i>
                        <a href="<?php echo base_url('account/signout') ?>">
                            <?php echo $this->lang->line('signout') ?>
                        </a>
                    </div>
                </h4>
            </div>
        </div>
    </div>
</h4>
<br />

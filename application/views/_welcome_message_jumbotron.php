<div class="jumbotron" tabindex="-1" style="margin-bottom: 0">
    <h3><?php echo $this->lang->line('home_jumbotron_header'); ?></h3>
    <p><?php echo $this->lang->line('home_jumbotron_message'); ?></p>
    <p>
        <a class="btn btn-primary btn-lg" href="<?php echo base_url('/accountrequest/create') ?>" role="button">
            <?php echo $this->lang->line('home_jumbotron_submit'); ?>
        </a>
        <a class="btn btn-success btn-lg" href="<?php echo base_url('/account/signin') ?>" role="button">
            <?php echo $this->lang->line('home_jumbotron_signin'); ?>
        </a>
    </p>
</div>

<?php $this->load->view('common/header'); ?>
<?php $this->lang->load('reset_password'); ?>

<div class="container">
    <div class="row">
        <h1 class="page-header"><?php echo $this->lang->line('reset_password_header'); ?></h1>
    </div>
    <div class="row">
        <?php echo validation_errors(); ?>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="col-md-12">
                <?php $this->load->view('account/form_change_password'); ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row">
        <br />
        <br />
        <br />
        <br />
        <a href="<?php echo base_url() ?>">
            <h3>
                <div class="robotoregular fontcolor">
                    <?php echo $this->lang->line('back_to_home'); ?>
                </div>
            </h3>
        </a>
    </div>
</div>

<?php $this->load->view('common/footer'); ?>

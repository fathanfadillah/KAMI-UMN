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
                <?php $this->load->view('account/form_reset_password'); ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php $this->load->view('common/footer'); ?>

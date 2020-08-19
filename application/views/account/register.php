<?php $this->lang->load('register'); ?>

<?php $this->load->view('common/header'); ?>

<div class="container">
    <div class="row" role="header">
        <h1 class="page-header"><?php echo $this->lang->line('register_header'); ?><h1>
    </div>

    <div><?php echo validation_errors(); ?></div>

    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php $this->load->view('account/form_register'); ?>
    </div>
</div>

<?php $this->load->view('common/footer'); ?>
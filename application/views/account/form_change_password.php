<?php
$this->lang->load('form_reset_password');
$this->load->helper('form');

$data = array(
    'old_password' => array(
        'label' => $this->lang->line('form_reset_password_label_old_password'),
        'input' => array(
            'name' => 'old_password',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => $this->lang->line('form_reset_password_placeholder_old_password')
        )
    ),
    'new_password' => array(
        'label' => $this->lang->line('form_reset_password_label_new_password'),
        'input' => array(
            'name' => 'new_password',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => $this->lang->line('form_reset_password_placeholder_new_password')
        )
    ),
    'check_password' => array(
        'label' => $this->lang->line('form_reset_password_label_check_password'),
        'input' => array(
            'name' => 'check_password',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => $this->lang->line('form_reset_password_placeholder_check_password')
        )
    )
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $this->lang->line('form_reset_password_header'); ?>
    </div>

    <div class="panel-body">
        <?php echo form_open('password/change', 'class="form-horizontal"'); ?>

        <?php foreach ($data as $name => $form_group): ?>
            <div class="form-group">

                <?php echo form_label($form_group['label'], $name, $attributes = array('class' => 'control-label col-md-4')); ?>

                <div class="col-md-8">
                    <?php echo form_input($form_group['input']); ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="form-group">
            <div class="col-sm-offset-1 col-md-10">
                <?php echo form_submit('password/change', $this->lang->line('form_reset_password_submit'), 'class="btn btn-success form-control"'); ?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

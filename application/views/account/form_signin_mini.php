<?php

$this->lang->load('form_signin');
$data = array(
    'email' => array(
        'label' => $this->lang->line('form_signin_label_email'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'email',
                'value' => set_value('email'),
                'placeholder' => $this->lang->line('form_signin_placeholder_email')
            )
            )
        ),
        'password' => array(
            'label' => $this->lang->line('form_signin_label_password'),
            'control' => array(
                array(
                    'type' => 'password',
                    'name' => 'password',
                    'placeholder' => 'Password'
                )
            )
            )
        );

        ?>

<!-- <h3>
    <div class="robotobold fontcolor">
        <?php //echo $this->lang->line('form_signin_header'); ?>
    </div>
</h3>
<hr /> -->

<?php echo form_open('account/signin', 'class="form-horizontal"'); ?>

<fieldset>

    <?php foreach ($data as $formgroup => $item): ?>

        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $item['label']; ?></label>

            <?php foreach ($item['control'] as $control => $subitem): ?>

                <div class="col-md-<?php echo floor(8 / count($item['control'])); ?>">

                    <?php echo form_input($subitem, '', 'class="form-control"'); ?>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

    <?php if ($this->session->userdata('alert')): ?>
        <div class="alert alert-<?php echo $this->session->userdata('alert-type') ?>">
            <?php echo $this->session->userdata('alert') ?>
        </div>
    <?php endif; ?>

    <!-- Change this to a button or input when using this as a form -->
    <div><?php echo form_submit('account/signin', $this->lang->line('form_signin_submit'), 'class="btn btn-success btn-login"'); ?></div>

</fieldset>

<?php echo form_close(); ?>
<br />
<div>
    <a href="<?php echo base_url('account/register') ?>" class="btn btn-primary2 btn-register">
        <?php echo $this->lang->line('register_new') ?>
    </a>
</div>

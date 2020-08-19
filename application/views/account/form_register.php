<?php

    $this->lang->load('form_register');
    $data = array(
        'name' => array(
            'label' => $this->lang->line('form_register_label_fullname'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'fname',
                    'placeholder' => $this->lang->line('form_register_placeholder_firstname'),
                    'autofocus' => TRUE
                ),
                array(
                    'type' => 'text',
                    'name' => 'lname',
                    'placeholder' => $this->lang->line('form_register_placeholder_lastname')
                )
            )
        ),
        'email' => array(
            'label' => $this->lang->line('form_register_label_email'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'email',
                    'placeholder' => $this->lang->line('form_register_placeholder_email')
                )
            )
        )
    );

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $this->lang->line('form_register_header'); ?></h3>
    </div>
    <div class="panel-body">
        <?php echo form_open('account/request', 'class="form-horizontal"'); ?>
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

                <!-- Change this to a button or input when using this as a form -->
                <?php echo form_submit('account/request', $this->lang->line('form_register_submit'), 'class="btn btn-lg btn-primary btn-block"'); ?>
            </fieldset>
        <?php echo form_close(); ?>
    </div>
</div>

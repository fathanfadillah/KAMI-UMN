<?php $this->lang->load('form_profile'); ?>

<?php

    $groups = array(
        array(
            array(
                'type' => 'hidden',
                'param' => array(
                    'name' => "id",
                    'value' => $this->session->id,
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_profile_label_photo'),
                    'id' => "",
                    'attributes' => array(
                        'for' => 'photo'
                    ),
                ),
            ),
            array(
                'type' => 'upload',
                'param' => array(
                    'data' => "title",
                    'value' => "",
                    'size' => "20",
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'submit',
                'param' => array(
                    'data' => "submit",
                    'value' => "submit",
                    'class' => "btn btn-success",
                ),
            ),
        ),
    );
?>

<?php echo form_open_multipart('photos/set', array('class' => "form-inline",)); ?>

<?php foreach ($groups as $controls): ?>

    <div class="form-group">

        <?php foreach ($controls as $control): ?>

            <?php if ($control['type'] == 'label'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_label($param['label_text'], $param['id'], $param['attributes']); ?>

            <?php elseif ($control['type'] == 'text'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_input($param); ?>

            <?php elseif ($control['type'] == 'textarea'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_textarea($param); ?>

            <?php elseif ($control['type'] == 'submit'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_submit($param); ?>

            <?php elseif ($control['type'] == 'upload'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_upload($param); ?>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php endforeach; ?>

<?php echo form_close(); ?>

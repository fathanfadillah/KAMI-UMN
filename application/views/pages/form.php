<?php $this->lang->load('form_pages'); ?>

<?php

    $groups = array(
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_pages_label_title'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "title"
                    )
                )
            ),
            array(
                'type' => 'text',
                'param' => array(
                    'name' => "title",
                    'value' => set_value('title', isset($title) ? $title : NULL),
                    'class' => "form-control",
                )
            ),
        ), array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_pages_label_photo'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "photo"
                    )
                )
            ),
            array(
                'type' => 'upload',
                'param' => array(
                    'name' => "photo",
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_pages_label_content'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "content"
                    )
                )
            ),
            array(
                'type' => 'textarea',
                'param' => array(
                    'id' => "ckeditor",
                    'name' => "content",
                    'value' => html_entity_decode(set_value('content', isset($content) ? $content : NULL)),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'submit',
                'param' => array(
                    'name' => "submit",
                    'value' => $this->lang->line('form_pages_submit'),
                    'class' => "btn btn-block btn-success",
                )
            ),
        ),
    );
?>

<div class="col-md-8">

<?php echo form_open_multipart('pages/add'); ?>

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

            <?php elseif ($control['type'] == 'upload'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_upload($param); ?>

            <?php elseif ($control['type'] == 'submit'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_submit($param); ?>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php endforeach; ?>

<?php echo form_close(); ?>

</div>

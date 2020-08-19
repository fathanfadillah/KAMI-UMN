<?php $this->lang->load('form_events'); ?>

<?php

    $groups = array(
        array(
            array(
                'type' => 'hidden',
                'param' => array(
                    'name' => "id",
                    'value' => set_value('id', isset($id) ? $id : ''),
                )
            ),
        ),array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_events_label_header'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "header"
                    )
                )
            ),
            array(
                'type' => 'text',
                'param' => array(
                    'name' => "header",
                    'value' => set_value('title', isset($header) ? $header : NULL),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_events_label_photo'),
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
                    'label_text' => $this->lang->line('form_events_label_description'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "description"
                    )
                )
            ),
            array(
                'type' => 'textarea',
                'param' => array(
                    'id' => "ckeditor",
                    'name' => "description",
                    'value' => html_entity_decode(set_value('description', isset($description) ? $description : NULL)),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_events_label_start_date'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "start_date"
                    )
                )
            ),
            array(
                'type' => 'datetime',
                'param' => array(
                    'type' => 'date',
                    'name' => "start_date",
                    'value' => set_value('start_date', isset($start_date) ? date('Y-m-d', strtotime($start_date)) : date('Y-m-d')),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_events_label_end_date'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "end_date"
                    )
                )
            ),
            array(
                'type' => 'datetime',
                'param' => array(
                    'type' => 'date',
                    'name' => "end_date",
                    'value' => set_value('end_date', isset($end_date) ?date('Y-m-d', strtotime( $end_date)) : date('Y-m-d')),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'submit',
                'param' => array(
                    'name' => "submit",
                    'value' => $this->lang->line('form_events_save'),
                    'class' => "btn btn-block btn-success",
                )
            ),
        ),
    );
?>

<?php echo form_open_multipart('admin/events/edit'); ?>

<?php foreach ($groups as $controls): ?>

    <div class="form-group">

        <?php foreach ($controls as $control): ?>

            <?php if ($control['type'] == 'label'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_label($param['label_text'], $param['id'], $param['attributes']); ?>

            <?php elseif ($control['type'] == 'text'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_input($param); ?>

            <?php elseif ($control['type'] == 'datetime'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_input($param); ?>

            <?php elseif ($control['type'] == 'textarea'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_textarea($param); ?>

            <?php elseif ($control['type'] == 'hidden'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_hidden($param['name'], $param['value']); ?>

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

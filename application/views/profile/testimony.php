<?php $this->lang->load('form_testimony'); ?>

<?php
$data = array(
    'content' => array(
        'label' => $this->lang->line('form_testimony_label_content'),
        'control' => array(
            array(
                'type' => 'textarea',
                'name' => 'content',
                'placeholder' => $this->lang->line('form_testimony_placeholder_content'),
                'value' => set_value('content', isset($content) ? $content : NULL),
            )
        )
    ),
);

?>

<div class="row">
    <?php $this->load->view('profile/nav', array('number' => 4)); ?>
    <div class="col-xs-12">
        <hr />
    </div>
    <div class="col-xs-12">
    <?php echo form_open(base_url('profile/testimony'), 'class="form form-horizontal"'); ?>

    <fieldset>
        <h5 class="robotoregular">
        <?php foreach ($data as $formgroup => $item): ?>

            <div class="form-group">
                <label class="col-md-3 control-label robotomedium"><?php echo $item['label']; ?></label>

            <?php foreach ($item['control'] as $control => $subitem): ?>

                <div class="col-md-8">
                    <?php if ($subitem['type'] == 'dropdown'): ?>
                        <?php echo form_dropdown($subitem['name'], $subitem['options'], $subitem['selected'], 'class="form-control"'); ?>
                    <?php elseif ($subitem['type'] == 'textarea'): ?>
                        <?php echo form_textarea($subitem, '', 'class="form-control"'); ?>
                    <?php else: ?>
                        <?php echo form_input($subitem, '', 'class="form-control"'); ?>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>

            </div>

        <?php endforeach; ?>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <?php echo form_submit('profile/testimony', $this->lang->line('form_testimony_submit'), 'class="btn btn-lg btn-primary btn-block"'); ?>
                </div>
            </div>
        </h5>
    </fieldset>

    <?php echo form_close(); ?>
    </div>
</div>

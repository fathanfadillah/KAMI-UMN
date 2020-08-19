<?php
$data = array(
    'id' => array(
        'label' => $this->lang->line('study_preparation_label_id'),
        'control' => array(
            array(
                'type' => 'hidden',
                'name' => 'id',
                'value' => isset($id) ? $id : '',
            ),
        ),
    ),
    'overseas_type' => array(
        'label' => $this->lang->line('study_preparation_label_overseas_type'),
        'control' => array(
            array(
                'type' => 'dropdown',
                'name' => 'overseas_type',
                'options' => array(
                    'Luar Negeri' => $this->lang->line('study_preparation_overseas_type_options_overseas'),
                    'Dalam Negeri' => $this->lang->line('study_preparation_overseas_type_options_indonesia'),
                ),
                'selected' => array(
                    'value' => set_value('overseas_type', isset($overseas_type) ? $overseas_type : 'Luar Negeri'),
                )
            )
        )
    ),
    'type' => array(
        'label' => $this->lang->line('study_preparation_label_type'),
        'control' => array(
            array(
                'type' => 'dropdown',
                'name' => 'type',
                'options' => array(
                    'Program S1' => $this->lang->line('study_preparation_type_options_s1'),
                    'Program S2' => $this->lang->line('study_preparation_type_options_s2'),
                    'Program Sertifikasi' => $this->lang->line('study_preparation_type_options_sertifikasi'),
                    'Kursus' => $this->lang->line('study_preparation_type_options_kursus'),
                ),
                'selected' => array(
                    'value' => set_value('type', isset($type) ? $type : 'Program S1'),
                )
            )
        )
    ),
    'institute_name' => array(
        'label' => $this->lang->line('study_preparation_label_institute_name'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'institute_name',
                'placeholder' => $this->lang->line('study_preparation_placeholder_institute_name'),
                'value' => set_value('institute_name', isset($institute_name) ? $institute_name : NULL),
            )
        )
    ),
    'subject_area' => array(
        'label' => $this->lang->line('study_preparation_label_subject_area'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'subject_area',
                'placeholder' => $this->lang->line('study_preparation_placeholder_subject_area'),
                'value' => set_value('subject_area', isset($subject_area) ? $subject_area : NULL),
            )
        )
    ),
    'study_year' => array(
        'label' => $this->lang->line('study_preparation_label_study_year'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'study_year',
                'placeholder' => $this->lang->line('study_preparation_placeholder_study_year') . " (ex. " . Date('Y') . ")",
                'value' => set_value('study_year', isset($study_year) ? $study_year : ''),
            )
        )
    ),
);

?>

<?php echo form_open(base_url('profile/study_preparation'), 'class="form form-horizontal"'); ?>

<fieldset>
<h5 class="robotoregular">
<?php foreach ($data as $formgroup => $item): ?>

    <div class="form-group">
        <label class="col-md-3 control-label robotomedium"><?php echo $item['label']; ?></label>

    <?php foreach ($item['control'] as $control => $subitem): ?>
        <div class="col-md-8">
            <?php if ($subitem['type'] == 'dropdown'): ?>
                <?php echo form_dropdown($subitem['name'], $subitem['options'], $subitem['selected'], 'class="form-control"'); ?>
            <?php elseif ($subitem['type'] == 'hidden'): ?>
                <?php echo form_hidden($subitem['name'], $subitem['value']) ?>
            <?php else: ?>
                <?php echo form_input($subitem, '', 'class="form-control"'); ?>
            <?php endif; ?>
        </div>

    <?php endforeach; ?>

    </div>

<?php endforeach; ?>

    <div class="form-group">
        <div class="col-md-offset-3 col-md-6">
            <?php echo form_submit('profile/edit', $this->lang->line('study_preparation_save_changes'), 'class="btn btn-lg btn-primary btn-block"'); ?>
        </div>
    </div>
</h5>
</fieldset>

<?php echo form_close(); ?>

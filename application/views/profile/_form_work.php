<?php $this->lang->load('work_resume'); ?>

<?php
$data = array(
    'id' => array(
        'label' => '',
        'control' => array(
            array(
                'name' => 'id',
                'value' =>  set_value('id', isset($id) ? $id : ''),
                'type' => 'hidden',
            )
        )
    ),
    'account_id' => array(
        'label' => '',
        'control' => array(
            array(
                'name' => 'account_id',
                'value' => $this->session->id,
                'type' => 'hidden',
            )
        )
    ),
    'company_name' => array(
        'label' => $this->lang->line('form_work_label_company_name'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'company_name',
                'placeholder' => $this->lang->line('form_work_placeholder_company_name'),
                'value' => set_value('company_name', isset($company_name) ? $company_name : ''),
            )
        )
    ),
    'business_area' => array(
        'label' => $this->lang->line('form_work_label_business_area'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'business_area',
                'placeholder' => $this->lang->line('form_work_placeholder_business_area'),
                'value' => set_value('business_area', isset($business_area) ? $business_area : NULL),
            )
        )
    ),'department' => array(
        'label' => $this->lang->line('form_work_label_department'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'department',
                'placeholder' => $this->lang->line('form_work_placeholder_department'),
                'value' => set_value('department', isset($department) ? $department : NULL),
            )
        )
    ),'phone_number' => array(
        'label' => $this->lang->line('form_work_label_phone_number'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'phone_number',
                'placeholder' => $this->lang->line('form_work_placeholder_phone_number'),
                'value' => set_value('phone_number', isset($phone_number) ? $phone_number : NULL),
            )
        )
    ),'hire_date' => array(
        'label' => $this->lang->line('form_work_label_hire_date'),
        'control' => array(
            array(
                'type' => 'text',
                'name' => 'hire_date',
                'placeholder' => $this->lang->line('form_work_placeholder_hire_date'),
                'value' => set_value('hire_date', isset($hire_date) ? $hire_date : '')
            )
        )
    ),
    'is_match_subject_area' => array(
        'label' => $this->lang->line('form_work_label_is_match_subject_area'),
        'control' => array(
            array(
                'type' => 'dropdown',
                'name' => 'is_match_subject_area',
                'options' => array(
                    '1' => $this->lang->line('form_work_is_match_subject_area_options_yes'),
                    '0' => $this->lang->line('form_work_is_match_subject_area_options_no'),
                ),
                'selected' => array(
                    'value' => set_value('is_match_subject_area', isset($is_match_subject_area) ? $is_match_subject_area : '1'),
                )
            )
        )
    ),
    'first_salary_range' => array(
        'label' => $this->lang->line('form_profile_label_salary_range'),
        'control' => array(
            array(
                'type' => 'dropdown',
                'name' => 'first_salary_range',
                'options' => array(
                    'Rp2.000.000 - Rp3.500.000' => 'Rp2.000.000 - Rp3.500.000',
                    'Rp3.600.000 - Rp5.000.000' => 'Rp3.600.000 - Rp5.000.000',
                    'Rp5.100.000 - Rp7.000.000' => 'Rp5.100.000 - Rp7.000.000',
                    '> Rp7.000.000' => '> Rp7.000.000'
                ),
                'selected' => array(
                    set_value('first_salary_range', isset($first_salary_range) ? $first_salary_range : 'Rp2.000.000 - Rp3.500.000', false),
                )
            )
        )
    )
);
?>

<?php echo form_open(base_url('profile/work'), 'class="form form-horizontal"'); ?>
<h5>
<fieldset>

<?php foreach ($data as $formgroup => $item): ?>

    <div class="form-group">
        <label class="col-md-3 control-label robotomedium"><?php echo $item['label']; ?></label>

    <?php foreach ($item['control'] as $control => $subitem): ?>

        <div class="col-md-8 robotoregular">
            <?php if ($subitem['type'] == 'dropdown'): ?>
                <?php echo form_dropdown($subitem['name'], $subitem['options'], $subitem['selected'], 'class="form-control"'); ?>
            <?php elseif ($subitem['type'] == 'hidden'): ?>
                <?php echo form_hidden($subitem['name'], $subitem['value']); ?>
            <?php else: ?>
                <?php echo form_input($subitem, '', 'class="form-control"'); ?>
            <?php endif; ?>
        </div>

    <?php endforeach; ?>

    </div>

<?php endforeach; ?>

    <div class="form-group">
        <div class="col-md-offset-3 col-md-6">
            <?php echo form_submit('profile/edit', $this->lang->line('form_work_save_changes'), 'class="btn btn-lg btn-primary btn-block"'); ?>
        </div>
    </div>
</fieldset>
</h5>
<?php echo form_close(); ?>

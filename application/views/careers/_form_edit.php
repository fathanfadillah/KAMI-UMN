<?php $this->lang->load('form_careers'); ?>

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
                    'label_text' => $this->lang->line('form_careers_label_header'),
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
                    'value' => set_value('header', isset($header) ? $header : NULL),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_short_description'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "short_description"
                    )
                )
            ),
            array(
                'type' => 'text',
                'param' => array(
                    'name' => "short_description",
                    'value' => set_value('short_description', isset($short_description) ? $short_description : NULL),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_company_name'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "company_name"
                    )
                )
            ),
            array(
                'type' => 'text',
                'param' => array(
                    'name' => "company_name",
                    'value' => html_entity_decode(set_value('company_name', isset($company_name) ? $company_name : NULL)),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_company_logo'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "company_logo"
                    )
                )
            ),
            array(
                'type' => 'file',
                'param' => array(
                    'name' => "company_logo",
                    'value' => html_entity_decode(set_value('company_logo', isset($company_logo) ? $company_logo : NULL)),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_document'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "document"
                    )
                )
            ),
            array(
                'type' => 'file',
                'param' => array(
                    'name' => "document",
                    'value' => html_entity_decode(set_value('document', isset($document) ? $document : NULL)),
                    'class' => "form-control",
                )
            ),
        ),
        array(
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_description'),
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
                    'label_text' => $this->lang->line('form_careers_label_end_date'),
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
                    'name' => 'end_date',
                    'value' => set_value('end_date', isset($end_date) ? date('Y-m-d', strtotime($end_date)) : ''),
                    'class' => 'form-control',
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_teknik_informatika',
                    'value' => 1,
                    'checked' => set_value('for_teknik_informatika', isset($for_teknik_informatika) ? $for_teknik_informatika : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_teknik_informatika'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_teknik_informatika"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_sistem_informasi',
                    'value' => 1,
                    'checked' => set_value('for_sistem_informasi', isset($for_sistem_informasi) ? $for_sistem_informasi : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_sistem_informasi'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_sistem_informasi"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_sistem_komputer',
                    'value' => 1,
                    'checked' => set_value('for_sistem_komputer', isset($for_sistem_komputer) ? $for_sistem_komputer : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_sistem_komputer'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_sistem_komputer"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_manajemen',
                    'value' => 1,
                    'checked' => set_value('for_manajemen', isset($for_manajemen) ? $for_manajemen : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_manajemen'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_manajemen"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_akuntansi',
                    'value' => 1,
                    'checked' => set_value('for_akuntansi', isset($for_akuntansi) ? $for_akuntansi : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_akuntansi'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_akuntansi"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_ilmu_komunikasi',
                    'value' => 1,
                    'checked' => set_value('for_ilmu_komunikasi', isset($for_ilmu_komunikasi) ? $for_ilmu_komunikasi : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_ilmu_komunikasi'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_ilmu_komunikasi"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'checkbox',
                'param' => array(
                    'name' => 'for_desain_komunikasi_visual',
                    'value' => 1,
                    'checked' => set_value('for_desain_komunikasi_visual', isset($for_desain_komunikasi_visual) ? $for_desain_komunikasi_visual : 0) ? 'checked' : '',
                )
            ),
            array(
                'type' => 'label',
                'param' => array(
                    'label_text' => $this->lang->line('form_careers_label_for_desain_komunikasi_visual'),
                    'id' => "",
                    'attributes' => array(
                        'for' => "for_desain_komunikasi_visual"
                    )
                )
            ),
        ),
        array(
            array(
                'type' => 'submit',
                'param' => array(
                    'name' => "submit",
                    'value' => $this->lang->line('save'),
                    'class' => "btn btn-block btn-primary",
                )
            ),
        ),
    );
?>

<?php echo form_open_multipart('careers/edit/' . $id); ?>

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

            <?php elseif ($control['type'] == 'checkbox'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_checkbox($param); ?>

            <?php elseif ($control['type'] == 'submit'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_submit($param); ?>

            <?php elseif ($control['type'] == 'file'): ?>

                <?php $param = $control['param']; ?>
                <?php echo form_upload($param); ?>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>
<?php endforeach; ?>

<?php echo form_close(); ?>

<?php
    $this->lang->load('form_profile');

    $data = array(
        'fname' => array(
            'label' => $this->lang->line('form_profile_label_fname'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'fname',
                    'placeholder' => $this->lang->line('form_profile_placeholder_fname'),
                    'value' => set_value('fname', isset($fname) ? $fname : ''),
                )
            )
        ),
        'lname' => array(
            'label' => $this->lang->line('form_profile_label_lname'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'lname',
                    'placeholder' => $this->lang->line('form_profile_placeholder_lname'),
                    'value' => set_value('lname', isset($lname) ? $lname : ''),
                )
            )
        ),'gender' => array(
            'label' => $this->lang->line('form_profile_label_gender'),
            'control' => array(
                array(
                    'type' => 'dropdown',
                    'name' => 'gender',
                    'options' => array(
                        'M' => $this->lang->line('form_profile_gender_options_male'),
                        'F' => $this->lang->line('form_profile_gender_options_female')
                    ),
                    'selected' => set_value('gender', isset($gender) ? $gender : ''),
                )
            )
        ),'faculty' => array(
            'label' => $this->lang->line('form_profile_label_faculty'),
            'control' => array(
                array(
                    'type' => 'dropdown',
                    'name' => 'faculty',
                    'options' => array(
                        'ICT' => $this->lang->line('form_profile_faculty_options_ict'),
                        'Bisnis' => $this->lang->line('form_profile_faculty_options_bisnis'),
                        'Komunikasi' => $this->lang->line('form_profile_faculty_options_komunikasi'),
                        'Seni dan Desain' => $this->lang->line('form_profile_faculty_options_seni_dan_desain'),
                    ),
                    'selected' => 'Information Communication and Technology',
                )
            )
        ),'subject_area' => array(
            'label' => $this->lang->line('form_profile_label_subject_area'),
            'control' => array(
                array(
                    'type' => 'dropdown',
                    'name' => 'subject_area',
                    'options' => array(
                        'Teknik Informatika' => $this->lang->line('form_profile_subject_area_options_teknik_informatika'),
                        'Sistem Informasi' => $this->lang->line('form_profile_subject_area_options_sistem_informasi'),
                        'Sistem Komputer' => $this->lang->line('form_profile_subject_area_options_sistem_komputer'),
                        'Manajemen' => $this->lang->line('form_profile_subject_area_options_manajemen'),
                        'Akuntansi' => $this->lang->line('form_profile_subject_area_options_akuntansi'),
                        'Ilmu Komunikasi' => $this->lang->line('form_profile_subject_area_options_ilmu_komunikasi'),
                        'Desain Komunikasi Visual' => $this->lang->line('form_profile_subject_area_options_desain_komunikasi_visual'),
                    ),
                    'selected' => 'Teknik Informatika',
                )
            )
        ),
        'student_id' => array(
            'label' => $this->lang->line('form_profile_label_student_id'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'student_id',
                    'placeholder' => $this->lang->line('form_profile_placeholder_student_id'),
                    'value' => set_value('student_id', isset($student_id) ? $student_id : ''),
                )
            )
        ),
        'year_enroll' => array(
            'label' => $this->lang->line('form_profile_label_year_enroll'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'year_enroll',
                    'placeholder' => $this->lang->line('form_profile_placeholder_year_enroll'),
                    'value' => set_value('year_enroll', isset($year_enroll) ? $year_enroll : ''),
                )
            )
        ),
        'year_graduate' => array(
            'label' => $this->lang->line('form_profile_label_year_graduate'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'year_graduate',
                    'placeholder' => $this->lang->line('form_profile_placeholder_year_graduate'),
                    'value' => set_value('year_graduate', isset($year_graduate) ? $year_graduate : ''),
                )
            )
        ),
        'email' => array(
            'label' => $this->lang->line('form_profile_label_email'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'email',
                    'placeholder' => $this->lang->line('form_profile_placeholder_email'),
                    'value' => set_value('email', isset($email) ? $email : ''),
                )
            )
        ),
        'address' => array(
            'label' => $this->lang->line('form_profile_label_address'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'address',
                    'placeholder' => $this->lang->line('form_profile_placeholder_address'),
                    'value' => set_value('address', isset($address) ? $address : ''),
                )
            )
        ),
        'city' => array(
            'label' => $this->lang->line('form_profile_label_city'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'city',
                    'placeholder' => $this->lang->line('form_profile_placeholder_city'),
                    'value' => set_value('city', isset($city) ? $city : ''),
                )
            )
        ),
        'state' => array(
            'label' => $this->lang->line('form_profile_label_state'),
            'control' => array(
                array(
                    'type' => 'dropdown',
                    'name' => 'state',
                    'options' => array(
                        'aceh' => 'Aceh',
                        'bali' => 'Bali',
                        'banten' => 'Banten',
                        'bengkulu' => 'Bengkulu',
                        'gorontalo' => 'Gorontalo',
                        'jambi' => 'Jambi',
                        'jakarta' => 'DKI Jakarta',
                        'jawa_barat' => 'Jawa Barat',
                        'jawa_tengah' => 'Jawa Tengah',
                        'jawa_timur' => 'Jawa Timur',
                        'kalimantan_barat' => 'Kalimantan Barat',
                        'kalimantan_selatan' => 'Kalimantan Selatan',
                        'kalimantan_tengah' => 'Kalimantan Tengah',
                        'kalimantan_timur' => 'Kalimantan Timur',
                        'kalimantan_utara' => 'Kalimantan Utara',
                        'kepulauan_bangka_belitung' => 'Kepulauan Bangka Belitung',
                        'kepulauan_riau' => 'Kepulauan Riau',
                        'lampung' => 'Lampung',
                        'maluku' => 'Maluku',
                        'maluku_utara' => 'Maluku Utara',
                        'nusa_tenggara_barat' => 'Nusa Tenggara Barat',
                        'nusa_tenggara_timur' => 'Nusa Tenggara Timur',
                        'papua' => 'Papua',
                        'papua_barat' => 'Papua Barat',
                        'riau' => 'Riau',
                        'sulawesi_barat' => "Sulawesi Barat",
                        'sulawesi_selatan' => 'Sulawesi Selatan',
                        'sulawesi_tengah' => 'Sulawesi Tengah',
                        'sulawesi_tenggara' => 'Sulawesi Tenggara',
                        'sulawesi_utara' => 'Sulawesi Utara',
                        'sumatera_barat' => 'Sumatera Barat',
                        'sumatera_selatan' => 'Sumatera Selatan',
                        'yogyakarta' => 'DI Yogyakarta'
                    ),
                    'selected' => set_value('state', isset($state) ? $state : ''),
                    'placeholder' => $this->lang->line('form_profile_placeholder_state')
                )
            )
        ),
        'phone_home' => array(
            'label' => $this->lang->line('form_profile_label_phone_home'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'phone_home',
                    'placeholder' => $this->lang->line('form_profile_placeholder_phone_home'),
                    'value' => set_value('phone_home', isset($phone_home) ? $phone_home : ''),
                )
            )
        ),
        'phone_mobile1' => array(
            'label' => $this->lang->line('form_profile_label_phone_mobile1'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'phone_mobile1',
                    'placeholder' => $this->lang->line('form_profile_placeholder_phone_mobile1'),
                    'value' => set_value('phone_mobile1', isset($phone_mobile1) ? $phone_mobile1 : ''),
                )
            )
        ),
        'phone_mobile2' => array(
            'label' => $this->lang->line('form_profile_label_phone_mobile2'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'phone_mobile2',
                    'placeholder' => $this->lang->line('form_profile_placeholder_phone_mobile2'),
                    'value' => set_value('phone_mobile2', isset($phone_mobile2) ? $phone_mobile2 : ''),
                )
            )
        )
    );
?>

<?php echo form_open_multipart('register', 'class="form form-horizontal"'); ?>

    <fieldset>
    <?php foreach ($data as $formgroup => $item): ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $item['label']; ?></label>
        <?php foreach ($item['control'] as $control => $subitem): ?>
            <div class="col-md-8">
                <?php if ($subitem['type'] == 'dropdown'): ?>
                    <?php echo form_dropdown($subitem['name'], $subitem['options'], $subitem['selected'], 'class="form-control"'); ?>
                <?php else: ?>
                    <?php echo form_input($subitem, '', 'class="form-control"'); ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-6">
                <?php echo form_submit('accountrequest/create', $this->lang->line('form_profile_submit_create'), 'class="btn btn-lg btn-primary btn-block"'); ?>
            </div>
        </div>
    </fieldset>

<?php echo form_close(); ?>

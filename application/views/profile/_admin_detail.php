<?php $this->lang->load('work_resume') ?>
<?php $this->lang->load('study_preparation') ?>

<h3><?php echo $this->lang->line('biography') ?></h3>
<table class="table">
    <tr>
        <th>NIM</th>
        <td><?php echo $profile['student_id'] ?></td>
    </tr>
    <tr>
        <th>Nama Depan</th>
        <td><?php echo $profile['fname'] ?></td>
    </tr>
    <tr>
        <th>Nama Belakang</th>
        <td><?php echo $profile['lname'] ?></td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td><?php echo $profile['gender'] ?></td>
    </tr>
    <tr>
        <th>Fakultas</th>
        <td><?php echo $profile['faculty'] ?></td>
    </tr>
    <tr>
        <th>Program Studi</th>
        <td><?php echo $profile['subject_area'] ?></td>
    </tr>
    <tr>
        <th>Tahun Masuk</th>
        <td><?php echo $profile['year_enroll'] ?></td>
    </tr>
    <tr>
        <th>Tahun Lulus</th>
        <td><?php echo $profile['year_graduate'] ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $profile['email'] ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php echo $profile['address'] ?></td>
    </tr>
    <tr>
        <th>Kota</th>
        <td><?php echo $profile['city'] ?></td>
    </tr>
    <tr>
        <th>Provinsi</th>
        <td><?php echo $profile['state'] ?></td>
    </tr>
    <tr>
        <th>Telepon Rumah</th>
        <td><?php echo $profile['phone_home'] ?></td>
    </tr>
    <tr>
        <th>Handphone 1</th>
        <td><?php echo $profile['phone_mobile1'] ?></td>
    </tr>
    <tr>
        <th>Handphone 2</th>
        <td><?php echo $profile['phone_mobile2'] ?></td>
    </tr>
</table>


<h3><?php echo $this->lang->line('work_history') ?></h3>
<?php if ($work_resumes == false): echo $this->lang->line('not_available') ?>
<?php else: ?>
<table class="table">
    <tbody>
        <?php foreach ($work_resumes as $work_resume): ?>
            <?php
                $resume = array(
                   "company_name" => $work_resume["company_name"],
                   "business_area" => $work_resume["business_area"],
                   "department" => $work_resume["department"],
                   "phone_number" => $work_resume["phone_number"],
                   "hire_date" => $work_resume["hire_date"],
                   "first_salary_range" => $work_resume["first_salary_range"]
                )
            ?>
            <?php foreach($resume as $key => $value): ?>
            <tr>
                <th>
                    <?php echo $this->lang->line("form_work_label_".$key) ?>
                </th>
                <td>
                    <?php echo $value ?>
                </td>
            </tr>
            <?php endforeach ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>

<h3><?php echo $this->lang->line('study_history') ?></h3>
<?php if ($study_preparations == false): echo $this->lang->line('not_available') ?>
<?php else: ?>
<table class="table">
    <tbody>
    <?php foreach ($study_preparations as $study_preparation): ?>
        <?php
            $study = array(
                "overseas_type" => $study_preparation["overseas_type"],
                "type" => $study_preparation["type"],
                "institute_name" => $study_preparation["institute_name"],
                "subject_area" => $study_preparation["subject_area"],
                "study_year" => $study_preparation["study_year"]
            )
        ?>
        <?php foreach($study as $key => $value): ?>
            <tr>
                <th><?php echo $this->lang->line("study_preparation_label_".$key) ?></th>
                <td><?php echo $value ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>

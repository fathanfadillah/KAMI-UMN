<button class="btn btn-primary" style="margin-bottom: 10px" onclick="window.location.href='<?php echo base_url();?>profile/download/subject_area/<?php echo $this->input->get('subject_area')?>/faculty/<?php echo $this->input->get('faculty')?>'">Download</button>

<div class="table-responsive">
    <table class="table table-striped table-hover" id="dataTable">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Fakultas</th>
                <th>Program Studi</th>
                <th>Tahun Masuk</th>
                <th>Tahun Lulus</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profiles as $profile): ?>
                <tr>
                    <td><?php echo $profile['student_id'] ?></td>
                    <td><?php echo $profile['fname'].' '.$profile['lname'] ?></td>
                    <td><?php echo $profile['faculty'] ?></td>
                    <td><?php echo $profile['subject_area'] ?></td>
                    <td><?php echo $profile['year_enroll'] ?></td>
                    <td><?php echo $profile['year_graduate'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profile-modal-<?php echo $profile['id'] ?>">View</button>

                        <div id="profile-modal-<?php echo $profile['id'] ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        echo $this->load->view(
                                            'profile/_admin_detail.php',
                                            array(
                                                'profile' => $profile,
                                                'work_resumes' => $profile_work_resumes[$profile['id']],
                                                'study_preparations' => $profile_study_preparations[$profile['id']]
                                            ),
                                            TRUE)
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

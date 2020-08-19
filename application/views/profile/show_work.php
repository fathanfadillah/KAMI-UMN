<?php $this->lang->load('profile'); ?>
<?php $this->lang->load('work_resume'); ?>

<div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class=""><a href="<?php echo base_url('profile'); ?>"><span class="fa fa-user"></span> <?php echo  $this->lang->line('profile_tab_profile');  ?></a></li>
                <li class="active"><a href="<?php echo base_url('profile/work'); ?>"><span class="fa fa-briefcase"></span> <?php echo  $this->lang->line('profile_tab_work_resume');  ?></a></li>
            </ul>
        </div>
    </div>

<?php if ( ! isset($work_resumes) || count($work_resumes) < 1): ?>

    <div class="jumbotron">
        <div class="row">
            <h3>Anda belum memiliki Resume</h3>
            <a href="#form_resume" class="btn btn-primary" data-toggle="modal">Buat Baru</a>
        </div>
    </div>

<?php else: ?>

    <h1>Work</h1>
    <p>My Personal Work History</p>

<?php endif; ?>

    <div class="modal fade" id="form_resume">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">

                        <?php echo $this->lang->line('form_work_header'); ?>

                    </h4>
                </div>
                <div class="modal-body">
                    <p>

                        <?php $this->load->view('profile/form_work'); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

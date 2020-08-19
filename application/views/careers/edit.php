<div class="text-right">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#career-modal-<?php echo $career['id'] ?>"><?php echo $this->lang->line('delete') ?></button>

    <div id="career-modal-<?php echo $career['id'] ?>" class="modal fade text-left" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Apakah Anda yakin untuk menghapus?</h4>
                </div>
                <div class="modal-footer">

                    <?php echo form_open(base_url('careers/delete'), '',array('id' => $career['id'])); ?>
                        <?php echo form_submit(array('data' => 'submit', 'value' => $this->lang->line('delete'), 'class' => 'btn btn-danger')); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <?php echo  form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->load->view('careers/_form_edit', $career, TRUE) ?>

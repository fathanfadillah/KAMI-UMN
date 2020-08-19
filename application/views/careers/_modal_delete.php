<button
    type="button"
    class="btn btn-danger"
    data-toggle="modal"
    data-target="#career_delete_<?php echo $career['id'] ?>">
    <?php echo $this->lang->line('delete') ?>
</button>

<div class="modal fade"
    tabindex="-1"
    role="dialog"
    id="career_delete_<?php echo $career['id'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Apakah Anda yakin untuk menghapus career?</h4>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="<?php echo base_url('admin/careers/delete/'.$career['id']) ?>">
                    <?php echo $this->lang->line('delete') ?>
                </a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

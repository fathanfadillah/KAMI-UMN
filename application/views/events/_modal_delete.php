<button
    type="button"
    class="btn btn-sm btn-danger"
    data-toggle="modal"
    data-target="#event_delete_<?php echo $event['id'] ?>">
    <?php echo $this->lang->line('delete') ?>
</button>

<div class="modal fade"
    tabindex="-1"
    role="dialog"
    id="event_delete_<?php echo $event['id'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Apakah Anda yakin untuk menghapus event?</h4>
            </div>
            <div class="modal-footer">
                <?php echo $this->load->view('events/_form_delete', array('event' => $event), TRUE) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

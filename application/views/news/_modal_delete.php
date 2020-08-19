<button
    type="button"
    class="btn btn-danger"
    data-toggle="modal"
    data-target="#news_delete_<?php echo $news['id'] ?>">
    <?php echo $this->lang->line('delete') ?>
</button>

<div class="modal fade"
    tabindex="-1"
    role="dialog"
    id="news_delete_<?php echo $news['id'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Apakah Anda yakin untuk menghapus news?</h4>
            </div>
            <div class="modal-footer">
                <?php echo $this->load->view('news/_form_delete', array('news' => $news), TRUE) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

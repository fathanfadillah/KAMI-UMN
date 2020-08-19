<div class="row">
    <?php $this->load->view('profile/nav', array('number' => 2)); ?>
    <div class="col-xs-12">
        <hr />
    </div>
    <div class="col-xs-12">
        <?php if ($is_last_update_less_than_three_month == FALSE): ?>
            <?php $this->load->view('profile/_message_last_update', array()) ?>
        <?php endif ?>
    </div>
    <div class="col-xs-12">
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form"><?php echo $this->lang->line('add_new') ?></button>
        </div>
        <div class="modal fade" id="form">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php echo $this->lang->line('add_new') ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php $this->load->view('profile/_form_work'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php foreach (isset($works) ? $works : array() as $work): ?>
                <?php $this->load->view('profile/_form_work', $work) ?>
            <?php endforeach ?>
        </div>
    </div>
</div>

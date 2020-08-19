<?php $this->lang->load('study_preparation'); ?>

<div class="row">
    <?php $this->load->view('profile/nav', array('number' => 3)); ?>
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
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form_study">
                <?php echo $this->lang->line('add_new') ?>
            </button>
        </div>

        <div class="modal fade" id="form_study" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Studi</h4>
                    </div>
                    <div class="modal-body">
                        <?php $this->load->view('profile/_form_study_preparation') ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <?php foreach ($study_preparation as $study): ?>
                <?php $this->load->view('profile/_form_study_preparation_edit', $study) ?>
            <?php endforeach ?>
        </div>
    </div>
</div>

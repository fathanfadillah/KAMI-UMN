<?php echo form_open(base_url('admin/events/delete')) ?>

    <?php echo form_hidden($name = 'id', $value = $event['id']); ?>
    <?php echo form_submit(array('data' => 'submit', 'value' => $this->lang->line('delete'), 'class' => 'btn btn-danger')); ?>

<?php echo  form_close() ?>

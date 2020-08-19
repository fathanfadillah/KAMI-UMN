<?php echo form_open(base_url('admin/careers/delete')) ?>

    <?php echo form_hidden($name = 'id', $value = $career['id']); ?>
    <?php echo form_submit(array('data' => 'submit', 'value' => $this->lang->line('delete'), 'class' => 'btn btn-danger')); ?>

<?php echo  form_close() ?>

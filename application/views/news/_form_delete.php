<?php echo form_open(base_url('admin/news/delete')) ?>

    <?php echo form_hidden($name = 'id', $value = $news['id']); ?>
    <?php echo form_submit(array('data' => 'submit', 'value' => $this->lang->line('delete'), 'class' => 'btn btn-danger')); ?>

<?php echo  form_close() ?>

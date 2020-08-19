<?php $this->lang->load('pages'); ?>

<table class="table table-bordered table-striped table-hover">

    <tr>
        <th><?php echo $this->lang->line('pages_header_id'); ?></th>
        <th><?php echo $this->lang->line('pages_header_header'); ?></th>
        <th><?php echo $this->lang->line('pages_header_content'); ?></th>
        <th><?php echo $this->lang->line('pages_header_last_update'); ?></th>
        <th><?php echo $this->lang->line('pages_edit_page'); ?></th>
    </tr>
    <?php $id = 1 ?>
    <?php foreach ($pages as $page): ?>

        <tr>
            <td><?php echo $id++ ?></td>
            <td><?php echo $page['header']; ?></td>
            <td><div style="overflow-y: scroll; height: 4em"<?php echo $page['content'] ?></td>
            <td><?php echo $page['last_update']; ?></td>
            <td><a href="<?php echo base_url('pages/edit/'.$page['slug']); ?>" class="btn btn-primary"><?php echo  $this->lang->line('pages_edit_page');  ?></a></td>
        </tr>

    <?php endforeach; ?>

</table>

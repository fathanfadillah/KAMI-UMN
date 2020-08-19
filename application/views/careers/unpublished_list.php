<?php foreach ($unpublished_job as $job): ?>
<div class="col-xs-12 col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <strong><?php echo $job['header'] ?></strong>
            <p><?php echo $job['company_name'] ?></p>
            <p><?php echo $job['short_description'] ?></p>
            <p><?php echo $job['description'] ?></p>
            <a href="<?php echo base_url('admin/careers/publish/'.$job['id']) ?>" class="btn btn-primary">Publish</a>
            <a href="<?php echo base_url('admin/careers/delete/'.$job['id']) ?>" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
<?php endforeach ?>

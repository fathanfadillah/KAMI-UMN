<?php foreach ($account_requests as $ar): ?>
<div class="col-xs-12 col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p>
                <strong><?php echo $ar['fname'] . ' ' . $ar['lname'] ?></strong>
                <?php if ($this->account_model->does_name_exist($ar['fname'], $ar['lname'])): ?>
                    <div class="alert alert-warning">
                        There is a similar name found
                    </div>
                <?php else: ?>
                    <strong><?php echo $ar['email'] ?></strong>
                <?php endif ?>
                <?php if ($this->account_model->does_user_exist($ar['email'])): ?>
                    <div class="alert alert-danger">
                        <strong><?php echo $ar['email'] ?></strong><br />
                        This user exists in database
                    </div>
                <?php else: ?>
                    <strong><?php echo $ar['email'] ?></strong>
                <?php endif ?>
            </p>
            <p><?php echo $ar['faculty'] ?></p>
            <p><?php echo $ar['subject_area'] ?></p>
            <p><?php echo html_escape($ar['student_id']) ?></p>
            <a href="<?php echo base_url('admin/account_request/accept/'.$ar['id']) ?>" class="btn btn-primary">Accept</a>
            <a href="<?php echo base_url('admin/account_request/delete/'.$ar['id']) ?>" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
<?php endforeach ?>

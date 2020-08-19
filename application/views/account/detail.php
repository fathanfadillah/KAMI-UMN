<?php $this->lang->load('form_reset_password'); ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTable">
        <thead>
                <tr>
                <th>Account ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Access Level</th>
                <th>Reset Password</th>
                <th>Delete Account</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account): ?>
                <tr>
                    <td><?php echo $account['id']; ?></td>
                    <td><?php echo $account['fname']; ?></td>
                    <td><?php echo $account['lname']; ?></td>
                    <td><?php echo $account['email']; ?></td>
                    <td><?php echo $account['access_level'] == 1 ? 'admin' : 'user'; ?></td>
                    <td>
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#password_reset_<?php echo $account['id'] ?>"><?php echo $this->lang->line('reset_password') ?></button>

                        <div class="modal fade" tabindex="-1" role="dialog" id="password_reset_<?php echo $account['id'] ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Apakah Anda yakin untuk mengulang password?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <?php echo form_open(base_url('password/reset')); ?>

                                            <?php echo form_hidden($name = 'id', $value = $account['id']); ?>
                                            <?php echo form_submit(array('data' => 'submit', 'value' => $this->lang->line('form_reset_password_submit'), 'class' => 'btn btn-success')); ?>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        <?php echo  form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete_account_<?php echo $account['id'] ?>"><?php echo $this->lang->line('delete') ?></button>

                        <div class="modal fade" tabindex="-1" role="dialog" id="delete_account_<?php echo $account['id'] ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Apakah Anda yakin untuk menghapus?</h4>
                                    </div>
                                    <div class="modal-footer">

                                        <?php echo form_open(base_url('account/delete')); ?>
                                            <?php echo form_hidden($name = 'id', $value = $account['id']); ?>
                                            <?php echo form_submit(array('data' => 'submit', 'value' => $this->lang->line('delete'), 'class' => 'btn btn-danger btn-sm')); ?>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        <?php echo  form_close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

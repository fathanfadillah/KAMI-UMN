<div style="text-align: right">
    <div style="margin: auto; margin-right: 0; width: 18em">
        <?php echo form_open(current_url(),array('method' => 'get')) ?>
            <div class="input-group">
                <input name="q" type="text" class="form-control" aria-label="search" value="<?php echo $this->input->get('q') ? $this->input->get('q') : '' ?>" placeholder="<?php echo $this->lang->line('name') ?>">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?php echo form_close() ?>
    </div>
</div>
<?php foreach ($profiles as $profile): ?>
<p>
        <div class="media">
            <div class="col-sm-3">
                <div class="media-left">
                    <a href="#">

                        <?php if (isset($profile['photo_path']) && file_exists(getcwd().'/assets/images/p/'.$profile['photo_path'])): ?>

                            <img class="media-object img-responsive thumbnail" src="<?php echo base_url('assets/images/p/'.$profile['photo_path']) ?>" alt="profile photo" />

                        <?php else: ?>

                            <img class="media-object img-responsive" src="<?php echo base_url('assets/images/brand-logo.jpg') ?>" alt="profile photo" />

                        <?php endif; ?>

                    </a>
                </div>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <div class="robotomedium fontcolor">
                        <?php echo $profile['fname'] ?> <?php echo  $profile['lname']  ?>
                    </div>
                </h4>
                <p>
                    <?php echo $this->lang->line('profile_working_at') ?> <?php echo  $profile['company_name'] ?>, <?php echo  $this->lang->line('profile_working_as') ?> <?php echo  $profile['department']    ?><br />
                </p>
                <p>
                    <i>"<?php echo $profile['testimony'] ?>"</i>
                </p>
            </div>
        </div>
</p>

<?php endforeach; ?>

<?php if ($profiles): ?>

<?php else: ?>
    <br />
    <p class="robotolight fontcolor">
        No Data Found
    </p>
<?php endif ?>

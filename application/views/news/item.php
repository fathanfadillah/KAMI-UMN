<?php $this->lang->line('news'); ?>

<h5>
    <div class="robotoregular fontcolor">
        <?php echo $sub_header ?>
    </div>
</h5>
<p>

    <?php if ($side_photo_1_path == NULL && $side_photo_2_path == NULL && $side_photo_3_path == NULL): ?>
        <div class="col-xs-12" style="text-align: center">

            <?php if ($main_photo_path != NULL && file_exists(getcwd().'/assets/images/n/'.$main_photo_path)): ?>

                <a href="<?php echo base_url('assets/images/n/'.$main_photo_path); ?>"><img src="<?php echo base_url('assets/images/n/'.$main_photo_path); ?>" class="img-responsive" style="height: 320px"/></a>

            <?php else: ?>

                <img src="<?php echo base_url('assets/images/brand-header.jpg'); ?>" class="img-responsive" style="height: 320px"/>

            <?php endif; ?>

        </div>
    <?php else: ?>
        <div class="col-xs-8">

            <?php if ($main_photo_path != NULL && file_exists(getcwd().'/assets/images/n/'.$main_photo_path)): ?>

                <a href="<?php echo base_url('assets/images/n/'.$main_photo_path); ?>"><img src="<?php echo base_url('assets/images/n/'.$main_photo_path); ?>" class="img-responsive" style="height: 320px"/></a>

            <?php else: ?>

                <img src="<?php echo base_url('assets/images/brand-header.jpg'); ?>" class="img-responsive" style="height: 320px"/>

            <?php endif; ?>

        </div>
        <div class="col-xs-4">
            <div class="row">
                <div class="col-xs-8">
                    <?php if (isset($side_photo_1_path) && file_exists(getcwd().'/assets/images/n/'.$side_photo_1_path)): ?>

                        <a href="<?php echo base_url('assets/images/n/'.$side_photo_1_path); ?>"><img src="<?php echo base_url('assets/images/n/'.$side_photo_1_path); ?>" class="img-responsive" /></a>

                    <?php endif; ?>
                </div>
                <div class="col-xs-8">
                    <?php if (isset($side_photo_2_path) && file_exists(getcwd().'/assets/images/n/'.$side_photo_2)): ?>

                        <a href="<?php echo base_url('assets/images/n/'.$side_photo_2_path); ?>"><img src="<?php echo base_url('assets/images/n/'.$side_photo_2_path); ?>" class="img-responsive" /></a>

                    <?php endif; ?>
                </div>
                <div class="col-xs-8">
                    <?php if (isset($side_photo_3_path) && file_exists(getcwd().'/assets/images/n/'.$side_photo_3_path)): ?>

                        <a href="<?php echo base_url('assets/images/n/'.$side_photo_3_path); ?>"><img src="<?php echo base_url('assets/images/n/'.$side_photo_3_path); ?>" class="img-responsive" /></a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif ?>


    <br />

</p>
<p class="row">
    <p class="col-xs-12">
        <?php echo nl2br($content) ?>
    </p>
</p>

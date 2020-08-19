<div class="row">
    <div class="col-xs-12" style="margin-bottom: 3em">
        <p class="robotoregular fontcolor">
            <span class="robotomedium"><?php echo $this->lang->line('time_range') ?>:</span>
            <?php echo date('j M Y', strtotime($start_date)) ?>
            -
            <?php echo date('j M Y', strtotime($end_date)) ?>
        </p>
        <?php if ($photo != NULL && file_exists(getcwd().'/assets/images/e/'.$photo)): ?>

            <p>
                <div>
                    <img src="<?php echo base_url('assets/images/e/'.$photo); ?>" class="img-responsive" />
                </div>
            </p>
            <br />

        <?php endif; ?>
        <p><?php echo html_entity_decode($description) ?></p>
    </div>
</div>

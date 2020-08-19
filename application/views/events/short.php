<?php $this->lang->load('events'); ?>

<?php foreach ($events as $event): ?>
    <div class="row" style="margin-bottom: 2em">
        <div class="col-md-3">
            <a href="<?php echo base_url('events/'.$event['slug']) ?>">
                <?php if ($event['photo'] != NULL && file_exists(getcwd().'/assets/images/e/'.$event['photo'])): ?>

                    <img src="<?php echo base_url('assets/images/e/'.$event['photo']); ?>" class="img-responsive" />

                <?php else: ?>

                    <img src="<?php echo base_url('assets/images/brand-header.jpg'); ?>" class="img-responsive" />

                <?php endif; ?>
            </a>
        </div>
        <div class="col-md-9">
            <h3>
                <div class="robotomedium fontcolor">
                    <?php echo $event['header'] ?>
                </div>
            </h3>
            <div class="robotoregular fontcolor">
                <?php echo date('j M Y', strtotime($event['start_date'])) ?>
            </div>
            <div class="robotoregular" style="line-height:23px;">
                <?php echo substr(strip_tags($event['description']), 0, 240) . "..." ?>
            </div>
            <a href="<?php echo base_url('events/'.$event['slug']); ?>"><?php echo  $this->lang->line('view_more');  ?></a>
        </div>
    </div>
<?php endforeach; ?>

<nav style="text-align: center"><?php echo $pagination ?></nav>

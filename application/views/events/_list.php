<?php $this->lang->load('events'); ?>

<?php foreach ($events as $event): ?>
    <div class="row">
        <div class="col-lg-12">
            <h5>
                <div class="robotoregular fontcolor">
                    <?php echo date('j M Y', strtotime($event['start_date'])) ?>
                </div>
            </h5>
            <h4>
                <a href="<?php echo base_url('events/'.$event['slug']); ?>">
                    <div class="robotomedium fontcolor">
                        <?php echo $event['header'] ?>
                    </div>
                </a>
            </h4>
        </div>
    </div>
<?php endforeach; ?>

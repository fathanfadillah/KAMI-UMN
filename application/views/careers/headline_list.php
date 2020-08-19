<?php if (count($careers) == 0): ?>

<h4 class="robotoregular" style="text-align: center">
    &lt; <?php echo $this->lang->line('currently_none') ?> &gt;
</h4>

<?php endif ?>

<?php foreach ($careers as $career): ?>
    <div class="well">
        <h4>
            <a href="<?php echo base_url('careers/'.$career['id']) ?>">
                <div class="robotomedium fontcolor">
                    <?php echo $career['header'] ?>
                </div>
            </a>
        </h4>
        <h6>
            <div class="robotoregular fontcolor">
                <p><strong> <?php echo  $career['company_name']  ?></strong></p>
            </div>
        </h6>
    </div>
<?php endforeach; ?>

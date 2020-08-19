<?php if ($page['photo'] != NULL && file_exists(getcwd().'/assets/images/page/'.$page['photo'])): ?>
    <img class="img-responsive" style="margin: auto" src="<?php echo base_url('/assets/images/page/'.$page['photo']) ?>"/>
<?php endif; ?>
<?php echo $page['content'] ?>

<?php foreach ($news as $news_item): ?>
    <div class="media">
        <div class="media-left col-xs-12 col-sm-2">
            <div class="thumbnail media-object">

                <?php if ($news_item['main_photo_path'] != '' && file_exists(getcwd().'/assets/images/n/'.$news_item['main_photo_path'])): ?>

                    <img src="<?php echo base_url('/assets/images/n/'.$news_item['main_photo_path']); ?>" class="img-responsive" />

                <?php else: ?>

                    <img src="<?php echo base_url('assets/images/brand-header.jpg'); ?>" class="img-responsive" />

                <?php endif; ?>

            </div>
        </div>
        <div class="media-body">
            <h3 class="media-heading"><?php echo $news_item['header'] ?></h3>
            <p><?php echo date('j M Y', strtotime($news_item['published_date'])) ?></p>
            <p class="text-justify">
                <?php echo substr(strip_tags($news_item['content']), 0, 240)."..." ?>
            </p>
            <a href="<?php echo base_url('news/'.$news_item['slug']); ?>"><?php echo  $this->lang->line('news_view_more');  ?></a>
        </div>
    </div>
<?php endforeach; ?>
<nav class="text-center">
    <?php echo $pagination ?>
</nav>

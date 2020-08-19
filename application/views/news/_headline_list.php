<h3><div class="robotoregular fontcolor">Berita</div></h3>
<hr />
<div>
    <?php if ($top_news = array_shift($news)): ?>

        <!--Berita Utama -->
        <?php if ($top_news['main_photo_path'] != '' && file_exists(getcwd().'/assets/images/n/'.$top_news['main_photo_path'])): ?>

            <a href="<?php echo base_url('news/'.$top_news['slug']); ?>"><img src="<?php echo  base_url('/assets/images/n/'.$top_news['main_photo_path']);  ?>" style="width: 100%" /></a>

        <?php else: ?>

            <a href="<?php echo base_url('news/'.$top_news['slug']); ?>"><img src="<?php echo  base_url('assets/images/brand-header.jpg');  ?>" style="width: 100%" /></a>

        <?php endif; ?>

        <a href="<?php echo base_url('news/'.$top_news['slug']); ?>"><h3><div class="robotomedium fontcolor"><?php echo $top_news['header'] ?></div></h3></a>
        <h4><div class="robotoregular fontcolor"><?php echo date('j M Y', strtotime($top_news['published_date'])) ?></div></h4>
        <h4><div class="robotoregular" style="line-height:23px;">
            <p class="text-justify"><?php echo substr($top_news['content'], 0, 240)."..." ?></p>
            <a href="<?php echo base_url('news/'.$top_news['slug']); ?>"><?php echo  $this->lang->line('news_view_more');  ?></a>
        </div></h4>
        <!--/Berita Utama -->
    <?php endif; ?>
    <hr />
    <!--Berita Lain -->
    <?php foreach ($news as $news_item): ?>
        <div class="row">
            <div class="col-lg-4" style="height: 191px; padding-right: 0; text-align: center">
                <div style="height: 100%; overflow: hidden">
                    <?php if ($news_item['main_photo_path'] != '' && file_exists(getcwd().'/assets/images/n/'.$news_item['main_photo_path'])): ?>

                        <img src="<?php echo base_url('/assets/images/n/'.$news_item['main_photo_path']); ?>" class="thumbnailmargin" style="height: 100%; margin: 0 -99999px" />

                    <?php else: ?>

                        <img src="<?php echo base_url('assets/images/brand-header.jpg'); ?>" class="thumbnailmargin" style="height: 100%; margin: 0 -99999px" />

                    <?php endif; ?>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="robotoregular fontcolor"><?php echo date('j M Y', strtotime($news_item['published_date'])) ?></div>
                <h4>
                    <div class="robotomedium" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #abc80c">
                        <a href="<?php echo base_url('news/'.$news_item['slug']); ?>"><?php echo $news_item['header'] ?></a>
                    </div>
                </h4>
                <div>
                    <p class="text-justify" style="height: 7em; margin-bottom: 1em"><?php echo substr(strip_tags($news_item['content']), 0, 240)."..." ?></p>
                    <a href="<?php echo base_url('news/'.$news_item['slug']); ?>"><?php echo  $this->lang->line('news_view_more');  ?></a>
                </div>
            </div>
        </div>
        <br />
    <?php endforeach; ?>
    <!--/Berita Lain -->
</div>

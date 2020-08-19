<?php $this->lang->load('news_lang'); ?>
<?php $this->lang->load('careers_lang'); ?>
<!-- <?php echo ENVIRONMENT ?>  -->
<div class="row" style="overflow: hidden">
    <?php //$this->load->view('common/_ask_for_update', array(), TRUE); ?>
    
    <div class="col-lg-6" style="margin-bottom: -99999px; padding-bottom: 99999px">
        <?php $this->load->view('news/_headline_list',array('news' => $news)) ?>
        <br />
        <a href="<?php echo base_url('news') ?>" class="btn btn-primary2 btn-lg btn-block"><?php echo $this->lang->line('news_all_news') ?></a>
        <br />
    </div>
    <!-- <div class="col-lg-3" style="margin-bottom: -99999px; padding-bottom: 99999px; border-left: 1px solid #eeeeee">
        <h3><div class="robotoregular fontcolor">Pengumuman</div></h3>
        <hr />
        <?php $this->load->view('events/_list.php', array('events' => $events)) ?>
        <?php if (count($events) > 0): ?>
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?php echo base_url('events') ?>" class="btn btn-primary2 btn-block"><?php echo $this->lang->line('all_events') ?></a>
                </div>
            </div>
        <?php else: ?>
            <h4 class="robotoregular"><?php echo $this->lang->line('no_events') ?></h4>
            <br />
        <?php endif ?>
        <br />
        <h3><div class="robotoregular fontcolor"><?php echo $this->lang->line('careers_info') ?></div></h3>
        <hr />
        <?php $this->load->view('careers/headline_list', array('careers' => $careers)) ?>
        <?php if (count($careers) > 0): ?>
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?php echo base_url('careers') ?>" class="btn btn-primary2 btn-block"><?php echo $this->lang->line('all_careers') ?></a>
                </div>
            </div>
        <?php endif ?>
        <br />
    </div> -->
    <div class="col-lg-1"></div>
    <div class="col-lg-4" style="margin-bottom: -99999px; padding-bottom: 99999px; border-left: 1px solid #eeeeee">
        <?php //if ($this->session->logged_in): ?>

            <?php
                // $this->load->view(
                //     'common/user_nav'
                //     , $this->profile_model->get_details($this->session->id)
                // )
            ?>

        <?php //else: ?>

            <!-- Login -->
            <?php //$this->load->view('account/form_signin') ?>
            <!-- <br /> -->
            <!-- /Login -->

        <?php //endif; ?>
        <!--Sambutan Rektor-->
        <!-- <h3>
            <nav>
                <a href="/pages/sambutan-rektor">
                    <div class="robotoregular fontcolor">Sambutan Rektor</div>
                </a>
            </nav>
        </h3>
        <hr /> -->
        <!-- <h4><div class="fontcolor robotoregular" style="text-align:center;"></div></h4> -->
        <!--/Sambutan Rektor-->
        <!--Alumni Relations-->
        <!-- <h3>
            <nav>
                <a href="/pages/alumni-relations">
                    <div class="robotoregular fontcolor">Alumni Relations</div>
                </a>
            </nav> -->
        <!-- </h3>
        <hr /> -->
        <!-- <h4><div class="fontcolor robotoregular" style="text-align:center;"></div></h4> -->
        <!--/Alumni Relations-->
        <!-- <br /> -->
        <!--Kerjasama-->
        <h3><div class="robotoregular fontcolor">Kerjasama</div></h3>
        <hr />
        <?php $links = array(
            array('url' => 'http://tarzanphoto.com', 'name' => 'Tarzan Photo Bridal Salon', 'image' => 'assets/images/logo-afiliasi-1.jpg'),
            array('url' => 'http://cdc.umn.ac.id', 'name' => 'CDC', 'image' => 'assets/images/brand-header.jpg'),
            array('url' => 'http://my.umn.ac.id', 'name' => 'My UMN', 'image' => 'assets/images/brand-header.jpg'),)
            ?>
            <?php foreach ($links as $link): ?>
                <a href="<?php echo $link['url'] ?>" class="thumbnail">
                    <img src="<?php echo base_url($link['image']) ?>"/>
                </a>
            <?php endforeach; ?>
            <!--.Kerjasama-->
            <br />
            <!--Tautan-->
            <h3><div class="robotoregular fontcolor">Tautan</div></h3>
            <hr />
            <?php $links = array(
                array('url' => 'http://cdc.umn.ac.id', 'name' => 'CDC'),
                array('url' => 'http://my.umn.ac.id', 'name' => 'My UMN'),
                array('url' => 'http://www.google.com', 'name' => 'Google'),)
                ?>
                <?php foreach ($links as $link): ?>
                    <a class="btn btn-block btn-primary2 external-link" href="<?php echo $link['url'] ?>">
                        <strong><?php echo $link['name'] ?></strong>
                    </a>
                <?php endforeach; ?>
                <!--/Tautan-->
                <br />
            </div>
        </div>
    </div>
</div>
<!-- <?php echo 'hwllo: '.ENVIRONMENT ?> -->

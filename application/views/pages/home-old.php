<?php $this->lang->load('news_lang'); ?>
<?php $this->lang->load('careers_lang'); ?>
<div class="row home">
    <div class="col-xs-12 col-md-3">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="page-header">Event</h4>
                <p id="calender"></p>
            </div>
            <div class="col-xs-12">
                <h4 class="page-header">Kerja Sama</h4>
                <div>
                    <?php $links = array(
                       array('url' => 'http://tarzanphoto.com', 'name' => 'Tarzan Photo Bridal Salon', 'image' => 'assets/images/logo-afiliasi-1.jpg'),
                       array('url' => 'http://cdc.umn.ac.id', 'name' => 'CDC', 'image' => 'assets/images/brand-header.jpg'),
                       array('url' => 'http://my.umn.ac.id', 'name' => 'My UMN', 'image' => 'assets/images/brand-header.jpg'),
                       array('url' => 'http://www.google.com', 'name' => 'Google', 'image' => 'assets/images/brand-header.jpg'))
                    ?>
                    <?php foreach ($links as $link): ?>
                        <div class="col-xs-12 col-md-12">
                            <a href="<?php echo $link['url'] ?>" class="thumbnail">
                                <img src="<?php echo base_url($link['image']) ?>"/>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php $this->load->view('news/_headline_list',array('news' => $news)) ?>
        <a href="<?php echo base_url('news') ?>" class="btn btn-primary btn-round"><?php echo $this->lang->line('news_all_news') ?></a>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="page-header">Sambutan Rektor</h4>
                <div>
                    <div class="media">
                        <div class="media-left col-xs-4">
                            <a href="#">
                                <img class="media-object img-responsive"
                                    src="<?php echo $rector['photo'] != NULL && file_exists(getcwd().'/assets/images/page/'.$rector['photo']) ? base_url('/assets/images/page/'.$rector['photo']) : base_url('assets/images/brand-logo.jpg') ?>" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <?php echo html_entity_decode($rector['content']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <h4 class="page-header">Alumni Relations</h4>
                <div>
                    <div class="media">
                        <div class="media-left col-xs-4">
                            <a href="#">
                                <img class="media-object img-responsive"
                                    src="<?php echo $relation['photo'] != NULL && file_exists(getcwd().'/assets/images/page/'.$relation['photo']) ? base_url('/assets/images/page/'.$relation['photo']) : base_url('assets/images/brand-logo.jpg') ?>" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <?php echo html_entity_decode($relation['content']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->logged_in): ?>
                <div class="col-xs-12">
                    <h4 class="page-header"><?php echo $this->lang->line('careers') ?></h4>
                    <ul class="media-list">
                        <?php foreach ($careers as $career): ?>
                            <li class="media">
                                <div class="media-right col-xs-3">
                                    <a href="#">
                                        <img class="media-object img-responsive" src="<?php echo base_url('assets/images/company_logo/'.(isset($career['company_logo']) ? $career['company_logo'] : 'logo.jpeg')); ?>"/>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $career['header'] ?> </h4>
                                    <div>
                                        <strong><?php echo  $career['company_name']  ?></strong>
                                    </div>
                                    <div>
                                        <strong> <?php echo  date('d M Y', strtotime($career['end_date']))  ?></strong> </p>
                                    </div>
                                    <div>
                                        <?php if ($career['for_teknik_informatika'] == '1'): ?>
                                            <div class="label label-primary">Teknik Informatika</div>
                                        <?php endif; ?>
                                        <?php if ($career['for_sistem_informasi'] == '1'): ?>
                                            <div class="label label-success">Sistem Informasi</div>
                                        <?php endif; ?>
                                        <?php if ($career['for_sistem_komputer'] == '1'): ?>
                                            <div class="label label-info">Sistem Komputer</div>
                                        <?php endif; ?>
                                        <?php if ($career['for_manajemen'] == '1'): ?>
                                            <div class="label label-warning">Manajemen</div>
                                        <?php endif; ?>
                                        <?php if ($career['for_akuntansi'] == '1'): ?>
                                            <div class="label label-primary">Akuntansi</div>
                                        <?php endif; ?>
                                        <?php if ($career['for_ilmu_komunikasi'] == '1'): ?>
                                            <div class="label label-success">Ilmu Komunikasi</div>
                                        <?php endif; ?>
                                        <?php if ($career['for_desain_komunikasi_visual'] == '1'): ?>
                                            <div class="label label-info">Desain Komunikasi Visual</div>
                                        <?php endif; ?>
                                    </div>
                                    <div><a href="<?php echo base_url('careers/'.$career['id']) ?>"><?php echo  $this->lang->line('careers_see_more')  ?> </a></div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif ?>
            <div class="col-xs-12">
                <h4 class="page-header"><?php echo $this->lang->line('links') ?></h4>
                <div>
                    <?php $links = array(
                       array('url' => 'http://cdc.umn.ac.id', 'name' => 'CDC'),
                       array('url' => 'http://my.umn.ac.id', 'name' => 'My UMN'),
                       array('url' => 'http://www.google.com', 'name' => 'Google'),)
                    ?>
                    <?php foreach ($links as $link): ?>
                        <a class="btn btn-block btn-info external-link" href="<?php echo $link['url'] ?>">
                            <strong><?php echo $link['name'] ?></strong>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

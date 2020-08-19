<?php $this->lang->load('nav'); ?>
<nav class="navbar navbar-default navbar-static-top navbar-admin" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">KAMI UMN Admin</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="<?php echo base_url(); ?>"><span class="fa fa-home"></span> <?php echo  $this->lang->line('nav_home');  ?></a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="<?php echo base_url('account/signout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users fa-fw"></i> <?php echo $this->lang->line('nav_accounts'); ?><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li>
                            <a href="<?php echo base_url('account'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo base_url('admin/profile') ?>"><i class="fa fa-fw fa-book"></i> <?php echo $this->lang->line('admin_alumni_profile') ?></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li>
                            <a href="<?php echo base_url('admin/profile'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/profile?faculty=ICT') ?>"><i class="fa fa-fw fa-book"></i> <?php echo $this->lang->line('ict') ?></a>
                            <ul class="nav nav-third-level collapse" aria-expanded="true">
                                <li>
                                    <a href="<?php echo base_url('admin/profile?faculty=ICT'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Teknik%20Informatika'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('informatics');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Sistem%20Informasi'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('information_system');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Sistem%20Komputer'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('computer_system');  ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/profile?faculty=Bisnis') ?>"><i class="fa fa-fw fa-book"></i> <?php echo $this->lang->line('business') ?></a>
                            <ul class="nav nav-third-level collapse" aria-expanded="true">
                                <li>
                                    <a href="<?php echo base_url('admin/profile?faculty=Bisnis'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Manajemen'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('management');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Akuntansi'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('accounting');  ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/profile?faculty=Komunikasi') ?>"><i class="fa fa-fw fa-book"></i> <?php echo $this->lang->line('communication') ?></a>
                            <ul class="nav nav-third-level collapse" aria-expanded="true">
                                <li>
                                    <a href="<?php echo base_url('admin/profile?faculty=Komunikasi'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Ilmu%20Komunikasi'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('communication_study');  ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/profile?faculty=Seni%20dan%20Desain') ?>"><i class="fa fa-fw fa-book"></i> <?php echo $this->lang->line('art_and_design') ?></a>
                            <ul class="nav nav-third-level collapse" aria-expanded="true">
                                <li>
                                    <a href="<?php echo base_url('admin/profile?faculty=Seni%20dan%20Desain'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/profile?subject_area=Desain%20Komunikasi%20Visual'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('visual_communication_design');  ?></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('news'); ?>"><span class="fa fa-newspaper-o fa-fa"></span> <?php echo  $this->lang->line('nav_news');  ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li>
                            <a href="<?php echo base_url('admin/news'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/news/add'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('nav_add_new');  ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('pages'); ?>"><span class="fa fa-file-o fa-fa"></span> <?php echo  $this->lang->line('nav_pages');  ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li>
                            <a href="<?php echo base_url('admin/pages'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pages/add'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('nav_add_new');  ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('pages'); ?>"><span class="fa fa-calendar fa-fa"></span> <?php echo  $this->lang->line('nav_events');  ?><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="true">
                        <li>
                            <a href="<?php echo base_url('admin/events'); ?>"><span class="fa fa-eye"></span> <?php echo  $this->lang->line('nav_view_all');  ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('events/add'); ?>"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('nav_add_new');  ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/careers/history'); ?>"><span class="fa fa-suitcase fa-fa"></span> <?php echo  $this->lang->line('careers');  ?></a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

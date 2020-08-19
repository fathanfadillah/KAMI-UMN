<?php $this->lang->load('nav'); ?>

<!-- Fixed navbar -->
<nav id="primary-nav" class="navbar navbar-default navbar-fixed-top robotoregular fontmedium whitenavbar">
    <div class="container fontmedium">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url("assets/img/kamiumn.png") ?>" style=" max-width: 250px; margin-top:-20px"></a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo base_url('pages/kontak-kami'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->lang->line('nav_brand_name') ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu fontsmall">
                        <!-- <li>
                            <a href="<?php echo base_url('pages/sejarah-kami-umn'); ?>">
                                <?php echo  $this->lang->line('nav_history');  ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pages/tujuan'); ?>">
                                <?php echo  $this->lang->line('nav_aim');  ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pages/kepengurusan'); ?>">
                                <?php echo  $this->lang->line('nav_staff');  ?>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url('pages/tentang-kami-umn'); ?>">
                                <?php echo $this->lang->line('nav_about_us') ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pages/sambutan-rektor'); ?>">
                                <?php echo $this->lang->line('nav_msg_chacellor') ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pages/alumni-relations'); ?>">
                                <?php echo $this->lang->line('nav_alumni_relations') ?>
                            </a>
                        </li>
                        <hr id="garis">
                        <li style="margin-left: 10px"><b><a href="#"><?php echo $this->lang->line('nav_all_profiles') ?></a></b></li>
                        <li style="margin-left: 15px;">
                            <a href="<?php echo base_url('profile/faculty/ict'); ?>">
                                <?php echo  $this->lang->line('ict');  ?>
                            </a>
                        </li>
                        <li style="margin-left: 15px;">
                            <a href="<?php echo base_url('profile/faculty/bisnis'); ?>">
                                <?php echo  $this->lang->line('business');  ?>
                            </a>
                        </li>
                        <li style="margin-left: 15px;">
                            <a href="<?php echo base_url('profile/faculty/ilkom'); ?>">
                                <?php echo  $this->lang->line('communication');  ?>
                            </a>
                        </li>
                        <li style="margin-left: 15px;">
                            <a href="<?php echo base_url('profile/faculty/dkv'); ?>">
                                <?php echo  $this->lang->line('art_and_design');  ?>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->lang->line('nav_all_profiles') ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu fontsmall">
                        <li>
                            <a href="<?php echo base_url('profile/faculty/ict'); ?>">
                                <?php echo  $this->lang->line('ict');  ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('profile/faculty/bisnis'); ?>">
                                <?php echo  $this->lang->line('business');  ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('profile/faculty/ilkom'); ?>">
                                <?php echo  $this->lang->line('communication');  ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('profile/faculty/dkv'); ?>">
                                <?php echo  $this->lang->line('art_and_design');  ?>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LAYANAN ALUMNI <span class="caret"></span></a>
                    <ul class="dropdown-menu fontsmall">
                        <li><a href="<?php echo base_url('pages/legalisir-dokumen'); ?>"><?php echo  $this->lang->line('nav_document_legalization');  ?></a></li>
                        <li><a href="<?php echo base_url('pages/kartu-alumni'); ?>"><?php echo  $this->lang->line('nav_alumni_card');  ?></a></li>
                        <li><a href="<?php echo base_url('pages/surat-keterangan-alumni'); ?>"><?php echo  $this->lang->line('nav_alumni_certificate');  ?></a></li>
                        <li><a href="<?php echo base_url('pages/faq'); ?>"><?php echo  $this->lang->line('nav_faq');  ?></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url('careers'); ?>"><?php echo  $this->lang->line('nav_career');  ?></a></li>
                <li><a href="<?php echo base_url('events'); ?>"><?php echo  $this->lang->line('nav_events');  ?></a></li>
                <!-- <li><a href="http://www.umn.ac.id/">UMN</a></li> -->
                <!-- <li><?php //$this->load->view('account/form_signin') ?></li> -->
                
                <li class="dropdown">
                    <?php if ($this->session->logged_in): $userData = $this->profile_model->get_details($this->session->id)?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-user">&nbsp;&nbsp;<?php echo $userData['fname']; ?></i><span class="caret"></span></a>
                    <?php else: ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LOGIN <span class="caret"></span></a>
                    <?php endif; ?>
                    
                    <?php if ($this->session->logged_in): ?>

                        <?php
                            //  $this->load->view(
                            //      'common/user_nav'
                            //      , $this->profile_model->get_details($this->session->id)
                            //  )
                        ?>
                    <ul class="dropdown-menu fontsmall">
                        <li><a href="<?php echo base_url('profile'); ?>"><i class="fa  fa-pencil">&nbsp;&nbsp;<?php echo  $this->lang->line('my_profile');  ?></i></a></li>
                        <li><a href="<?php echo base_url('password/change'); ?>"><i class="fa  fa-gear">&nbsp;&nbsp<?php echo  $this->lang->line('change_password');  ?></i></a></li>
                        <li><a href="<?php echo base_url('account/signout'); ?>"><i class="fa  fa-sign-out">&nbsp;&nbsp<?php echo  $this->lang->line('signout');  ?></i></a></li>
                    <?php else: ?>
                    <ul class="dropdown-menu fontsmall login-form">
                        <!-- Login -->
                        <?php $this->load->view('account/form_signin_mini') ?>
                        <!-- <br /> -->
                        <!-- /Login -->

                    <?php endif; ?>
                        <li><?php //$this->load->view('account/form_signin')  ?></li>
                    </ul>
                </li>
                
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

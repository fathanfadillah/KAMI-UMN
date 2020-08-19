<div class="col-xs-12">

    <?php if ($this->session->logged_in): ?>

        <a href="<?php echo base_url('careers/add') ?>" class="btn btn-primary pull-right"><?php echo $this->lang->line('add_new') ?></a>

    <?php endif; ?>

</div>

<div class="col-xs-12">
<ul class="media-list">

    <?php foreach ($careers as $career): ?>

        <li class="media">
            <div class="media-left col-xs-3 col-md-2">
                <a href="#">
                    <img class="media-object img-responsive" src="<?php echo base_url('assets/images/company_logo/'.(isset($career['company_logo']) ? $career['company_logo'] : 'logo.jpeg')); ?>"/>
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $career['header'] ?> </h4>
                <p><?php echo $this->lang->line('careers_company_name') ?>: <strong> <?php echo  $career['company_name']  ?></strong><br /><?php echo $this->lang->line('careers_end_date') ?>: <strong> <?php echo  date('d M Y', strtotime($career['end_date']))  ?></strong> </p>
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

    <nav class="text-center">
        <?php echo $pagination ?>
    </nav>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3><?php echo $header ?></h3>
        <h4><?php echo $company_name ?></h4>

        <?php if (isset($description)): ?>

        <p><?php echo html_entity_decode($description) ?></p>

        <?php endif; ?>

        <?php if (isset($document)): ?>

        <div class="row">
            <div class="col-xs-12">
                <a href="<?php echo base_url('assets/images/careers/'.$document) ?>">
                  <img class="img-responsive" src="<?php echo base_url('assets/images/careers/'.$document) ?>" alt="...">
                </a>
            </div>
        </div>

        <?php endif; ?>

        <br />
        <?php if ($this->session->access_level == 1): ?>
            <div class="text-right">
                <a href="<?php echo base_url("careers/edit/$id") ?>" class="btn btn-primary"><?php echo $this->lang->line('edit') ?></a>
                <?php echo $this->load->view('careers/_modal_delete', array('career' => $career), TRUE) ?>
            </div>
        <?php endif; ?>
    </div>
</div>

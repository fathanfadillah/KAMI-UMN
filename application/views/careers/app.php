<?php
/**
 * @param $header
 * @param $content
 */
?>

<?php $this->load->view('common/header'); ?>

<div class="container">
<?php $this->load->view('common/header_img'); ?>
<?php $this->load->view('common/nav'); ?>

<?php if ($this->session->logged_in == FALSE): ?>

    <?php $this->lang->load('home'); ?>

    <div class="jumbotron" tabindex="-1">
        <h1><?php echo $this->lang->line('home_jumbotron_header'); ?></h1>
        <p><?php echo $this->lang->line('home_jumbotron_message'); ?></p>
        <p><a class="btn btn-primary btn-lg" href="<?php echo base_url('pages/kontak-kami'); ?>" role="button"><?php echo  $this->lang->line('home_jumbotron_submit');  ?></a></p>
    </div>

<?php endif; ?>

    <div class="col-md-8">
        <div class="row">

            <?php if (isset($header)): ?>

                <h1 class="page-header"><?php echo $header; ?></h1>

            <?php endif; ?>

            <?php foreach ($alerts as $alert): ?>

                <div class="alert alert-<?php echo $alert['type'] ?>"><?php echo  $alert['content']  ?></div>

            <?php endforeach; ?>

            <p class="text-justify">

                <?php echo isset($content) ? $content : null; ?>

            </p>
        </div>
    </div>

<?php if ($this->session->logged_in == FALSE): ?>

    <div class="col-md-4">

        <?php $this->load->view('account/form_signin'); ?>

    </div>

<?php else: ?>

    <div class="col-md-4">
        <h1 class="page-header">Calender</h1>
        <p id="calender"></p>
    </div>

<?php endif; ?>

</div>

<?php $this->load->view('common/footer'); ?>

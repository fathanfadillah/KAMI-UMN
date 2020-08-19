<?php $this->load->view('common/header'); ?>
<?php $this->load->view('common/nav'); ?>

<div class="container">
<?php $this->load->view('common/header_img'); ?>

    <div class="col-md-8">
        <h1 class="page-header"><?php echo $page_header; ?></h1>
        <p class="text-justify">
            <?php echo $page_body; ?>
        </p>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Panel Header</div>
            <p class="panel-body">
                Lorem ipsum dolor sit amet.
            </p>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Panel Header</div>
            <p class="panel-body">
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

</div>

<?php $this->load->view('common/footer'); ?>

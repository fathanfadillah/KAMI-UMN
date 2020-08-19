<?php $this->load->view('common/header'); ?>
<?php $this->lang->load('signin'); ?>

<div class="container-fluid">
    <div class="row" style="float: none; margin: 0 auto; max-width:600px;">
        <img class="img-responsive" src="<?php echo base_url("assets/images/brand-header.jpg"); ?>">
    </div>
    <br>
    <div class="row well" style="float: none; margin: 0 auto; max-width:600px;">
        <div class="col-md-12">
            <?php $this->load->view('account/form_signin'); ?>
        </div>
    </div>
    <br>
    <div class="row" align="center">
        <a href="http://alumni.umn.ac.id/">
            <h3>
                <div class="robotomedium fontmedium fontcolor">
                    Kembali ke Halaman Utama
                </div>
            </h3>
        </a>
    </div>
</div>

<?php $this->load->view('common/footer'); ?>

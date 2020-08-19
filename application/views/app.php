<?php $this->lang->load('home'); ?>

<?php $this->load->view('common/header'); ?>
<?php $this->load->view('common/nav'); ?>
<br />
<div id="main-content" class="container" style="margin-bottom: 2em">
    <div class="col-md-9">
        <div class="row">
            <div class="col-xs-12">
                <?php $this->load->view('common/error', array('alerts' => $alerts)) ?>
            </div>
        </div>
        <div class="row">
            <?php if (isset($header)): ?>
                <h3><div class="robotomedium fontcolor"><?php echo $header; ?></div></h3>
            <?php endif; ?>
            <hr />
            <div class="robotoregular" style="line-height:23px;">
                <?php echo isset($content) ? $content : null; ?>
            </div>
            <hr>
        </div>
    </div>

    <!-- <div class="col-md-3"> -->
        <?php //if ($this->session->logged_in == FALSE): ?>
                <?php //$this->load->view('account/form_signin'); ?>
        <?php //else: ?>
                <!-- <h3 class="robotomedium fontcolor">Calender</h3>
                <hr />
                <p id="calender"></p> -->
        <?php //endif; ?>
    <!-- </div> -->
</div>

<?php $this->load->view('common/footer'); ?>
<script>
$(document).ready(function() {

    $("#askForUpdate").modal('show');
    
    $("#calender").fullCalendar({
        aspectRatio: 1,
        height: 'auto',
        views: {
            month: {
                titleFormat: 'MMM YYYY'
            }
        },
        events: {
            url: '<?php echo base_url('events/api') ?>'
        }
    });

    CKEDITOR.replace('ckeditor');
});
</script>

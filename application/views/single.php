<?php $this->lang->load('home'); ?>
<?php $this->load->view('common/header'); ?>
<?php $this->load->view('common/nav'); ?>
<?php $this->load->view('_carousel') ?>
<br />
<div id="main-content" class="container" style="margin-bottom: 2em">
    <!-- tambah div untuk flash message -->
    <div>
        <?php if ($this->session->userdata('alert-home')): ?>
            <div class="alert alert-<?php echo $this->session->userdata('alert-home-type') ?>">
                <?php echo $this->session->userdata('alert-home') ?>
            </div>
        <?php endif; ?>
    </div>

    <div>
        <?php echo isset($content) ? $content : null ?>
    </div>
</div>
<?php $this->load->view('common/footer'); ?>
<script>
var calendar;
$(document).ready(function() {

    $("#askForUpdate").modal('show');
    
    calendar = $("#calender").fullCalendar({
        contentHeight: "auto",
        views: {
            month: { // name of view
                titleFormat: 'MMM YYYY'
                // other view-specific options here
            }
        },
        events: {
            url: '<?php echo base_url('events/api') ?>'
        }
    });

    CKEDITOR.replace('ckeditor');
});
</script>

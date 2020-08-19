<?php $this->lang->load('home'); ?>
<?php $this->load->view('common/header'); ?>
<?php $this->load->view('common/nav'); ?>
<br />
<div class="container" style="margin-bottom: 2em">
    <div>
        <?php foreach ($alerts as $alert): ?>
        <div class="alert alert-<?php echo $alert['type'] ?>">
            <?php echo $alert['content'] ?>
        </div>
        <?php endforeach ?>
    </div>
    <div>
        <?php echo isset($content) ? $content : null ?>
    </div>
</div>
<script>
$(document).ready(function() {

    $("#calender").fullCalendar({
        aspectRatio: 2,
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
<?php $this->load->view('common/footer'); ?>

<?php
/**
 * params:
 *  - nav: html
 *  - page_heading: string
 *  - alerts: array
 *  - content: html
**/
?>
<?php $this->load->view('admin/header'); ?>
<?php echo $nav; ?>
<div id="wrapper">
    <div id="page-wrapper" style="padding-bottom: 80px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $page_heading; ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <?php foreach ($alerts as $alert): ?>
                    <div class="alert alert-<?php echo $alert['type']; ?>">
                        <?php echo $alert['content']; ?>
                    </div>
                <?php endforeach; ?>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('common/footer'); ?>
<script>
$(document).ready(function() {

    $("#calender").fullCalendar({
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

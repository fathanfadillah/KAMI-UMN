<?php $this->load->view('common/header'); ?>

<div class="container">
    <?php $this->load->view('common/header_img'); ?>

    <?php $this->load->view('common/nav'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php $this->load->view('profile/show_profile', $profile); ?>
        </div>

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Events
                </div>
                <div class="panel-body">
                    <ul>
                        <li>Event One</li>
                        <li>Event Two</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('common/footer'); ?>

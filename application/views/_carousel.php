<div class="container2" style="width:100%;">
    <div id="primary-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#primary-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#primary-carousel" data-slide-to="1"></li>
            <li data-target="#primary-carousel" data-slide-to="2"></li>
            <li data-target="#primary-carousel" data-slide-to="3"></li>
            <li data-target="#primary-carousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div style="cursor:pointer;" class="item active" onclick="window.open('http://www.umn.ac.id/arsitektur/','_blank');">
                <img src="<?php echo base_url("assets/img/1.png") ?>"  href="umn.ac.id" alt="carousel1" width="460" height="345">
            </div>

            <div style="cursor:pointer;" class="item" onclick="window.open('http://www.umn.ac.id/desain-komunikasi-visual/','_blank');">
                <img src="<?php echo base_url("assets/img/2.png") ?>"  alt="carousel2" width="460" height="345">
            </div>

            <div class="item">
                <img src="<?php echo base_url("assets/img/bg1.jpg") ?>" alt="carousel4" width="460" height="345">
            </div>

            <div class="item">
                <img src="<?php echo base_url("assets/img/bg4.jpg") ?>"  alt="carousel5" width="460" height="345">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#primary-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#primary-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

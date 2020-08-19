<footer class="footer">
    <!--startfooter-->
    <div class="container" style="background-color:#abc80c; width:100%">
        <div id="wrap">
            <div id="main" class="container">
                <div class="row">
                    <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                        <h4><div class="robotobold fontcolor"><i class="fa fa-location-arrow"></i> Alumni Relations</div></h4>
                        <div class="col-lg-5">
                            <h5>
                                <div class="robotoregular fontcolor text-left">
                                    Career Center &amp; Alumni<br />
                                    Gedung C lt. 2 Ruang 201<br />
                                    Universitas Multimedia Nusantara<br />
                                    Scientia Garden, Jl. Boulevard Gading Serpong<br />
                                    Gading Serpong, Tangerang , 15811<br />
                                </div>
                            </h5>

                        </div>
                        <div class="col-lg-7">
                            <h5>
                                <div class="robotomedium fontcolor fontevensmall">
                                    <i class="fa fa-phone"></i>  (021) 5422 0808 ext. 2401<br />
                                    <i class="fa fa-envelope"></i>  alumni.umn@umn.ac.id<br />
                                    <a href="https://www.facebook.com/KeluargaAlumniUMN/"><i class="fa fa-facebook-official"></i>  KAMI UMN</a><br />
                                    <a href="https://twitter.com/kamiumn"><i class="fa fa-twitter"></i>  @KAMIUMN</a><br />
                                    <a href="https://instagram.com/kami_umn/"><i class="fa fa-instagram"></i>  @KAMIUMN</a><br />
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--endfooter-->

<!-- jQuery -->
<script src="<?php echo base_url("assets/js/jquery-min.js"); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url("assets/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url("assets/bower_components/metisMenu/dist/metisMenu.min.js"); ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url("assets/bower_components/raphael/raphael-min.js"); ?>"></script>
<script src="<?php echo base_url("assets/bower_components/morrisjs/morris.min.js"); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url("assets/bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"); ?>"></script>

<script src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/fullcalendar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery.dataTables.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
<script>
$(document).ready(function () {
    if (document.querySelector('#dataTable')) {
        $('#dataTable').DataTable({
            "columnDefs": [
                {
                    "target": [ 5 ],
                    "searchable": false,
                    "orderable": false,
                },
                {
                    "target": [ 6 ],
                    "searchable": false,
                    "orderable": false,
                },
                {
                    "target": [ 7 ],
                    "searchable": false,
                    "orderable": false,
                },
            ]
        });
    }
});

</script>
</body>

</html>

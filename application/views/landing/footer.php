<style>
    .mad-footer.style-3 {
        color: #c7c8cc;
        padding: 8.25rem 0;
        background: url(<?php echo $asset_url; ?>images/footer_bg4.png) no-repeat bottom center #040404;
        background-size: contain;
    }

    @media screen and (max-width: 600px) {
        #footer-logo{
            visibility: hidden;
        }
    }
</style>
<!--================ Footer ================-->
<footer id="mad-footer" class="mad-footer style-3">
    <!--================ Footer row ================-->
    <div class="mad-footer-main">
        <div class="container">
            <div class="row vr-size-1">
                <div class="col-md-4">
                    <!--================ Widget ================-->
                    <section class="mad-widget">
                        <h5 class="mad-widget-title">We Are Open</h5>
                        <div class="mad-timetable mad-vr-list">
                            <ul>

                                <li>***We zijn ook open of feestdagen***</li>
                                <li>MONDAY	16:00	-	22:30</li>
                                <li>TUESDAY	16:00	-	22:30</li>
                                <li>WEDNESDAY	16:00	-	22:30</li>
                                <li>THURSDAY		CLOSED</li>
                                <li>FRIDAY	16:00	-	22:30</li>
                                <li>SATURDAY	12:00	-	22:30</li>
                                <li>SUNDAY	12:00	-	22:30</li>
                            </ul>
                        </div>
                    </section>
                    <!--================ End of Widget ================-->
                </div>
                <div class="col-md-4">
                    <!--================ Widget ================-->
                    <section class="mad-widget" id="footer-contact">
                        <a style="display: none;" id="footer-logo" href="#" class="mad-logo"><img src="https://www.kokorosushi.be/assets/images/kokorosushi-logo.png" alt=""></a>
                        <div class="mad-vr-list content-element-5">
                            <ul>
                                <li>
                                    Corbiestraat 21, <br>
                                    2400 MOL, BELGIUM <br>
                                    <a href="#" class="mad-dir mad-link">Get Direction</a>
                                </li>
                                <li>
                                    + 32 14 872 578 <br>

                                    <a href="#" class="mad-link">kokorosushi21@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mad-social-icons style-2 size-big">
                            <ul class="justify-content-center">
                                <li><a target="_blank"  href="https://www.facebook.com/KokorosushiBentoMol"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-tripadvisor"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </section>
                    <!--================ End of Widget ================-->
                </div>
                <div class="col-md-4">
                    <!--================ Widget ================-->
                    <section class="mad-widget">
                        <h5 class="mad-widget-title">Useful Links</h5>
                        <div class="mad-vr-list">
                            <ul>
                                <li><a href="#" class="mad-link">Home</a></li>
                                <li><a onclick="scrollToDiv('footer-contact')" href="javascript:void(0)"  class="mad-link">Contact</a></li>

                                <li><a onclick="scrollToDiv('reservation')" href="javascript:void(0)" class="mad-link">Reservation</a></li>
                            </ul>
                        </div>
                    </section>
                    <!--================ End of Widget ================-->
                </div>
            </div>
        </div>
    </div>
    <!--================ End of Footer row ================-->
    <p class="copyrights">Copyright © <?php echo date('Y'); ?> <a href="<?php echo site_url('landing/index') ?>">KokoroSushi</a>.
        All Rights Reserved.</p>
</footer>
<!--================ End of Footer ================-->
</div>
<script src="<?php echo $asset_url; ?>vendors/modernizr.js"></script>
<script src="<?php echo $asset_url; ?>vendors/jquery.easing.1.3.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/monkeysan.jquery.nav.1.0.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/monkeysan.tabs.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/handlebars-v4.0.5.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/jquery.parallax-1.1.3.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/monkeysan.validator.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/arcticmodal/jquery.arcticmodal-0.3.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/retina.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo $asset_url; ?>vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBAiQZmdiJv7g15ObEiISBGitvmdxWusc0&amp;libraries=geometry&amp;v=3.20"></script>
<script src="<?php echo $asset_url; ?>js/modules/mad.newsletter-form.min.js"></script>
<script src="<?php echo $asset_url; ?>js/modules/mad.sticky-header-section.min.js"></script>
<script src="<?php echo $asset_url; ?>js/mad.app.js"></script>
</body>

</html>
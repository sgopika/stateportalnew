 <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
								<p>കേരള സംസ്ഥാന ഐടി മിഷൻ <br>
Saankethika,Vrindavan Gardens,
Pottakkuzhi, Pattom.P.O,
Thiruvananthapuram, Kerala 695004
</p> 
                                <p class="phone">Phone: +91 471 2525444</p>
                                <p class="mail">
                                    <a href="mailto:admin.ksitm@kerala.gov.in">admin.ksitm@kerala.gov.in</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>About the Government</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">National Portal of India</a></li>
                                    <li><a href="javascript:void(0)">myGov</a></li>
                                    <li><a href="javascript:void(0)">Kerala Legislative Assembly</a></li>
                                    <li><a href="javascript:void(0)">I&PRD </a></li>
                                </ul>
                            </div>
							
							 
 
 
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>വിവരങ്ങൾ </h3>
                                <ul id="footermenus">
                                    <li><a href="javascript:void(0)">പോർട്ടലിനെ കുറിച്ച് </a></li>
                                    <li><a href="javascript:void(0)">Hyperlink policy</a></li>
                                    <li><a href="javascript:void(0)">Privacy policy</a></li>
                                    <li><a href="javascript:void(0)">Disclaimer</a></li>
                                    <li><a href="javascript:void(0)">Copyright Policy</a></li>
									<li><a href="javascript:void(0)">Terms and Conditions</a></li>
									<li><a href="javascript:void(0)">Guidelines</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        
                        <div class="col-lg-8 col-12">
                            <div class="copyright">
                                <p>This is the official portal of the Government of Kerala. Portal owned by Kerala State IT Mission. <br>
Content owned by Information & Public Relations Department.<br>
പോർട്ടലിന്റെ രൂപകൽപ്പന സി-ഡിറ്റ്</p>
										<hr>
<p style="color:#6699FF;">Last reviewed and updated on 01 Sep, 2021</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

       
    </script>
	



<script>
            var lightbox = GLightbox();
            lightbox.on('open', (target) => {
                console.log('lightbox opened');
            });
            var lightboxDescription = GLightbox({
                selector: '.glightbox2'
            });
            var lightboxVideo = GLightbox({
                selector: '.glightbox3'
            });
            lightboxVideo.on('slide_changed', ({ prev, current }) => {
                console.log('Prev slide', prev);
                console.log('Current slide', current);

                const { slideIndex, slideNode, slideConfig, player } = current;

                if (player) {
                    if (!player.ready) {
                        // If player is not ready
                        player.on('ready', (event) => {
                            // Do something when video is ready
                        });
                    }

                    player.on('play', (event) => {
                        console.log('Started play');
                    });

                    player.on('volumechange', (event) => {
                        console.log('Volume change');
                    });

                    player.on('ended', (event) => {
                        console.log('Video ended');
                    });
                }
            });

            var lightboxInlineIframe = GLightbox({
                selector: '.glightbox4'
            });


        </script>

        <script type="text/javascript">
            $('#closelive').click(function(){
            videojs('live-video').pause();
            });
            $('#openlive').click(function(){
            videojs('live-video').play();
            });
       </script>
	
	
</body>

</html>
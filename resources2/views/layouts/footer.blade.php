@include('frontend.websitelisting')
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
                            <h3 id="touchhead"></h3>
                            <p class="text-white" id="contact_address">
                            </p>
                            <!-- <p class="phone">Phone: +91 471 2525444</p> -->
                            <!-- <p class="mail">
                                <a href="mailto:admin.ksitm@kerala.gov.in">admin.ksitm@kerala.gov.in</a>
                            </p> -->
                           <!--  <p class="mail">
                               
                            </p> -->
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer our-app">
                            <h3 id="mobilehead"></h3>
                            <ul class="app-btn">
                                <li>
                                    <a target="_blank" data-toggle="tooltip" data-placement="top" id="download1" title="" href="https://play.google.com/store/apps/details?id=in.gov.ikm.disasterreliefsupport">
                                        <i class="lni lni-apple"></i>
                                       
                                        <span class="small-title" id="small-title1"></span>
                                        <span class="big-title" id="app-store"></span>
                                    
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" data-toggle="tooltip" data-placement="top" id="download2" title="" href="https://play.google.com/store/apps/details?id=in.gov.ikm.disasterreliefsupport">
                                        <i class="lni lni-play-store"></i>
                                        <span class="small-title" id="small-title2"></span>
                                        <span class="big-title" id="google-play"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3 id="aboutgovthead"></h3>
                            <ul id="footerlinks">
                                <!-- <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">National Portal of India</a></li>
                                <li><a href="javascript:void(0)">myGov</a></li>
                                <li><a href="javascript:void(0)">Kerala Legislative Assembly</a></li>
                                <li><a href="javascript:void(0)">I&PRD </a></li> -->
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3 id="infmnhead"> </h3>
                            <ul id="footermenus">
                                <!-- <li><a href="javascript:void(0)">പോർട്ടലിനെ കുറിച്ച് </a></li>
                                <li><a href="javascript:void(0)">Hyperlink policy</a></li>
                                <li><a href="javascript:void(0)">Privacy policy</a></li>
                                <li><a href="javascript:void(0)">Disclaimer</a></li>
                                <li><a href="javascript:void(0)">Copyright Policy</a></li>
                                <li><a href="javascript:void(0)">Terms and Conditions</a></li>
                                <li><a href="javascript:void(0)">Guidelines</a></li> -->
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
                            <p>
                                <span id="footer-content"></span>
                                 <span id="footer-subtitle"></span>
                            <hr>
                            <p style="color:#FFFFFF;" id="lastviewhead">  <span id="site_update_date"></span></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 text-right">
                           
                        <ul class="socila" id="footermedia1">
                             <span id="followusfooter" class="text-white"></span><br>
                            <li>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>


<!-- <div class="toast-container"></div> -->


<!-- modal window livestreaming and footer  -->

<div class="modal modal-right xs fade" id="livemodal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="livevideomodal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     
    <div class="modal-content modalcustom h-auto rounded-left" >

      <div class="modal-body">
      
        <button type="button" class="btn-close " data-dismiss="modal"  aria-label="Close" id="closelive" ></button>
        
           <div class="embed-responsive embed-responsive-16by9" id="livevdorow">
            <video-js id="livevideostreamdiv" class="vjs-theme-city" controls preload="auto" data-setup='{"fluid": true}'>
             <source src="" id="livevdosource" type="application/x-mpegURL">
              </video-js>
            
          


      </div> <!-- ./modal-body -->

    </div> <!-- ./modal-content -->

   </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->
</div> <!-- ./modal -->

<!---------------------track complaint------------------------------------------->
<div class="modal fade" id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content modalevenrow">
            <div class="modal-header modalevenrow">
                <h4 class="modal-title text-primary"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;Custom Ajax Title </h4>
                <button type="button" class="btn-close close1" data-dismiss="modal"></button>
            </div> <!-- ./modal-header -->
            <span id="formresults"></span>
            <form id="ajaxmodalform" method="post" class="form-horizontal">
            <div class="modal-body modalevenrow text-dark">
                <div class="row p-2 modaloffrow">
                    <div class="col-12 d-flex justify-content-center" id="contentdiv"> 

                    </div> <!-- ./col6 -->
                </div> <!-- ./row1 -->
                
                
            </div> <!-- ./modal-body -->
            <div class="modal-footer modaloffrow">
                
            </div> <!-- ./modal-footer -->
            </form> <!-- ./form -->
        </div> <!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
</div> <!-- ./transaction_modal -->
<!--/ End Footer Area -->

<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

</body>

</html>
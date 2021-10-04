<!-- Footer-->
    <!-- Footer top blue -->
    <footer class="kg-iii-font font-roboto-normal">
        <!-- Footer top -->

        <div class="footer-top fw-lg-bold">
            <div class="container-md">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg footer-cols col-about-portal">
                        <ul class="list-unstyled mb-0"  id="footermenus">
                          
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg footer-cols col-sitemap">
                        <ul class="list-unstyled mb-0"  id="footerlinks">
                            
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg footer-cols col-connectwithus">
                        <ul class="list-unstyled mb-0 footer-socialIcons">
                            <li>
                                <a href="#!" class="footer-text"> Connect with us </a>
                            </li>
                            <li id="socialmedia">
                                
                            </li>

                        </ul>
                        <div class="page-update">
                            <span class="footer-text">Page last updated on:</span>
                            <div id="page-date" class="footer-text">Mon Nov 02 18:21:13 IST 2020</div>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg footer-cols col-footerlogo" id="fth-col-img">
                        <div class="row align-items-center" id="footerlogo">
                            
                        </div>
                    </div>
                    <!--Grid column-->

                    
                </div>
                <!--Grid row-->
            </div>
        </div>
        <!-- Footer top-->
        <!-- Copyright -->
        <div class="fixed-icons btn-group-vertical" role="group">
            <div class="toast align-items-center text-center position-fixed w-auto d-none" id="youtube-toast" data-bs-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                <div>
                    <div id="titlevd" class="toast-body">
                        CM going live. watch now.
                    </div>
                </div>
            </div>
            <button title="CM going live. watch now" class="btn" href="#" role="button" type="btn" id="btn-cm-live" data-toggle="modal" data-target="#livemodal"><i class="fab fa-youtube"></i></button>
            <button class="btn" href="#" role="button" type="btn" id="btn-to-top"><i class="fa fa-angle-up"></i></button>
        </div>
        <div class="text-center text-white footer-bottom">
            <div class="container-md">

                <div class="row justify-content-center">
                    <!--<div class="col-6 col-md-4 footer-text text-white"></div>-->
                    <div class="footer-text text-white"><div id="footerdiv1"></div><div id="footerdiv2"></div>
                    <!-- <div class="col-6 col-md-4 footer-text text-white"></div>< -->
                </div>
            </div>
        </div>
        <!-- Copyright -->

</footer>
<div class="modal modal-right xs fade" id="livemodal" tabindex="-1" role="dialog" aria-labelledby="livevideomodal">
  <div class="modal-dialog modal-dialog-centered" role="document">
     
    <div class="modal-content modalcustom h-auto rounded-left" >

      <div class="modal-body">
      <button type="button" class="close bg-dark text-white mb-2" data-dismiss="modal" aria-label="Close" title="Close live streaming">
          <span aria-hidden="true">&times;</span>
        </button>
        
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
                <button type="button" class="close1" data-dismiss="modal">&times;</button>
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
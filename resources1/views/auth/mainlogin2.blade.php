@extends('layouts.basefront2')
@section('content')

<!-- Slider -->
<div class="container-fluid ps-0 font-poppins-normal">
        <div class="row kg-primary-bg align-items-center">
            <div class="col-lg-8 img-car position-relative pe-0">
                <div id="kg-image-carousel" class="carousel slide carousel-sync" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#kg-image-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#kg-image-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#kg-image-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="" class="d-block w-100" alt="slide 1" id="banner1">
                        </div>
                        <div class="carousel-item">
                            <img src="" class="d-block w-100" alt="slide 2" id="banner2">
                        </div>
                        <div class="carousel-item">
                            <img src="" class="d-block w-100" alt="slide 3" id="banner3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#kg-image-carousel" data-bs-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#kg-image-carousel" data-bs-slide="next">
                        <i class="fas fa-chevron-right"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="middle-rectangle position-absolute d-flex h-100 align-items-center">
                    <img src="./assets/webplugins/svg/Slider Rectangle.svg" alt="" class="img-fluid light-img">
                    <img src="./assets/webplugins/svg/Slider Rectangle Dark.svg" alt="" class="img-fluid dark-img d-none">
                </div>
            </div>
            <div class="col-lg-4 quo-car align-self-center d-flex">                
                <div class="row justify-content-center justify-content-lg-start text-center text-lg-start">
                    <div id="kg-quote-carousel" class="carousel slide carousel-sync font-merriweather-normal" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-caption">
                                    <h1 class="fw-bold kg-ix-font" id="bannertitle1"></h1>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h1 class="fw-bold kg-ix-font" id="bannertitle2"></h1>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h1 class="fw-bold kg-ix-font" id="bannertitle3"></h1>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <button class="btn banner-tag w-auto mb-2 ms-2 kg-iii-font">Know Our Kerala</button>
                    
                    <div id="kg-quote-carousel" class="carousel slide carousel-sync font-merriweather-normal" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-caption">
                                    <p class="text-white kg-i-font" id="bannersubtitle1"></p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <p class="text-white kg-i-font" id="bannersubtitle2"></p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <p class="text-white kg-i-font" id="bannersubtitle3"></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->


      <!-- 2nd Alert Section -->
          <div class="container-lg first-alert my-5 font-roboto-normal kg-ii-font" id="main-content">
              <div class="kg-alert alert align-items-center p-0 overflow-hidden" role="alert">
                  <div class="row imp-btn m-0 justify-content-lg-start">
                      <button class="btn w-auto font-mulish-normal kg-ii-font">important</button>
                  </div>
                  <div class="row short-msg m-0 w-100 text-lg-start" id="shortaltitle"></div>
                  <div class="row long-msg m-0 w-100 "  id="shortalcontent"></div>
              </div>
          </div>
      <!-- 2nd Alert Section End-->

    

  <div class="container kg-services">
    <div class="row justify-content-center" id="widgetrow">
    </div>
  </div>


   
        <!-- 3rd Alert Section -->
    <div class="container-fluid kg-primary-bg third-alert kg-ii-font mt-5 font-roboto-normal" id="longalertcolumn">
        <div class="kg-alert alert text-lg-start py-lg-5 px-0 px-lg-5" role="alert">
            <div class="row">
                <div class="col-12 col-lg-5 mb-3 mb-lg-0 p-0 pe-lg-4">
                    <img class="img-fluid w-100 h-100" src="" alt="" id="mediaimg">
                </div>
                <div class="col-12 col-lg-7 p-0 kg-alert-content align-self-center">
                    <h4 class="mb-2 mb-lg-3 kg-vi-font font-poppins-normal" id="longaltitle"></h4>
                    <p id="longalbrief" ></p>
                </div>
            </div>
        </div>
    </div>
    <!-- 3rd Alert Section End-->
    
 

    <!-- What is new -->
    <div class="section-what-new">
        <div class="container-lg">
            <div class="row row-no-gutters justify-content-center align-items-center">
                <div class="col-12 col-lg-6 pe-lg-5" id="col-gov-cm">
                    <div class="container-fluid px-2">
                        <div class="row align-items-center justify-content-center" id="gov-details">
                            <div class="col-3 col-lg-4 image-gov-cm">
                                <img class="img-fluid" id="deptimg1" src="">
                            </div>
                            <div class="col-7 col-lg-8 gov-info pe-0">
                                <span class="kg-v-font font-roboto-normal" id="deptdesg1"></span><br>
                                <h3 class="head-dark fw-bold kg-vii-font font-merriweather-normal" id="deptuser1"></h3>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center" id="cm-details">
                            <div class="col-3 col-lg-4 image-gov-cm">
                                <img class="img-fluid"  id="deptimg2" src="">
                            </div>
                            <div class="col-7 col-lg-8 gov-info pe-0">
                                <span class="kg-v-font font-roboto-normal" id="deptdesg2"></span><br>
                                <h3 class="head-dark fw-bold kg-vii-font font-merriweather-normal" id="deptuser2"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 right-sec-news font-roboto-normal">
                    <div id="col-new-updates">
                        <div class="justify-content-center section-what-news-title mb-3 blue-head">
                            <h1 class="text-center font-merriweather-normal fw-bold kg-ix-font">What is New</h1>
                        </div>
                        <div id="news-update-feed" class="justify-content-center d-grid" >
                           <div id="whatsnewlist"></div>
                            
                            <center class="mt-4"><a href="{{ route('whatsnewdetail')}}" class="text-center justify-content-center kg-iii-font font-poppins-normal text-blue kg-bg-yellow" id="show-all-updates">Show More</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End of what is new-->
<!-- articles section -->
    <div class="section-articles kg-bg-grey">
        <div class="container-lg">
            <div class="row row-no-gutters justify-content-center pt-5">
                <div class="col-12 col-lg-3 text-center pe-lg-4">
                    <img class="img-fluid w-100 h-100 article-current-img" src="" id="articlelatestposter" />
                </div>
                <div class="col-12 col-lg-6 text-center mt-4 text-lg-start kg-iv-font p-0">
                    <div id="article-current" style="margin-bottom: 14rem;">
                        <h1 class="article-current-title fw-bold mb-3 head-dark kg-ix-font font-merriweather-normal mx-3 mx-lg-0" id="articlelatesttitle"></h1>
                        <p class="article-schema mt-1">
                            <span class="article-author text-white font-poppins-normal" id="articlelatestauthor"></span>
                            <span>&nbsp;&nbsp;</span>
                            <span class="article-date kg-yellow-text font-poppins-normal" id="articlelatestdate"></span>
                        </p>
                        <p class="article-content font-roboto-normal kg-iii-font mx-3 mx-lg-0">
                            <span id="articlelatestbrief"></span></p>
                        <p class="mt-1" id="articlelatestreadmore"></p>
                    </div>
                </div>

            </div>
            <div class="row row-no-gutters justify-content-center pb-5" >
                <div class="col-12 col-lg-7 offset-lg-4 p-0 text-center text-lg-start kg-iv-font">
                    <div class="recnt rcntbtm" id="article-recent">
                        <p class="mt-2 mb-0"><span class="font-roboto-normal ps-3 ps-lg-0">Recent Articles</span><i class="fa fa-angle-double-right text-blue"></i></p>
                        <div id="articlerow"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- end of articles section -->

<!-- govt logos-->
    <div class="govt-websites kg-iv-font">
        <div class="text-center">
            <div class="container">
                <p class="font-roboto-normal head-light-grey ">Kerala Government Websites</p>
                <div class="row justify-content-md-center my-5" id="statelogos">
                    
                </div>
            </div>
        </div>

        <div class="text-center">
            <div class="container">
                <p class="font-roboto-normal head-light-grey ">India Government Websites</p>
                <div class="row justify-content-md-center mt-2" id="indialogos">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- End of govt logos -->



  








@endsection

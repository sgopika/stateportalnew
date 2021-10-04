
@extends('layouts.basefront')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ $media->title }}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <!-- <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="#">About Kerala</a></li>
                    <li>State</li> -->
                      <li><a href="{{ url('/') }}"><i class="lni lni-angle-double-left"></i> Back</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




<!--contents starts here-->
<section class="section blog-single">
    <div class="container">
        <div class="row">
            

            <div class="col-lg-12 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            

                            
                            
                                    
                               
                            <div class="detail-inner">

                                <div id="player-overlay" class="col-lg-6 col-md-12 col-12" style="justify-content: center;">
                                        
                                        <video-js id="mediaalertdiv" class="vjs-theme-city" controls preload="auto" data-setup='{"fluid": true}' style="autoplay: true;loop: true;">
                                            <source src="" id="" type="audio/mp3">
                                        </video-js>
                                    </div>
                                 
                                  <p> {!! $media->content !!} </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</section>

@endsection

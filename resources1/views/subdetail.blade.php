
@extends('layouts.basefront')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ $subs->menutitle }}</h1>
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
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar blog-grid-page">
                    <div class="widget categories-widget">
                        <h5 class="widget-title">{{ $subs->menutitle }}</h5> 
                        @include('frontend.about_state_side_menu')
                    </div>
                </div>
            </aside>

            <div class="col-lg-8 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            

                            <div class="meta-information">
                                <!-- <h2 class="post-title"><a href="#">State Profile - Kerala</a></h2> -->
                            </div>
                            <div class="detail-inner">
                            <div class="post-thumbnils">
                           
                           @if((isset($article->poster))&&$article->poster!='')
                          
                           
                           
                              <img class="imagepasssize" alt="img" data-bg_fill="rgba(244,124,67,0.5)"  src="{{asset('Article').'/'.$article->poster}}"  style="display: block;" />

            
                   <input type="hidden" id="distname" name="distname">
                           @endif
                          
                       </div>
                                  <p> {!! $article->content !!} </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</section>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/mapoid.js') }}"></script>
<script>
$("map[name=hmap8807]").mapoid({click: function(){alert($('#distname').val())}});
</script>
@endsection

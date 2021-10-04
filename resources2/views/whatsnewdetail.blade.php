
@extends('layouts.basefront')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ $whatsnew->title }}</h1>
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
                        <h5 class="widget-title">Related Articles</h5> 
                        <ul class="custom">

                            @foreach($relatedwhatsnew as $relatedwhatsnews)
                           <li>
                                <a href="{{url('whatsnewdetailwise').'/'.Crypt::encrypt($relatedwhatsnews->id)}}">
                                   <i class="lni lni-checkmark-circle"></i>  {{ $relatedwhatsnews->title }}
                                </a>
                            </li>
                            @endforeach

                            
                            
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="col-lg-8 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            

                            <div class="meta-information">
                                <h2 class="post-title"><a href="#">{{ $whatsnew->title }}</a></h2>
                            </div>
                            <div class="detail-inner">
                                 
                                  <p> {!! $whatsnew->content !!} </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</section>

@endsection

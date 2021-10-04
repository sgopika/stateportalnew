
@extends('layouts.basefront')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <a href="{{url('/')}}">Back</a>
            </div>
        </div>
</div>


<section id="services" class="services">

      <div class="container">
        <div class="row pt-5">
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar blog-grid-page">
                    <div class="widget categories-widget">
                        <h5 >Related Contents</h5> 
                        <ul class="custom">

                            @foreach($relatedwhatsnew as $relatedwhatsnews)
                           <li>
                                <a href="{{url('whatsnewid').'/'.Crypt::encrypt($relatedwhatsnews->id)}}">
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
                                <h2 ><a href="#">{{ $whatsnew->title }}</a></h2>
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
    </section><!-- End Services Section -->

@endsection

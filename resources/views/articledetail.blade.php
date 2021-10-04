
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
                        <h5 >Related Articles</h5> 
                        <ul class="custom">

                            @foreach($relatedarticles as $relatedarticless)
                           <li>
                                <a href="{{url('articledetailid').'/'.Crypt::encrypt($relatedarticless->id)}}">
                                   <i class="lni lni-checkmark-circle"></i>  {{ $relatedarticless->title }}
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
                            <div class="post-thumbnils">
                                @if(isset($article->poster))
                                   <img  src="{{asset('Article').'/'.$article->poster}}" />
                        
                                @endif    
                            </div>

                            <div class="meta-information">
                                <h2 ><a href="#">{{ $article->title }}</a></h2>
                            </div>
                            <div class="detail-inner">
                                 
                                  <p> {!! $article->content !!} </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End Services Section -->

@endsection

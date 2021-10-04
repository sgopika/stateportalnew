@extends('layouts.basefront')
@section('content')
  <div class="article-container">

        <div class="container-lg">
            <div class="article-back text-end d-none d-md-block">
                <a href="{{ url('/') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left"></i></span>Back</a>
            </div>
            <div class="row row-no-gutters justify-content-center pt-2 pb-md-5 pb-sm-2">
                
                <div class="col-12 col-md-12 col-lg-12 text-left ms-lg-4 my-4 my-md-0">
                    <h1 class="article-current-title fw-bold mb-3 head-dark kg-ix-font font-merriweather-normal mx-3 mx-lg-0 text-center text-md-start">What's New</h1>
                    
                    <div class="article-content font-roboto-normal kg-iii-font mx-3 mx-lg-0 mt-4 mt-md-0">
                        @foreach($whatsnew as $res)
                        
                        <div class="card homepagedetailcont">
                          <div class="card-header text-primary whitefont">
                            {{ $res->title }}
                          </div>
                          <div class="card-body" style="text-align: justify;">
                            
                    
                            <span class="">{!! $res->subtitle !!}</span>
                    
                            <hr>
                           <span class="">{!! $res->content !!}</span>
                          
                                
                          </div> <!-- ./card-body -->
                        </div> <!-- ./card -->
                        @endforeach

                    </div>
                </div>
            </div>
            
        </div>
    </div>


@endsection

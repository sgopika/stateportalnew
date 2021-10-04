@extends('layouts.basefront')
@section('content')
<div class="article-container">

        <div class="container-lg">
            <div class="article-back text-end d-none d-md-block">
                <a href="{{ url('/') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left"></i></span>Back</a>
            </div>
            <div class="row row-no-gutters justify-content-center pt-2 pb-md-5 pb-sm-2">
                <div class="col-12 col-md-4 col-lg-3 text-left ps-md-0">
                    <img class="img-fluid article-current-img w-100 mb-md-5" src="{{asset('Activity').'/'.$activity->poster}}" />
                    <div class="article-sidebar kg-iv-font d-none d-md-block">
                        <div class="sidebar py-5 py-md-0">
                        <div class="row pb-2 justify-content-center justify-content-md-start">
                            <a class="btn px-5 px-md-5 px-lg-4 px-xl-5 related-sidebar-link font-mulish-normal kg-iv-font w-auto" type="button">Related Activities</a>
                        </div>
                        <ul class="list-group list-group-flush font-poppins-normal">
                           @foreach($relatedactivity as $relatedactivities)
                            <li class="list-group-item py-3">
                                <a href="{{url('activitydetail').'/'.Crypt::encrypt($relatedactivities->id)}}" class="d-flex align-items-center">
                                    <img src="{{asset('Activity').'/'.$activity->poster}}" alt="" class="related-img img-fluid rounded-circle float-start me-3">
                                    <span class="related-title text-blue">{{ $relatedactivities->title }}</span>
                                </a>                    
                            </li>
                            @endforeach
                            
                        </ul>
                    </div> 
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 text-left ms-lg-4 my-4 my-md-0">
                    <h1 class="article-current-title fw-bold mb-3 head-dark kg-ix-font font-merriweather-normal mx-3 mx-lg-0 text-center text-md-start">{{ $activity->title }}</h1>
                   
                    <div class="article-content font-roboto-normal kg-iii-font mx-3 mx-lg-0 mt-4 mt-md-0">
                        <div class="article-text">
                            <p>{!! $activity->brief !!}</p>
                            <p> {!! $activity->content !!} </p>
                        </div>
                        <div class="my-md-5 px-0">
                            <div class="row container-lg article-images">
                             @foreach($actupload as $actuploadres)
                                <img src="{{asset('Activityupload').'/'.$actuploadres->file}}" alt="image" />
                                
                               @endforeach
                                
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="article-sidebar kg-iv-font d-sm-block d-md-none">
                <div class="sidebar py-5 py-md-0">
                        <div class="row pb-2 justify-content-center justify-content-md-start">
                            <a class="btn px-5 px-md-5 px-lg-4 px-xl-5 related-sidebar-link font-mulish-normal kg-iv-font w-auto" type="button">Related Activities</a>
                        </div>
                        <ul class="list-group list-group-flush font-poppins-normal">
                          @foreach($relatedactivity as $relatedactivities)
                            <li class="list-group-item py-3">
                                <a href="{{url('activitydetail').'/'.Crypt::encrypt($relatedactivities->id)}}" class="d-flex align-items-center">
                                    <img src="{{asset('Activity').'/'.$activity->poster}}" alt="" class="related-img img-fluid rounded-circle float-start me-3">
                                    <span class="related-title text-blue">{{ $relatedactivities->title }}</span>
                                </a>                    
                            </li>
                            @endforeach
                            
                        </ul>
                    </div> 
            </div>
        </div>
    </div>

@endsection

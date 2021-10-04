@extends('layouts.basefront')
@section('content')
 <div class="media-container container-lg">
        <div class="row row-no-gutters my-5 container-lg">

            <div class="title-media text-start col-12 col-xs-6 col-md-6 px-md-0">
                <h1 class="text-center text-md-start font-merriweather-normal .kg-ix-font fw-bold">Gallery</h1>
            </div>
            <div class="article-back text-end d-none d-md-block col-12 col-md-6 px-md-0">
                <a href="{{ url('/') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>Back</a>
            </div>


        </div>


        <div class="row row-no-gutters justify-content-sm-center justify-content-md-start pt-2 pb-md-5 pb-sm-2">
            @foreach($gallery as $res)
            <div class="col-md-3 img-container">
                <a href="{{url('gallerypage').'/'.Crypt::encrypt($res->id)}}">
                    <figure class="figure py-3 w-100 px-3 px-md-2">
                        <img src="{{asset('Gallery').'/'.$res->poster}}" class="figure-img img-fluid rounded" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit">
                        <figcaption class="figure-caption text-center kg-iii-font font-poppins-normal dark-text">{{ $res->title }}</figcaption>
                    </figure>
                </a>                    
            </div>
            @endforeach
            
        </div>
    </div>
@endsection

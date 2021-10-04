@extends('layouts.basefront')
@section('content')

<div class="container">
<div class="row py-3">
	<div class="title-media text-start col-12 col-xs-6 col-md-6 px-md-0">
                <h1 class="text-center text-md-start font-merriweather-normal .kg-ix-font fw-bold">Gallery Items</h1>
    </div>
    <div class="kg-back text-end d-none d-md-block">
        <a href="{{ url('/gallerypreview') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left"></i></span>Back</a>
    </div>
</div>
</div>

<div class="container-md">    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-9">
            <div class="media-gallery">
                @foreach($listdata as $res)
                <a href="{{asset('Galleryitem').'/'.$res->poster}}" class="glightbox">
                    <img src="{{asset('Galleryitem').'/'.$res->poster}}" alt="image" />
                </a>
                @endforeach
                
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="galleries-sidebar kg-ii-font ps-3 ps-lg-4">
                
                <div class="sidebar py-5 py-md-0">
                    <div class="row pb-2 justify-content-center justify-content-md-start">
                        <a class="btn px-5 px-md-5 px-lg-4 px-xl-5 related-sidebar-link font-mulish-normal kg-iv-font w-auto" type="button">Related Galleries</a>
                    </div>
                    <ul class="list-group list-group-flush font-poppins-normal">
                        @foreach($relatedgallery as $list)
                         @if($id==$list->id)
				           <li class="list-group-item relateditemlist "> 
				           	<img src="{{asset('Gallery').'/'.$list->poster}}" alt="" class="related-img img-fluid rounded-circle float-start me-3">
				        	<span class="relarticleitemspan ">{{ $list->title }} </span> </li>
				        @else
                        <li class="list-group-item py-3">
                            <a href="{{url('gallerypage').'/'.Crypt::encrypt($list->id)}}" class="d-flex align-items-center">
                                <img src="{{asset('Gallery').'/'.$list->poster}}" alt="" class="related-img img-fluid rounded-circle float-start me-3">
                                <span class="related-title text-blue">{{ $list->title }}</span>
                            </a>                    
                        </li>
                        @endif
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
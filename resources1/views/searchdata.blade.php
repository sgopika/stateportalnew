@extends('layouts.basefront')
@section('content')
<div class="article-container">

        <div class="container-lg">
            <div class="article-back text-end d-none d-md-block">
                <a href="{{ url('/') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left"></i></span>Back</a>
            </div>
            <div class="row row-no-gutters justify-content-center pt-2 pb-md-5 pb-sm-2">
              <h1 class="article-current-title fw-bold mb-3 head-dark kg-ix-font font-merriweather-normal mx-3 mx-lg-0 text-center text-md-start">{{ $searchResults->count() }} results found for "{{ $searchdata }}"</h1>
              @foreach($searchResults->groupByType() as $type => $modelSearchResults)
            
                @foreach($modelSearchResults as $searchResult)
                <div class="article-content font-roboto-normal kg-iii-font mx-3 mx-lg-0 mt-4 mt-md-0">
               {!! substr($searchResult->title,0,50) !!} <span class="btn-label"><a  class="lang-btn rounded-pill p-2 mx-1 kg-iii-font" href="{{ $searchResult->url }}">Readmore...</a></span>
              </div>
                

                @endforeach
              @endforeach
            </div>
            
        </div>
</div>
@endsection

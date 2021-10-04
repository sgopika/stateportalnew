@extends('layouts.basefront')
@section('content')
<div class="row py-2 px-2">
  <div class="col-12">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb breadcrumbrow">
        <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
      
      </ol>
    </nav>
  </div> <!-- ./col12-->
</div> <!-- ./row -->
<div class="row py-2 px-2">
  <div class="col-md-10">
    <div class="row px-5 py-2 mt-5 ">
  <div class="col-md-12">
  <div class="card">
    <div class="card-header innerformtitle maintext text-center"><b>{{ $searchResults->count() }} results found for "{{ $searchdata }}"</b></div>

    <div class="card-body">

        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
            
            @foreach($modelSearchResults as $searchResult)
                <div class="alert alert-info py-1 eng_xxxxs" role="alert">{!! substr($searchResult->title, 0, 50)!!}&nbsp;<span class="badge badge-primary eng_xxxxs"><a class="text-white eng_xxxxs" href="{{ $searchResult->url }}">Readmore...</a></span>
                </div>
            @endforeach
        @endforeach

    </div>
</div>
  </div> <!-- ./col12 -->

</div> <!-- ./row -->


  </div> <!-- ./col10-->
  
</div> <!-- ./row -->


</div> <!-- ./container-->
@endsection

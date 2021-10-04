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

@foreach($latestgo as $res)

    <div class="card-header"><b>{{ $res->title }}</b></div>

    <div class="card-body">

      
            <h2>Go No-{{ $res->documentnumber }}</h2>

          
                <div class="alert alert-danger" role="alert">{!! $res->content !!}&nbsp;<span class="eng_xxxxs"><a href="{{ $path }}" target="_blank">PDF</a></span>
                </div>
          
    </div>

    @endforeach
</div>
  </div> <!-- ./col12 -->

</div> <!-- ./row -->


  </div> <!-- ./col10-->
  
</div> <!-- ./row -->


</div> <!-- ./container-->
@endsection

    	





@extends('layouts.basefront')
@section('content')
<div class="row py-2 px-2">
  <div class="col-12">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb breadcrumbrow">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Articles</li>
      </ol>
    </nav>
  </div> <!-- ./col12-->
</div> <!-- ./row -->
<div class="row py-2 px-2 pt-5">
  <div class="col-md-7">
   
  <div class="card">

    <div class="card-header">
      <p class="eng_xxs" id="titlediv">{{ $article->title }}</p>
    
    </div> <!-- ./card-header -->
    <div class="card-body">
      <p class="eng_ys"  id="contentdiv">{!! $article->content !!}
       
      </p>
    </div> <!-- ./card-body-->
  </div> <!-- ./card -->

  </div> <!-- ./col7-->
  <div class="col-md-5 relateditemcard articlebg">
    <div class="col-12 relatedheading pt-3 text-center">
      <p class="eng_xxs">  Related Articles&nbsp; </p>
    </div> <!-- ./col12 -->
    <ul class="list-group list-group-flush eng_ys">
      @foreach($relatedarticles as $relatedarticle)
      @if($article->id==$relatedarticle->id)
           <li class="list-group-item relateditemlist "> 
        <span class="relarticleitemspan ">{{ $relatedarticle->title }} </span> </li>
        @else
      <li class="list-group-item relateditemlist "><a href="{{route('articledetailview',Crypt::encrypt($relatedarticle->id)) }}"> {{ $relatedarticle->title }} </a></li>
      @endif
      @endforeach
    </ul>
  </div> <!-- /col2 -->
</div> <!-- ./row -->


</div> <!-- ./container-->
@endsection
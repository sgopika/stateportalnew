@extends('layouts.basemain')

@section('content')
<div class="container-fluid homepage adminpage">
<div class="row ">
    <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
          
        <li class="breadcrumb-item"><a class="no_link" href="{{ route('storyapproverhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         
         
      </ol>
      
    </nav>
  </div> <!-- col12 -->
    <div class="col-12 ">
        <div class="row">
             @if($val==1) Moderated Items @else Approved Items @endif
        </div>
    </div>
    <div class="col-12 ">
        <div class="row">
        	
             <!-- About Portal -->
            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive"> Story</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                             <a href="{{ route('storyapprover.approvedstorylist', $val) }}" class=" nolink btn btn-sm widgetbutton  px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
            <!-- About Portal -->
            
     

        </div> <!-- ./inner-row -->
    </div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./container -->
@endsection

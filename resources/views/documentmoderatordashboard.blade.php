@extends('layouts.basemain')

@section('content')
<div class="container-fluid homepage adminpage">
<div class="row ">
    <div class="col-12 py-2  ">
        <!-- breadcrumb if, needed -->
    </div> <!-- col12 -->
    <div class="col-12 py-1 px-2 ">
       <!--  <p class="eng_xxs px-3 fg-darkBrown"> Moderator Dashboard </p> -->
        @if(Auth::user()->usertypes_id==4)
        <p class="eng_xxs px-3 fg-darkBrown"> Moderator Dashboard </p>
           @elseif(Auth::user()->usertypes_id==5)
        <p class="eng_xxs px-3 fg-darkBrown"> Approver Dashboard </p>
         @endif
    </div> <!-- ./col12 --> 
    <div class="col-12 ">
        <div class="row">
            <!-- Contributed Items -->
            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        @if(Auth::user()->usertypes_id==4)
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Contributed Items</p>
                        @elseif(Auth::user()->usertypes_id==5)
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Moderated Items</p>
                         @endif
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">

                             @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.contributeditems',1) }}" class=" nolink btn btn-sm widgetbutton  px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>                               
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.contributeditems',1) }}" class=" nolink btn btn-sm widgetbutton  px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
            <!-- Contributed Items -->
            <!-- Moderated Items -->
            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Moderated Items</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                             @if(Auth::user()->usertypes_id==4)
                                <a href="{{ route('documentmoderator.contributeditems',2) }}" class=" nolink btn btn-sm widgetbutton  px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>                             
                            @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.contributeditems',2) }}" class=" nolink btn btn-sm widgetbutton  px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
            <!-- Moderated Items -->
            
            
        </div> <!-- ./inner-row -->
    </div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./container -->
@endsection

@extends('layouts.basemain')

@section('content')
<div class="container-fluid homepage adminpage">
<div class="row ">
    <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         @if(Auth::user()->usertypes_id==4)
        <li class="breadcrumb-item"><a class="no_link" href="{{ route('documentmoderatorhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         @elseif(Auth::user()->usertypes_id==5)
        <li class="breadcrumb-item"><a class="no_link" href="{{ route('documentapproverhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         @endif
         
      </ol>
      
    </nav>
  </div> <!-- col12 -->
   <div class="col-12 ">
        <div class="row">
         @if(Auth::user()->usertypes_id==4)
            @if($val==1) Contributed Items @elseif($val==2) Moderated Items @else Reverted Items @endif
         @elseif(Auth::user()->usertypes_id==5)
            @if($val==1) Moderated Items @elseif($val==2) Approved Items @else Reverted Items @endif
         @endif
        </div>
    </div>
    <div class="col-12 ">
        <div class="row">
            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Cabinet Decision</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                             @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.contributedcabinetdecisionlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.contributedcabinetdecisionlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
            
            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Circulars</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                            
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.circularlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.circularlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->

             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Policy</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.policylist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.policylist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->

            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Acts and Rules</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>   <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.actandruleslist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.actandruleslist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
                  <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Ordinance</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.ordinancelist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.ordinancelist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
               

             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Citizen Charter</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.citizencharterlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.citizencharterlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->




             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Work Study Report</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.workstudyreportlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.workstudyreportlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->

             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">General Report</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.generalreportlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.generalreportlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->

            

            <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">State Budget</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.statebudgetlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.statebudgetlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->

             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Economic Review</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.economicreviewlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.economicreviewlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Five Year Plan</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.fiveyearplanlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.fiveyearplanlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
             <div class="col-3 py-3">
                <!-- card-widget -->
                <div class="card  border-light  cardwidget shadow dashwidget">
                <div class="card-body  ">
                    <blockquote class="blockquote ">
                        <p class="mb-0 font-weight-bold eng_xxs fg-darkOlive">Right to Service</p>
                        <p class="eng_xxxs fg-darkGrayBlue"> List </p>
                    </blockquote>
                    <div class="w-100 pb-1"></div>
                    <div class="d-flex align-items-center align-self-end">
                        <div class="meta-author">
      
                        </div>
                        <div class="meta-item ml-auto">
                              @if(Auth::user()->usertypes_id==4)
                             <a href="{{ route('documentmoderator.rtsdocumentlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @elseif(Auth::user()->usertypes_id==5)
                             <a href="{{ route('documentapprover.rtsdocumentlist', $val) }}" class=" nolink btn btn-sm widgetbutton px-3 eng_xxxs"> <i class="fas fa-arrow-alt-circle-right"></i> View </a>
                             @endif
                        </div>
                    </div>
                 </div> <!-- ./card-body -->
                </div> <!-- ./card -->
                <!-- ./card-widget -->
            </div> <!-- ./col3 -->
            
            
            
        </div> <!-- ./inner-row -->
    </div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./container -->
@endsection

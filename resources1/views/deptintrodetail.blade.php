@extends('layouts.basefront')
@section('content')
<div class="portalpage container-fluid">
<div class="row py-2 px-2">
  <div class="col-12">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb breadcrumbrow">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Department Introduction</li>
      </ol>
    </nav>
  </div> <!-- ./col12-->
</div> <!-- ./row -->  
<div class="row py-2 px-2 homepagerow">
  
  <div class="col-md-12">
    <div class="row ">
      <div class="col-12 pr-4">
        <div class="row ">
          <div class="col-2" align="center"><img src="{{asset('Departmentuser').'/'.$deptintro->file1}}"  class="d-block " alt="{{ $deptintro->alt1 }}" width="150" height="150"></div>
          <div class="col-2" align="center"><img src="{{asset('Departmentuser').'/'.$deptintro->file2}}"  class="d-block " alt="{{ $deptintro->alt2 }}" width="150" height="150"></div>
        </div><br>
        <div class="row ">
          <div class="col-2" align="center">{{ $deptintro->user1 }}</div>
          <div class="col-2" align="center">{{ $deptintro->user2 }}</div>
        </div><br>
        <div class="row ">
          <div class="col-2" align="center">{{ $deptintro->desg1 }}</div>
          <div class="col-2" align="center">{{ $deptintro->desg2 }}</div>
        </div><br>



        
        <div class="card homepagedetailcont">
          <div class="card-header text-primary whitefont">
            {{ $deptintro->title }}
          </div>
          <div class="card-body">
            
                
           
            <span class="">{!! $deptintro->brief !!}</span><br/><br/>
           
            <span class="">{!! $deptintro->content !!}</span><br/><br/>
           
            
           
                
          </div> <!-- ./card-body -->
        </div> <!-- ./card -->
        
      </div> <!-- ./col12 -->
    </div> <!-- ./inner-row -->
  </div> <!-- ./col12 -->
 
</div> <!--./row -->


@endsection

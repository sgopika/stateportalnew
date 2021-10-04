
@extends('layouts.basefront')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <a href="{{url('/')}}">Back</a>
            </div>
        </div>
       

</div>


<section id="services" class="services">

      <div class="container">
        <div class="row pt-3">
            <div class="col-lg-4 col-md-12 col-12" style="justify-content: end;">

            </div>
            <!-- <div class="col-lg-1 col-md-12 col-12" align="justify-content:end;">
                <label class="mt-2 h6 py-2">@if($sessionbil==1) District @else ജില്ല @endif</label>
            </div> -->
            <div class="col-lg-3 col-md-12 col-12">
                <form action="{{route('dstpgmdstid')}}" method="post">
                    @csrf
                    <select class="form-control customform eng_xxxs " name="district" id="district" onchange="this.form.submit()">
                    <option value=""></option>
                    @foreach($districts as $dstres)
                    <option value="{{$dstres->id}}" @if(isset($dstpgm))@if($dstpgm->districts_id==$dstres->id) selected @endif @endif> {{$dstres->name}} </option>
                    @endforeach
                </select>

                </form>
                
            </div>
        </div>

 
        <div class="row pt-5">
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar blog-grid-page">
                    <div class="widget categories-widget">
                        <h5 >Related Contents</h5> 
                        <ul class="custom">
                            @if($relateddstpgms!='')
                            @foreach($relateddstpgms as $relateddstpgmss)
                           <li>
                                <a href="{{url('dstpgmid').'/'.Crypt::encrypt($relateddstpgmss->id)}}">
                                   <i class="lni lni-checkmark-circle"></i>  {{ $relateddstpgmss->title }}
                                </a>
                            </li>
                            @endforeach
                            @endif                            
                            
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="col-lg-8 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            <div class="post-thumbnils">
                                @if(isset($dstpgm->poster))
                                   <img  src="{{asset('Districtpgm').'/'.$dstpgm->poster}}" />
                        
                                @endif    
                            </div>

                            <div class="meta-information">
                                <h2 ><a href="#">@if(isset($dstpgm)){{ $dstpgm->title }}@endif</a></h2>
                            </div>
                            <div class="detail-inner">
                                 
                                  <p> @if(isset($dstpgm)){!! $dstpgm->content !!}@endif </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    </section><!-- End Services Section -->

@endsection

@section('customscripts')
<script>

$(document).ready(function(){ 
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    /*$('#district').on('change ', function(e) {
        var dstval = this.value; alert(dstval);

        $.ajax({
          method:"post",
          dataType:"json",
            data: {dstval:dstval},
            url: '{{ route('dstpgmdstid') }}',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) 
            { 
               
               $('#fielddepartments_id').html('');
                $('#fielddepartments_id').append($('<option></option>').val('').html('Select Field Department'));
                $.each(data, function (i,data) {
                    //console.log(data.field_departments_id);
                    
                    $('#fielddepartments_id').append("<option value='" + data.id + "'>" + data.name + "</option>");

                });
               
            }
        });
 
  
      
    });*/


});
</script>
@endsection


@extends('layouts.basefront')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <a href="{{url('/')}}">Back</a>
            </div>
        </div>
       

</div>


<section id="blog" class="blog" style="margin-top:3%;">
    <div class="" data-aos="fade-up" style="width:100%;padding:3%;">
        <div class="col-md-8" style="margin-bottom:3%;">
            <form action="{{route('doctypewisedetail')}}" method="post">
                @csrf
            <select class="form-control customform eng_xxxs" id="documenttype" name="documenttype"  onchange="this.form.submit()">
                
                @foreach($documenttype as $docres)
                <option value="{{ $docres->id }}"@if(isset($documents))@if($documents->documenttypes_id==$docres->id) selected @endif @endif>{{ $docres->title }}</option>

                @endforeach
                 
            </select>
            </form>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="alert alert-warning">
                  <p class="msg-area">Listing recent @if(isset($documents)){{$documents->documenttype}}@endif. You can use <a href="{{route('searchdocs')}}">Advanced search</a> for better filtering.</p>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-8 entries">

            <article class="entry entry-single topsearchdocs">

              <div class="entry-img">
                <img src="" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
               @if(isset($documents)){{ $documents->title }}@endif
              </h2>
              
              <div class="post-item clearfix">
                <i><b>
                  <time datetime="2020-01-01" id='pub_date'>@if($sessionbil==1) Published On : @else പ്രസിദ്ധീകരിച്ചത് : @endif @if(isset($documents)){{ date('d-m-Y', strtotime($documents->documentdate)) }}@endif</time> 
              </b>
                </i>
              </div>
              <div class="entry-content">
                <p align="justify" id='jcon'>@if(isset($documents)){{ $documents->deptname }}@endif </p>


                <p>
                 @if(isset($documents))
                      <a id="filepath" download href="{{$documents->folder}}/{{$documents->filepath}}" title="@if($sessionbil==1)Click to download the document@else ഡോക്യുമെന്റ്  ഡൗൺലോഡ് ചെയ്യാൻ ക്ലിക്ക് ചെയ്യുക @endif">@if($sessionbil==1) Click to download the document @else ഡോക്യുമെന്റ്  ഡൗൺലോഡ് ചെയ്യാൻ ക്ലിക്ക് ചെയ്യുക @endif</a>
                  
                 @endif 
                  
                  
                </p>


              </div>

           </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">
              <h3 class="sidebar-title"></h3>
              <div class="sidebar-item recent-posts clfx" id='rec-posts'>
                @if(isset($relateddocuments))
                 @foreach($relateddocuments as $relateddocumentsres) 
                <div class="post-item clearfix" id="">
                   <img src="{{asset('assets/img/pdf.png')}}" alt="document"> 
                  
                  <h4 id="{{$relateddocumentsres->documentnumber}}" class="entitle" style="cursor: pointer;font-weight:normal;" title='@if($sessionbil==1) Click to download the document @else ഡോക്യുമെന്റ്  ഡൗൺലോഡ് ചെയ്യാൻ ക്ലിക്ക് ചെയ്യുക @endif'>{{$relateddocumentsres->title}}</h4>
                  
                  <time datetime="2020-01-01">{{ date('d-m-Y', strtotime($relateddocumentsres->documentdate)) }}</time>
                </div>
                @endforeach
            @endif
              </div><!-- End sidebar recent posts-->

            <div class="row" align="center">
            <a href="/searchdocs" title="Click  to view more documents.">
            <button class='btn btn-primary'><i class="fa fa-eye"></i> View more..</button>
            </a>
            
            </div>

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

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

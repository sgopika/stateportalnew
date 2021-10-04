
@extends('layouts.basefront')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <a href="{{url('/')}}">Back</a>
            </div>
        </div>
       

</div>


<div class="row pt-5">
      <div class="col-md-12">
    <main id="main">    
        <!-- ======= Services Section ======= -->
          <section id="blog" class="blog">

            <div class="container" data-aos="fade-up">
              <div class="col-md-8" style="margin-bottom:3%;d-flex align-items-right" >
          <header class="section-header headertop">
                        <p>@if($sessionbil==1)Search @else തിരയുക @endif</p>
                        <h2>@if($sessionbil==1)Search for documents @else രേഖകൾക്കായി തിരയുക @endif</h2>
                      </header>
            <form action="" method="post">
                @csrf

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row py-3">                        
                    <div class="col-md-4">
                      <input type="hidden" name="sessionbl" id="sessionbl" value="{{$sessionbil}}">
                      <label class="topsearchdocs bttmpsearchdocs" >@if($sessionbil==1)Department @else വകുപ്പ് @endif</label>
                      <select class="form-select" id="dept_id" name="dept_id">
                      <option value="">@if($sessionbil==1)Select Department @else വകുപ്പ്  തിരഞ്ഞെടുക്കുക  @endif</option>
                      <option value="999">@if($sessionbil==1)All @else എല്ലാം  @endif</option>
                      @foreach ($departments as $dept)
                      <option value="{{$dept->id}}">{{$dept->title}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="topsearchdocs bttmpsearchdocs" >@if($sessionbil==1)Field Department @else ഉപ വകുപ്പ് @endif</label>
                      <select class="form-select" id="fielddepartments_id" name="fielddepartments_id">
                      <option value="">@if($sessionbil==1)Select Field Department @else ഉപ വകുപ്പ്  തിരഞ്ഞെടുക്കുക  @endif</option>
                      <option value="999">@if($sessionbil==1)All @else എല്ലാം  @endif</option>
                      
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="topsearchdocs bttmpsearchdocs" >@if($sessionbil==1)Select Document Type @else ഡോക്യുമെന്റ് ടൈപ്പ് @endif</label>
                      <select class="form-select" id="doc_typew" name="doc_typew">
                        <option value="">@if($sessionbil==1)Select Document Type @else ഡോക്യുമെന്റ് ടൈപ്പ് തിരഞ്ഞെടുക്കുക @endif</option>
                        <option value="999">@if($sessionbil==1)All @else എല്ലാം @endif</option>
                        @foreach ($doctype as $fdoctype)
                          <option value="{{$fdoctype->id}}">{{$fdoctype->title}}</option>
                        @endforeach
                      </select>
                      
                      
                    </div>
                    
                  </div>
                  <div class="row py-3">
                                                  
                        <div class="col-md-6">
                       
                        <label class="topsearchdocs bttmpsearchdocs" >@if($sessionbil==1)From Date @else ആരംഭ തിയതീ @endif</label>
                          <input type="date" class="form-control" name="date_from" id="date_from" value="{{ date('Y-m-d') }}" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" required="required">
                        </div>
                        <div class="col-md-6">
                        <label class="topsearchdocs bttmpsearchdocs" >@if($sessionbil==1)To Date @else അവസാന തിയതീ @endif</label>
                          <input type="date" class="form-control" name="date_to" id="date_to" value="{{ date('Y-m-d') }}" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" required="required">
                        </div>
                </div>
                <div class="row py-3">
                                              
                      <div class="col-md-12">
                      <label class="topsearchdocs bttmpsearchdocs" >@if($sessionbil==1)Key Word @else കീ വേർഡ് @endif</label>
                        <input type="text" class="form-control " name="subject" id="subject" placeholder="&#xF002; @if($sessionbil==1)Key Word @else കീ വേർഡ് @endif" style="font-family:Arial, FontAwesome">
                      </div>
              </div>
               <div class="row py-3">
                                              
                      <div class="col-md-12">
                        <button type="button" id="searchthisdoc_id" class="btn btn-warning btnsearchdocs" >&#9906; @if($sessionbil==1)Search @else തിരയുക @endif</button>
                      </div>
              </div>


                </div>
              </div>
            
            </form>
        </div>
            </div>
          </section><!-- End SEARCH Section -->
      <!-- ========Search GOs Section ====== -->
      
    </main><!-- End #main -->
    </div>
    </div> 

    <div class="row">
      <div class="col-md-12">
    <main id="main">    
        <!-- ======= Services Section ======= -->
          <section id="services" class="services">

            <div class="container" data-aos="fade-up">
              <div class="row gy-4" >        
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100" style="width:100%">
                 <div class="service-box normal">
                   <!-- <i class="ri-eye-off-line warningfnt"></i> -->
                   <h3>Documents details</h3>
                   <div class="searchresdivlt3">
                     
                     <table id="resposivetable" class="table1 table table-striped table-bordered" style="width:100%">
                        <thead>
                           <tr>
                              <th>#</th>
                              
                              <!-- <th>Department</th> -->
                              <th>@if($sessionbil=='1'){{'Document type'}}
                              @elseif($sessionbil=='2'){{'ഡോക്യുമെന്റ് ടൈപ്പ്'}}
                              @endif</th>
                              <th>@if($sessionbil=='1'){{'Document Name'}}
                              @elseif($sessionbil=='2'){{'ഡോക്യുമെന്റ് പേര്'}}
                              @endif</th>
                              <th>@if($sessionbil=='1'){{'Document Date'}}
                              @elseif($sessionbil=='2'){{'ഡോക്യുമെന്റ് തിയതീ'}}
                              @endif</th>
                              <th>@if($sessionbil=='1'){{'Updated on'}}
                              @elseif($sessionbil=='2'){{'അപ്ഡേറ്റ് ചെയ്യപ്പെട്ടത്'}}
                              @endif</th>
                              <th><i class='fa fa-download'></i></th>
                           </tr>
                        </thead>
                        <tbody id="tbodytab1">
                        
                              
                             
                             
                        </tbody>
                       
                     </table>
                   </div>

                 </div>
               </div>
                </div>
            </div>
          </section><!-- End SEARCH Section -->
      <!-- ========Search GOs Section ====== -->
      
    </main><!-- End #main -->
    </div>
    </div> 

@endsection

@section('customscripts')
<script>

$(document).ready(function(){ 
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });


    $('#services').hide();

    $('#dept_id').on('change ', function(e) {
        var deptid = this.value; 
        

        $.ajax({
          method:"post",
          dataType:"json",
            data: {deptid:deptid},
            url: '{{ route('getfielddepartmentnew') }}',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) 
            { //console.log(data.fielddepatmentdet);

              $('#fielddepartments_id').html('');
              if(data.sessionbil==1){
                $('#fielddepartments_id').append($('<option></option>').val('').html('Select Field Department'));
              }else{

                $('#fielddepartments_id').append($('<option></option>').val('').html('ഉപ വകുപ്പ്  തിരഞ്ഞെടുക്കുക'));
              }
              $.each(data.fielddepatmentdet, function (i,data1) {
                    //alert(data1);exit();
                    
                    $('#fielddepartments_id').append("<option value='" + data1.id + "'>" + data1.name + "</option>");

                });
               
               
               
            }
        });
 
  
      
    });

    $('#subject').on('change',function(){
      var input = document.querySelector('input[name=subject]');

    // initialize Tagify on the above input node reference
    new Tagify(input);


     });

    $(document).on("click", "#searchthisdoc_id", function(event){
    var dept_id=$('#dept_id').val();
    var field_dept_id=$('#fielddepartments_id').val();
    var doc_type=$('#doc_typew').val();

    var date_from=$('#date_from').val();
    var date_to=$('#date_to').val();

    var doc_keyword=$('#subject').val();
    var TagArray = [];
    if(doc_keyword!=''){
              var TagValues = JSON.parse($('[name=subject]').val())
        

        for(let i=0;i<TagValues.length;i++){
            // TagArray.push({keywordss:TagValues[i].value})
            TagArray.push('%'+TagValues[i].value+'%')
        }
    }else{
      TagArray = []
    }

    //console.log(TagArray);
    var data={
      dept_id:dept_id,
      field_dept_id:field_dept_id,
      doc_type:doc_type,
      date_from:date_from,
      date_to:date_to,
      doc_keyword:TagArray

    }
    
    var resdiv='';
    //all
    // alert(dept_id);
    
    if(typeof dept_id==='undefined'){
      dept_id='';
    }
    if(typeof field_dept_id==='undefined'){
      field_dept_id='';
    }
    if(typeof doc_type==='undefined'){
      doc_type='';
    }
    if(dept_id==''){
      dept_id='';
    }
    if(field_dept_id==''){
      field_dept_id='';
    }
    if(doc_type==''){
      doc_type='';
    }
    if(TagArray.length==0){
      doc_keyword='';
    }
    
    
    if((dept_id!='')||(field_dept_id!='')||(doc_type!='')||(date_from!='')||(date_to!='')||(TagArray.length!=0)){

     
      $.ajax({
            url:'/advancesearch',
            "_token": "{{ csrf_token() }}",
            type:'POST',
            data:data,
            success:function(res){
              
             
              $('#services').show();
              $('#tbodytab1').html('');
              
              $.each(res.result, function (i,data1) {
                    //alert(data1);exit();
                    var docdate =data1.documentdate;
                    var dobsplit = docdate.split('-');
                    var dobyr = dobsplit[0];
                    var dobmnt = dobsplit[1];
                    var dobdt = dobsplit[2];
                    var documdt = dobdt+'-'+dobmnt+'-'+dobyr;

                    var uploaddate =data1.uplddt;
                    var upldddt = new Date(uploaddate);
                    var upldsplit = docdate.split('-');;
                    var upldyr = upldsplit[0];
                    var upldmnt = upldsplit[1];
                    var uplddt = upldsplit[2];
                    var uploaddt = uplddt+'-'+upldmnt+'-'+upldyr;

                    var filepathnew = data1.folder+'/'+data1.filepath;
                    var dwnld = "fas fa-download";
                    var j=i+1;
                    
                    $('#tbodytab1').append('<tr><td>'+j+'</td><td>'+data1.documenttype+'</td><td>'+data1.title+'</td><td>'+documdt+'</td><td>'+uploaddt+'</td><td><a target="_blank" href='+filepathnew+' id=download><i class="fas fa-download"></i></a></td></tr>');

                });

              
            }
        });

  }


 });
    
});

</script>
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection

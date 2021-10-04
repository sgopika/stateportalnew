@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
       
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('contributorhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  <div class="col-12 py-1">
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp;FAQ</strong></p>
   </div>
  
  <div class="col-12 py-1">
      @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
   @if(session()->get('errors'))
    <div class="alert alert-danger">
      {{ session()->get('errors') }}
    </div>
  @endif
    </div>

  <div class="col-12 py-1">
     <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs"  id="transactionbutton" name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
     <input type="hidden" id="usertypeid" name="usertypeid" value="{{ Auth::user()->usertypes_id }}">
     <!-- Button trigger modal -->

  </div> <!-- ./col12 -->
  <div class="col-12 py-1">
    <div class="responsive">
          <table class="table table-stripped table-sm table-hover box-shadow--6dp" id="resposivetable">
            <thead class="eng_xxxs thlist">
              <tr class="bg-teal">
                <th>#</th>
                <th>Date</th>
                <th>Title</th>
                <th>Sec.Dept</th>
                <th>Field Dept</th> 
                <th>PDF</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="eng_xxxs">
               @php
                $i=1
                @endphp

                @foreach($displayval as $res)

                <tr>
                    <td><span class="eng_xxxxs"> {{ $i }} </span> </td>
                    <td><span class="eng_xxxxs"> {{ date('d-m-Y', strtotime($res->documentdate)) }} </span> </td> 
                     <td><span class="eng_xxxxs"> {{ $res->entitle  }} </span> </td> 
                     <td><span class="eng_xxxxs"> {{$res->deptname }} </span> </td> 
                     <td><span class="eng_xxxxs"> {{$res->fieldname }} </span> </td>
                     <td><span class="eng_xxxxs"> <a target="_blank" href="{{ asset('Documentfaq').'/'.$res->filepath }}">View File</a></span> </td>
                  <td><span class="active" id="{{ $res->id }}"> @if($res->status==1)<i class="fas fa-check-square"></i>@elseif($res->status==2)  <i class="fas fa-window-cldocumentdateose fg-darkTaupe"></i>@endif </span></td>
                  <td>
              

                  <div class="btn-group" role="group" aria-label="Actionbuttons">
              
              <button type="button" class="edit btn btn-sm bg-lightBrown fg-darkCrimson eng_xxxxs " name="edit" id="{{ $res->id }}" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="fas fa-pencil-alt"></i>&nbsp;Edit</button>
              <button type="button" class="delete btn btn-sm bg-darkBrown fg-lightGray eng_xxxxs" name="delete" id="{{ $res->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
            </div>
                  </td>
                  @php
                  $i++
                  @endphp

                  @endforeach
              </tr>
              
            </tbody>
          </table>
        </div>
  </div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->
<div class="modal fade"  id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
    
       <form id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
         
          
         
           <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Date</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="date" class="form-control customform eng_xxxs fg-darkCrimson" data-inputmask-alias="date" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" placeholder="dd/mm/yyyy" id="filedate" name="filedate" min="10" maxlength="10"  />
                <p id="filedateerror" style="display:none; color:#FF0000;" >Only A -Z a-z ,numbers / () .  are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
            
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload File </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
               <div id="filepdf"> </div>
                <input type="file"  id="filename" name="filename" required="required">
                  <p id="imageerror" style="display:none; color:#FF0000;">
                  Invalid File format. 
                  </p>
                  <p id="imageerror1" style="display:none; color:#FF0000;" class="mal_xxxs">
                  Allowed size 1 MB.
                  </p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
           <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Department </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the department.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="departments_id" name="departments_id">
            <option>Select Department</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Field Department </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the Field department.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="fielddepartments_id" name="fielddepartments_id">
            <option>Select Field Department</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

   
          
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="3">
                <p id="titleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                <p id="maltitleerror" style="display:none; color:#FF0000;" >Only Malayalam Characters and spaces are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
         
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Keywords </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="enkeyword" name="enkeyword" aria-describedby="HELPNAME" placeholder="Keywords" maxlength="1000" minlength="3"></textarea>
                
                <p id="enkeyworderror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters and comma are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Keywords in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malkeyword" name="malkeyword" aria-describedby="HELPNAME" placeholder="Malayalam Keywords" maxlength="1000" minlength="3"></textarea>
                 <p id="malkeyworderror" style="display:none; color:#FF0000;" >Only Malayalam Characters and comma are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
        
        
        </div> <!-- ./form_section -->

      </div> <!-- ./modal-body -->
      <div class="modal-footer modalover">
        <input type="hidden" name="action" id="action" value="Add" />
        <input type="hidden" name="hidden_id" id="hidden_id" />
        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save changes</button>

      </div> <!-- ./modal-footer  -->
    </form>
    </div> <!-- ./modal-content -->
  </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->



<div id="confirmModal" class="modal" tabindex="-1"  role="dialog">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div> <!-- ./modal-header -->
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div> <!-- ./modal-body -->
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div> <!-- ./modal-footer -->
        </div> <!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
</div> <!-- ./confirm modal dialog -->


<!-- Modal -->
<div class="modal fade"  id="transactionmodalupld" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
       <div class="uploaddet ml-3"></div>
     	
    </div> <!-- ./modal-content -->
  </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->
@endsection

@section('customscripts')
<script>

$(function () {
  var MyDate = new Date();
  var currentYear = new Date().getFullYear();
  var currentMonth = new Date().getMonth();
  var currentDay = new Date().getDay();
  var minDate =  '1957-01-01';
  var maxDate = currentYear+'-'+('0' + (MyDate.getMonth()+1)).slice(-2)+'-'+ ('0' + MyDate.getDate()).slice(-2);
  $('#filedate').attr('min', minDate);
  $('#filedate').attr('max', maxDate)
});


$(document).ready(function(){ 
var max_year=new Date().getFullYear().toString();
//  $("#inputmask").inputmask("dd/mm/yyyy");
//$("#filedate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy", "yearrange":{minyear: 1957, maxyear: max_year }});
  $('.summernote').summernote({
      toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'ol', 'paragraph']],

  ],

  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$('#resposivetable').DataTable( {
    responsive: true,
    aoColumnDefs: [
  {
     bSortable: false,
     aTargets: [ -1 ]
  }
]
} );
 
$('#numberen').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9/()., \s]+$');
  if (!tested.test(testval))
  {
    $('#numberen').val('');
    
     $('#numberenerror').slideDown("slow");

  }
  else
  {
     $('#numberenerror').hide();
     
  }
      
});
 $('#numbermal').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _./(),]+$");
if (XRegExp.test(testval, pattern)) {
     $('#numbermalerror').hide();
}
else{
$('#numbermal').val('');
  $('#numbermalerror').slideDown("slow");
}
      
});

 $('#filename').bind('change', function() {
    
    var ext = $('#filename').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['pdf']) == -1){
      $('#imageerror').slideDown("slow");
      $('#imageerror1').slideUp("slow");
      $('#image').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror1').slideDown("slow");
        $('#filename').val('');
     
      }else{
     
        $('#imageerror1').slideUp("slow");
      }
      $('#imageerror').slideUp("slow");
    }
  });


   $('#entitle').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
  if (!tested.test(testval))
  {
    $('#entitle').val('');
    
     $('#titleerror').slideDown("slow");

  }
  else
  {
     $('#titleerror').hide();
     
  }
      
});

   $('#maltitle').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#maltitleerror').hide();
}
else{
$('#maltitle').val('');
  $('#maltitleerror').slideDown("slow");
}
      
});

$('#enkeyword').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9/()., \s]+$');
  if (!tested.test(testval))
  {
    $('#enkeyword').val('');
    $('#enkeyworderror').slideDown("slow");
  }
  else
  {
     $('#enkeyworderror').hide(); 
  }
});



$('#malkeyword').on('change ', function(e) {
  var testval = this.value;
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
  if (XRegExp.test(testval, pattern)) {
    $('#malkeyworderror').hide();
  }
  else{
    $('#malkeyword').val('');
    $('#malkeyworderror').slideDown("slow");
  }     
});

/*Validation end*/
 $('#departments_id').on('change ', function(e) {
        var deptid = $(this).val();

         $.ajax({
          method:"post",
          dataType:"json",
            data: {deptid:deptid},
            url: '{{ route('contributor.getfielddepartment') }}',
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
     });

$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.modal-title').text('Add New FAQ');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');
  var usertype=$("#usertypeid").val(); 
  var action_url = '';
 action_url="{{ route('contributor.documentfaqcreate') }}";
    
  $.ajax({
       url: action_url,
       dataType:"json",
       success:function(data)
        {
            

           $('#departments_id').empty();
            $('#departments_id').append($('<option></option>').val('').html('Select'));
            $.each(data.departments, function(index, element) {
                $('#departments_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

  
            
            $('#entitle').val('');
            $('#maltitle').val('');
            $('#enabstract').val('');
            $('#malabstract').val('');
            $('#enkeyword').val('');
            $('#malkeyword').val('');
            $('#encontent').val('');
            $('#malcontent').val('');

         

            
            $('.modal-title').text('Add New FAQ');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
       })
    
});



$('#ajaxmodalform').on('submit', function(event){ 
   var formData = new FormData(this);
    event.preventDefault();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('contributor.documentfaqstore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('contributor.documentfaqupdate') }}";

    $.ajax({
         url: action_url,
         method:"post",
         data:formData,
         cache:false,
         contentType: false,
         processData: false,
         dataType:"json",
         success:function(data)
         { 
            var html = '';
            if(data.errors)
            {
               alert("Already a FAQ with same exists");
               
            }
            if(data.success)
            {
               html = '<div class="alert alert-success">' + data.success + '</div>';
               $('#ajaxmodalform')[0].reset();
               window.location.reload();
               $('#transactionmodal').modal('hide');
            }
         }
    });
  });
  

 
 

  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('#ajaxformresults').html('');
      var usertype=$("#usertypeid").val(); 
      var action_url2 = '';
      
         action_url2 = "/contributor/documentfaqedit/"+id;
      
    
      $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
          if(data.error){
            alert("The Article is Locked, So cannot be edited!");
          } else {
             

             $('#filename').prop('required',false);
             var urlpath="{{asset('Documentfaq')}}/"+data.resultdata.filepath;

        $("#filepdf").html("<a target='_blank' href="+urlpath+">View File</a>");      
       

            // var start = new Date(data.resultdata.documentdate);
            // var dd = start.getDate();
            // var mm = start.getMonth()+1; //January is 0! 
            // var yyyy = start.getFullYear();
            // if(dd<10){dd='0'+dd};
            // if(mm<10){mm='0'+mm};
            // var start = dd+'/'+mm+'/'+yyyy; 
            // $('#filedate').val(start);

            var start = new Date(data.resultdata.documentdate);
            var dd = start.getDate();
            var mm = start.getMonth()+1; //January is 0! 
            var yyyy = start.getFullYear();
            if(dd<10){dd='0'+dd};
            if(mm<10){mm='0'+mm};
            //var start = dd+'/'+mm+'/'+yyyy; 
            var start = yyyy+'-'+mm+'-'+dd; 
            $('#filedate').val(start);


            //$('#godate').val(data.resultdata.documentdate);
            $('#entitle').val(data.resultdata.entitle);
            $('#maltitle').val(data.resultdata.maltitle);
             $('#enabstract').summernote('code', data.resultdata.enabstract);
            $('#malabstract').summernote('code', data.resultdata.malabstract);
            $('#encontent').summernote('code', data.resultdata.encontent);
            $('#malcontent').summernote('code', data.resultdata.malcontent);

            $('#enkeyword').val(data.resultdata.enkeywords);
            $('#malkeyword').val(data.resultdata.malkeywords);
          

            $('#departments_id').empty();
          $('#departments_id').append($('<option></option>').val('').html('Select'));
          $.each(data.department, function(index, element) {
              $('#departments_id').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
          element.id == data.resultdata.departments_id ? $('#departments_id').val(element.id).prop('selected', true) : '';    
          });


           $('#fielddepartments_id').empty();
          $('#fielddepartments_id').append($('<option></option>').val('').html('Select'));
          $.each(data.fielddepartment, function(index, element) {
              $('#fielddepartments_id').append(
                  $('<option></option>').val(element.id).html(element.name)
              );
          element.id == data.resultdata.fielddepartments_id ? $('#fielddepartments_id').val(element.id).prop('selected', true) : '';    
          });
          
         
         
          $('#hidden_id').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton').val('Update Details');
          $('#action').val('Edit');
          $('#transactionmodal').modal('show');
          }
        }
      })
  });
  
  
  

   $(document).on('click', '.active', function(){

    var id = $(this).attr('id'); 
      var usertype=$("#usertypeid").val(); 
      var action_url3 = '';
      
         action_url3 = "/contributor/documentfaqstatus/"+id;
     
    $.ajax({
      url:action_url3,
      dataType:"json",

      success:function(data)
      {
        if(data.error)
        {
          //alert("Already an active Alert exists!!!");
          
        }
        if(data.success)
        { 
          window.location.reload();
        } 
         
        
      }
    })
  });

  var element_id;

  $(document).on('click', '.delete', function(){
      element_id = $(this).attr('id');
      $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
    var usertype=$("#usertypeid").val(); 
      var action_url4 = '';
     
         action_url4 = "/contributor/documentfaqdestroy/"+element_id;
     

    $.ajax({
            url:action_url4,
            dataType:"json",

            success:function(data)
            {
               setTimeout(function(){
               $('#confirmModal').modal('hide');
               window.location.reload();
               alert('Data Deleted');
               }, 200);
            }
    })
});



$( ".close1" ).click(function() {
      $('#transactionmodal').modal('hide');
        
 });

/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
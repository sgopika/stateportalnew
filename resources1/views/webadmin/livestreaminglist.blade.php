@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
        @if(Auth::user()->usertypes_id==4)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         @elseif(Auth::user()->usertypes_id==5)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('editorhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
          @elseif(Auth::user()->usertypes_id==12)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('livestreaminghome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         @endif
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown"> Livestreaming List </p>
  </div> <!-- ./col12 -->
 
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
                <th>Name</th>
                <th>Name in Malayalam</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="eng_xxxs">
               @php
                $i=1
                @endphp

                @foreach($listdata as $res)

                <tr>
                    <td><span class="eng_xxxxs"> {{ $i }} </span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->entitle }}</span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->maltitle }}</span> </td>
                  <td><span class="active" id="{{ $res->id }}"> @if($res->status==1)<i class="fas fa-check-square"></i>@elseif($res->status==2)  <i class="fas fa-window-close fg-darkTaupe"></i>@endif </span></td>
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
      <form id="ajaxmodalform" method="post" class="form-horizontal">
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <!-- <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3"> -->
                <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea>
                <p id="nameerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
               <!--  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3"> -->
               <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea>
                <p id="maltitleerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">URL </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="url" name="url" aria-describedby="HELPNAME" placeholder="Name" maxlength="300" minlength="3">
                <p id="urlerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Date</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <input type="text" required name="livestreamingdate" id="livestreamingdate" value="{{ Carbon\Carbon::now()->format('d/m/Y')  }}" class="form-control customform eng_xxxs fg-darkCrimson dob" required>

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

@endsection

@section('customscripts')
<script>
$(document).ready(function(){ 

  

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

$('.dob').inputmask("date",{
    mask: "1/2/y",
    placeholder: "dd-mm-yyyy",
    leapday: "-02-29",
    separator: "/",
    alias: "dd/mm/yyyy"
  });
 

  $('#entitle').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#entitle').val('');
    
     $('#nameerror').slideDown("slow");

  }
  else
  {
     $('#nameerror').hide();
     
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
$('#url').on('change ', function(e) {
  var testval = this.value;
  var tested = urlreg(testval);
  if (!tested)
  {
    $('#url').val(''); 
     $('#urlerror').slideDown("slow");
  }
  else
  {
     $('#urlerror').hide();
     
  }
      
});

$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('#urlerror').hide();
         $('#nameerror').hide();
         $('#maltitleerror').hide();
    
    $('.modal-title').text('Add New Live Streaming');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

    $('#name').val('');
    $('#malname').val('');
    
});



$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
         
         $('#urlerror').hide();
         $('#nameerror').hide();
         $('#maltitleerror').hide();

    
    var action_url = '';
    var usertype=$("#usertypeid").val(); 
    if($('#action').val() == 'Add'){
      if(usertype==4){
         action_url = "{{ route('webadmin.livestreamingstore') }}";
      } else if(usertype==5){
         action_url = "{{ route('editor.livestreamingstore') }}";
      } else if(usertype==12){
         action_url = "{{ route('livestreaming.livestreamingstore') }}";
      }
    }

    if($('#action').val() == 'Edit'){
      if(usertype==4){
         action_url = "{{ route('webadmin.livestreamingupdate') }}";
      } else if(usertype==5){
        action_url = "{{ route('editor.livestreamingupdate') }}";
      } else if(usertype==12){
        action_url = "{{ route('livestreaming.livestreamingupdate') }}";
      }
    }
        

    $.ajax({
         url: action_url,
         method:"post",
         data:$(this).serialize(),
         dataType:"json",
         success:function(data)
         { 
            var html = '';
            if(data.errors)
            {
              swal("Warning",data.errors,"warning");
               
            }
            if(data.success)
            {
              swal({
                                                title:'Livestreaming List',
                                                text:data.success,
                                                type:'info',
                                                buttonsStyling:false,
                                                reverseButtons:true
                                            })
                .then((value) => {
                    if (value) {
                      $('#loader').show();
                      $('#transactionmodal').modal('hide');
                      $('#ajaxmodalform')[0].reset();
                      window.location.reload();
                      // window.location.replace("{{route('admin.languagelist')}}");
                    }
                });
              //  html = '<div class="alert alert-success">' + data.success + '</div>';
              //  $('#ajaxmodalform')[0].reset();
              //  window.location.reload();
              //  $('#transactionmodal').modal('hide');
            }
         }
    });
  });


  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('#urlerror').hide();
      $('#nameerror').hide();
      $('#maltitleerror').hide();
           
      
      $('#ajaxformresults').html('');
      var usertype=$("#usertypeid").val(); 
      var action_url2 = '';
      if(usertype==4){
         action_url2 = "/webadmin/livestreamingedit/"+id;
      } else if(usertype==5){
         action_url2 = "/editor/livestreamingedit/"+id;
      } else if(usertype==12){
         action_url2 = "/livestreaming/livestreamingedit/"+id;
      }

      $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
                    
            
          $('#entitle').val(data.resultdata.entitle);
          $('#maltitle').val(data.resultdata.maltitle);
          $('#url').val(data.resultdata.url);
          
          var start = new Date(data.resultdata.date);
          var dd = start.getDate();
          var mm = start.getMonth()+1; //January is 0! 
          var yyyy = start.getFullYear();
          if(dd<10){dd='0'+dd};
          if(mm<10){mm='0'+mm};
          var start = dd+'/'+mm+'/'+yyyy; 
          $('#livestreamingdate').val(start);
         
          $('#hidden_id').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton').val('Update Details');
          $('#action').val('Edit');
          $('#transactionmodal').modal('show');
        }
      })
  });

   $(document).on('click', '.active', function(){

    var id = $(this).attr('id'); 
    var usertype=$("#usertypeid").val(); 
      var action_url3 = '';
      if(usertype==4){
         action_url3 = "/webadmin/livestreamingstatus/"+id;
      } else if(usertype==5){
         action_url3 = "/editor/livestreamingstatus/"+id;
      } else if(usertype==10){
         action_url3 = "/livestreaming/livestreamingstatus/"+id;
      }

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
      var usertype=$("#usertypeid").val(); 
      var action_url4 = '';
      if(usertype==4){
         action_url4 = "/webadmin/livestreamingdestroy/"+element_id;
      } else if(usertype==5){
         action_url4 = "/editor/livestreamingdestroy/"+element_id;
      } else if(usertype==12){
         action_url4 = "/livestreaming/livestreamingdestroy/"+element_id;
      }
      swal(
            {
              title: "Deleting Livestreaming List",
              text: "Are you sure to delete Livestreaming List?",
              type: "warning",
              buttons: true,
              dangerMode: true
            })
          .then((isconfirm) => {
            //$('#loader').show();
            
            if (isconfirm) {
              $.ajax({
                  url:action_url4,
                  dataType:"json",

                  success:function(data)
                  {
                    //  setTimeout(function(){
                    //  $('#confirmModal').modal('hide');
                    // 

                    $('#loader').hide();
                    
                      swal({
                                                        title:'Livestreaming List Deleted',
                                                        text:data.success,
                                                        type:'info',                                               
                                                        buttonsStyling:false,
                                                        reverseButtons:true
                                                    })
                        .then((value) => {
                            if (value) {
                              $('#loader').show();
                              $('#ajaxmodalform')[0].reset();
                              window.location.reload();
                            }
                       });
                    //  swal("Info","Data Deleted","info");
                    //  alert('Data Deleted');
                    //  }, 200);
              }});
            }
        });
  });

//   $('#ok_button').click(function(){
//     var usertype=$("#usertypeid").val(); 
//       var action_url4 = '';
//       if(usertype==4){
//          action_url4 = "/webadmin/livestreamingdestroy/"+element_id;
//       } else if(usertype==5){
//          action_url4 = "/editor/livestreamingdestroy/"+element_id;
//       } else if(usertype==12){
//          action_url4 = "/livestreaming/livestreamingdestroy/"+element_id;
//       }


//     $.ajax({
//             url:action_url4,
//             dataType:"json",

//             success:function(data)
//             {
//                setTimeout(function(){
//                $('#confirmModal').modal('hide');
//                window.location.reload();
//                alert('Data Deleted');
//                }, 200);
//             }
//     })
// });



$( ".close1" ).click(function() {
      $('#transactionmodal').modal('hide');
        
 });

/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
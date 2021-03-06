@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('adminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
      </ol>
      
    </nav>
  </div> <!-- col12 -->
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
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp;  Department Category List </strong></p>
   </div>
  <div class="col-12 py-1">
     <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs"  id="transactionbutton" name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
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
                  <td> <a type="button" class="active" name="statusbtn" id="{{ $res->id }}">@if($res->status==1)  <i class="fas fa-check-circle"></i>  @else <i class="fas fa-window-close fg-darkTaupe"></i> @endif</a></td>
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
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> additional information.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" minlength="3" maxlength="250" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name of department english" maxlength="50" minlength="3">
          <p id="nameerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in Malayalam </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> additional information.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" minlength="3" maxlength="250" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name of department malayalam" maxlength="150" minlength="3">
            <p id="malnameerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
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
 

$('#entitle').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            // $('#entooltip').val($('#entitle').val());
            $('#nameerror').hide();
        }else{
            $('#entitle').focus();
            $('#nameerror').slideDown("slow");
        }      

    });
    $('#maltitle').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#malnameerror').hide();
     }
     else{         
         $('#maltitle').focus();
         $('#malnameerror').slideDown("slow");
     }

 });


$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('#nameerror').hide();
    $('#malnameerror').hide();

    $('.modal-title').text('Add New Department Category');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

    $('#entitle').val('');
    $('#maltitle').val('');
    
});



$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    $('#nameerror').hide();
    $('#malnameerror').hide();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('admin.deptcategorystore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('admin.deptcategoryupdate') }}";

    $.ajax({
         url: action_url,
         method:"post",
         data:$(this).serialize(),
         dataType:"json",
         success:function(data)
         {
            console.log(data);
            var html = '';
            if(data.errors)
            {
               swal("Warning",data.errors,"warning");
               
            }
            if(data.success)
            {
              swal({
                                                title:' Department Category List',
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
                      window.location.replace("{{route('admin.deptcategorylist')}}");
                    }
                });;
              //  html = '<div class="alert alert-success">' + data.success + '</div>';
              //  $('#ajaxmodalform')[0].reset();
              //  window.location.reload();
              //  $('#transactionmodal').modal('hide');
            }
         },
         error:function(jqXhr, json, errorThrown){
          var errors = jqXhr.responseJSON;       
          swal("Warning",errors.message,"warning");
         }
    });
  });


  $(document).on('click', '.edit', function(){
    $('#nameerror').hide();
    $('#malnameerror').hide();
      var id = $(this).attr('id'); 
      $('#ajaxformresults').html('');
      $.ajax({
       url :"/admin/deptcategoryedit/"+id,
       dataType:"json",
       success:function(data)
        { 
                    
            
          $('#entitle').val(data.resultdata.entitle);
          $('#maltitle').val(data.resultdata.maltitle);
          
          
         
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
    $.ajax({
      url:"/admin/deptcategorystatus/"+id,
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
    $('#nameerror').hide();
    $('#malnameerror').hide();
      element_id = $(this).attr('id');
      swal(
            {
              title: "Deleting Department Category",
              text: "Are you sure to delete Department Category?",
              type: "warning",
              buttons: true,
              dangerMode: true
            })
          .then((isconfirm) => {
            //$('#loader').show();
            
            if (isconfirm) {
              $.ajax({
                  url:"/admin/deptcategorydestroy/"+element_id,
                  dataType:"json",

                  success:function(data)
                  {
                    //  setTimeout(function(){
                    //  $('#confirmModal').modal('hide');
                    // 

                    $('#loader').hide();
                    
                      swal({
                                                        title:'Department Category Deleted',
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

//     $.ajax({
//             url:"/admin/deptcategorydestroy/"+element_id,
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
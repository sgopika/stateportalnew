@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('appadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
      </ol>
      
    </nav>
  </div> <!-- col12 -->
 <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown"> Designation List </p>
  </div> <!-- ./col12 -->
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="name" name="name" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="3" required>
                <p id="nameerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malname" name="malname" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="100" minlength="3" required>
                <p id="malnameerror" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
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
 

  $('#name').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#name').val('');
    $('#malnameerror').hide();
     $('#nameerror').slideDown("slow");

  }
  else
  {
     $('#nameerror').hide();
     
  }
      
});

$('#malname').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
   // console.log("Valid");
    $('#malnameerror').hide();
}
else{
 // console.log("not Valid");
$('#malname').val('');
$('#nameerror').hide();
  $('#malnameerror').slideDown("slow");
}
      
});


$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('#malnameerror').hide();
$('#nameerror').hide();
    $('.modal-title').text('Add New Designation');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

    $('#name').val('');
    $('#malname').val('');
    
});



$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    $('#malnameerror').hide();
$('#nameerror').hide();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('appadmin.designationstore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('appadmin.designationupdate') }}";

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
              swal("Warning", data.errors, "warning");
               
            }
            if(data.success)
            {
              swal({
                                                title:'Designation List',
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
                      window.location.replace("{{route('appadmin.designationlist')}}");
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
      $('#malnameerror').hide();
$('#nameerror').hide();
      $('#ajaxformresults').html('');
      $.ajax({
       url :"/appadmin/designationedit/"+id,
       dataType:"json",
       success:function(data)
        { 
                    
            
          $('#name').val(data.resultdata.entitle);
          $('#malname').val(data.resultdata.maltitle);
          
          
         
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
      url:"/appadmin/designationstatus/"+id,
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
      swal(
            {
              title: "Deleting Designation  List",
              text: "Are you sure to delete Designation  List?",
              type: "warning",
              buttons: true,
              dangerMode: true
            })
          .then((isconfirm) => {
            //$('#loader').show();
            
            if (isconfirm) {
              $.ajax({
                  url:"/appadmin/designationdestroy/"+element_id,
                  dataType:"json",

                  success:function(data)
                  {
                    //  setTimeout(function(){
                    //  $('#confirmModal').modal('hide');
                    // 

                    $('#loader').hide();
                    
                      swal({
                                                        title:'Designation List Deleted',
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

  $('#ok_button').click(function(){

    $.ajax({
            url:"/appadmin/designationdestroy/"+element_id,
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
function malyalam_check(){
  var val=document.getElementById("malname").value;

  if(val!='')
  { //alert(val);
    //var alphaExp = /^[a-zA-Z0-9\/\,\.\-\(\)\&\@\#\$\%\^\*\+\=\{\}\<\>\;\'\"]+$/;
    var tested = new RegExp("[^a-zA-Z0-9/.,;:'<>]+$");
    if (!tested.test(val)){
      //alert("Please enter Allegation Name in malayalam");
      document.getElementById("malname").value="";
      document.getElementById("malname").focus();
      document.getElementById("malnameerror").style.display = 'block';
      return false;
    } else{
      //document.getElementById("malnameerror").hide();

    // hide the lorem ipsum text
    document.getElementById("malnameerror").style.display = 'none';
    }

  }
}

});
</script>
@endsection
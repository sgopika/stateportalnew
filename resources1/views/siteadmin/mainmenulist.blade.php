@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('siteadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  <div class="col-12 py-1">
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp; Main menu List </strong></p>
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
                <th>Name</th>
                 <th>Malayalam Name</th>
                  <th>English tooltip</th>
                   <th>Malayalam tooltip</th>
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
                      <td><span class="eng_xxxxs"> {{ $res->entooltip }}</span> </td>
                       <td><span class="eng_xxxxs"> {{ $res->maltooltip }}</span> </td>
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
<div class="modal fade"  id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl" role="document">
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Menu Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="menutypeid" name="menutypeid" ></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="showdiv">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Path </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
               
                <input type="text"  id="urlpath" name="urlpath" class="form-control customform eng_xxxs fg-darkCrimson">
                  <p id="imageerror2" style="display:none; color:#FF0000;">
                  Invalid File format.
                  </p>
                  <p id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                  Allowed size 1 MB.
                  </p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row --> 
          <div class="row customformrow" id="showdiv2">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Article </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the article.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <select class="form-control customform eng_xxxs fg-darkCrimson" id="articleid" name="articleid">
            <option>Select Component</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->


           <div class="row customformrow" id="showdiv1">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <a href=""id="fileview" target="_blank">View</a>
                <input type="file"  id="filename" name="filename" >
                  <p id="imageerror2" style="display:none; color:#FF0000;">
                  Invalid File format.
                  </p>
                  <p id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                  Allowed size 1 MB.
                  </p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row --> 
    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in English </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter tile in English.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="name" name="name" aria-describedby="HELPNAME" placeholder="Engilsh title" maxlength="500" minlength="3" required>
          <p id="nameerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the title in Malayalam.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malname" name="malname" aria-describedby="HELPNAME" placeholder="Malayalam title" maxlength="500" minlength="3" required>
          <p id="malnameerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in English </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter Tooltip in English.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="English tooltip" maxlength="500" minlength="3" required>
          <p id="entooltiperror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Tooltip in Malayalam.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip" name="maltooltip" aria-describedby="HELPNAME" placeholder="Malayalam tooltip" maxlength="500" minlength="3" required>
          <p id="maltooltiperror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
 <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon Class </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the icon class.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="iconclass" name="iconclass" aria-describedby="HELPNAME" placeholder="Icon class">
          <p id="iconerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Point to </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Point to .</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="pointto" name="pointto" aria-describedby="HELPNAME" placeholder="Point to">
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

  $('#showdiv').hide();
  $('#showdiv1').hide();
  $('#showdiv2').hide();

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
            var vald = entitleregex(testval);
            if (!vald) {
                $('#name').val('');
                $('#nameerror').slideDown("slow");
            } else {
                $('#nameerror').hide();

            }

        });

        $('#malname').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {
                $('#malnameerror').hide();
            } else {
                $('#malname').val('');
                $('#malnameerror').slideDown("slow");
            }

        });

        $('#entooltip').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            // alert(vald);
            if (!vald) {
                $('#entooltip').val('');
                $('#entooltiperror').slideDown("slow");
            } else {
                $('#entooltiperror').hide();
            }
        });


        $('#maltooltip').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {
                $('#maltooltiperror').hide();
            } else {
                $('#maltooltip').val('');
                $('#maltooltiperror').slideDown("slow");
            }

        });

$('#iconclass').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9 \s\-]+$');
  if (!tested.test(testval))
  {
    $('#iconclass').val(''); 
     $('#iconerror').slideDown("slow");
  }
  else
  {
     $('#iconerror').hide();   
  }
      
});

  $('#menutypeid').on('change ', function(e) {
  var menutype=$( "#menutypeid option:selected" ).text();
  if (menutype=='File')
  {
    $('#showdiv').hide();
    $('#showdiv1').show();
    $('#showdiv2').hide();
  }
  else if(menutype=='Article')
  {
    $('#showdiv').hide();
    $('#showdiv1').hide();
    $('#showdiv2').show();
  }
  else
  {
    $('#showdiv1').hide();
    $('#showdiv').show();
    $('#showdiv2').hide();
  }
      
});



$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('#ajaxmodalform')[0].reset();
    $('#iconclass').val('fas fa-question-circle');
    $('.modal-title').text('Add New Mainmenu');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

          // $('#name').val('');
          // $('#malname').val('');
          // $('#entooltip').val('');
          // $('#maltooltip').val('');
          // $('#iconclass').val('');
          // $('#urlpath').val('');
           var usertype=$("#usertypeid").val(); 
            var action_url = '';
           if(usertype==3)
           {
              action_url = "{{ route('siteadmin.mainmenucreate') }}";
           } 
          else if(usertype==4)
          {
              action_url = "{{ route('webadmin.mainmenucreate') }}";

          } 

            $.ajax({
       url: action_url,
       dataType:"json",
       success:function(data)
        {
             $('#menutypeid').empty();
            $('#menutypeid').append($('<option></option>').val('0').html('Select'));
            $.each(data.menutype, function(index, element) {
                $('#menutypeid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

            $('#articleid').empty();
            $('#articleid').append($('<option></option>').val('0').html('Select'));
            $.each(data.article, function(index, element) {
                $('#articleid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

           
                      
            $('.modal-title').text('Add New Menu');
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

    var usertype=$("#usertypeid").val(); 
    var action_url = '';

  if(usertype==3){
    
      if($('#action').val() == 'Add')
        action_url = "{{ route('siteadmin.mainmenustore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('siteadmin.mainmenustore') }}";

  } else if(usertype==4){

      if($('#action').val() == 'Add')
        action_url = "{{ route('webadmin.mainmenustore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('webadmin.mainmenustore') }}";

  } 
    

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
               swal("Already a Mainmenu with same name exists");
               
            }
            if(data.success)
            {
               html = '<div class="alert alert-success">' + data.success + '</div>';
               swal("Updated Sucessfully")
                        .then((value) => {
                         $('#ajaxmodalform')[0].reset();
                         window.location.href='/siteadmin/mainmenulist';
                        });
            }
         }
    });
  });


  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('#ajaxformresults').html('');
       var action_url2 = '';
      var usertype=$("#usertypeid").val(); 
      if(usertype==3){
         action_url2 = "/siteadmin/mainmenuedit/"+id;
      } else if(usertype==4){
         action_url2 = "/webadmin/mainmenuedit/"+id;
      }
      $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
                    
            
          $('#name').val(data.resultdata.entitle);
          $('#malname').val(data.resultdata.maltitle);
          $('#entooltip').val(data.resultdata.entooltip);
          $('#maltooltip').val(data.resultdata.maltooltip);
          $('#iconclass').val(data.resultdata.iconclass);
          $('#pointto').val(data.resultdata.pointto);


          if(data.resultdata.menulinktypes_id==4)
          {
          
          $('#showdiv1').hide();
          $('#showdiv').hide();
          $('#showdiv2').show();

            $('#articleid').empty();
            $('#articleid').append($('<option></option>').val('0').html('Select'));
            $.each(data.article, function(index, element) {
                $('#articleid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
                  element.id == data.resultdata.file ? $('#articleid').val(element.id).prop('selected', true) : '';   
            });

          
          
        }
        else if(data.resultdata.menulinktypes_id==5)
        {
          $('#showdiv2').hide();
          $('#showdiv1').show();
           $('#showdiv').hide();
            $("#fileview").attr('href',"{{asset('Mainmenu')}}/"+data.resultdata.file);
        }
         else
         {
          
          $('#showdiv').show(); 
          $('#showdiv1').hide(); 
          $('#showdiv2').hide();
          $('#urlpath').val(data.resultdata.file);
        }
         // 

           $('#menutypeid').empty();
            $('#menutypeid').append($('<option></option>').val('0').html('Select'));
            $.each(data.menutype, function(index, element) {
                $('#menutypeid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
                 element.id == data.resultdata.menulinktypes_id ? $('#menutypeid').val(element.id).prop('selected', true) : '';
            });
          
    
         
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
      if(usertype==3){
         action_url3 = "/siteadmin/mainmenustatus/"+id;
      } else if(usertype==4){
         action_url3 = "/webadmin/mainmenustatus/"+id;
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
      $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
  var action_url2 = '';
  var usertype=$("#usertypeid").val(); 
      if(usertype==3){
         action_url2 = "/siteadmin/mainmenudestroy/"+element_id;
      } else if(usertype==4){
         action_url2 = "/webadmin/mainmenudestroy/"+element_id;
      }
    $.ajax({
            url:action_url2,
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
@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         @if(Auth::user()->usertypes_id==3)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('siteadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
           @elseif(Auth::user()->usertypes_id==4)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         @endif
      </ol>
      
    </nav>
  </div> <!-- col12 -->
   <div class="col-12 py-1">
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp;Copyright Policy</strong></p>
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
                <th>Title</th>
                <th>Subtitle</th>
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
                    <td><span class="eng_xxxxs"> {{ $res->entitle }} <hr class="py-1"> {{ $res->maltitle }}</span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->ensubtitle }} <hr class="py-1"> {{ $res->malsubtitle }}</span> </td>
                  
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
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
      <form  id="ajaxmodalform" method="post" class="form-horizontal" >
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
               <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Title in English" maxlength="20" minlength="3">
                <p id="entitleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Title.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Title in Malayalam" maxlength="50" minlength="3">
                <p id="maltitleerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Sub Title.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Sub Title in English" maxlength="20" minlength="3">
                <p id="ensubtitleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Sub Title.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Sub Title in Malayalam" maxlength="50" minlength="3">
                <p id="malsubtitleerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          
        
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-12 py-2">
                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea>
                <p id="encontenterror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam content.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-12 py-2">
                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                <textarea class="summernote" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea>
                <p id="encontenterror" class="ErrP" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>

              </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the icon class.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon" name="icon" aria-describedby="HELPNAME" placeholder="Name" maxlength="150" minlength="3">
                <p id="iconerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
           <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>
               <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Tooltip.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p id="entooltiperror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Tooltip.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip" name="maltooltip" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                 <p id="maltooltiperror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="checkbox" id="displaystatus" value="1" name="displaystatus" >
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

  $('.summernote').summernote({
      toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'ol', 'paragraph']],

  ],
  height:300

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
 

$('#entooltip').on('change ', function(e) {
    var testval = this.value;
    var vald=entitleregex(testval);
    if(!vald){
        $('#entooltip').focus();
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
        $('#maltooltip').focus();
        $('#maltooltiperror').slideDown("slow");
    }

});



$('#entitle').on('change ', function(e) {
    var testval = this.value;
    var vald=entitleregex(testval);
    if(!vald){
        $('#entitle').focus();
        $('#entitleerror').slideDown("slow");
    } else {
        $('#entitleerror').hide();

    }

});

$('#maltitle').on('change ', function(e) {
    var testval = this.value;

        var tested = maltitleregex(testval);
    if (tested) { 
        $('#maltitleerror').hide();
    } else {
        $('#maltitle').focus();
        $('#maltitleerror').slideDown("slow");
    }

});


$('#ensubtitle').on('change ', function(e) {
    var testval = this.value;
    var vald=entitleregex(testval);
    if(!vald){
        $('#ensubtitle').focus();
        $('#ensubtitleerror').slideDown("slow");
    } else {
        $('#ensubtitleerror').hide();

    }

});

$('#malsubtitle').on('change ', function(e) {
    var testval = this.value;

        var tested = maltitleregex(testval);
    if (tested) { 
        $('#malsubtitleerror').hide();
    } else {
        $('#malsubtitle').focus();
        $('#malsubtitleerror').slideDown("slow");
    }

});


$('#icon').on('change ', function(e) {
    var testval = this.value;
    var vald=entitleregex(testval);
    if(!vald){
        $('#icon').focus();
        $('#iconerror').slideDown("slow");
    } else {
        $('#iconerror').hide();

    }

});


$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.modal-title').text('Add New Details');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

          $('#entooltip').val('Copyright policy');
          $('#maltooltip').val('?????????????????????????????? ?????????');
          $('#entitle').val('');
          $('#maltitle').val('');
          $('#ensubtitle').val('');
          $('#malsubtitle').val('');
          $('#encontent').val('');
          $('#malcontent').val('');
          $('#icon').val('fas fa-question-circle');
    
});



$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    var action_url = '';
      var usertype=$("#usertypeid").val();
        if(usertype==3){
           if($('#action').val() == 'Add')
              action_url = "{{ route('siteadmin.copyrightpolicystore') }}";

          if($('#action').val() == 'Edit')
              action_url = "{{ route('siteadmin.copyrightpolicyupdate') }}";
        } else if(usertype==4){
           if($('#action').val() == 'Add')
           action_url = "{{ route('webadmin.copyrightpolicystore') }}";

          if($('#action').val() == 'Edit')
              action_url = "{{ route('webadmin.copyrightpolicyupdate') }}";
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
               alert("Already a detail with same name exists");
               
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
        if(usertype==3){
           action_url2 = "/siteadmin/copyrightpolicyedit/"+id;
        } else if(usertype==4){
           action_url2 = "/webadmin/copyrightpolicyedit/"+id;
        }
      $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
                  
          $('#entooltip').val(data.resultdata.entooltip);
          $('#maltooltip').val(data.resultdata.maltooltip);
          $('#entitle').val(data.resultdata.entitle);
          $('#maltitle').val(data.resultdata.maltitle);
          $('#ensubtitle').val(data.resultdata.ensubtitle);
          $('#malsubtitle').val(data.resultdata.malsubtitle);
          /*$('#encontent').val(data.resultdata.encontent);
          $('#malcontent').val(data.resultdata.malcontent);*/
          $('#encontent').summernote('code', data.resultdata.encontent);
          $('#malcontent').summernote('code', data.resultdata.malcontent);
          $('#icon').val(data.resultdata.iconclass);

          if(data.resultdata.homepagestatus==1){
            $('#displaystatus').prop('checked', true);
          } else {
            $('#displaystatus').prop('checked', false);
          }

         
         
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
           action_url3 = "/siteadmin/copyrightpolicystatus/"+id;
        } else if(usertype==4){
           action_url3 = "/webadmin/copyrightpolicystatus/"+id;
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
    var usertype=$("#usertypeid").val();
       var action_url4 = ''; 
        if(usertype==3){
           action_url4 = "/siteadmin/copyrightpolicydestroy/"+element_id;
        } else if(usertype==4){
           action_url4 = "/webadmin/copyrightpolicydestroy/"+element_id;
        }

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

 
$('#encontent').on('summernote.change', function(we, contents, $editable) {
    var textareaValue = $('#encontent').summernote('code');
    var retval=summernoteval('encontent');
    if (retval) {
        $(we.target).siblings(".ErrP").css("display", "none");    
    } else {  
        $(we.target).siblings(".ErrP").css("display", "block");     
                
    }
});
$('#malcontent').on('summernote.change', function(we, contents, $editable) {
    var textareaValue = $('#malcontent').summernote('code');
    var retval=summernoteval('malcontent');
    if (retval) {
        $(we.target).siblings(".ErrP").css("display", "none");    
    } else {  
        $(we.target).siblings(".ErrP").css("display", "block");     
                
    }
});



/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
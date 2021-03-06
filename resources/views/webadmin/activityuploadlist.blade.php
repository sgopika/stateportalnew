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
         @elseif(Auth::user()->usertypes_id==6)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('photoeditorhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         @endif
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown"> Activity Upload List </p>
  </div> <!-- ./col12 -->
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
                <th>Activity</th>
                <th>File</th>
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
                    <td><span class="eng_xxxxs"> {{ $res->entitle }} </span> </td>
                    <td><span class="eng_xxxxs"> <img src="{{asset('Activityupload').'/'.$res->file}}" class="img-thumbnail displaythumbnail" alt="Logo" height="200" width="200"> </span> </td>
                  
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
      
          @if(Auth::user()->usertypes_id==4)
      <form action="{{ route('webadmin.activityuploadstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
      @elseif(Auth::user()->usertypes_id==5)
     <form action="{{ route('editor.activityuploadstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
       @elseif(Auth::user()->usertypes_id==6)
     <form action="{{ route('photoeditor.activityuploadstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
      @endif
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
          
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Activity</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <select class="form-control customform eng_xxxs fg-darkCrimson" id="activities_id" name="activities_id" required></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <select class="form-control customform eng_xxxs fg-darkCrimson" id="contenttypes_id" name="contenttypes_id" required></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="filetypediv">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">File Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="filetypes_id" name="filetypes_id" required></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="uploaddiv">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="file"  id="image" name="image" required>
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext" name="alttext" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p id="alttexterror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
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
                <p id="maltitleerror" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Size </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="size" name="size" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p id="sizeerror" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Duration </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="duration" name="duration" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p id="durationerror" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
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

<!-- Modal -->
<div class="modal fade"  id="transactionmodal1" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
      
      @if(Auth::user()->usertypes_id==4)
      <form action="{{ route('webadmin.activityuploadupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
      @elseif(Auth::user()->usertypes_id==5)
      <form action="{{ route('editor.activityuploadupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
         @elseif(Auth::user()->usertypes_id==6)
      <form action="{{ route('photoeditor.activityuploadupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
     
      @endif
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Activity</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <select class="form-control customform eng_xxxs fg-darkCrimson" id="activities_id1" name="activities_id1" required></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <select class="form-control customform eng_xxxs fg-darkCrimson" id="contenttypes_id1" name="contenttypes_id1" ></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="filetypediv1">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">File Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="filetypes_id1" name="filetypes_id1" ></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="uploaddiv1">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="uploadedimage">
                <input type="file"  id="imageedit" name="imageedit" >
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext1" name="alttext1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p id="alttexterror1" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle1" name="entitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p id="titleerror1" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle1" name="maltitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                 <p id="maltitleerror1" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Size </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="size1" name="size1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p id="sizeerror1" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Duration </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="duration1" name="duration1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p id="durationerror1" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          
         

        </div> <!-- ./form_section -->

      </div> <!-- ./modal-body -->
      <div class="modal-footer modalover">
        <input type="hidden" name="action" id="action1" value="Add" />
        <input type="hidden" name="hidden_id1" id="hidden_id1" />
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
 

  $('#title').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#title').val('');
    
     $('#titleerror').slideDown("slow");

  }
  else
  {
     $('#titleerror').hide();
     
  }
      
});
$('#title1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#title1').val('');
    
     $('#titleerror1').slideDown("slow");

  }
  else
  {
     $('#titleerror1').hide();
     
  }
      
});

  

  $('#alttext').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#alttext').val('');
    
     $('#alttexterror').slideDown("slow");

  }
  else
  {
     $('#alttexterror').hide();
     
  }
      
});

  $('#alttext1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#alttext1').val('');
    
     $('#alttexterror1').slideDown("slow");

  }
  else
  {
     $('#alttexterror1').hide();
     
  }
      
});

  $('#size').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#size').val('');
    
     $('#sizeerror').slideDown("slow");

  }
  else
  {
     $('#sizeerror').hide();
     
  }
      
});

  $('#size1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#size1').val('');
    
     $('#sizeerror1').slideDown("slow");

  }
  else
  {
     $('#sizeerror1').hide();
     
  }
      
});

$('#duration').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#duration').val('');
    
     $('#durationerror').slideDown("slow");

  }
  else
  {
     $('#durationerror').hide();
     
  }
      
});

  $('#duration1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#duration1').val('');
    
     $('#durationerror1').slideDown("slow");

  }
  else
  {
     $('#durationerror1').hide();
     
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
$('#maltitle1').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#maltitleerror1').hide();
}
else{
$('#maltitle1').val('');
  $('#maltitleerror1').slideDown("slow");
}
      
});

$('#image').bind('change', function() {
    var filetyp =$( "#filetypes_id option:selected" ).text(); 
    var ext = $('#image').val().split('.').pop().toLowerCase();
    if (ext!=filetyp){
      $('#imageerror').slideDown("slow");
      $('#imageerror1').slideUp("slow");
      $('#image').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror1').slideDown("slow");
        $('#image').val('');
     
      }else{
     
        $('#imageerror1').slideUp("slow");
      }
      $('#imageerror').slideUp("slow");
    }
  });

  $('#imageedit').bind('change', function() {
    var filetyp =$( "#filetypes_id1 option:selected" ).text(); 
    var ext = $('#imageedit').val().split('.').pop().toLowerCase(); 
    if (ext!=filetyp){
      $('#imageerror2').slideDown("slow");
      $('#imageerror3').slideUp("slow");
      $('#image1').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror3').slideDown("slow");
        $('#image1').val('');
     
      }else{
     
        $('#imageerror3').slideUp("slow");
      }
      $('#imageerror2').slideUp("slow");
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

$('#maltitle1').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#maltitleerror1').hide();
}
else{
$('#maltitle1').val('');
  $('#maltitleerror1').slideDown("slow");
}
      
});



$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.modal-title').text('Add New Activity upload');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');
    $('#filetypediv').hide();
    $('#uploaddiv').hide();
    var usertype=$("#usertypeid").val(); 
    var action_url = '';
    if(usertype==4){
       action_url = "{{ route('webadmin.activityuploadcreate') }}";
    } else if(usertype==5){
       action_url = "{{ route('editor.activityuploadcreate') }}";
    } else if(usertype==6){
       action_url = "{{ route('photoeditor.activityuploadcreate') }}";
    }
    
  $.ajax({
       url: action_url,
       dataType:"json",
       success:function(data)
        {
            

            /*$('#filetypes_id').empty();
            $('#filetypes_id').append($('<option></option>').val('0').html('Select'));
            $.each(data.filetype, function(index, element) {
                $('#filetypes_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });*/

            $('#activities_id').empty();
            $('#activities_id').append($('<option></option>').val('').html('Select'));
            $.each(data.activity, function(index, element) {
                $('#activities_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

            

            $('#contenttypes_id').empty();
            $('#contenttypes_id').append($('<option></option>').val('').html('Select'));
            $.each(data.contenttype, function(index, element) {
                $('#contenttypes_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

            

            $('#entitle').val('');
            $('#maltitle').val('');
            $('#size').val('');
            $('#duration').val('');
            $('#icon').val('');
            $('#alttext').val('');

            
            $('.modal-title').text('Add New Activity upload');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
       })
    
});



/*$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('appadmin.officestore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('appadmin.officeupdate') }}";

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
               alert("Already a department with same name exists");
               
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
  });*/
  

  $(document).on('change', '#contenttypes_id', function(){
    var id = $(this).val(); 
    var usertype=$("#usertypeid").val(); 
    var action_url2 = '';
    if(usertype==4){
       action_url2 = "/webadmin/activityuploadfiletypelist/"+id;
    } else if(usertype==5){
       action_url2 = "/editor/activityuploadfiletypelist/"+id;
    } else if(usertype==6){
       action_url2 = "/photoeditor/activityuploadfiletypelist/"+id;
    }
    if(id!=''){
    $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
            $('#filetypediv').show();
            $('#uploaddiv').show();
            $('#filetypes_id').empty();
            $('#filetypes_id').append($('<option></option>').val('').html('Select'));
            $.each(data.filetype, function(index, element) {
                $('#filetypes_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

        } 
    }); 
    }  else {
        $('#filetypediv').hide();
        $('#uploaddiv').hide();
    } 
  });

  $(document).on('change', '#contenttypes_id1', function(){
    var id = $(this).val(); 
    var usertype=$("#usertypeid").val(); 
    var action_url3 = '';
    if(usertype==4){
       action_url3 = "/webadmin/activityuploadfiletypelist/"+id;
    } else if(usertype==5){
       action_url3 = "/editor/activityuploadfiletypelist/"+id;
    } else if(usertype==6){
       action_url3 = "/photoeditor/activityuploadfiletypelist/"+id;
    }
    if(id!=''){
    $.ajax({
       url :action_url3,
       dataType:"json",
       success:function(data)
        { 
            $('#filetypediv1').show();
            $('#uploaddiv1').show();
            $('#filetypes_id1').empty();
            $('#filetypes_id1').append($('<option></option>').val('').html('Select'));
            $.each(data.filetype, function(index, element) {
                $('#filetypes_id1').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

        } 
    }); 
    } else {
        $('#filetypediv1').hide();
        $('#uploaddiv1').hide();
    }   
  }); 

  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('#ajaxformresults').html('');
       var usertype=$("#usertypeid").val(); 
        var action_url4 = '';
        if(usertype==4){
           action_url4 = "/webadmin/activityuploadedit/"+id;
        } else if(usertype==5){
           action_url4 = "/editor/activityuploadedit/"+id;
        } else if(usertype==6){
           action_url4 = "/photoeditor/activityuploadedit/"+id;
        }
      $.ajax({
       url :action_url4,
       dataType:"json",
       success:function(data)
        { 
                  
          $("#uploadedimage").attr('src',"{{asset('Activityupload')}}/"+data.resultdata.file);  
          $('#entitle1').val(data.resultdata.entitle);
          $('#maltitle1').val(data.resultdata.maltitle);
          $('#size1').val(data.resultdata.size);
          $('#duration1').val(data.resultdata.duration);
          $('#alttext1').val(data.resultdata.alt);
          

          $('#filetypes_id1').empty();
          $('#filetypes_id1').append($('<option></option>').val('').html('Select'));
          $.each(data.filetype, function(index, element) {
              $('#filetypes_id1').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
          element.id == data.resultdata.filetypes_id ? $('#filetypes_id1').val(element.id).prop('selected', true) : '';    
          });

          $('#contenttypes_id1').empty();
          $('#contenttypes_id1').append($('<option></option>').val('').html('Select'));
          $.each(data.contenttype, function(index, element) {
              $('#contenttypes_id1').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
          element.id == data.resultdata.contenttypes_id ? $('#contenttypes_id1').val(element.id).prop('selected', true) : '';     
          });

          


          $('#activities_id1').empty();
          $('#activities_id1').append($('<option></option>').val('').html('Select'));
          $.each(data.activity, function(index, element) {
              $('#activities_id1').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
          element.id == data.resultdata.activities_id ? $('#activities_id1').val(element.id).prop('selected', true) : '';     
          });

          
         
          $('#hidden_id1').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton1').val('Update Details');
          $('#action1').val('Edit');
          $('#transactionmodal1').modal('show');
        }
      })
  });

   $(document).on('click', '.active', function(){

    var id = $(this).attr('id'); 
     var usertype=$("#usertypeid").val(); 
        var action_url5 = '';
        if(usertype==4){
           action_url5 = "/webadmin/activityuploadstatus/"+id;
        } else if(usertype==5){
           action_url5 = "/editor/activityuploadstatus/"+id;
        } else if(usertype==6){
           action_url5 = "/photoeditor/activityuploadstatus/"+id;
        }
    $.ajax({
      url:action_url5,
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
        var action_url6 = '';
        if(usertype==4){
           action_url6 = "/webadmin/activityuploaddestroy/"+element_id;
        } else if(usertype==5){
           action_url6 = "/editor/activityuploaddestroy/"+element_id;
        } else if(usertype==6){
           action_url6 = "/photoeditor/activityuploaddestroy/"+element_id;
        }

    $.ajax({
            url:action_url6,
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
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
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp;Add New Archive </strong></p>
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
            <div class="modal-content">
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
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                                <p id="entitleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
                            <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                                <p id="maltitleerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
                            <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Sub Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                                <p id="ensubtitleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
                            <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Sub Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
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
                                <p id="encontenterror" class='ErrP' style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
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
                                <p id="encontenterror" class='ErrP' style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                                
                        
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
                            <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the icon class.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon" name="icon" aria-describedby="HELPNAME" placeholder="Name" maxlength="150" minlength="3" value="fas fa-question-circle">
                                <p id="iconerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>
                            <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Tooltip.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3" value="Archive">
                                <p id="entooltiperror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>
                            <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Tooltip.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip" name="maltooltip" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3" value="ആർക്കൈവ്">
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
                        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save Details</button>

                    </div> <!-- ./modal-footer  -->
                </form>
            </div> <!-- ./modal-content -->
        </div> <!-- ./col12 -->
    </div> <!-- ./row -->
</div> <!-- ./container -->





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


$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('siteadmin.archivepolicystore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('siteadmin.archivepolicyupdate') }}";

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
              window.location ="{{ route('siteadmin.archivepolicylist') }}";
            }
         }
    });
  });
  
/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
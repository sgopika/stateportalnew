@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  
  <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown">Add App Section List </p>
  </div> <!-- ./col12 -->
  <div class="col-12 py-1">
            <div class="responsive">
            <form id="ajaxmodalform" method="post" class="form-horizontal">
                @csrf
                <div class="modal-body adminpage">

                    <div id="form_section">
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">App Department </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the app
                                    department.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <select required class="form-control customform eng_xxxs fg-darkCrimson" id="appdepartments_id"
                                    name="appdepartments_id">
                                    <option>Select App Department</option>
                                </select>
                                <p class="ErrP" id="appdepartments_iderror" style="display:none; color:#FF0000;">Only A -Z a-z 0-9</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Section Name </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the name.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="ensectionname" name="ensectionname" aria-describedby="HELPNAME"
                                    placeholder="Section Name" maxlength="250" minlength="3">
                                <p class="ErrP" id="ensectionnameerror" style="display:none; color:#FF0000;">Only A -Z a-z 0-9
                                    Characters and spaces are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Section Name in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam
                                    name.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="malsectionname" name="malsectionname" aria-describedby="HELPNAME" placeholder="Section Name in Malayalam" maxlength="250" minlength="3">
                                <p class="ErrP" id="malsectionnameerror" style="display:none; color:#FF0000;">Only Malayalam Characters Numbers and special characters(like "",&()-$_=) are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Section Details </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the name.</small>
                           
                                <textarea required class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                    id="ensectiondetails" name="ensectiondetails" aria-describedby="HELPNAME"
                                    placeholder="Section Details" maxlength="1000" minlength="3"></textarea>
                                    <p class="ErrP" id="ensectiondetailserror" style="display:none; color:#FF0000;">Only A -Z a-z 0-9</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Section Details in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam
                                    name.</small>
                           
                                <textarea required class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                    id="malsectiondetails" name="malsectiondetails" aria-describedby="HELPNAME"
                                    placeholder="Placeholder value" maxlength="1000" minlength="3"></textarea>
                                    <p class="ErrP" id="malsectiondetailserror" style="display:none; color:#FF0000;">Only A -Z a-z 0-9</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->





                    </div> <!-- ./form_section -->

                </div> <!-- ./modal-body -->
                <div class="modal-footer modalover">
                <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i
                            class="fas fa-save"></i> &nbsp;Save changes</button>

                </div> <!-- ./modal-footer  -->
            </form>
</div>
</div>

</div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->




@endsection

@section('customscripts')
<script>
$(document).ready(function(){ 
    depload();
  $('.summernote').summernote({
            height: 400
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
});

});
//auto dep load
function depload()
{
 var usertype = $("#usertypeid").val();
 var actionurl = '';
 if (usertype == 4) {
     action_url = "{{ route('webadmin.appsectioncreate') }}";
 } else if (usertype == 15) {
     action_url = "{{ route('deptasst.appsectioncreate') }}";
 }
  $.ajax({
            url: action_url,
            dataType: "json",
            success: function(data) {

                $('#appdepartments_id').empty();
                $('#appdepartments_id').append($('<option></option>').val('0').html(
                    'Select'));
                $.each(data.appdepartment, function(index, element) {
                    $('#appdepartments_id').append(
                        $('<option></option>').val(element.id).html(element
                            .entitle)
                    );
                });

                $('#ajaxformresults').html('');

            }
        })
}

//validation
$('#ensectionname').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
            if(!vald){
            $('#ensectionname').val('');

            $('#ensectionnameerror').slideDown("slow");

        } else {
            $('#ensectionnameerror').hide();

        }

    });

    $('#malsectionname').on('change ', function(e) {
        var testval = this.value;
        var vald = maltitleregex(testval);
        if(!vald){
            $('#malsectionname').val('');

            $('#malsectionnameerror').slideDown("slow");

        } else {
            $('#malsectionnameerror').hide();

        }

    });

    $('#ensectiondetails').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#ensectiondetails').summernote('code');
        var retval=summernoteval('ensectiondetails');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});

$('#malsectiondetails').on('summernote.change', function(we, contents, $editable) {
    var textareaValue = $('#malsectiondetails').summernote('code');
        var retval=summernoteval('malsectiondetails');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
//stop validation

//save form details
$('#ajaxmodalform').on('submit', function(event) {
        event.preventDefault();
        $(".ErrP").hide();
        var usertype = $("#usertypeid").val();
        var actionurl1 = '';
        if (usertype == 4) {
            if ($('#action').val() == 'Add')
                action_url1 = "{{ route('webadmin.appsectionstore') }}";

            if ($('#action').val() == 'Edit')
                action_url1 = "{{ route('webadmin.appsectionupdate') }}";
        } else if (usertype == 15) {
            if ($('#action').val() == 'Add')
                action_url1 = "{{ route('deptasst.appsectionstore') }}";

            if ($('#action').val() == 'Edit')
                action_url1 = "{{ route('deptasst.appsectionupdate') }}";
        }



        $.ajax({
            url: action_url1,
            method: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                var html = '';
                if (data.errors) {
                    swal("Already an App Section with same name exists");

                }
                if(data.success)
            {
              swal({title:'App Section List created ',
                    text:data.success,
                    type:'info',
                    buttonsStyling:false,
                    reverseButtons:true
                  })
                .then((value) => {
                    if (value) {
                      $('#loader').show();
                      $('#ajaxmodalform')[0].reset();
                      window.location.replace("{{route('webadmin.appsectionlist')}}");
                    }
                });
            }
                // if (data.success) {
                //     html = '<div class="alert alert-success">' + data.success + '</div>';
                //     swal("App Section Updated!");
                //     $('#ajaxmodalform')[0].reset();
                //     window.location.replace("{{route('webadmin.appsectionlist')}}");
                // }
            }
        });
    });

//stop form details
</script>
   
@endsection
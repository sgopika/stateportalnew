@extends('layouts.basemain')
@section('content')
<div class="container-fluid homepage adminpage">
    <div class="row ">
        <div class="col-12 py-2  ">
            <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
                <ol class="breadcrumb justify-content-end px-3 pt-2">
                    @if(Auth::user()->usertypes_id==3)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('siteadminhome') }}"><i
                                class="fas fa-home"></i>&nbsp;Home</a></li>
                    @elseif(Auth::user()->usertypes_id==4)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i
                                class="fas fa-home"></i>&nbsp;Home</a></li>
                    @endif
                </ol>

            </nav>
        </div> <!-- col12 -->
        <div class="col-12 py-2  ">
            <div class="responsive">
                <form id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div id="form_section">
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Tooltip.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="Name"
                                    maxlength="20" minlength="3" required>
                                <p id="entooltiperror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Tooltip.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="maltooltip" name="maltooltip" aria-describedby="HELPNAME"
                                    placeholder="Name in Malayalam" maxlength="50" minlength="3" required>
                                <p id="maltooltiperror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                    are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle"
                                    name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="20"
                                    minlength="3" required>
                                <p id="entitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle"
                                    name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam"
                                    maxlength="50" minlength="3" required>
                                <p id="maltitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Sub
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Name"
                                    maxlength="20" minlength="3" required>
                                <p id="ensubtitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters
                                    are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Sub
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME"
                                    placeholder="Name in Malayalam" maxlength="50" minlength="3" required>
                                <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                    are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
                            </div>
                            <div class="col-md-12 py-2">

                                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME"
                                    placeholder="Name" maxlength="1000" minlength="3" required></textarea>
                                <p id="encontenterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                    Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam
                                    content.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-12 py-2">
                                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="malcontent" name="malcontent"
                                    aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000"
                                    minlength="3" required></textarea>
                                <p id="malcontenterror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
                                    Characters are allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->


                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the icon
                                    class.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon"
                                    name="icon" aria-describedby="HELPNAME" placeholder="Name" maxlength="150"
                                    minlength="3" required>
                                <p id="iconerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="checkbox" id="displaystatus" value="1" name="displaystatus">
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->


                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Map Link </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Map link.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="maplink"
                                    name="maplink" aria-describedby="HELPNAME" placeholder="Map Link" maxlength="2000"
                                    minlength="6" required></textarea>
                                <p id="maplinkerror" style="display:none; color:#FF0000;">Maplink can'not be blank!</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                    </div>
            </div> <!-- ./form_section -->
            <div class="modal-footer modalover">
                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i
                        class="fas fa-save"></i> &nbsp;Save changes</button>
                <button id="cancel_save" class="btn btn-sm btn-flat bg-lightBrown fg-darkCrimson"> <i
                        class="fa fa-ban"></i> &nbsp;Cancel</button>
                <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
            </div> <!-- ./modal-footer  -->
            </form>
        </div>
    </div>
</div>
@endsection
@section('customscripts')
<!-- script -->
<script>
$(document).ready(function() {

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
});

// validation alerts-start

$('#maltooltip').on('change ', function(e) {
    var testval = this.value;

    var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    if (XRegExp.test(testval, pattern)) {
        $('#maltooltiperror').hide();
    } else {
        $('#maltooltip').val('');
        $('#maltooltiperror').slideDown("slow");
    }

});



$('#entitle').on('change ', function(e) {
    var testval = this.value;
    var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    if (!tested.test(testval)) {
        $('#entitle').val('');
        $('#entitleerror').slideDown("slow");
    } else {
        $('#entitleerror').hide();

    }

});

$('#maltitle').on('change ', function(e) {
    var testval = this.value;

    var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    if (XRegExp.test(testval, pattern)) {
        $('#maltitleerror').hide();
    } else {
        $('#maltitle').val('');
        $('#maltitleerror').slideDown("slow");
    }

});


$('#ensubtitle').on('change ', function(e) {
    var testval = this.value;
    var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    if (!tested.test(testval)) {
        $('#ensubtitle').val('');
        $('#subtitleerror').slideDown("slow");
    } else {
        $('#subtitleerror').hide();

    }

});

$('#malsubtitle').on('change ', function(e) {
    var testval = this.value;

    var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    if (XRegExp.test(testval, pattern)) {
        $('#malsubtitleerror').hide();
    } else {
        $('#malsubtitle').val('');
        $('#malsubtitleerror').slideDown("slow");
    }

});



$('#icon').on('change ', function(e) {
    var testval = this.value;
    var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    if (!tested.test(testval)) {
        $('#icon').val('');
        $('#iconerror').slideDown("slow");
    } else {
        $('#iconerror').hide();

    }

});
$('#maplink').on('change ', function(e) {
    var testval = this.value;
    // var tested = new RegExp('^[a-zA-Z0-9 \\:\\.\\?\\/\\=\\!\\%\\@\\- \s]+$');
    if (testval == '') {
        $('#maplink').val('');
        $('#maplinkerror').slideDown("slow");
    } else {
        $('#maplinkerror').hide();

    }

});
//validation alerts -stop

// save map details
$('#ajaxmodalform').on('submit', function(event) {
    event.preventDefault();
    var usertype = $("#usertypeid").val();
    var action_url = '';

    if (usertype == 3) {

        if ($('#action').val() == 'Add')
            action_url = "{{ route('siteadmin.addresswithmapstore') }}";

        if ($('#action').val() == 'Edit')
            action_url = "{{ route('siteadmin.addresswithmapstore') }}";

    } else if (usertype == 4) {

        if ($('#action').val() == 'Add')
            action_url = "{{ route('webadmin.addresswithmapstore') }}";

        if ($('#action').val() == 'Edit')
            action_url = "{{ route('webadmin.addresswithmapstore') }}";

    }



    $.ajax({
        url: action_url,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data) {
            var html = '';
            if (data.errors) {
                swal("Already a detail with same name exists");

            }
            if (data.success) {
                html = '<div class="alert alert-success">' + data.success + '</div>';
                $('#ajaxmodalform')[0].reset();
                swal("Data Added successfully.");
                window.location = "{{ route('siteadmin.addresswithmaplist') }}";
                // window.location.reload();
                //  $('#transactionmodal').modal('hide');
            }
        }
    });
});

$('#cancel_save').on('click', function(event) {
    // alert("ffff");
    window.location = "{{ route('siteadmin.addresswithmaplist') }}";
});
</script>
@endsection
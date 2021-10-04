@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
    <div class="row ">
        <div class="col-12 py-2  ">
            <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
                <ol class="breadcrumb justify-content-end px-3 pt-2">
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('deptassthome') }}"><i
                                class="fas fa-home"></i>&nbsp;Home</a></li>
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
            <div class="responsive">
                @if(isset($listdata))
                <form action="{{ route('deptasst.appdepartmentupdate') }}" id="ajaxmodalform" method="post"
                    class="form-horizontal">
                    @else
                    <form action="{{ route('deptasst.appdepartmentstore') }}" id="ajaxmodalform" method="post"
                        class="form-horizontal">
                        @endif
                        @csrf
                        <div class="modal-body adminpage">

                            <div id="form_section">

                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                            id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name"
                                            maxlength="250" minlength="3"
                                            value="@if(isset($listdata)) {{ $listdata->entitle }} @endif ">
                                        <input type="hidden" name="hidden_id" id="hidden_id"
                                            value="@if(isset($listdata)) {{ $listdata->id }} @endif ">
                                        <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters
                                            are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                            id="maltitle" name="maltitle" aria-describedby="HELPNAME"
                                            placeholder="Name in Malayalam" maxlength="250" minlength="3"
                                            value="@if(isset($listdata)) {{ $listdata->maltitle }} @endif ">
                                        <p id="maltitleerror" style=" color:#FF0000;"></p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">About </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                            id="enabout" name="enabout" aria-describedby="HELPNAME" placeholder="Name"
                                            maxlength="5000"
                                            minlength="3">@if(isset($listdata)) {{ strip_tags($listdata->enabout) }} @endif </textarea>
                                        <p id="enabouterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                            Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">About in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                            id="malabout" name="malabout" aria-describedby="HELPNAME"
                                            placeholder="Name in Malayalam" maxlength="10000"
                                            minlength="3">@if(isset($listdata)) {{ $listdata->malabout }} @endif </textarea>
                                        <p id="malabouterror" class="ErrP" style="color:#FF0000;"></p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Structure </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                            id="enstructure" name="enstructure" aria-describedby="HELPNAME"
                                            placeholder="Name" maxlength="5000"
                                            minlength="3">@if(isset($listdata)) {{ strip_tags($listdata->enstructure) }} @endif </textarea>
                                        <p id="enstructureerror" style="display:none; color:#FF0000;">Only A -Z a-z
                                            Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Structure in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                            id="malstructure" name="malstructure" aria-describedby="HELPNAME"
                                            placeholder="Name in Malayalam" maxlength="10000"
                                            minlength="3">@if(isset($listdata)) {{ $listdata->malstructure }} @endif </textarea>
                                        <p id="malstructureerror" style="color:#FF0000;"></p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Contact </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontact"
                                            name="encontact" aria-describedby="HELPNAME" placeholder="Name"
                                            maxlength="5000"
                                            minlength="3">@if(isset($listdata)) {{ strip_tags($listdata->encontact) }} @endif </textarea>
                                        <p id="encontacterror" style="display:none; color:#FF0000;">Only A -Z a-z
                                            Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Contact in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson"
                                            id="malcontact" name="malcontact" aria-describedby="HELPNAME"
                                            placeholder="Name in Malayalam" maxlength="10000"
                                            minlength="3">@if(isset($listdata)) {{ $listdata->malcontact }} @endif </textarea>
                                        <p id="malcontacterror" style="color:#FF0000;"></p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Related Links </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson"
                                            id="enrelatedlinks" name="enrelatedlinks" aria-describedby="HELPNAME"
                                            placeholder="Name" maxlength="5000"
                                            minlength="3">@if(isset($listdata)) {{ strip_tags($listdata->enrelatedlinks) }} @endif </textarea>
                                        <p id="enrelatedlinkserror" style="display:none; color:#FF0000;">Only A -Z a-z
                                            Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Related Links in
                                            Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson"
                                            id="malrelatedlinks" name="malrelatedlinks" aria-describedby="HELPNAME"
                                            placeholder="Name in Malayalam" maxlength="10000"
                                            minlength="3">@if(isset($listdata)) {{ strip_tags($listdata->malrelatedlinks) }} @endif </textarea>
                                        <p id="malrelatedlinkserror" style="color:#FF0000;"></p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Services </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                            id="enservices" name="enservices" aria-describedby="HELPNAME"
                                            placeholder="Name" maxlength="5000"
                                            minlength="3">@if(isset($listdata)) {{ strip_tags($listdata->enservices) }} @endif </textarea>
                                        <p id="enserviceserror" style="display:none; color:#FF0000;">Only A -Z a-z
                                            Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Services in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote"
                                            id="malservices" name="malservices" aria-describedby="HELPNAME"
                                            placeholder="Name in Malayalam" maxlength="10000"
                                            minlength="3">@if(isset($listdata)) {{ $listdata->malservices }} @endif </textarea>
                                        <p id="malserviceserror" style="color:#FF0000;"></p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->

                            </div> <!-- ./form_section -->

                        </div> <!-- ./modal-body -->
                        <div class="modal-footer modalover">

                            <button type="submit"
                                class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta btnsubmit"> <i
                                    class="fas fa-save"></i> &nbsp;@if(isset($listdata)) Update Changes @else Save
                                changes @endif</button>

                        </div> <!-- ./modal-footer  -->
                    </form>
            </div>
        </div> <!-- ./col12 -->
    </div> <!-- ./row -->
</div> <!-- ./container -->



@endsection

@section('customscripts')
<script>
$(document).ready(function() {
    // enstructure
    var enstructure = $('#enstructure').val();
    $('#enstructure').val(enstructure.replace(/&nbsp;/g, ''));

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#resposivetable').DataTable({
        responsive: true,
        aoColumnDefs: [{
            bSortable: false,
            aTargets: [-1]
        }]
    });

    $('.dob').inputmask("date", {
        mask: "1/2/y",
        placeholder: "dd-mm-yyyy",
        leapday: "-02-29",
        separator: "/",
        alias: "dd/mm/yyyy"
    });

    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],

        ],

    });

    $('#entitle').on('change ', function(e) {
        var testval = this.value;
        var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
        if (!tested.test(testval)) {
            $('#entitle').val('');

            $('#nameerror').slideDown("slow");

        } else {
            $('#nameerror').hide();

        }

    });

    $('#enabout').on('change ', function(e) {
        var testval = this.value;
        var tested = new RegExp('^[a-zA-Z0-9 \s\,\.\-]+$');
        if (!tested.test(testval)) {
            $('#enabout').val('');

            $('#enabouterror').slideDown("slow");

        } else {
            $('#enabouterror').hide();

        }

    });

    // $('#enstructure').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('[a-zA-Z0-9 \s\.\-\)\(\:\@\&\/\]+$');
    //     if (!tested.test(testval)) {
    //         $('#enstructure').val('');
    //         $('#enstructureerror').slideDown("slow");

    //     } else {
    //         $('#enstructureerror').hide();
    //     }

    // });

    $('#encontact').on('change ', function(e) {
        var testval = this.value;
        var tested = new RegExp('^[a-zA-Z0-9 \s\,\:\)\(\/\]+$');
        if (!tested.test(testval)) {
            $('#encontact').val('');

            $('#encontacterror').slideDown("slow");

        } else {
            $('#encontacterror').hide();

        }

    });


    $('#enrelatedlinks').on('change ', function(e) {
        var testval = this.value;
        var tested = new RegExp('^[a-zA-Z0-9 \s\.\,\:]+$');
        if (!tested.test(testval)) {
            $('#enrelatedlinks').val('');

            $('#enrelatedlinkserror').slideDown("slow");

        } else {
            $('#enrelatedlinkserror').hide();

        }

    });

    // $('#enservices').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#enservices').val('');

    //         $('#enserviceserror').slideDown("slow");

    //     } else {
    //         $('#enserviceserror').hide();

    //     }

    // });

    $(function() {
        $("#maltitle").keypress(function(e) {
            // alert("ddd")
            // $("#maltitleerror").html("");
            var keyCode = e.keyCode || e.which;

            $("#maltitleerror").html("");

            //Regex for Valid Characters i.e. Alphabets.
            // var regex = /^[A-Za-z]+$/;
            var regex = new XRegExp("^[\\p{InMalayalam} _.,]+$");
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#maltitleerror").html("Only Malayalam Characters and spaces are allowed.");
            }

            return isValid;
        });
    });

    $(function() {
        $("#malabout").keypress(function(e) {
            // alert("ddd")
            var keyCode = e.keyCode || e.which;

            $("#malabouterror").html("");

            //Regex for Valid Characters i.e. Alphabets.
            // var regex = /^[A-Za-z]+$/;
            var regex = new XRegExp("^[\\p{InMalayalam} _.,]+$");
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#malabouterror").html("Only Malayalam Characters and spaces are allowed.");
            }

            return isValid;
        });
    });

    $(function() {
        $("#malcontact").keypress(function(e) {
            // alert("ddd")
            // $("#malcontacterror").html("");
            var keyCode = e.keyCode || e.which;

            $("#malcontacterror").html("");

            //Regex for Valid Characters i.e. Alphabets.
            // var regex = /^[A-Za-z]+$/;
            var regex = new XRegExp("^[\\p{InMalayalam} _.,]+$");
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#malcontacterror").html("Only Malayalam Characters and spaces are allowed.");
            }

            return isValid;
        });
    });

    $(function() {
        $("#malrelatedlinks").keypress(function(e) {
            // alert("ddd")
            // $("#malcontacterror").html("");
            var keyCode = e.keyCode || e.which;

            $("#malrelatedlinkserror").html("");

            //Regex for Valid Characters i.e. Alphabets.
            // var regex = /^[A-Za-z]+$/;
            var regex = new XRegExp("^[\\p{InMalayalam} _.,]+$");
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#malrelatedlinkserror").html(
                    "Only Malayalam Characters and spaces are allowed.");
            }

            return isValid;
        });
    });

    $(function() {
        $("#malservices").keypress(function(e) {
            // alert("ddd")
            // $("#malcontacterror").html("");
            var keyCode = e.keyCode || e.which;

            $("#malserviceserror").html("");

            //Regex for Valid Characters i.e. Alphabets.
            // var regex = /^[A-Za-z]+$/;
            var regex = new XRegExp("^[\\p{InMalayalam} _.,]+$");
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#malserviceserror").html(
                    "Only Malayalam Characters and spaces are allowed.");
            }

            return isValid;
        });
    });
    $(function() {
        $("#malstructure").keypress(function(e) {
            // alert("ddd")
            // $("#malcontacterror").html("");
            var keyCode = e.keyCode || e.which;

            $("#malstructureerror").html("");

            //Regex for Valid Characters i.e. Alphabets.
            // var regex = /^[A-Za-z]+$/;
            var regex = new XRegExp("^[\\p{InMalayalam} _.,]+$");
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#malstructureerror").html(
                    "Only Malayalam Characters and spaces are allowed.");
            }

            return isValid;
        });
    });
    /*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
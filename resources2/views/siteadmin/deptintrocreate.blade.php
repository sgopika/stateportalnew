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
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('siteadminhome') }}"><i
                                class="fas fa-home"></i>&nbsp;Home</a></li>
                    @elseif(Auth::user()->usertypes_id==4)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i
                                class="fas fa-home"></i>&nbsp;Home</a></li>
                    @elseif(Auth::user()->usertypes_id==5)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('editorhome') }}"><i
                                class="fas fa-home"></i>&nbsp;Home</a></li>
                    @endif
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
                <form id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body adminpage">

                        <div id="form_section">

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">USER 1 </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">USER 2 </label>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Image </label>
                                    <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson"
                                        alt="Image" id="uploadedimage1">
                                    <input type="file" id="image1" name="image1" maxlength="1100">
                                    <p id="imageerror1" style="display:none; color:#FF0000;">
                                        Allowed Image Formats: .jpg, .png, .jpeg
                                    </p>
                                    <p id="imageerror2" style="display:none; color:#FF0000;" class="mal_xxxs">
                                        Allowed size 1 MB.
                                    </p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Image </label>
                                    <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson"
                                        alt="Image" id="uploadedimage2">
                                    <input type="file" id="image2" name="image2" maxlength="1100">
                                    <p id="imageerror3" style="display:none; color:#FF0000;">
                                        Allowed Image Formats: .jpg, .png, .jpeg
                                    </p>
                                    <p id="imageerror4" style="display:none; color:#FF0000;" class="mal_xxxs">
                                        Allowed size 1 MB.
                                    </p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext1"
                                        name="alttext1" aria-describedby="HELPNAME" placeholder="Alternative Text In English" maxlength="50"
                                        minlength="3" required value="Governor">
                                    <p id="alttexterror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext2"
                                        name="alttext2" aria-describedby="HELPNAME" placeholder="Alternative Text In Malayalam" maxlength="50"
                                        minlength="3" required value="Chief Minister">
                                    <p id="alttexterror2" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>

                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="name1"
                                        name="name1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50"
                                        minlength="3" required>
                                    <p id="nameerror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="name2"
                                        name="name2" aria-describedby="HELPNAME" placeholder="Name" maxlength="50"
                                        minlength="3" required>
                                    <p id="nameerror2" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in Malayalam</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malname1"
                                        name="malname1" aria-describedby="HELPNAME" placeholder="Name in Malayalam"
                                        maxlength="100" minlength="3" required>
                                    <p id="malnameerror1" style="display:none; color:#FF0000;">Only malyalam Characters are
                                        allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in Malayalam</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malname2"
                                        name="malname2" aria-describedby="HELPNAME" placeholder="Name in Malayalam"
                                        maxlength="100" minlength="3" required>
                                    <p id="malnameerror2" style="display:none; color:#FF0000;">Only malyalam Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Designation</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="desgn1"
                                        name="desgn1" aria-describedby="HELPNAME" placeholder="Enter the Designation"
                                        maxlength="50" minlength="3" required>
                                    <p id="desgnerror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Designation</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="desgn2"
                                        name="desgn2" aria-describedby="HELPNAME" placeholder="Enter the Designation"
                                        maxlength="50" minlength="3" required>
                                    <p id="desgnerror2" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Malayalam Designation</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="maldesgn1" name="maldesgn1" aria-describedby="HELPNAME"
                                        placeholder="Enter the Designation" maxlength="100" minlength="3" required>
                                    <p id="maldesgnerror1" style="display:none; color:#FF0000;">Only malyalam Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Malayalam Designation</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="maldesgn2" name="maldesgn2" aria-describedby="HELPNAME"
                                        placeholder="Enter the Designation" maxlength="100" minlength="3" required>
                                    <p id="maldesgnerror2" style="display:none; color:#FF0000;">Only malyalam Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle"
                                        name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="50"
                                        minlength="3" required value="Governor">
                                    <p id="entitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle"
                                        name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam"
                                        maxlength="100" minlength="3" required value="Chief Minister">
                                    <p id="maltitleerror" style="display:none; color:#FF0000;">Only malyalam Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Name"
                                        maxlength="50" minlength="3" required value="Governor">
                                    <p id="ensubtitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters
                                        are allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME"
                                        placeholder="Name in Malayalam" maxlength="100" minlength="3" required value="Chief Minister">
                                    <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only malyalam Characters
                                        are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="enbrief" name="enbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="enbrief" name="enbrief" aria-describedby="HELPNAME"
                                        maxlength="5000" minlength="3" required></textarea>
                                    <p id="brieferror" class='ErrP' style="display:none; color:#FF0000;">Only A -Z a-z
                                        Characters are allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief in Malayalam</label>
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malbrief" name="malbrief" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="malbrief" name="malbrief" aria-describedby="HELPNAME"
                                        maxlength="10000" minlength="3" required></textarea>
                                    <p id="contenterror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
                                        Characters are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="encontent" name="encontent" maxlength="5000"
                                        minlength="3" required></textarea>
                                    <p id="contenterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                        Characters are allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="malcontent" name="malcontent" maxlength="10000"
                                        minlength="3" required></textarea>
                                    <p id="contenterror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
                                        Characters are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="Name"
                                        maxlength="50" minlength="3" required>
                                    <p id="entooltiperror"  class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="maltooltip" name="maltooltip" aria-describedby="HELPNAME"
                                        placeholder="Name in Malayalam" maxlength="100" minlength="3" required>
                                    <p id="maltooltiperror"  class="ErrP" style="display:none; color:#FF0000;">Only malyalam Characters
                                        are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>
                                    <input type="checkbox" class="customform" id="homepagestatus" value="1"
                                        name="homepagestatus" required>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                        </div> <!-- ./form_section -->

                    </div> <!-- ./modal-body -->
                    <div class="modal-footer modalover">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" required />
                        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i
                                class="fas fa-save"></i> &nbsp;Save changes</button>
                                <button id="cancel_save" class="btn btn-sm btn-flat bg-lightBrown fg-darkCrimson"> <i
                                class="fa fa-ban"></i> &nbsp;Cancel</button>        
                                <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">

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

    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],

        ],
        height: 300
    });
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

    

    $('#image1').bind('change', function() {

        var ext = $('#image1').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $('#imageerror1').slideDown("slow");
            $('#imageerror2').slideUp("slow");
            $('#image1').val('');

        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#imageerror2').slideDown("slow");
                $('#image1').val('');

            } else {

                $('#imageerror2').slideUp("slow");
            }
            $('#imageerror1').slideUp("slow");
        }
    });


    $('#image2').bind('change', function() {

        var ext = $('#image2').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $('#imageerror3').slideDown("slow");
            $('#imageerror4').slideUp("slow");
            $('#image2').val('');

        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#imageerror4').slideDown("slow");
                $('#image2').val('');

            } else {

                $('#imageerror4').slideUp("slow");
            }
            $('#imageerror3').slideUp("slow");
        }
    });


    // $('#alttext1').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#alttext1').val('');
    //         $('#alttexterror1').slideDown("slow");
    //     } else {
    //         $('#alttexterror1').hide();

    //     }

    // });

    $('#alttext1').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            $('#alttexterror1').hide();
         

        } else {
           
            $('#alttext1').focus();
            $('#alttexterror1').slideDown("slow");
        }

    });

    // $('#alttext2').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#alttext2').val('');
    //         $('#alttexterror2').slideDown("slow");
    //     } else {
    //         $('#alttexterror2').hide();

    //     }

    // });
    $('#alttext2').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            $('#alttexterror2').hide();
         

        } else {
           
            $('#alttext2').focus();
            $('#alttexterror2').slideDown("slow");
        }

    });

    $('#name1').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            $('#nameerror1').hide();
         

        } else {
           
            $('#name1').focus();
            $('#nameerror1').slideDown("slow");
        }

    });

    // $('#name1').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9. \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#name1').val('');
    //         $('#nameerror1').slideDown("slow");
    //     } else {
    //         $('#nameerror1').hide();

    //     }

    // });
    $('#name2').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            $('#nameerror2').hide();
         

        } else {
           
            $('#name2').focus();
            $('#nameerror2').slideDown("slow");
        }

    });

    // $('#name2').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9. \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#name2').val('');
    //         $('#nameerror2').slideDown("slow");
    //     } else {
    //         $('#nameerror2').hide();

    //     }

    // });
   
    

    // $('#malname1').on('change ', function(e) {
    //     var testval = this.value;

    //     var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //     if (XRegExp.test(testval, pattern)) {
    //         // console.log("Valid");
    //         $('#malnameerror1').hide();
    //     } else {
    //         // console.log("not Valid");
    //         $('#malname1').val('');
    //         $('#malnameerror1').slideDown("slow");
    //     }

    // });

    $('#malname1').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#malnameerror1').hide();
     }
     else{         
         $('#malname1').focus();
         $('#malnameerror1').slideDown("slow");
     }

 });

 $('#malname2').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#malnameerror2').hide();
     }
     else{         
         $('#malname2').focus();
         $('#malnameerror2').slideDown("slow");
     }

 });


    // $('#malname2').on('change ', function(e) {
    //     var testval = this.value;

    //     var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //     if (XRegExp.test(testval, pattern)) {
    //         // console.log("Valid");
    //         $('#malnameerror2').hide();
    //     } else {
    //         // console.log("not Valid");
    //         $('#malname2').val('');
    //         $('#malnameerror2').slideDown("slow");
    //     }

    // });



    $('#desgn1').on('change ', function(e) {
        var testval = this.value;
        var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
        if (!tested.test(testval)) {
            $('#desgn1').val('');
            $('#desgnerror1').slideDown("slow");
        } else {
            $('#desgnerror1').hide();

        }

    });

    $('#desgn2').on('change ', function(e) {
        var testval = this.value;
        var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
        if (!tested.test(testval)) {
            $('#desgn2').val('');
            $('#desgnerror2').slideDown("slow");
        } else {
            $('#desgnerror2').hide();

        }

    });


    $('#maldesgn1').on('change ', function(e) {
        var testval = this.value;

        var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
        if (XRegExp.test(testval, pattern)) {
            // console.log("Valid");
            $('#maldesgnerror1').hide();
        } else {
            // console.log("not Valid");
            $('#maldesgn1').val('');
            $('#maldesgnerror1').slideDown("slow");
        }

    });


    $('#maldesgn2').on('change ', function(e) {
        var testval = this.value;

        var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
        if (XRegExp.test(testval, pattern)) {
            // console.log("Valid");
            $('#maldesgnerror2').hide();
        } else {
            // console.log("not Valid");
            $('#maldesgn2').val('');
            $('#maldesgnerror2').slideDown("slow");
        }

    });


    // $('#entooltip').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#entooltip').val('');
    //         $('#entooltiperror').slideDown("slow");
    //     } else {
    //         $('#entooltiperror').hide();
    //     }

    // });

    $('#entooltip').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){           
            $('#tooltiperror').hide();
        } else {
            $('#entooltip').focus();
            $('#tooltiperror').slideDown("slow");          

        }

    });
    
    $('#entitle').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            // $('#entooltip').val($('#entitle').val());
            $('#entitleerror').hide();
        }else{
            $('#entitle').focus();
            $('#entitleerror').slideDown("slow");
        }      

    });

    $('#name').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            // $('#entooltip').val($('#entitle').val());
            $('#nameerror').hide();
        }else{
            $('#name').focus();
            $('#nameerror').slideDown("slow");
        }      

    });

    $('#malname').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#malnameerror').hide();
     }
     else{         
         $('#malname').focus();
         $('#malnameerror').slideDown("slow");
     }

 });

 $('#malsubtitle').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#malsubtitleerror').hide();
     }
     else{         
         $('#malsubtitle').focus();
         $('#malsubtitleerror').slideDown("slow");
     }

 });

 $('#ensubtitle').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#ensubtitleerror').hide();
     }
     else{         
         $('#ensubtitle').focus();
         $('#ensubtitleerror').slideDown("slow");
     }

 });
    
    // $('#maltitle').on('change ', function(e) {
    //     var testval = this.value;

    //     var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //     if (XRegExp.test(testval, pattern)) {
    //         $('#maltitleerror').hide();
    //     } else {
    //         $('#maltitle').val('');
    //         $('#maltitleerror').slideDown("slow");
    //     }

    // });



    // $('#entitle').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#entitle').val('');
    //         $('#entitleerror').slideDown("slow");
    //     } else {
    //         $('#entitleerror').hide();

    //     }

    // });

    // $('#maltitle').on('change ', function(e) {
    //     var testval = this.value;

    //     var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //     if (XRegExp.test(testval, pattern)) {
    //         $('#maltitleerror').hide();
    //     } else {
    //         $('#maltitle').val('');
    //         $('#maltitleerror').slideDown("slow");
    //     }

    // });


    // $('#ensubtitle').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#ensubtitle').val('');
    //         $('#subtitleerror').slideDown("slow");
    //     } else {
    //         $('#subtitleerror').hide();

    //     }

    // });

    // $('#malsubtitle').on('change ', function(e) {
    //     var testval = this.value;

    //     var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //     if (XRegExp.test(testval, pattern)) {
    //         $('#malsubtitleerror').hide();
    //     } else {
    //         $('#malsubtitle').val('');
    //         $('#malsubtitleerror').slideDown("slow");
    //     }

    // });



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

    $('#ajaxmodalform').on('submit', function(event) {
        // alert($('#action').val());
        event.preventDefault();
        var formData = new FormData(this);
        var action_url = '';
        var utype = $("#usertypeid").val();
        // alert(utype);
        console.log(utype);
        if ($('#action').val() == 'Add') {
            if (utype == 4) {
                action_url = "{{ route('webadmin.deptintrostore') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.deptintrostore') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.deptintrostore') }}";
            }
        }


        if ($('#action').val() == 'Edit') {
            if (utype == 4) {
                action_url = "{{ route('webadmin.deptintroupdate') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.deptintroupdate') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.deptintroupdate') }}";
            }
        }


        $.ajax({
            url: action_url,
            method: "post",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                var html = '';
                if (data.errors) {
                    swal("Already a department with same name exists");

                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    swal("Data Added successfully.");
                    // $('#ajaxmodalform')[0].reset();
                    // window.location.reload();
                    window.location ="{{ route('siteadmin.deptintrolist') }}";
                    $('#transactionmodal').modal('hide');
                }
            }
        });
    });



    // $('#encontent').on('summernote.change', function(we, contents, $editable) {
    //     var textareaValue = $('#encontent').summernote('code');
    //     var charRegExp = /[@#$%^*()?!":{}|]/;
    //     var textareaValue1 = $('#encontent').summernote('code').replace(/(<([^>]+)>)/ig, "");
    //     if (charRegExp.test(textareaValue1)) {
    //         $('#encontent').summernote('undo');
    //         $(we.target).siblings(".ErrP").css("display", "block");
    //     } else {
    //         var str1 = textareaValue1;
    //         var str2 = "&lt;";
    //         var str3 = "&gt;";
    //         if (str1.indexOf(str2) != -1) {
    //             $('#encontent').summernote('undo');
    //             $(we.target).siblings(".ErrP").css("display", "block");

    //         } else {
    //             $(we.target).siblings(".ErrP").css("display", "none");
    //         }
    //     }


    // });

    // $('#malcontent').on('summernote.change', function(we, contents, $editable) {
    //     var textareaValue = $('#malcontent').summernote('code');
    //     var charRegExp = /[A-Za-z@#$%^*(?!"):{}|]/;
    //     var textareaValue1 = $('#malcontent').summernote('code').replace(/(<([^>]+)>)/ig, "");
    //     if (charRegExp.test(textareaValue1)) {
    //         $('#malcontent').summernote('undo');
    //         $(we.target).siblings(".ErrP").css("display", "block");
    //     } else {
    //         var str1 = textareaValue1;
    //         var str2 = "&lt;";
    //         var str3 = "&gt;";
    //         if (str1.indexOf(str2) != -1) {
    //             $('#malcontent').summernote('undo');
    //             $(we.target).siblings(".ErrP").css("display", "block");

    //         } else {
    //             $(we.target).siblings(".ErrP").css("display", "none");
    //         }
    //     }


    // });

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

$('#enbrief').on('summernote.change', function(we, contents, $editable) {
    var textareaValue = $('#enbrief').summernote('code');
    var retval=summernoteval('enbrief');
    if (retval) {
        $(we.target).siblings(".ErrP").css("display", "none");    
    } else {  
        $(we.target).siblings(".ErrP").css("display", "block");     
                
    }
});
$('#malbrief').on('summernote.change', function(we, contents, $editable) {
    var textareaValue = $('#malbrief').summernote('code');
    var retval=summernoteval('malbrief');
    if (retval) {
        $(we.target).siblings(".ErrP").css("display", "none");    
    } else {  
        $(we.target).siblings(".ErrP").css("display", "block");     
                
    }
});



    // $('#enbrief').on('summernote.change', function(we, contents, $editable) {
    //     var textareaValue = $('#enbrief').summernote('code');
    //     var charRegExp = /[@#$%^*()?!":{}|]/;
    //     var textareaValue1 = $('#enbrief').summernote('code').replace(/(<([^>]+)>)/ig, "");
    //     if (charRegExp.test(textareaValue1)) {
    //         $('#enbrief').summernote('undo');
    //         $(we.target).siblings(".ErrP").css("display", "block");
    //     } else {
    //         var str1 = textareaValue1;
    //         var str2 = "&lt;";
    //         var str3 = "&gt;";
    //         if (str1.indexOf(str2) != -1) {
    //             $('#enbrief').summernote('undo');
    //             $(we.target).siblings(".ErrP").css("display", "block");

    //         } else {
    //             $(we.target).siblings(".ErrP").css("display", "none");
    //         }
    //     }


    // });

    // $('#malbrief').on('summernote.change', function(we, contents, $editable) {
    //     var textareaValue = $('#malbrief').summernote('code');
    //     var charRegExp = /[A-Za-z@#$%^*(?!"):{}|]/;
    //     var textareaValue1 = $('#malbrief').summernote('code').replace(/(<([^>]+)>)/ig, "");
    //     if (charRegExp.test(textareaValue1)) {
    //         $('#malbrief').summernote('undo');
    //         $(we.target).siblings(".ErrP").css("display", "block");
    //     } else {
    //         var str1 = textareaValue1;
    //         var str2 = "&lt;";
    //         var str3 = "&gt;";
    //         if (str1.indexOf(str2) != -1) {
    //             $('#malbrief').summernote('undo');
    //             $(we.target).siblings(".ErrP").css("display", "block");

    //         } else {
    //             $(we.target).siblings(".ErrP").css("display", "none");
    //         }
    //     }


    // });



    /*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
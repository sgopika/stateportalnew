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
            <p class="py-1"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; Add New Portal </strong></p>
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
            {{-- <div class="modal-content">
                <div class="modal-header modalover">
                    <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel">
                        <i class="fab fa-wpforms"></i>&nbsp;Add New About Portal</p>
                </div> <!-- ./modal-header --> --}}
                <form id="ajaxmodalform" method="post" class="form-horizontal">
                    @csrf
                    <div class="modal-body adminpage">

                        <div id="form_section">
                            <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle"
                                        name="entitle" aria-describedby="HELPNAME" placeholder="English title"
                                        maxlength="500" minlength="3" required>
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
                                        name="maltitle" aria-describedby="HELPNAME" placeholder="Malayalam title"
                                        maxlength="1000" minlength="3" required>
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
                                        id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME"
                                        placeholder="English subtitle" maxlength="500" minlength="3" required>
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
                                        placeholder="Malayalam subtitle" maxlength="1000" minlength="3" required>
                                    <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                        are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->


                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-12 py-2">
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME"
                                        placeholder="Name" maxlength="30000" minlength="3"></textarea>
                                    <p id="encontenterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                        Characters are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam
                                        content.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-12 py-2">
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="malcontent" name="malcontent"
                                        aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="30000"
                                        minlength="3"></textarea>
                                    <p id="encontenterror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
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
                                        name="icon" aria-describedby="HELPNAME" placeholder="Icon class" required
                                        maxlength="150" minlength="3" value="fas fa-question-circle">
                                    <p id="iconerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Tooltip.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                        id="entooltip" name="entooltip" aria-describedby="HELPNAME"
                                        placeholder="English tooltip" maxlength="500" minlength="3" value="Portal Details" required>
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
                                        placeholder="Malayalam tooltip" maxlength="1000" minlength="3" value="പോർട്ടൽ വിശദാംശങ്ങൾ" required>
                                    <p id="maltooltiperror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                        are allowed.</p>
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


                        </div> <!-- ./form_section -->


                    </div> <!-- ./modal-body -->
                    <div class="modal-footer modalover">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i
                                class="fas fa-save"></i> &nbsp;Save Details</button>

                    </div> <!-- ./modal-footer  -->
                </form>
            {{-- </div> <!-- ./modal-content --> --}}
        </div> <!-- ./col12 -->
    </div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->





@endsection

@section('customscripts')
<script>
$(document).ready(function() {

    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],

        ],
        height:400
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



    $('#ajaxmodalform').on('submit', function(event) {
        event.preventDefault();
        var utype = $("#usertypeid").val();
        var action_url = '';

        if ($('#action').val() == 'Add') {
            if (utype == 4) {
                action_url = "{{ route('webadmin.aboutportalstore') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.aboutportalstore') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.aboutportalstore') }}";
            }
        }

        if ($('#action').val() == 'Edit') {
            if (utype == 4) {
                action_url = "{{ route('webadmin.aboutportalupdate') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.aboutportalupdate') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.aboutportalupdate') }}";
            }
        }

        $.ajax({
            url: action_url,
            method: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                var html = '';
                if (data.errors) {
                    swal("Warning",data.errors,"warning");

                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#ajaxmodalform')[0].reset();
                    swal("Success","Successfully Data Added");
                    window.location ="{{ route('siteadmin.aboutportallist') }}";
                }
            }
        });
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
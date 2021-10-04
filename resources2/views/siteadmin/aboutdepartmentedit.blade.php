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
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; About Department List </strong></p>
            <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
            <form id="ajaxmodalform" method="post" class="form-horizontal">
                @csrf
                <div class="modal-body adminpage">

                    <div id="form_section">
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle"
                                    name="entitle" aria-describedby="HELPNAME" value="{{$resultdata['entitle']}}" placeholder="English title"
                                    maxlength="1000" minlength="3" required>
                                <p id="entitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle"
                                    name="maltitle" aria-describedby="HELPNAME" value="{{$resultdata['maltitle']}}" placeholder="Malayalam title"
                                    maxlength="1000" minlength="3">
                                <p id="maltitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Sub
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME"
                                    placeholder="English subtitle" value="{{$resultdata['ensubtitle']}}" maxlength="1000" minlength="3" required>
                                <p id="ensubtitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters
                                    are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Sub
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME"
                                    placeholder="Malayalam subtitle" value="{{$resultdata['malsubtitle']}}" maxlength="1000" minlength="3" required>
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
                                    placeholder="Name" maxlength="30000" minlength="3">{{$resultdata['encontent']}}</textarea>
                                <p class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
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
                                    minlength="3">{{$resultdata['malcontent']}}</textarea>
                                <p class="ErrP" style="display:none; color:#FF0000;">Only Malayalam Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->


                        </div> <!-- ./row -->


                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon class </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the icon
                                    class.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon"
                                    name="icon" aria-describedby="HELPNAME" value="{{$resultdata['iconclass']}}" placeholder="Icon class" maxlength="150"
                                    minlength="2" required>
                                <p id="iconerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Tooltip.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="entooltip" value="{{$resultdata['entooltip']}}" name="entooltip" aria-describedby="HELPNAME"
                                    placeholder="English tooltip" maxlength="500" minlength="3" required>
                                <p id="entooltiperror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                    allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Tooltip.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="maltooltip" name="maltooltip" value="{{$resultdata['maltooltip']}}" aria-describedby="HELPNAME"
                                    placeholder="Malayalam tooltip" maxlength="1000" minlength="3">
                                <p id="maltooltiperror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                    are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-3 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-9 py-2">
                                <input type="checkbox" id="displaystatus" value="1" name="displaystatus">
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->


                    </div> <!-- ./form_section -->

                </div> <!-- ./modal-body -->
                <div class="modal-footer modalover">
                    <input type="hidden" name="action" id="action" value="Edit" />
                    <input type="hidden" name="hidden_id" id="hidden_id" value="{{$resultdata['id']}}" />
                    <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i
                            class="fas fa-save"></i> &nbsp;Save changes</button>
                </div> <!-- ./modal-footer  -->
            </form>
        </div>
        <!-- <div class="col-12 py-1">
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
        </div> -->

        
       
    </div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->
<!-- <div class="modal fade" id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel"
    aria-hidden="true"> -->
    <!-- <div class="modal-dialog modal-lg" role="document"> -->
        <!-- <div class="modal-content"> -->
            <!-- <div class="modal-header modalover">
                <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i
                        class="fab fa-wpforms"></i>&nbsp;Modal title</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  -->
            <!-- ./modal-header -->
            
        <!-- </div>  -->
        <!-- ./modal-content -->
    <!-- </div> -->
     <!-- ./modal-dialog -->
<!-- </div> -->
 <!-- ./modal -->


<div id="confirmModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
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
$(document).ready(function() {



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

    // $('.summernote').on('change ', function(e) {
    //     // alert("dddd");
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9<>/&;:,()- \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#encontent').focus();
    //         $('#encontenterror').slideDown("slow");
    //     } else {
    //         $('#encontenterror').hide();

    //     }

    // });


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



    $("#transactionbutton").click(function(event) {
        event.preventDefault();
        $('.modal-title').text('Add New Details');
        $('#actionbutton').val('Save Details');
        $('#action').val('Add');
        $('#ajaxformresults').html('');
        $("#transactionmodal").modal('show');


        $('#entooltip').val('');
        $('#maltooltip').val('');
        $('#entitle').val('');
        $('#maltitle').val('');
        $('#ensubtitle').val('');
        $('#malsubtitle').val('');
        $('#encontent').val('');
        $('#malcontent').val('');
        $('#icon').val('');

    });



    $('#ajaxmodalform').on('submit', function(event) {
        event.preventDefault();
        var action_url = '';
        ac_val = $('#action').val('Edit')
        var utype = $("#usertypeid").val();
        if ($('#action').val() == 'Add') {
            if (utype == 4) {
                action_url = "{{ route('webadmin.aboutdepartmentstore') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.aboutdepartmentstore') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.aboutdepartmentstore') }}";
            }
        }

        if ($('#action').val() == 'Edit') {
            console.log(ac_val)
            if (utype == 4) {
                action_url = "{{ route('webadmin.aboutdepartmentupdate') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.aboutdepartmentupdate') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.aboutdepartmentupdate') }}";
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
                    swal(data.success);
                    // window.history.go(-1);
                    window.location.href='/siteadmin/aboutdepartmentlist';
                    $('#transactionmodal').modal('hide');
                }
            }
        });
    });



    $(document).on('click', '.edit', function() {
        var id = $(this).attr('id');
        var utype = $("#usertypeid").val();
        var action_url1 = '';
        if (utype == 4) {
            action_url1 = "/webadmin/aboutdepartmentedit/" + id;

        } else if (utype == 3) {

            action_url1 = "/siteadmin/aboutdepartmentedit/" + id;
        } else if (utype == 5) {

            action_url1 = "/editor/aboutdepartmentedit/" + id;
        }
        $('#ajaxformresults').html('');
        $.ajax({
            url: action_url1,
            dataType: "json",
            success: function(data) {
                if (data.error) {
                    swal("The About department is Locked, So cannot be edited!");
                } else {

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

                    if (data.resultdata.homepagestatus == 1) {
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
            }
        })
    });

    $(document).on('click', '.active', function() {

        var id = $(this).attr('id');
        var utype = $("#usertypeid").val();
        var action_url2 = '';
        if (utype == 4) {
            action_url2 = "/webadmin/aboutdepartmentstatus/" + id;

        } else if (utype == 3) {

            action_url2 = "/siteadmin/aboutdepartmentstatus/" + id;
        } else if (utype == 3) {

            action_url2 = "/editor/aboutdepartmentstatus/" + id;
        }
        $.ajax({
            url: action_url2,
            dataType: "json",

            success: function(data) {
                if (data.error) {
                    //alert("Already an active Alert exists!!!");

                }
                if (data.success) {
                    window.location.reload();
                }


            }
        })
    });

    var element_id;

    $(document).on('click', '.delete', function() {
        element_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function() {
        var utype = $("#usertypeid").val();
        console.log(utype)
        var action_url3 = '';
        if (utype == 4) {
            action_url3 = "/webadmin/aboutportaldestroy/" + element_id;

        } else if (utype == 3) {

            action_url3 = "/siteadmin/aboutdepartmentdestroy/" + element_id;
        } else if (utype == 5) {

            action_url3 = "/editor/aboutportaldestroy/" + element_id;
        }
        $.ajax({
            url: action_url3,
            dataType: "json",

            success: function(data) {
                setTimeout(function() {
                    $('#confirmModal').modal('hide');
                    window.location.reload();
                    swal('Data Deleted');
                }, 200);
            }
        })
    });



    $(".close1").click(function() {
        $('#transactionmodal').modal('hide');

    });

    /*---------------------------------- End of Document Ready ---------------------------*/
});
$('.summernote').summernote({
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],

    ],
    height: 400
});
</script>
@endsection
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
                    @elseif(Auth::user()->usertypes_id==5)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('editorhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
                    @endif
                </ol>

            </nav>
        </div> <!-- col12 -->
        <div class="col-12 py-1">
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; Edit Long Alert </strong></p>
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
            <!-- <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs" id="transactionbutton" name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button> -->
            <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
            <!-- Button trigger modal -->
            <!-- <div class="modal-dialog modal-lg" role="document"> -->
            <form id="ajaxmodalform" method="post" class="form-horizontal">
                @csrf
                <div class="modal-body adminpage">

                    <div id="form_section">

                    <input type="hidden" name="rowid" id="rowid" value="{{$id}}">
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle"
                                    name="entitle" aria-describedby="HELPNAME" placeholder="English Title"
                                    maxlength="500" minlength="3" required>
                                <p id="titleerror" style="display:none; color:#FF0000;">A -Z a-z Characters,Numbers and special characters(like "",&()-$_=)
allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle"
                                    name="maltitle" aria-describedby="HELPNAME" placeholder="Malayalam Title"
                                    maxlength="500" minlength="3" required>
                                <p id="maltitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters Numbers and special characters(like "",&()-$_=) are
allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Sub
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME"
                                    placeholder="English Subtitle" maxlength="250" minlength="3" required>
                                <p id="subtitleerror" style="display:none; color:#FF0000;">A -Z a-z Characters,Numbers and special characters(like "",&()-$_=)
allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Sub
                                    Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson"
                                    id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME"
                                    placeholder="Malayalam subtitle" maxlength="250" minlength="3" required>
                                <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters Numbers and special characters(like "",&()-$_=) are
allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Brief.</small>
                            </div> <!-- ./col-md-6 -->
                            </div>
                            <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <!--  <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="enbrief" name="enbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="enbrief" name="enbrief" aria-describedby="HELPNAME"
                                    placeholder="Name" maxlength="5000" minlength="3"></textarea>
                                <p id="brieferror" class="ErrP" style="display:none; color:#FF0000;">A -Z a-z Characters,Numbers and special characters(like "",&()-$_=)
allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Malayalam Brief</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Brief.</small>
                            </div> <!-- ./col-md-6 -->
                            </div>
                            <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malbrief" name="malbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="malbrief" name="malbrief" aria-describedby="HELPNAME"
                                    placeholder="Name" maxlength="10000" minlength="3"></textarea>
                                <p id="brieferror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam Characters Numbers and special characters(like "",&()-$_=) are
allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->



                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
                            </div> <!-- ./col-md-6 -->
                            </div>
                            <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME"
                                    placeholder="Name" maxlength="5000" minlength="3"></textarea>
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
                            </div>
                            <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="malcontent" name="malcontent"
                                    aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="10000"
                                    minlength="3"></textarea>
                                <p id="brieferror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
                                    Characters are allowed.</p>
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
                            class="fas fa-save"></i> &nbsp;Save changes</button>
                    <button type="button" onclick="window.location='{{ URL::previous() }}'" class="btn btn-sm btn-flat eng_xxxs bg-lightBrown fg-darkCrimson"> <i class="fa fa-times"></i> &nbsp;Cancel</button>       

                </div> <!-- ./modal-footer  -->
            </form>
        </div> <!-- ./modal-dialog -->
    </div> <!-- ./col12 -->

</div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->
<!-- <div class="modal fade" id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true"> -->

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
        var id = $("#rowid").val();
        editdata(id);
        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],

            ],
            height: 300,

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
// validation start

        $('#size').on('change ', function(e) {
            var testval = this.value;
            var vald = numonly(testval);
            if (!vald) {
                $('#size').val('');
                $('#sizeerror').slideDown("slow");
            } else {
                $('#sizeerror').hide();

            }

        });

        $('#duration').on('change ', function(e) {
            var testval = this.value;
            var vald = numonly(testval);
            if (!vald) {
                $('#duration').val('');
                $('#durationerror').slideDown("slow");
            } else {
                $('#durationerror').hide();

            }

        });

        $('#alttext').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (!vald) {
                $('#alttext').val('');
                $('#alttexterror').slideDown("slow");
            } else {
                $('#alttexterror').hide();

            }

        });

            $('#entitle').on('change ', function(e) {
                var testval = this.value;
                var vald=entitleregex(testval);
          if(!vald){
                    $('#entitle').val('');
                    $('#titleerror').slideDown("slow");
                } else {
                    $('#titleerror').hide();

                }

            });

        $('#maltitle').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) { 
                $('#maltitleerror').hide();
            } else {
                $('#maltitle').val('');
                $('#maltitleerror').slideDown("slow");
            }

        });


        $('#ensubtitle').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (!vald) {
                $('#ensubtitle').val('');
                $('#subtitleerror').slideDown("slow");
            } else {
                $('#subtitleerror').hide();

            }

        });

        $('#malsubtitle').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {
                $('#malsubtitleerror').hide();
            } else {
                $('#malsubtitle').val('');
                $('#malsubtitleerror').slideDown("slow");
            }

        });

        $('#enbrief').on('summernote.change', function(we, contents, $editable) {
            var textareaValue = $('#enbrief').summernote('code');
            var retval = summernoteval('enbrief');
            if (retval) {
                $(we.target).siblings(".ErrP").css("display", "none");
            } else {
                $(we.target).siblings(".ErrP").css("display", "block");

            }


        });

        $('#malbrief').on('summernote.change', function(we, contents, $editable) {
            var textareaValue = $('#malbrief').summernote('code');
            var retval = summernoteval('malbrief');
            if (retval) {
                $(we.target).siblings(".ErrP").css("display", "none");
            } else {
                $(we.target).siblings(".ErrP").css("display", "block");

            }


        });


        $('#malcontent').on('summernote.change', function(we, contents, $editable) {
            var textareaValue = $('#malcontent').summernote('code');
            var retval = summernoteval('malcontent');
            if (retval) {
                $(we.target).siblings(".ErrP").css("display", "none");
            } else {
                $(we.target).siblings(".ErrP").css("display", "block");

            }
        });

        $('#encontent').on('summernote.change', function(we, contents, $editable) {
            var textareaValue = $('#encontent').summernote('code');
            var retval = summernoteval('encontent');
            if (retval) {
                $(we.target).siblings(".ErrP").css("display", "none");
            } else {
                $(we.target).siblings(".ErrP").css("display", "block");

            }
        });
// validation ends

        /*---------------------------------- End of Document Ready ---------------------------*/
    });
//   details of edit data start
function editdata(id)
{
    // alert(id);
    var action_url1 = '';
        var utype = $("#usertypeid").val();
        $('#ajaxformresults').html('');
        var action_url1 = '';
        var utype = $("#usertypeid").val();
        if (utype == 4) {
            action_url1 = "/webadmin/longalertedit/" + id
        } else if (utype == 3) {
            action_url1 = "/siteadmin/longalertedit/" + id
        } else if (utype == 5) {
            action_url1 = "/editor/longalertedit/" + id
        }
        $('#ajaxformresults').html('');
        $.ajax({
            url: action_url1,
            dataType: "json",
            success: function(data) {
                if (data.error) {
                    swal("The Shortalert is Locked, So cannot be edited!");
                } else {
                    $('#entooltip').val(data.resultdata.entooltip);
                    $('#maltooltip').val(data.resultdata.entooltip);
                    $('#entitle').val(data.resultdata.entitle);
                    $('#maltitle').val(data.resultdata.maltitle);
                    $('#ensubtitle').val(data.resultdata.ensubtitle);
                    $('#malsubtitle').val(data.resultdata.malsubtitle);
                    /*$('#encontent').val(data.resultdata.encontent);
                    $('#malcontent').val(data.resultdata.malcontent);*/
                    $('#encontent').summernote('code', data.resultdata.encontent);
                    $('#malcontent').summernote('code', data.resultdata.malcontent);

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
}
// details of edit data stop
    // edit details start
    $('#ajaxmodalform').on('submit', function(event) {
        event.preventDefault();
        var utype = $("#usertypeid").val();
        var action_url = '';

            if (utype == 4) {
                action_url = "{{ route('webadmin.longalertupdate') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.longalertupdate') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.longalertupdate') }}";
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
                    swal("Updated Sucessfully")
                        .then((value) => {
                         $('#ajaxmodalform')[0].reset();
                         window.location.href='/siteadmin/longalertlist';
                        });
                }
            }
        });
    });

    // edit details stop
</script>
@endsection
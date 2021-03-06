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
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp;Long Alerts </strong></p>
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
            <!-- <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs" id="transactionbutton"
                name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New modal</button> -->
                <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs" id="addnew"
                name="addnew"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
            <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
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
                            <td><span class="eng_xxxxs"> {{ $res->entitle }}
                                    <hr class="py-1"> {{ $res->maltitle }}
                                </span> </td>
                            <td><span class="eng_xxxxs"> {{ $res->ensubtitle }}
                                    <hr class="py-1"> {{ $res->malsubtitle }}
                                </span> </td>

                            <td><span class="active" id="{{ $res->id }}"> @if($res->status==1)<i
                                        class="fas fa-check-square"></i>@elseif($res->status==2) <i
                                        class="fas fa-window-close fg-darkTaupe"></i>@endif </span></td>
                            <td>
                                @if($res->contributor_status==2)
                                Moderator : <span class="eng_xxxxs text-danger"> {{ $res->moderator_remarks }}
                                </span><br>
                                @if(isset($res->approve_remarks)) Publisher : <span class="eng_xxxxs text-danger">
                                    {{ $res->approve_remarks }} </span>@endif
                                <hr class="py-1">
                                @endif

                                <div class="btn-group" role="group" aria-label="Actionbuttons">

                                    <button type="button"
                                        class="edit btn btn-sm bg-lightBrown fg-darkCrimson eng_xxxxs " name="edit"
                                        id="{{ $res->id }}" data-toggle="tooltip" data-placement="top" title="Edit"> <i
                                            class="fas fa-pencil-alt"></i>&nbsp;Edit</button>
                                    <button type="button" class="delete btn btn-sm bg-darkBrown fg-lightGray eng_xxxxs"
                                        name="delete" id="{{ $res->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
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
<div class="modal fade" id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header modalover">
                <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i
                        class="fab fa-wpforms"></i>&nbsp;Modal title</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- ./modal-header -->
            <form id="ajaxmodalform" method="post" class="form-horizontal">
                @csrf
                <div class="modal-body adminpage">

                    <div id="form_section">


                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle"
                                    name="entitle" aria-describedby="HELPNAME" placeholder="English Title"
                                    maxlength="250" minlength="3" required>
                                <p id="titleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
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
                                    maxlength="250" minlength="3" required>
                                <p id="maltitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters are
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
                                <p id="subtitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
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
                                <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                    are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>
                                <span style="color:red">*</span>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Brief.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <!--  <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="enbrief" name="enbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="enbrief" name="enbrief" aria-describedby="HELPNAME"
                                    placeholder="Name" maxlength="5000" minlength="3"></textarea>
                                <p id="brieferror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                    Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Malayalam Brief</label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                    Brief.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malbrief" name="malbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                <textarea class="summernote" id="malbrief" name="malbrief" aria-describedby="HELPNAME"
                                    placeholder="Name" maxlength="10000" minlength="3"></textarea>
                                <p id="brieferror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
                                    Characters are allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->



                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
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
                            <div class="col-md-6 py-2">
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

                </div> <!-- ./modal-footer  -->
            </form>
        </div> <!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->


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

    $('#resposivetable').DataTable({
        responsive: true,
        aoColumnDefs: [{
            bSortable: false,
            aTargets: [-1]
        }]
    });
    $('#entitle').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            $('#entooltip').val($('#entitle').val());
            $('#titleerror').hide();
        }else{
            $('#entitle').val('');
            $('#titleerror').slideDown("slow");
        }      

    });

    // $('#entitle').on('change ', function(e) {
    //     var testval = this.value;
    //     var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //     if (!tested.test(testval)) {
    //         $('#entitle').val('');
    //         $('#titleerror').slideDown("slow");
    //     } else {
    //         $('#titleerror').hide();

    //     }

    // });
    $('#maltitle').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#maltitleerror').hide();
     }
     else{         
         $('#maltitle').val('');
         $('#maltitleerror').slideDown("slow");
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
    $('#ensubtitle').on('change ', function(e) {
        var testval = this.value;
        var vald=entitleregex(testval);
        if(vald){
            // $('#ensubtitle').val($('#entitle').val());
            $('#subtitleerror').hide();
        }else{
            $('#ensubtitle').val('');
            $('#subtitleerror').slideDown("slow");
        }      

    });

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
    $('#malsubtitle').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#malsubtitleerror').hide();
     }
     else{         
         $('#malsubtitle').val('');
         $('#malsubtitleerror').slideDown("slow");
     }

 });





    $("#transactionbutton").click(function(event) {
        event.preventDefault();
        $('.modal-title').text('Add New Details');
        $('#actionbutton').val('Save Details');
        $('#action').val('Add');
        $('#ajaxformresults').html('');
        $("#transactionmodal").modal('show');
    });

    $("#addnew").click(function(event){
        event.preventDefault();
        window.location.href='/siteadmin/addlongalertlist';
    });
    
    $(".edit").click(function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        // alert(id);
        window.location.href='/siteadmin/editlongalertlist/'+id;
    });

    // $('#ajaxmodalform').on('submit', function(event) {
    //     event.preventDefault();
    //     var utype = $("#usertypeid").val();
    //     var action_url = '';
    //     if ($('#action').val() == 'Add') {
    //         if (utype == 4) {
    //             action_url = "{{ route('webadmin.longalertstore') }}";
    //         } else if (utype == 3) {
    //             action_url = "{{ route('siteadmin.longalertstore') }}";
    //         } else if (utype == 5) {
    //             action_url = "{{ route('editor.longalertstore') }}";
    //         }
    //     }

    //     if ($('#action').val() == 'Edit') {
    //         if (utype == 4) {
    //             action_url = "{{ route('webadmin.longalertupdate') }}";
    //         } else if (utype == 3) {
    //             action_url = "{{ route('siteadmin.longalertupdate') }}";
    //         } else if (utype == 5) {
    //             action_url = "{{ route('editor.longalertupdate') }}";
    //         }
    //     }


    //     $.ajax({
    //         url: action_url,
    //         method: "post",
    //         data: $(this).serialize(),
    //         dataType: "json",
    //         success: function(data) {
    //             var html = '';
    //             if (data.errors) {
    //                 swal("Already a detail with same name exists");

    //             }
    //             if (data.success) {
    //                 html = '<div class="alert alert-success">' + data.success + '</div>';
    //                 $('#ajaxmodalform')[0].reset();
    //                 swal("Sucessfully updated");
    //                 window.location.reload();
    //                 $('#transactionmodal').modal('hide');
    //             }
    //         }
    //     });
    // });



    // $(document).on('click', '.edit', function() {
    //     var id = $(this).attr('id');
    //     $('#ajaxformresults').html('');
    //     var action_url1 = '';
    //     var utype = $("#usertypeid").val();
    //     if (utype == 4) {
    //         action_url1 = "/webadmin/longalertedit/" + id
    //     } else if (utype == 3) {
    //         action_url1 = "/siteadmin/longalertedit/" + id
    //     } else if (utype == 5) {
    //         action_url1 = "/editor/longalertedit/" + id
    //     }
    //     $.ajax({
    //         url: action_url1,
    //         dataType: "json",
    //         success: function(data) {
    //             if (data.error) {
    //                 swal("The Longalert is Locked, So cannot be edited!");
    //             } else {

    //                 $('#entitle').val(data.resultdata.entitle);
    //                 $('#maltitle').val(data.resultdata.maltitle);
    //                 $('#ensubtitle').val(data.resultdata.ensubtitle);
    //                 $('#malsubtitle').val(data.resultdata.malsubtitle);
    //                 /*$('#enbrief').val(data.resultdata.enbrief);
    //                 $('#malbrief').val(data.resultdata.malbrief);*/
    //                 $('#enbrief').summernote('code', data.resultdata.enbrief);
    //                 $('#malbrief').summernote('code', data.resultdata.malbrief);
    //                 /*$('#encontent').val(data.resultdata.encontent);
    //                 $('#malcontent').val(data.resultdata.malcontent);*/
    //                 $('#encontent').summernote('code', data.resultdata.encontent);
    //                 $('#malcontent').summernote('code', data.resultdata.malcontent);


    //                 if (data.resultdata.homepagestatus == 1) {
    //                     $('#displaystatus').prop('checked', true);
    //                 } else {
    //                     $('#displaystatus').prop('checked', false);
    //                 }


    //                 $('#hidden_id').val(id);
    //                 $('.modal-title').text('Edit Details');
    //                 $('#actionbutton').val('Update Details');
    //                 $('#action').val('Edit');
    //                 $('#transactionmodal').modal('show');
    //             }
    //         }
    //     })
    // });

    $(document).on('click', '.active', function() {

        var id = $(this).attr('id');
        var action_url2 = '';
        var utype = $("#usertypeid").val();
        if (utype == 4) {
            action_url2 = "/webadmin/longalertstatus/" + id
        } else if (utype == 3) {
            action_url2 = "/siteadmin/longalertstatus/" + id
        } else if (utype == 5) {
            action_url2 = "/editor/longalertstatus/" + id
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
        var action_url3 = '';
        var utype = $("#usertypeid").val();
        if (utype == 4) {
            action_url3 = "/webadmin/longalertdestroy/" + element_id
        } else if (utype == 3) {
            action_url3 = "/siteadmin/longalertdestroy/" + element_id
        } else if (utype == 5) {
            action_url3 = "/editor/longalertdestroy/" + element_id
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



    /*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
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
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; What's New </strong></p>
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
            <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs" id="transactionbutton"
                name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
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
                            <td><span class="eng_xxxxs"> {{ $res->entitle }}<br>
                                    <span class="py-1"> {{ $res->maltitle }}</span>
                                </span> </td>
                            <td><span class="eng_xxxxs"> {{ $res->ensubtitle }}<br>
                                    <span class="py-1"> {{ $res->malsubtitle }}</span>
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
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],

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



    $('#entooltip').on('change ', function(e) {
        var testval = this.value;
        var vald = entitleregex(testval);
        // alert(vald);
        if (!vald) {
            $('#entooltip').val('');
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
            $('#maltooltip').val('');
            $('#maltooltiperror').slideDown("slow");
        }

    });



    $('#entitle').on('change ', function(e) {
        var testval = this.value;
        var vald = entitleregex(testval);
        if (!vald) {
            $('#entitle').val('');
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



    $('#icon').on('change ', function(e) {
        var testval = this.value;
        var vald = entitleregex(testval);
        if (!vald) {
            $('#icon').val('');
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
        // $("#transactionmodal").modal('show');
        window.location.href='/siteadmin/addwhatisnewlist';




    });



    $('#ajaxmodalform').on('submit', function(event) {
        event.preventDefault();
        var action_url = '';
        var utype = $("#usertypeid").val();
        if ($('#action').val() == 'Add') {
            if (utype == 4) {
                action_url = "{{ route('webadmin.whatisnewstore') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.whatisnewstore') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.whatisnewstore') }}";
            }
        }


        // if ($('#action').val() == 'Edit') {
        //     if (utype == 4) {
        //         action_url = "{{ route('webadmin.whatisnewupdate') }}";
        //     } else if (utype == 3) {
        //         action_url = "{{ route('siteadmin.whatisnewupdate') }}";
        //     } else if (utype == 5) {
        //         action_url = "{{ route('editor.whatisnewupdate') }}";
        //     }
        // }


        $.ajax({
            url: action_url,
            method: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                var html = '';
                console.log(data);
                if (data.errors) {
                    swal("Warning", data.errors, "warning");

                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    swal("Updated Sucessfully");
                    $('#ajaxmodalform')[0].reset();
                    window.location.reload();
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
            action_url1 = "/webadmin/whatisnewedit/" + id;

        } else if (utype == 3) {

            action_url1 = "/siteadmin/whatisnewedit/" + id;
        } else if (utype == 5) {

            action_url1 = "/editor/whatisnewedit/" + id;
        }
        window.location.href=action_url1;

        // $('#ajaxformresults').html('');
        // $.ajax({
        //     url: action_url1,
        //     dataType: "json",
        //     success: function(data) {
        //         if (data.error) {
        //             swal("The What's New is Locked, So cannot be edited!");
        //         } else {
        //             // swal("Updated Sucessfully");
        //             $('#entooltip').val(data.resultdata.entooltip);
        //             $('#maltooltip').val(data.resultdata.maltooltip);
        //             $('#entitle').val(data.resultdata.entitle);
        //             $('#maltitle').val(data.resultdata.maltitle);
        //             $('#ensubtitle').val(data.resultdata.ensubtitle);
        //             $('#malsubtitle').val(data.resultdata.malsubtitle);
        //             /*$('#encontent').val(data.resultdata.encontent);
        //             $('#malcontent').val(data.resultdata.malcontent);*/
        //             $('#encontent').summernote('code', data.resultdata.encontent);
        //             $('#malcontent').summernote('code', data.resultdata.malcontent);
        //             $('#icon').val(data.resultdata.iconclass);

        //             if (data.resultdata.homepagestatus == 1) {
        //                 $('#displaystatus').prop('checked', true);
        //             } else {
        //                 $('#displaystatus').prop('checked', false);
        //             }


        //             $('#hidden_id').val(id);
        //             $('.modal-title').text('Edit Details');
        //             $('#actionbutton').val('Update Details');
        //             $('#action').val('Edit');
        //             $('#transactionmodal').modal('show');
        //         }
        //     }
        // })
    });

    $(document).on('click', '.active', function() {

        var id = $(this).attr('id');
        var utype = $("#usertypeid").val();
        var action_url2 = '';
        if (utype == 4) {
            action_url2 = "/webadmin/whatisnewstatus/" + id;

        } else if (utype == 3) {

            action_url2 = "/siteadmin/whatisnewstatus/" + id;
        } else if (utype == 3) {

            action_url2 = "/editor/whatisnewstatus/" + id;
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
        // $('#confirmModal').modal('show');
        // alert(element_id)
        var utype = $("#usertypeid").val();
        var action_url3 = '';
        if (utype == 4) {
            action_url3 = "/webadmin/whatisnewdestroy/" + element_id;

        } else if (utype == 3) {

            action_url3 = "/siteadmin/whatisnewdestroy/" + element_id;
        } else if (utype == 5) {

            action_url3 = "/editor/whatisnewdestroy/" + element_id;
        }
        swal({
            text: "Do you want to delete ?",
            buttons: ["No", "Yes"]

        }).then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    url: action_url3,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        if (data) {
                            swal("Deleted successfully!!");
                            window.location.reload();


                        }

                    },

                }); //ajax
            } else {
                // location.reload(); 
            }
        });

    });

    // $('#ok_button').click(function() {
    //     var utype = $("#usertypeid").val();
    //     var action_url3 = '';
    //     if (utype == 4) {
    //         action_url3 = "/webadmin/whatisnewdestroy/" + element_id;

    //     } else if (utype == 3) {

    //         action_url3 = "/siteadmin/whatisnewdestroy/" + element_id;
    //     } else if (utype == 5) {

    //         action_url3 = "/editor/whatisnewdestroy/" + element_id;
    //     }
    //     $.ajax({
    //         url: action_url3,
    //         dataType: "json",

    //         success: function(data) {
    //             setTimeout(function() {
    //                 $('#confirmModal').modal('hide');
    //                 window.location.reload();
    //                 alert('Data Deleted');
    //             }, 200);
    //         }
    //     })
    // });



    $(".close1").click(function() {
        $('#transactionmodal').modal('hide');

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

    $('#malcontent').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#malcontent').summernote('code');
        var retval = summernoteval('malcontent');
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
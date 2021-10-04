@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
    <div class="row ">
        <div class="col-12 py-2  ">
            <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
                <ol class="breadcrumb justify-content-end px-3 pt-2">
                    @if(Auth::user()->usertypes_id==2)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('siteadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
                    
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
        <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">


                <form id="ajaxmodalform" method="post" class="form-horizontal">
                    @csrf
                    <div class="modal-body adminpage">

                        <div id="form_section">


                            
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="English title" required maxlength="500" minlength="3">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Malayalam title" required maxlength="1000" minlength="3">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="English subtitle" maxlength="500" minlength="3">
                                    <p id="subtitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam Sub
                                        Title.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Malayalam subtitle" maxlength="1000" minlength="3">
                                    <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                        are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->


                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
                                
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="30000" minlength="3"></textarea>
                                    <p id="encontenterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                        Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam
                                        content.</small><textarea class="summernote" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="30000" minlength="3"></textarea>
                                    <p id="malcontenterror" class="ErrP" style="display:none; color:#FF0000;">Only Malayalam
                                        Characters
                                        are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            


                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the icon
                                        class.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon" name="icon" aria-describedby="HELPNAME" placeholder="Icon class" maxlength="150" minlength="3">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="English tooltip" maxlength="500" minlength="3" required value="What's New">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip" name="maltooltip" aria-describedby="HELPNAME" placeholder="Malayalam tooltip" required maxlength="1000" minlength="3" value="എന്താണ് പുതിയത്?">
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
                        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save</button>

                    </div>
                </form>
        </div>
    </div>
</div>



@endsection

@section('customscripts')
<script>
    $(document).ready(function() {

        $('#icon').val('fas fa-question-circle')

        $('.summernote').summernote({
            height: 300,
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
            $("#transactionmodal").modal('show');




        });



        $('#ajaxmodalform').on('submit', function(event) {
            event.preventDefault();
            var action_url = '';
            var utype = $("#usertypeid").val();
            if ($('#action').val() == 'Add') {
                if (utype == 4) {
                    action_url = "{{ route('webadmin.whatisnewstore') }}";
                } else if (utype == 2) {
                    action_url = "{{ route('siteadmin.whatisnewstore') }}";
                }
            }


            if ($('#action').val() == 'Edit') {
                if (utype == 4) {
                    action_url = "{{ route('webadmin.whatisnewupdate') }}";
                } else if (utype == 2) {
                    action_url = "{{ route('siteadmin.whatisnewupdate') }}";
                } 
            }


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
                        swal("Updated Sucessfully")
                        .then((value) => {
                         $('#ajaxmodalform')[0].reset();
                         window.location.href='/siteadmin/whatisnewlist';
                        });
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

            } else if (utype == 2) {

                action_url1 = "/siteadmin/whatisnewedit/" + id;
            } 
            $('#ajaxformresults').html('');
            $.ajax({
                url: action_url1,
                dataType: "json",
                success: function(data) {
                    if (data.error) {
                        swal("The What's New is Locked, So cannot be edited!");
                    } else {
                        // swal("Updated Sucessfully");
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
                action_url2 = "/webadmin/whatisnewstatus/" + id;

            } else if (utype == 2) {

                action_url2 = "/siteadmin/whatisnewstatus/" + id;
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

            } else if (utype == 2) {

                action_url3 = "/siteadmin/whatisnewdestroy/" + element_id;
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
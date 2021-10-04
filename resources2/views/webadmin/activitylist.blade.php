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
        <div class="col-12 py-1 px-2 ">
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; Activity List </strong></p>
        </div> <!-- ./col12 -->
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
            <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs" id="transactionbutton" name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
            <input type="hidden" id="usertypeid" name="usertypeid" value="{{ Auth::user()->usertypes_id }}">
            <!-- Button trigger modal -->

        </div> <!-- ./col12 -->
        <div class="col-12 py-1">
            <div class="responsive">
                <table class="table table-stripped table-sm table-hover box-shadow--6dp" id="resposivetable">
                    <thead class="eng_xxxs thlist">
                        <tr class="bg-teal">
                            <th>#</th>
                            <th>Title</th>
                            <th>Title in Malayalam</th>
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
                            <td><span class="eng_xxxxs"> {{ $res->entitle }} </span> </td>
                            <td><span class="eng_xxxxs"> {{ $res->maltitle }} </span> </td>

                            <td><span class="active" id="{{ $res->id }}"> @if($res->status==1)<i class="fas fa-check-square"></i>@elseif($res->status==2) <i class="fas fa-window-close fg-darkTaupe"></i>@endif </span></td>
                            <td>
                                @if($res->contributor_status==2)
                                Moderator : <span class="eng_xxxxs text-danger"> {{ $res->moderator_remarks }}
                                </span><br>
                                @if(isset($res->approve_remarks)) Publisher : <span class="eng_xxxxs text-danger">
                                    {{ $res->approve_remarks }} </span>@endif
                                <hr class="py-1">
                                @endif
                                <div class="btn-group" role="group" aria-label="Actionbuttons">

                                    <button type="button" class="edit btn btn-sm bg-lightBrown fg-darkCrimson eng_xxxxs " name="edit" id="{{ $res->id }}" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="fas fa-pencil-alt"></i>&nbsp;Edit</button>
                                    <button type="button" class="delete btn btn-sm bg-darkBrown fg-lightGray eng_xxxxs" name="delete" id="{{ $res->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
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


    $('#enbrief1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#enbrief1').summernote('code');
        var retval=summernoteval('enbrief1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }


    });
    $('#malbrief1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#malbrief1').summernote('code');
        var retval=summernoteval('malbrief1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }



    });
    $('#encontent1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#encontent1').summernote('code');
        var retval=summernoteval('encontent1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }



    });
    $('#malcontent1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#malcontent1').summernote('code');
        var retval=summernoteval('malcontent1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }


    });




    // $('.summernote').summernote({
    //   callbacks: {
    //     onChange: function(contents, $editable) {
    //         // var textareaValue = $('.summernote').summernote('code');
    //         var charRegExp  = /[@#$%^*()?!":{}|]/;
    //         //  var charRegExp  = /\B@(\w*)$/;
    //         //  var charRegExp  = /\B\w[@#$%^*()?":{}|]/g;
    //         var textareaValue1 = $('.summernote').summernote('code').replace(/(<([^>]+)>)/ig, "");
    //         // var isValid = charRegExp.test(textareaValue1);
    //         if (charRegExp.test(textareaValue1)) {  


    //           $('.summernote').summernote('undo');
    //           $(".summernote").summernote({placeholder: 'type starting with : and any alphabet'});


    //         } else {
    //             var str1 = textareaValue1;
    //             var str2 = "&lt;";
    //             var str3 = "&gt;";
    //             if(str1.indexOf(str2) != -1){
    //               $('.summernote').summernote('undo');
    //               $(".summernote").summernote({placeholder: 'type starting with : and any alphabet'});
    //               // $(".summernote").summernote("placeholder","sss");

    //             }else{
    //                 //  $('#summernote-en-error').html('');      
    //             }  
    //         }
    //     }
    //   }

    // });
    $(document).ready(function() {

        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],

            ],
            height:300
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
        $('#title').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#title').val('');

                $('#titleerror').slideDown("slow");

            } else {
                $('#titleerror').hide();

            }

        });
        $('#entitle1').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#entitle1').val('');

                $('#titleerror1').slideDown("slow");

            } else {
                $('#titleerror1').hide();

            }

        });

        $('#ensubtitle').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#ensubtitle').val('');

                $('#subtitleerror').slideDown("slow");

            } else {
                $('#subtitleerror').hide();

            }

        });

        $('#ensubtitle1').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#ensubtitle1').val('');

                $('#subtitleerror1').slideDown("slow");

            } else {
                $('#subtitleerror1').hide();

            }

        });


        $('#enauthor').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#enauthor').val('');

                $('#authorerror').slideDown("slow");

            } else {
                $('#authorerror').hide();

            }

        });

        $('#enauthor1').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#enauthor1').val('');

                $('#authorerror1').slideDown("slow");

            } else {
                $('#authorerror1').hide();

            }

        });

        $('#enbrief1').on('change ', function(e) {
            var textareaValue = $('#enbrief1').summernote('code');
            var retval=summernoteval('enbrief1');
            if (retval) {
                $(we.target).siblings(".ErrP").css("display", "none");    
            } else {  
                $(we.target).siblings(".ErrP").css("display", "block");     
                        
            }

        });

    
        $('#entooltip').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#entooltip').val('');

                $('#tooltiperror').slideDown("slow");

            } else {
                $('#tooltiperror').hide();

            }

        });

        $('#entooltip1').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(!vald){
                $('#entooltip1').val('');

                $('#tooltiperror1').slideDown("slow");

            } else {
                $('#tooltiperror1').hide();
            }

        });


        $('#alttext').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(vald){                
                $('#alttexterror').hide();
            } else {
              
                $('#alttext').val('');
                $('#alttexterror').slideDown("slow");

            }

        });

        $('#alttext1').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(vald){
                $('#alttexterror1').hide();

            } else {
                $('#alttext1').val('');
                $('#alttexterror1').slideDown("slow");
                

            }

        });

        $('#extras').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(vald){
                $('#extraserror').hide();
               

            } else {
                $('#extras').val('');
                $('#extraserror').slideDown("slow");

            }

        });

        $('#extras1').on('change ', function(e) {
            var testval = this.value;
            var vald=entitleregex(testval);
            if(vald){
                $('#extraserror1').hide();

            } else {
                $('#extras1').val('');
                $('#extraserror1').slideDown("slow");
                
            }

        });

        //////////////////////////////////////////////
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
        $('#maltooltip1').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {  
                $('#maltooltiperror1').hide();
            } else {
                $('#maltooltip1').val('');
                $('#maltooltiperror1').slideDown("slow");
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
        $('#maltitle1').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {  
                $('#maltitleerror1').hide();
            } else {
                $('#maltitle1').val('');
                $('#maltitleerror1').slideDown("slow");
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
        $('#malsubtitle1').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {  
                $('#malsubtitleerror1').hide();
            } else {
                $('#malsubtitle1').val('');
                $('#malsubtitleerror1').slideDown("slow");
            }

        });

        $('#malauthor').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {  
                $('#malauthorerror').hide();
            } else {
                $('#malauthor').val('');
                $('#malauthorerror').slideDown("slow");
            }

        });

        $('#malauthor1').on('change ', function(e) {
            var testval = this.value;

            var tested = maltitleregex(testval);
            if (tested) {  
                $('#malauthorerror1').hide();
            } else {
                $('#malauthor1').val('');
                $('#malauthorerror1').slideDown("slow");
            }

        });
        /////////////////////////////////////////////

        $('#image').bind('change', function() {

            var ext = $('#image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                $('#imageerror').slideDown("slow");
                $('#imageerror1').slideUp("slow");
                $('#image').val('');

            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#imageerror1').slideDown("slow");
                    $('#image').val('');

                } else {

                    $('#imageerror1').slideUp("slow");
                }
                $('#imageerror').slideUp("slow");
            }
        });

        $('#imageedit').bind('change', function() {

            var ext = $('#image1').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                $('#imageerror2').slideDown("slow");
                $('#imageerror3').slideUp("slow");
                $('#image1').val('');

            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#imageerror3').slideDown("slow");
                    $('#image1').val('');

                } else {

                    $('#imageerror3').slideUp("slow");
                }
                $('#imageerror2').slideUp("slow");
            }
        });



        $("#transactionbutton").click(function(event) {
            let url = "{{ route('siteadmin.activityadd') }}";
            document.location.href=url;
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            // event.preventDefault();
            // $('#brieferror').hide();
            // $('#malbrief').hide();
            // $('#malcontent').hide();
            // $('#contenterror').hide();
            // $('#brieferror1').hide();
            // $('#malbrief1').hide();
            // $('#malcontent1').hide();
            // $('#contenterror1').hide();
            // $('#malbrieferror').hide();
            // $('#malcontenterror').hide();
            // $('#titleerror').hide();
            // $('#titleerror1').hide();
            // $('#subtitleerror').hide();
            // $('#subtitleerror1').hide();
            // $('#authorerror').hide();
            // $('#authorerror1').hide();
            // $('#brieferror').hide();
            // $('#brieferror1').hide();
            // $('#contenterror').hide();
            // $('#contenterror1').hide();
            // $('#tooltiperror').hide();
            // $('#tooltiperror1').hide();
            // $('#alttexterror').hide();
            // $('#alttexterror1').hide();
            // $('#extraserror').hide();
            // $('#extraserror1').hide();
            // $('#maltooltiperror').hide();
            // $('#maltooltiperror1').hide();
            // $('#maltitleerror').hide();
            // $('#maltitleerror1').hide();
            // $('#malsubtitleerror').hide();
            // $('#malsubtitleerror1').hide();
            // $('#malauthorerror').hide();
            // $('#malauthorerror1').hide();
            // $('#imageerror').hide();
            // $('#imageerror1').hide();
            // $('#imageerror2').hide();
            // $('#imageerror3').hide();
            // $('#imageerror2').hide();

            // $('.modal-title').text('Add New Activity');
            // $('#actionbutton').val('Save Details');
            // $('#action').val('Add');
            // $('#ajaxformresults').html('');
            // $("#transactionmodal").modal('show');
            // var usertype = $("#usertypeid").val();
            // var action_url = '';
            // if (usertype == 4) {
            //     action_url = "{{ route('webadmin.activitycreate') }}";
            // } else if (usertype == 3) {
            //     action_url = "{{ route('siteadmin.activitycreate') }}";
            // } else if (usertype == 5) {
            //     action_url = "{{ route('editor.activitycreate') }}";
            // }

            // $.ajax({
            //     url: action_url,
            //     dataType: "json",
            //     success: function(data) {
            //         $('#activitytypes_id').empty();
            //         $('#activitytypes_id').append($('<option></option>').val('').html(
            //             'Select'));
            //         $.each(data.activitytype, function(index, element) {
            //             $('#activitytypes_id').append(
            //                 $('<option></option>').val(element.id).html(element
            //                     .entitle)
            //             );
            //         });





            //         $('#entitle').val('');
            //         $('#maltitle').val('');
            //         $('#ensubtitle').val('');
            //         $('#malsubtitle').val('');
            //         $('#enauthor').val('');
            //         $('#malauthor').val('');
            //         $('#enbrief').val('');
            //         $('#malbrief').val('');
            //         $('#encontent').val('');
            //         $('#malcontent').val('');

            //         $('#alttext').val('Activity');


            //         $('.modal-title').text('Add New Activity');
            //         $('#actionbutton').val('Save Details');
            //         $('#action').val('Add');
            //         $('#ajaxformresults').html('');
            //         $("#transactionmodal").modal('show');
            //     }
            // })

        });



        /*$('#ajaxmodalform').on('submit', function(event){ 
            event.preventDefault();
            var action_url = '';
            if($('#action').val() == 'Add')
                action_url = "{{ route('appadmin.officestore') }}";

            if($('#action').val() == 'Edit')
                action_url = "{{ route('appadmin.officeupdate') }}";

            $.ajax({
                 url: action_url,
                 method:"post",
                 data:$(this).serialize(),
                 dataType:"json",
                 success:function(data)
                 { 
                    var html = '';
                    if(data.errors)
                    {
                       alert("Already a department with same name exists");
                       
                    }
                    if(data.success)
                    {
                       html = '<div class="alert alert-success">' + data.success + '</div>';
                       $('#ajaxmodalform')[0].reset();
                       window.location.reload();
                       $('#transactionmodal').modal('hide');
                    }
                 }
            });
          });*/





        // $(document).on('click', '.edit', function() {
        //     var id = $(this).attr('id');
        //     $('#brieferror1').hide();
        //     $('#malbrief1').hide();
        //     $('#malcontent1').hide();
        //     $('#contenterror1').hide();
        //     $('#brieferror').hide();
        //     $('#malbrief').hide();
        //     $('#malcontent').hide();
        //     $('#contenterror').hide();
        //     $('#malbrieferror').hide();
        //     $('#malcontenterror').hide();
        //     $('#titleerror').hide();
        //     $('#titleerror1').hide();
        //     $('#subtitleerror').hide();
        //     $('#subtitleerror1').hide();
        //     $('#authorerror').hide();
        //     $('#authorerror1').hide();
        //     $('#brieferror').hide();
        //     $('#brieferror1').hide();
        //     $('#contenterror').hide();
        //     $('#contenterror1').hide();
        //     $('#tooltiperror').hide();
        //     $('#tooltiperror1').hide();
        //     $('#alttexterror').hide();
        //     $('#alttexterror1').hide();
        //     $('#extraserror').hide();
        //     $('#extraserror1').hide();
        //     $('#maltooltiperror').hide();
        //     $('#maltooltiperror1').hide();
        //     $('#maltitleerror').hide();
        //     $('#maltitleerror1').hide();
        //     $('#malsubtitleerror').hide();
        //     $('#malsubtitleerror1').hide();
        //     $('#malauthorerror').hide();
        //     $('#malauthorerror1').hide();
        //     $('#imageerror').hide();
        //     $('#imageerror1').hide();
        //     $('#imageerror2').hide();
        //     $('#imageerror3').hide();
        //     $('#imageerror2').hide();
        //     $('#ajaxformresults').html('');
        //     var usertype = $("#usertypeid").val();
        //     var action_url2 = '';
        //     if (usertype == 4) {
        //         action_url2 = "/webadmin/activityedit/" + id;
        //     } else if (usertype == 3) {
        //         action_url2 = "/siteadmin/activityedit/" + id;
        //     } else if (usertype == 5) {
        //         action_url2 = "/editor/activityedit/" + id;
        //     }
        //     $.ajax({
        //         url: action_url2,
        //         dataType: "json",
        //         success: function(data) {
        //             if (data.error) {
        //                 swal("The Activity is Locked, So cannot be edited!");
        //             } else {
        //                 $("#uploadedimage").attr('src', "{{asset('Activity')}}/" + data
        //                     .resultdata.poster);
        //                 $('#entitle1').val(data.resultdata.entitle);
        //                 $('#maltitle1').val(data.resultdata.maltitle);
        //                 $('#entooltip1').val(data.resultdata.entooltip);
        //                 $('#maltooltip1').val(data.resultdata.maltooltip);
        //                 $('#ensubtitle1').val(data.resultdata.ensubtitle);
        //                 $('#malsubtitle1').val(data.resultdata.malsubtitle);
        //                 $('#enauthor1').val(data.resultdata.enauthor);
        //                 $('#malauthor1').val(data.resultdata.malauthor);
        //                 /*$('#enbrief1').val(data.resultdata.enbrief);
        //                 $('#malbrief1').val(data.resultdata.malbrief);
        //                 $('#encontent1').val(data.resultdata.encontent);
        //                 $('#malcontent1').val(data.resultdata.malcontent);*/
        //                 $('#enbrief1').summernote('code', data.resultdata.enbrief);
        //                 $('#malbrief1').summernote('code', data.resultdata.malbrief);
        //                 $('#encontent1').summernote('code', data.resultdata.encontent);
        //                 $('#malcontent1').summernote('code', data.resultdata.malcontent);
        //                 $('#alttext1').val(data.resultdata.alt);

        //                 if (data.resultdata.homepagestatus == 1) {
        //                     $('#homepagestatus1').prop('checked', true);
        //                 } else {
        //                     $('#homepagestatus1').prop('checked', false);
        //                 }




        //                 $('#activitytypes_id1').empty();
        //                 $('#activitytypes_id1').append($('<option></option>').val('').html(
        //                     'Select'));
        //                 $.each(data.activitytype, function(index, element) {
        //                     $('#activitytypes_id1').append(
        //                         $('<option></option>').val(element.id).html(element
        //                             .entitle)
        //                     );
        //                     element.id == data.resultdata.activitytypes_id ? $(
        //                         '#activitytypes_id1').val(element.id).prop(
        //                         'selected', true) : '';
        //                 });

        //                 var start = new Date(data.resultdata.startdate);
        //                 var dd = start.getDate();
        //                 var mm = start.getMonth() + 1; //January is 0! 
        //                 var yyyy = start.getFullYear();
        //                 if (dd < 10) {
        //                     dd = '0' + dd
        //                 };
        //                 if (mm < 10) {
        //                     mm = '0' + mm
        //                 };
        //                 var start = dd + '/' + mm + '/' + yyyy;
        //                 $('#startdate1').val(start);

        //                 var end = new Date(data.resultdata.enddate);
        //                 var dd1 = end.getDate();
        //                 var mm1 = end.getMonth() + 1; //January is 0! 
        //                 var yyyy1 = end.getFullYear();
        //                 if (dd1 < 10) {
        //                     dd1 = '0' + dd1
        //                 };
        //                 if (mm1 < 10) {
        //                     mm1 = '0' + mm1
        //                 };
        //                 var end = dd1 + '/' + mm1 + '/' + yyyy1;
        //                 $('#enddate1').val(end);



        //                 $('#hidden_id1').val(id);
        //                 $('.modal-title').text('Edit Details');
        //                 $('#actionbutton1').val('Update Details');
        //                 $('#action1').val('Edit');
        //                 $('#transactionmodal1').modal('show');
        //             }


        //         }
        //     })
        // });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            url="/siteadmin/activityedit/"+id; 
            document.location.href=url;
        });

        $(document).on('click', '.active', function() {

            var id = $(this).attr('id');
            var usertype = $("#usertypeid").val();
            var action_url3 = '';
            if (usertype == 4) {
                action_url3 = "/webadmin/activitystatus/" + id;
            } else if (usertype == 3) {
                action_url3 = "/siteadmin/activitystatus/" + id;
            } else if (usertype == 5) {
                action_url3 = "/editor/activitystatus/" + id;
            }
            $.ajax({
                url: action_url3,
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
            var usertype = $("#usertypeid").val();
            var action_url4 = '';
            if (usertype == 4) {
                action_url4 = "/webadmin/activitydestroy/" + element_id;
            } else if (usertype == 3) {
                action_url4 = "/siteadmin/activitydestroy/" + element_id;
            } else if (usertype == 5) {
                action_url4 = "/editor/activitydestroy/" + element_id;
            }
            swal({
                    title: "Deleting Activity List",
                    text: "Are you sure to delete Activity List?",
                    type: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((isconfirm) => {
                    //$('#loader').show();

                    if (isconfirm) {
                        $.ajax({
                            url: action_url4,
                            dataType: "json",

                            success: function(data) {
                                //  setTimeout(function(){
                                //  $('#confirmModal').modal('hide');
                                // 

                                $('#loader').hide();

                                swal({
                                        title: 'Activity List Deleted',
                                        text: data.success,
                                        type: 'info',
                                        buttonsStyling: false,
                                        reverseButtons: true
                                    })
                                    .then((value) => {
                                        if (value) {
                                            $('#loader').show();
                                            $('#ajaxmodalform')[0].reset();
                                            window.location.reload();
                                        }
                                    });
                                //  swal("Info","Data Deleted","info");
                                //  alert('Data Deleted');
                                //  }, 200);
                            }
                        });
                    }
                });
        });


        $(".close1").click(function() {
            $('#transactionmodal').modal('hide');

        });

        /*---------------------------------- End of Document Ready ---------------------------*/
    });
</script>
@endsection
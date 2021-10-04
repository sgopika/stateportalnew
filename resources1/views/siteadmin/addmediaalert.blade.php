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
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; Add Media Alert </strong></p>
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
            <div class="modal-content">

                <form id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body adminpage">

                        <div id="form_section">

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content Type </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <select class="form-control customform eng_xxxs fg-darkCrimson" id="contenttypes_id" name="contenttypes_id" required>
                                        <option value="">Select</option>
                                        @foreach($contenttype as $content)
                                        <option value="{{$content->id}}">{{$content->entitle}}</option>
                                        @endforeach
                                    </select>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow" id="filetypediv">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">File Type </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <select class="form-control customform eng_xxxs fg-darkCrimson" id="filetypes_id" name="filetypes_id" required>
                                        <option value="">Select</option>
                                        @foreach($filetype as $file)
                                        <option value="{{$file->id}}">{{$file->entitle}}</option>
                                        @endforeach
                                    </select>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow" id="uploaddiv">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="image_uploaded" name="image_uploaded">
                                    <span id="upfile"></span>
                                    <input type="file" id="image" name="image">
                                    <input type="hidden" id="image_hid_id" name="image_hid_id">
                                    <p id="imageerror2" style="display:none; color:#FF0000;">
                                        Invalid File format.
                                    </p>
                                    <p id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                                        Allowed size 15 MB.
                                    </p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Size </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="size" name="size" aria-describedby="HELPNAME" placeholder="File size" maxlength="500" minlength="3" required>
                                    <p id="sizeerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters, period
                                        and numbers are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Duration </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="duration" name="duration" aria-describedby="HELPNAME" placeholder="File duration" required maxlength="500" minlength="3">
                                    <p id="durationerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters,
                                        period and numbers are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>

                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext" name="alttext" aria-describedby="HELPNAME" placeholder="Alternative text" required maxlength="500" minlength="3" value="Media Alert">
                                    <p id="alttexterror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-6 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Title.</small>
                                </div> <!-- ./col-md-6 -->
                                <div class="col-md-6 py-2">
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="English Title" required maxlength="500" minlength="3" value="Media Alert">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="English subtitle" required maxlength="1000" minlength="3" value="മീഡിയ അലർട്ട്">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="English Title" required maxlength="1000" minlength="3" value="Media Alert">
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
                                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Malayalam subtitle" maxlength="1000" minlength="3" value="മീഡിയ അലർട്ട്">
                                    <p id="malsubtitleerror" style="display:none; color:#FF0000;">Only Malayalam Characters
                                        are allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->

                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Brief.</small>

                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="enbrief" name="enbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="enbrief" name="enbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="5000" minlength="3"></textarea>

                                    <p id="enbrieferror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z a-z
                                        Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Malayalam Brief</label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the Malayalam
                                        Brief.</small>
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malbrief" name="malbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="malbrief" name="malbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="30000" minlength="3"></textarea>
                                    <p class="ErrP" id="malbrieferror" style="display:none; color:#FF0000;"> Enter the
                                        Malayalam Brief</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->



                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>

                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="5000" minlength="3"></textarea>
                                    <p id="encontenterror" class='ErrP' style="display:none; color:#FF0000;">Only A -Z a-z
                                        Characters are
                                        allowed.</p>
                                </div> <!-- ./col-md-6 -->
                            </div> <!-- ./row -->
                            <div class="row customformrow">
                                <div class="col-md-12 py-2">
                                    <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
                                    <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam
                                        content.</small>
                                    <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                    <textarea class="summernote" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="30000" minlength="3"></textarea>
                                    <p id="malcontenterror" class="ErrP" style="display:none; color:#FF0000;">Enter the
                                        malayalam content.</p>
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
                        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save changes</button>

                    </div> <!-- ./modal-footer  -->
                </form>
            </div> <!-- ./modal-content -->
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
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            image_uploaded.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    $("#filetypes_id").on('change', function() {
        var ext = $('#image').val();
        var extarr = ['png', 'jpg', 'jpeg', 'mp3', 'mp4'];
        var ext = ext.substr((ext.lastIndexOf('.') + 1));
        var selctedext = $("#filetypes_id option:selected").text();
        // $('#filetypes_id').val();
        if (ext != '') {
            if (selctedext == ext) {
                if (extarr.includes(ext)) {
                    var picsize = (this.files[0].size);
                    if (picsize > 15000000) {
                        $('#imageerror3').slideDown("slow");
                        $('#image').val('');

                    } else {
                        $('#imageerror2').slideUp("slow");
                        $('#imageerror3').slideUp("slow");
                    }
                    $('#imageerror2').slideUp("slow");
                    $('#imageerror3').slideUp("slow");
                } else {
                    $('#imageerror2').slideDown("slow");
                    // console.log("sadsad "+$.inArray(ext, ['png', 'jpg', 'jpeg','mp3','mp4']));
                    $('#imageerror3').slideUp("slow");
                    $('#image').val('');
                }
            } else {
                $('#imageerror2').slideDown("slow");
                // console.log("sadsad "+$.inArray(ext, ['png', 'jpg', 'jpeg','mp3','mp4']));
                $('#imageerror3').slideUp("slow");
                $('#image').val('');
            }
        }

    });
    $('#image').bind('change', function() {

        // var ext = $('#image1').val().split('.').pop().toLowerCase();
        var ext = $('#image').val();
        var extarr = ['png', 'jpg', 'jpeg', 'mp3', 'mp4'];
        var ext = ext.substr((ext.lastIndexOf('.') + 1));
        var selctedext = $("#filetypes_id option:selected").text();
        // $('#filetypes_id').val();
        if (selctedext == ext) {
            if (extarr.includes(ext)) {
                var picsize = (this.files[0].size);
                if (picsize > 15000000) {
                    $('#imageerror3').slideDown("slow");
                    $('#image').val('');

                } else {
                    $('#imageerror2').slideUp("slow");
                    $('#imageerror3').slideUp("slow");
                }
                $('#imageerror2').slideUp("slow");
                $('#imageerror3').slideUp("slow");
            } else {
                $('#imageerror2').slideDown("slow");
                // console.log("sadsad "+$.inArray(ext, ['png', 'jpg', 'jpeg','mp3','mp4']));
                $('#imageerror3').slideUp("slow");
                $('#image').val('');
            }
        } else {
            $('#imageerror2').slideDown("slow");
            // console.log("sadsad "+$.inArray(ext, ['png', 'jpg', 'jpeg','mp3','mp4']));
            $('#imageerror3').slideUp("slow");
            $('#image').val('');
        }

    });
    $(document).ready(function() {

        var id = $(this).attr('id');
        $('#upfile').html('');
        $("#image_uploaded").attr("src", "")
        var utype = $("#usertypeid").val();
        var action_url4 = '';
        if (utype == 4) {
            action_url4 = "/webadmin/mediaalertedit/" + id;
        } else if (utype == 3) {
            action_url4 = "/siteadmin/mediaalertedit/" + id;
        } else if (utype == 5) {
            action_url4 = "/editor/mediaalertedit/" + id;
        }
        $('#ajaxformresults').html('');
        $('#image_uploaded').show();
        $.ajax({
            url: action_url4,
            dataType: "json",
            success: function(data) {

                // console.log(data.file_ex);
                $('#entitle').val(data.resultdata.entitle);
                $('#maltitle').val(data.resultdata.maltitle);
                $('#ensubtitle').val(data.resultdata.ensubtitle);
                $('#alttext').val(data.resultdata.alt);
                $('#size').val(data.resultdata.size);
                $('#duration').val(data.resultdata.duration);
                $('#malsubtitle').val(data.resultdata.malsubtitle);

                /*$('#enbrief').val(data.resultdata.enbrief);
                $('#malbrief').val(data.resultdata.malbrief);
                $('#encontent').val(data.resultdata.encontent);
                $('#malcontent').val(data.resultdata.malcontent);*/
                $('#enbrief').summernote('code', data.resultdata.enbrief);
                $('#malbrief').summernote('code', data.resultdata.malbrief);
                $('#encontent').summernote('code', data.resultdata.encontent);
                $('#malcontent').summernote('code', data.resultdata.malcontent);
                // console.log(data.resultdata.file);
                $('#image_hid_id').val(data.resultdata.file);
                // $('#image').val(data.resultdata.file);
                var resfile = data.resultdata.file;
                var ext = resfile.split('.');
                var filshs = '';
                var pathsurr = "{{asset('Mediaalert')}}/";
                if (ext[1] == 'jpg') {
                    $('#upfile').html('');
                    $("#image_uploaded").show();
                    $("#image_uploaded").attr('src', "{{asset('Mediaalert')}}/" + data
                        .resultdata.file);
                }
                if (ext[1] == 'mp3') {
                    $('#upfile').html('');
                    filshs = `
            <audio controls autoplay>
              <source src="${pathsurr+data.resultdata.file}" type="audio/ogg">
              <source src="${pathsurr+data.resultdata.file}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            `;
                    $("#image_uploaded").hide();
                    $('#upfile').append(filshs);

                }
                if (ext[1] == 'mp4') {
                    $('#upfile').html('');
                    filshs = `
              <video controls autoplay>
                <source src="${pathsurr+data.resultdata.file}" type="video/mp4">
                <source src="${pathsurr+data.resultdata.file}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
            `;
                    $("#image_uploaded").hide();
                    $('#upfile').append(filshs);
                }


                if (data.resultdata.homepagestatus == 1) {
                    $('#displaystatus').prop('checked', true);
                } else {
                    $('#displaystatus').prop('checked', false);
                }


                $('#contenttypes_id').empty();
                $('#contenttypes_id').append($('<option></option>').val('0').html(
                    'Select'));
                $.each(data.contenttype, function(index, element) {
                    $('#contenttypes_id').append(
                        $('<option></option>').val(element.id).html(element
                            .entitle)
                    );
                    element.id == data.resultdata.contenttypes_id ? $(
                        '#contenttypes_id').val(element.id).prop('selected',
                        true) : '';
                });

                // $('#filetypes_id').html(data.file_ex);
                $('#filetypes_id').empty();
                $('#filetypes_id').append($('<option></option>').val('0').html(data
                    .file_ex));
                // $.each(data.file_ex, function(index, element) {
                //     $('#filetypes_id').append(
                //         $('<option></option>').val(element.id).html(element
                //             .file_ex)
                //     );
                //     element.id == data.file_ex ? $('#filetypes_id')
                //         .val(element.id).prop('selected', true) : '';
                // });



                $('#hidden_id').val(id);
                $('.modal-title').text('Edit Details');
                $('#actionbutton').val('Update Details');
                $('#action').val('Edit');
                $('#transactionmodal').modal('show');
            }
        })



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

        //     $('#entitle').on('change ', function(e) {
        //         var testval = this.value;
        //         var vald=entitleregex(testval);
        //   if(!vald){
        //             $('#entitle').val('');
        //             $('#entitleerror').slideDown("slow");
        //         } else {
        //             $('#entitleerror').hide();

        //         }

        //     });

        // $('#maltitle').on('change ', function(e) {
        //     var testval = this.value;

        //     var tested = maltitleregex(testval);
        //     if (tested) { 
        //         $('#maltitleerror').hide();
        //     } else {
        //         $('#maltitle').val('');
        //         $('#maltitleerror').slideDown("slow");
        //     }

        // });


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






        $("#transactionbutton").click(function(event) {
            event.preventDefault();
            $('#image_uploaded').hide();
            $('.modal-title').text('Add New Details');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            // $('#ajaxmodalform').html('');
            // $('.summernote').summernote('reset');
            // $(".summernote").summernote('code', '');
            $('#ajaxmodalform')[0].reset();
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');

            var utype = $("#usertypeid").val();
            var action_url = '';
            if (utype == 4) {
                action_url = "{{ route('webadmin.mediaalertcreate') }}";
            } else if (utype == 3) {
                action_url = "{{ route('siteadmin.mediaalertcreate') }}";
            } else if (utype == 5) {
                action_url = "{{ route('editor.mediaalertcreate') }}";
            }



            $.ajax({
                url: action_url,
                dataType: "json",
                success: function(data) {
                    $('#contenttypes_id').empty();
                    $('#contenttypes_id').append($('<option></option>').val('0').html(
                        'Select'));
                    $.each(data.contenttype, function(index, element) {
                        $('#contenttypes_id').append(
                            $('<option></option>').val(element.id).html(element
                                .entitle)
                        );
                    });

                    $('#filetypes_id').empty();
                    $('#filetypes_id').append($('<option></option>').val('0').html('Select'));
                    $.each(data.filetype, function(index, element) {
                        $('#filetypes_id').append(
                            $('<option></option>').val(element.id).html(element
                                .entitle)
                        );
                    });



                    $('.modal-title').text('Add New Media Alert');
                    $('#actionbutton').val('Save Details');
                    $('#action').val('Add');
                    $('#ajaxformresults').html('');
                    $("#transactionmodal").modal('show');
                }
            })




        });

        $(document).on('change', '#contenttypes_id', function() {
            var id = $(this).val();
            var utype = $("#usertypeid").val();
            var action_url2 = '';
            if (utype == 4) {
                action_url2 = "/webadmin/filetypelist/" + id;
            } else if (utype == 3) {
                action_url2 = "/siteadmin/filetypelist/" + id;
            } else if (utype == 5) {
                action_url2 = "/editor/filetypelist/" + id;
            }


            if (id != '') {
                $.ajax({
                    url: action_url2,
                    dataType: "json",
                    success: function(data) {
                        $('#filetypediv').show();
                        $('#uploaddiv').show();
                        $('#filetypes_id').empty();
                        $('#filetypes_id').append($('<option></option>').val('').html(
                            'Select'));
                        $.each(data.filetype, function(index, element) {
                            $('#filetypes_id').append(
                                $('<option></option>').val(element.id).html(element
                                    .entitle)
                            );
                        });

                    }
                });
            } else {
                $('#filetypediv').hide();
                $('#uploaddiv').hide();
            }
        });

        $('#ajaxmodalform').on('submit', function(event) {
            var formData = new FormData(this);
            var hide_file_id = $('#image_hid_id').val();
            // alert(formData);
            event.preventDefault();
            var action_url3 = '';
            var utype = $("#usertypeid").val();
            if ($('#action').val() == 'Add')
                if (utype == 4) {
                    action_url3 = "{{ route('webadmin.mediaalertstore') }}";
                } else if (utype == 3) {
                action_url3 = "{{ route('siteadmin.mediaalertstore') }}";
            } else if (utype == 5) {
                action_url3 = "{{ route('editor.mediaalertstore') }}";
            }


            if ($('#action').val() == 'Edit')
                if (utype == 4) {
                    action_url3 = "{{ route('webadmin.mediaalertupdate') }}";
                } else if (utype == 3) {
                action_url3 = "{{ route('siteadmin.mediaalertupdate') }}";
            } else if (utype == 5) {
                action_url3 = "{{ route('editor.mediaalertupdate') }}";
            }


            $.ajax({
                url: action_url3,
                method: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        swal("warning", data.errors, "warning");

                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#ajaxmodalform')[0].reset();
                        swal("Media Added Sucessfully");
                        window.location.href='/siteadmin/mediaalertlist';
                    }
                }
            });
        });



        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            $('#upfile').html('');
            $("#image_uploaded").attr("src", "")
            var utype = $("#usertypeid").val();
            var action_url4 = '';
            if (utype == 4) {
                action_url4 = "/webadmin/mediaalertedit/" + id;
            } else if (utype == 3) {
                action_url4 = "/siteadmin/mediaalertedit/" + id;
            } else if (utype == 5) {
                action_url4 = "/editor/mediaalertedit/" + id;
            }
            $('#ajaxformresults').html('');
            $('#image_uploaded').show();
            $.ajax({
                url: action_url4,
                dataType: "json",
                success: function(data) {

                    // console.log(data.file_ex);
                    $('#entitle').val(data.resultdata.entitle);
                    $('#maltitle').val(data.resultdata.maltitle);
                    $('#ensubtitle').val(data.resultdata.ensubtitle);
                    $('#alttext').val(data.resultdata.alt);
                    $('#size').val(data.resultdata.size);
                    $('#duration').val(data.resultdata.duration);
                    $('#malsubtitle').val(data.resultdata.malsubtitle);

                    /*$('#enbrief').val(data.resultdata.enbrief);
                    $('#malbrief').val(data.resultdata.malbrief);
                    $('#encontent').val(data.resultdata.encontent);
                    $('#malcontent').val(data.resultdata.malcontent);*/
                    $('#enbrief').summernote('code', data.resultdata.enbrief);
                    $('#malbrief').summernote('code', data.resultdata.malbrief);
                    $('#encontent').summernote('code', data.resultdata.encontent);
                    $('#malcontent').summernote('code', data.resultdata.malcontent);
                    // console.log(data.resultdata.file);
                    $('#image_hid_id').val(data.resultdata.file);
                    // $('#image').val(data.resultdata.file);
                    var resfile = data.resultdata.file;
                    var ext = resfile.split('.');
                    var filshs = '';
                    var pathsurr = "{{asset('Mediaalert')}}/";
                    if (ext[1] == 'jpg') {
                        $('#upfile').html('');
                        $("#image_uploaded").show();
                        $("#image_uploaded").attr('src', "{{asset('Mediaalert')}}/" + data
                            .resultdata.file);
                    }
                    if (ext[1] == 'mp3') {
                        $('#upfile').html('');
                        filshs = `
            <audio controls autoplay>
              <source src="${pathsurr+data.resultdata.file}" type="audio/ogg">
              <source src="${pathsurr+data.resultdata.file}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            `;
                        $("#image_uploaded").hide();
                        $('#upfile').append(filshs);

                    }
                    if (ext[1] == 'mp4') {
                        $('#upfile').html('');
                        filshs = `
              <video controls autoplay>
                <source src="${pathsurr+data.resultdata.file}" type="video/mp4">
                <source src="${pathsurr+data.resultdata.file}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
            `;
                        $("#image_uploaded").hide();
                        $('#upfile').append(filshs);
                    }


                    if (data.resultdata.homepagestatus == 1) {
                        $('#displaystatus').prop('checked', true);
                    } else {
                        $('#displaystatus').prop('checked', false);
                    }


                    $('#contenttypes_id').empty();
                    $('#contenttypes_id').append($('<option></option>').val('0').html(
                        'Select'));
                    $.each(data.contenttype, function(index, element) {
                        $('#contenttypes_id').append(
                            $('<option></option>').val(element.id).html(element
                                .entitle)
                        );
                        element.id == data.resultdata.contenttypes_id ? $(
                            '#contenttypes_id').val(element.id).prop('selected',
                            true) : '';
                    });

                    // $('#filetypes_id').html(data.file_ex);
                    $('#filetypes_id').empty();
                    $('#filetypes_id').append($('<option></option>').val('0').html(data
                        .file_ex));
                    // $.each(data.file_ex, function(index, element) {
                    //     $('#filetypes_id').append(
                    //         $('<option></option>').val(element.id).html(element
                    //             .file_ex)
                    //     );
                    //     element.id == data.file_ex ? $('#filetypes_id')
                    //         .val(element.id).prop('selected', true) : '';
                    // });



                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit Details');
                    $('#actionbutton').val('Update Details');
                    $('#action').val('Edit');
                    $('#transactionmodal').modal('show');
                }
            })
        });

        $(document).on('click', '.active', function() {

            var id = $(this).attr('id');
            var utype = $("#usertypeid").val();
            var action_url5 = '';
            if (utype == 4) {
                action_url5 = "/webadmin/mediaalertstatus/" + id;
            } else if (utype == 3) {
                action_url5 = "/siteadmin/mediaalertstatus/" + id;
            } else if (utype == 5) {
                action_url5 = "/editor/mediaalertstatus/" + id;
            }
            $.ajax({
                url: action_url5,
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
            var utype = $("#usertypeid").val();
            // $('#confirmModal').modal('show');
            var action_url6 = '';
            if (utype == 4) {
                action_url6 = "/webadmin/mediaalertdestroy/" + element_id;
            } else if (utype == 3) {
                action_url6 = "/siteadmin/mediaalertdestroy/" + element_id;
            } else if (utype == 5) {
                action_url6 = "/editor/mediaalertdestroy/" + element_id;
            }
            swal({
                    title: "Deleting Newsletter List",
                    text: "Are you sure to delete Newsletter List?",
                    type: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((isconfirm) => {
                    //$('#loader').show();

                    if (isconfirm) {
                        $.ajax({
                            url: action_url6,
                            dataType: "json",

                            success: function(data) {
                                //  setTimeout(function(){
                                //  $('#confirmModal').modal('hide');
                                // 

                                $('#loader').hide();

                                swal({
                                        title: 'Newsletter List Deleted',
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

        // $('#ok_button').click(function() {
        //     var utype = $("#usertypeid").val();
        //     var action_url6 = '';
        //     if (utype == 4) {
        //         action_url6 = "/webadmin/mediaalertdestroy/" + element_id;
        //     } else if (utype == 3) {
        //         action_url6 = "/siteadmin/mediaalertdestroy/" + element_id;
        //     } else if (utype == 5) {
        //         action_url6 = "/editor/mediaalertdestroy/" + element_id;
        //     }
        //     $.ajax({
        //         url: action_url6,
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

        /*---------------------------------- End of Document Ready ---------------------------*/
    });
</script>
@endsection
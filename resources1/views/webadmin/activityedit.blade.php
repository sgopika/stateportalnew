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
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; Edit Activity</strong></p>
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
            
            <!-- Button trigger modal -->

        </div> <!-- ./col12 -->
        <div class="col-12 py-1">
            @if($lockstatus === 0)
            <div class="modal-content">
            @if(Auth::user()->usertypes_id==4)
            <form action="{{ route('webadmin.activityupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
                @elseif(Auth::user()->usertypes_id==3)
                <form action="{{ route('siteadmin.activityupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @elseif(Auth::user()->usertypes_id==5)
                    <form action="{{ route('editor.activityupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">


                        @endif
                        @csrf
                        <div class="modal-body adminpage">

                            <div id="form_section">

                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Poster </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <img src="{{asset('Activity')}}/{{$resultdata['poster']}}" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="uploadedimage">
                                        <input type="file" id="imageedit" name="imageedit">
                                        <p id="imageerror2" class="ErrP" style="display:none; color:#FF0000;">
                                            Invalid File format.
                                        </p>
                                        <p id="imageerror3" class="ErrP" style="display:none; color:#FF0000;" class="mal_xxxs">
                                            Allowed size 1 MB.
                                        </p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="alttext1" name="alttext1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3" value="{{$resultdata['alt']}}">
                                        <p id="alttexterror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="entitle1" name="entitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3" value="{{$resultdata['entitle']}}">
                                        <p id="titleerror1" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                            a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle1" name="maltitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3" value="{{$resultdata['maltitle']}}">
                                        <p id="maltitleerror1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle1" name="ensubtitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3" value="{{$resultdata['ensubtitle']}}">
                                        <p id="subtitleerror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle1" name="malsubtitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="100" minlength="3" value="{{$resultdata['malsubtitle']}}">
                                        <p id="malsubtitleerror1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Author </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="enauthor1" name="enauthor1" aria-describedby="HELPNAME" placeholder="Name" maxlength="200" minlength="3" value="{{$resultdata['enauthor']}}">
                                        <p id="authorerror1" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                            a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Author in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="malauthor1" name="malauthor1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="500" minlength="3" value="{{$resultdata['malauthor']}}">
                                        <p id="malauthorerror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-12 py-2">
                                        <!-- <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="enbrief1" name="enbrief1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                        <textarea required class="summernote" id="enbrief1" name="enbrief1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3">{{$resultdata['enbrief']}}</textarea>
                                        <p id="brieferror1" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                            a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-12 py-2">
                                        <!-- <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="malbrief1" name="malbrief1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                        <textarea required class="summernote" id="malbrief1" name="malbrief1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3">{{$resultdata['malbrief']}}</textarea>
                                        <p id="malbrief1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-12 py-2">
                                        <!-- <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="encontent1" name="encontent1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                                        <textarea required class="summernote" id="encontent1" name="encontent1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3">{{$resultdata['encontent']}}</textarea>
                                        <p id="contenterror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-12 py-2">
                                        <!-- <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent1" name="malcontent1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea> -->
                                        <textarea required class="summernote" id="malcontent1" name="malcontent1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3">{{$resultdata['malcontent']}}</textarea>
                                        <p id="malcontent1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Activity Type </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <select class="form-control customform eng_xxxs fg-darkCrimson" id="activitytypes_id1" name="activitytypes_id1" required>
                                            @foreach ($activitytype as $item)
                                                <option value="{{$item->id}}" {{ (isset($resultdata['activitytypes_id']) &&  $item->id  == $resultdata['activitytypes_id']) ? 'selected' : ''}}>{{$item->entitle}}</option>
                                            @endforeach
                                        </select>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Start Date</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required name="startdate1" id="startdate1" value="{{ Carbon\Carbon::now()->format('d/m/Y')  }}" class="form-control customform eng_xxxs fg-darkCrimson dob" value="{{$resultdata['startdate']}}" required>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">End Date</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required name="enddate1" id="enddate1" value="{{ Carbon\Carbon::now()->format('d/m/Y')  }}" class="form-control customform eng_xxxs fg-darkCrimson dob" value="{{$resultdata['enddate']}}" required>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip1" name="entooltip1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"  value="{{$resultdata['entooltip']}}">
                                        <p id="tooltiperror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" required class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip1" name="maltooltip1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3" value="{{$resultdata['maltooltip']}}">
                                        <p id="maltooltiperror1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="checkbox" id="homepagestatus1" value="1" name="homepagestatus1" {{isset($resultdata['homepagestatus']) && $resultdata['homepagestatus'] == 1 ?'checked':''}}>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->

                            </div> <!-- ./form_section -->

                        </div> <!-- ./modal-body -->
                        <div class="modal-footer modalover">
                            <input type="hidden" name="action" id="action1" value="Edit" />
                            <input type="hidden" name="hidden_id1" id="hidden_id1" value="{{$resultdata['id']}}"/>
                            <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save Changes</button>

                        </div> <!-- ./modal-footer  -->
                </form>
            </div> <!-- ./modal-content -->
            @else 
                <div class="alert alert-danger">
                    {{$lockstatusdata}}
                </div>  
            @endif
        </div> <!-- ./col12 -->
    </div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->






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

        /*---------------------------------- End of Document Ready ---------------------------*/
    });
</script>
@endsection
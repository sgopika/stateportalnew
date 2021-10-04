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
                    @elseif(Auth::user()->usertypes_id==4)
                    <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
                    
                    @endif
                </ol>

            </nav>
        </div> <!-- col12 -->
        <div class="col-12 py-1 px-2 ">
            <p class="py-2"> <strong> <i class="fas fa-hand-point-right"></i> &nbsp; Add New Article</strong></p>
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
            <input type="hidden" id="usertypeid" name="usertypeid" value="{{ Auth::user()->usertypes_id }}">
            <!-- Button trigger modal -->
        </div> <!-- ./col12 -->

    </div> <!-- ./row -->
    @if(Auth::user()->usertypes_id==2)
    <form id="ajaxmodalform" action="{{ route('siteadmin.articlestore') }}" method="post" class="form-horizontal ajaxmodalform" enctype="multipart/form-data">
        
                @endif
                @csrf
                <div class="modal-body adminpage">

                    <div id="form_section">


                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Poster </label>
                                 <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Width and height of the poster should be 560 x 420 pix.</small>
                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="file" id="image" name="image">
                                <p id="imageerror" class="ErrP" style="display:none; color:#FF0000;">
                                    Invalid File format.
                                </p>
                                <p id="imageerror1" class="ErrP" style="display:none; color:#FF0000;" class="mal_xxxs">
                                    Allowed size 5 MB.
                                </p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext" name="alttext" aria-describedby="HELPNAME" placeholder="Alt Text" maxlength="250" minlength="3" value="Article">
                                <p id="alttexterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                    a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Title" maxlength="250" minlength="3">
                                <p id="titleerror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                    a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Title Malayalam" maxlength="500" minlength="3">
                                <p id="maltitleerror" class="ErrP" style="display:none; color:#FF0000;">Only
                                    Malayalam Characters and spaces are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Sub Title" maxlength="250" minlength="3">
                                <p id="subtitleerror" class="ErrP" style="display:none; color:#FF0000;">Only A
                                    -Z a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Sub Title in Malayalam" maxlength="500" minlength="3">
                                <p id="malsubtitleerror" class="ErrP" style="display:none; color:#FF0000;">Only
                                    Malayalam Characters and spaces are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Author </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="enauthor" name="enauthor" aria-describedby="HELPNAME" placeholder="Author" maxlength="250" minlength="3">
                                <p id="authorerror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                    a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Author in Malayalam</label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malauthor" name="malauthor" aria-describedby="HELPNAME" placeholder="Author in Malayalam" maxlength="500" minlength="3">
                                <p id="malauthorerror" class="ErrP" style="display:none; color:#FF0000;">Only A
                                    -Z a-z Characters are allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>

                                <textarea class="summernote" id="enbrief" name="enbrief" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                                <p id="brieferror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                    a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief in Malayalam</label>


                                <textarea class="summernote" id="malbrief" name="malbrief" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                                <p id="malbrieferror" class="ErrP" style="display:none; color:#FF0000;">Only
                                    Malayalam Characters are allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>

                                <textarea class="summernote" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                                <p id="contenterror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                    a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-12 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>

                                <textarea class="summernote" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                                <p id="malcontenterror" class="ErrP" style="display:none; color:#FF0000;">Only
                                    Malayalam Characters are allowed.</p>

                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Component </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <select class="form-control customform eng_xxxs fg-darkCrimson" id="components_id" name="components_id" required>
                                   <option value="">Select</option>
                                @foreach($component as $compo)
                                    <option value="{{$compo->id}}">{{$compo->entitle}}</option>
                                    @endforeach
                                </select>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Article Category </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <select class="form-control customform eng_xxxs fg-darkCrimson" id="articlecategories_id" name="articlecategories_id" required>
                                <option value="">Select</option>
                                @foreach($articlecategory as $article)
                                    <option value="{{$article->id}}">{{$article->entitle}}</option>
                                    @endforeach
                                </select>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="Tooltip" maxlength="250" minlength="3" value="Article">
                                <p id="tooltiperror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                    a-z Characters are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->
                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip" name="maltooltip" aria-describedby="HELPNAME" placeholder="Tooltip in Malayalam" maxlength="500" minlength="3" value="ലേഖനം">
                                <p id="maltooltiperror" class="ErrP" style="display:none; color:#FF0000;">Only
                                    Malayalam Characters and spaces are allowed.</p>
                            </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                            <div class="col-md-6 py-2">
                                <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>

                            </div> <!-- ./col-md-6 -->
                            <div class="col-md-6 py-2">
                                <input type="checkbox" id="homepagestatus" value="1" name="homepagestatus">
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
</div>
<!-- ./modal-content -->
<!-- </div>  -->
<!-- ./modal-dialog -->
<!-- </div> -->
<!-- ./modal -->

<!-- Modal -->
<div class="modal fade" id="transactionmodal1" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header modalover">
                <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- ./modal-header -->
            @if(Auth::user()->usertypes_id==2)
            <form id="ajaxmodalform1" method="post" class="form-horizontal ajaxmodalform" enctype="multipart/form-data">
                @elseif(Auth::user()->usertypes_id==4)
                <form id="ajaxmodalform1" method="post" class="form-horizontal ajaxmodalform" enctype="multipart/form-data">
                    @elseif(Auth::user()->usertypes_id==5)
                    <form id="ajaxmodalform1" method="post" class="form-horizontal ajaxmodalform" enctype="multipart/form-data">

                        @endif

                        @csrf
                        <div class="modal-body adminpage">

                            <div id="form_section">

                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Poster </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="uploadedimage">
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
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext1" name="alttext1" aria-describedby="HELPNAME" placeholder="Alt Text" maxlength="250" minlength="3">
                                        <p id="alttexterror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle1" name="entitle1" aria-describedby="HELPNAME" placeholder="Title" maxlength="250" minlength="3">
                                        <p id="titleerror1" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                            a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle1" name="maltitle1" aria-describedby="HELPNAME" placeholder="Title in Malayalam" maxlength="500" minlength="3">
                                        <p id="maltooltiperror" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip1" name="entooltip1" aria-describedby="HELPNAME" placeholder="Tooltip" maxlength="250" minlength="3">
                                        <p id="tooltiperror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip1" name="maltooltip1" aria-describedby="HELPNAME" placeholder="Tooltip in Malayalam" maxlength="500" minlength="3">
                                        <p id="maltooltiperor1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle1" name="ensubtitle1" aria-describedby="HELPNAME" placeholder="Subtitle" maxlength="250" minlength="3">
                                        <p id="subtitleerrr1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle1" name="malsubtitle1" aria-describedby="HELPNAME" placeholder="Subtitle in Malayalam" maxlength="500" minlength="3">
                                        <p id="malsubtitleerror1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            A -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Author </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="enauthor1" name="enauthor1" aria-describedby="HELPNAME" placeholder="Author Name" maxlength="250" minlength="3">
                                        <p id="authorerror" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                            a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Author in Malayalam</label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malauthor1" name="malauthor1" aria-describedby="HELPNAME" placeholder="Author Name in Malayalam" maxlength="500" minlength="3">
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief </label>

                                        <textarea class="summernote" id="enbrief1" name="enbrief1" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                                        <p id="brieferror1" class="ErrP" style="display:none; color:#FF0000;">Only A -Z
                                            a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Brief in Malayalam</label>

                                        <textarea class="summernote" id="malbrief1" name="malbrief1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                                        <p id="malbrief1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>

                                        <textarea class="summernote" id="encontent1" name="encontent1" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                                        <p id="contenterror1" class="ErrP" style="display:none; color:#FF0000;">Only A
                                            -Z a-z Characters are allowed.</p>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-12 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>

                                        <textarea class="summernote" id="malcontent1" name="malcontent1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                                        <p id="malcontent1" class="ErrP" style="display:none; color:#FF0000;">Only
                                            Malayalam Characters are allowed.</p>

                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Component </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <select class="form-control customform eng_xxxs fg-darkCrimson" id="components_id1" name="components_id1" required></select>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->
                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Article Category </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <select class="form-control customform eng_xxxs fg-darkCrimson" id="articlecategories_id1" name="articlecategories_id1" required></select>
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->



                                <div class="row customformrow">
                                    <div class="col-md-6 py-2">
                                        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Display on Homepage </label>

                                    </div> <!-- ./col-md-6 -->
                                    <div class="col-md-6 py-2">
                                        <input type="checkbox" id="homepagestatus1" value="1" name="homepagestatus1">
                                    </div> <!-- ./col-md-6 -->
                                </div> <!-- ./row -->

                            </div> <!-- ./form_section -->

                        </div> <!-- ./modal-body -->
                        <div class="modal-footer modalover">
                            <input type="hidden" name="action" id="action1" value="Add" />
                            <input type="hidden" name="hidden_id1" id="hidden_id1" />
                            <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save changes</button>

                        </div> <!-- ./modal-footer  -->
                    </form>
        </div> <!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->
<!-- for view details -->
<!-- Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header modalover">
                <p class="modal-title eng_xxs" id="addmodalLabel">&nbsp;Article view</p>
                <div class="article-container">

                    <div id="viewbdy" class="container-lg">

                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- ./modal-header -->


        </div> <!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->
<!-- end view -->

@endsection

@section('customscripts')
<script>
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
    $('#enbrief1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#enbrief1').summernote('code');
        var retval = summernoteval('enbrief1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");
        } else {
            $(we.target).siblings(".ErrP").css("display", "block");

        }

    });
    $('#malbrief1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#malbrief1').summernote('code');
        var retval = summernoteval('malbrief1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");
        } else {
            $(we.target).siblings(".ErrP").css("display", "block");

        }

    });
    $('#encontent1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#encontent1').summernote('code');
        var retval = summernoteval('encontent1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");
        } else {
            $(we.target).siblings(".ErrP").css("display", "block");

        }

    });
    $('#malcontent1').on('summernote.change', function(we, contents, $editable) {
        var textareaValue = $('#malcontent1').summernote('code');
        var retval = summernoteval('malcontent1');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");
        } else {
            $(we.target).siblings(".ErrP").css("display", "block");

        }

    });

    $('uploadedimage').on('change',function(){
           console.log("dsfsdfsd");

        });

    $(document).ready(function() {

        /* $('.summernote').summernote({
             toolbar: [
           ['style', ['style']],
           ['font', ['bold', 'underline', 'clear']],
           ['para', ['ul', 'ol', 'paragraph']],

         ],

         });*/
        $('.summernote').summernote({
            height: 400
        });
         
        tinymce.init({
  selector: '#encontent',
  height: 500,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | link image | code',
  image_advtab: true,
  image_title: true,
  automatic_uploads: true,
  file_picker_types: 'image',
  
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },

  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 });



        /*tinymce.init({

                selector: 'textarea.tinymce-editor',

                height: 500,

                menubar: false,

                plugins: [

                    'advlist autolink lists link image charmap print preview anchor',

                    'searchreplace visualblocks code fullscreen',

                    'insertdatetime media table paste code help wordcount'

                ],

                toolbar: 'undo redo | formatselect | ' +

                    'bold italic backcolor | alignleft aligncenter ' +

                    'alignright alignjustify | bullist numlist outdent indent | ' +

                    'removeformat | help',

                valid_elements: "@[class],p[style],h3,h4,h5,h6,a[href|target],strong/b,"
                  + "div[align],br,table,tbody,thead,tr,td,ul,ol,li,img[src]",


                content_css: '//www.tiny.cloud/css/codepen.min.css'

            });*/


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(event) {
            event.preventDefault();
            $('#malbrieferror').hide();
            $('#malauthorerror').hide();
            $('#malcontenterror').hide();
            $('#titleerror').hide();
            $('#maltitleerror').hide();
            $('#titleerror1').hide();
            $('#maltitleerror1').hide();
            $('#subtitleerror').hide();
            $('#malsubtitleerror').hide();
            $('#subtitleerror1').hide();
            $('#malsubtitleerror1').hide();
            $('#authorerror').hide();
            $('#authorerror1').hide();
            $('#brieferror').hide();
            $('#brieferror1').hide();
            $('#contenterror').hide();
            $('#contenterror1').hide();
            $('#tooltiperror').hide();
            $('#tooltiperror1').hide();
            $('#maltooltiperror').hide();
            $('#maltooltiperror1').hide();
            $('#alttexterror').hide();
            $('#alttexterror1').hide();
            $('#extraserror').hide();
            $('#extraserror1').hide();
            $('#imageerror1').hide();
            $('#imageerror').hide();
            $('#imageerror2').hide();
            $('#imageerror3').hide();

            $('.modal-title').text('Add New Download');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
            var usertype = $("#usertypeid").val();
            var action_url = '';
            if (usertype == 4) {
                action_url = "{{ route('webadmin.articlecreate') }}";
            }  else if (usertype == 2) {
                action_url = "{{ route('siteadmin.articlecreate') }}";
            }


            $.ajax({
                url: action_url,
                dataType: "json",
                success: function(data) {


                    /*$('#filetypes_id').empty();
                    $('#filetypes_id').append($('<option></option>').val('0').html('Select'));
                    $.each(data.filetype, function(index, element) {
                        $('#filetypes_id').append(
                            $('<option></option>').val(element.id).html(element.entitle)
                        );
                    });*/

                    $('#components_id').empty();
                    $('#components_id').append($('<option></option>').val('').html('Select'));
                    $.each(data.component, function(index, element) {
                        $('#components_id').append(
                            $('<option></option>').val(element.id).html(element
                                .entitle)
                        );
                    });

                    $('#articlecategories_id').empty();
                    $('#articlecategories_id').append($('<option></option>').val('').html(
                        'Select'));
                    $.each(data.articlecategory, function(index, element) {
                        $('#articlecategories_id').append($('<option></option>').val(element.id).html(element.entitle));
                    });

                    $('#entitle').val('');
                    $('#maltitle').val('');
                    $('#ensubtitle').val('');
                    $('#malsubtitle').val('');
                    $('#enauthor').val('');
                    $('#malauthor').val('');
                    $('#enbrief').val('');
                    $('#malbrief').val('');
                    $('#encontent').val('');
                    $('#malcontent').val('');
                    $('#extras').val('');
                    $('#alttext').val('');
                    $('#entooltip').val('');
                    $('#maltooltip').val('');


                    $('.modal-title').text('Add New Article');
                    $('#actionbutton').val('Save Details');
                    $('#action').val('Add');
                    $('#ajaxformresults').html('');
                    $("#transactionmodal").modal('show');
                }
            })

        });

        $('#resposivetable').DataTable({
            responsive: true,
            aoColumnDefs: [{
                bSortable: false,
                aTargets: [-1]
            }]
        });


        $('#entitle').on('change', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#entooltip').val($('#entitle').val());
                $('#titleerror').hide();
            } else {
                $('#entitle').focus();
                $('#titleerror').slideDown("slow");
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

        $('#entitle1').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (!vald) {
                $('#entitle1').focus();

                $('#titleerror1').slideDown("slow");

            } else {
                $('#entitle1').val($('#entitle1').val());
                $('#titleerror1').hide();

            }

        });


        $('#maltitle1').on('change ', function(e) {
            var testval = this.value;
            var tested = maltitleregex(testval);
            if (tested) {
                $('#maltitleerror1').hide();
                $('#maltooltip').val($('#maltitle1').val());
            } else {
                $('#maltitle1').focus();
                $('#maltitleerror1').slideDown("slow");
            }

        });

        $('#ensubtitle').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#subtitleerror').hide();

            } else {
                $('#ensubtitle').focus();
                $('#subtitleerror').slideDown("slow");


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

        $('#ensubtitle1').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#subtitleerror1').hide();


            } else {
                $('#ensubtitle1').focus();
                $('#subtitleerror1').slideDown("slow");

            }

        });

        $('#malsubtitle1').on('change ', function(e) {
            var testval = this.value;
            var tested = maltitleregex(testval);
            if (tested) {

                $('#malsubtitleerror1').hide();
            } else {

                $('#malsubtitle1').focus();
                $('#malsubtitleerror1').slideDown("slow");
            }


        });


        $('#enauthor').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#authorerror').hide();

            } else {
                $('#enauthor').focus();
                $('#authorerror').slideDown("slow");

            }

        });

        $('#enauthor1').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#authorerror1').hide();
            } else {
                $('#enauthor1').focus();
                $('#authorerror1').slideDown("slow");

            }

        });
        $('#malauthor').on('change ', function(e) {
            var testval = this.value;
            // console.log('malauthor');
            var tested = maltitleregex(testval);
            if (tested) {

                $('#malauthorerror').hide();
            } else {

                $('#malauthor').focus();
                $('#malauthorerror').slideDown("slow");
            }



        });


        $('#entooltip').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#tooltiperror').hide();
            } else {
                $('#entooltip').focus();
                $('#tooltiperror').slideDown("slow");

            }

        });

        $('#entooltip1').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#tooltiperror1').hide();
            } else {
                $('#entooltip1').focus();
                $('#tooltiperror1').slideDown("slow");
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
        $('#maltooltip1').on('change ', function(e) {
            var testval = this.value;
            var tested = maltitleregex(testval);
            if (tested) {

                $('#maltooltiperror1').hide();
            } else {

                $('#maltooltip1').focus();
                $('#maltooltiperror1').slideDown("slow");
            }

        });


        $('#alttext').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#alttexterror').hide();

            } else {

                $('#alttext').focus();
                $('#alttexterror').slideDown("slow");

            }

        });

        $('#alttext1').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#alttexterror1').hide();


            } else {

                $('#alttext1').focus();
                $('#alttexterror1').slideDown("slow");
            }

        });

        $('#extras').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#extraserror').hide();

            } else {
                $('#extras').focus();
                $('#extraserror').slideDown("slow");

            }

        });

        $('#extras1').on('change ', function(e) {
            var testval = this.value;
            var vald = entitleregex(testval);
            if (vald) {
                $('#extraserror1').hide();
            } else {
                $('#extras1').focus();
                $('#extraserror1').slideDown("slow");

            }

        });

        $('#image').bind('change', function() {

            var ext = $('#image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                $('#imageerror').slideDown("slow");
                $('#imageerror1').slideUp("slow");
                $('#image').val('');

            } else {
                var picsize = (this.files[0].size);
                if (picsize > 5000000) {
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
                if (picsize > 5000000) {
                    $('#imageerror3').slideDown("slow");
                    $('#image1').val('');

                } else {

                    $('#imageerror3').slideUp("slow");
                }
                $('#imageerror2').slideUp("slow");
            }
        });



        $("#transactionbutton").click(function(event) {
            event.preventDefault();
            $('#malbrieferror').hide();
            $('#malauthorerror').hide();
            $('#malcontenterror').hide();
            $('#titleerror').hide();
            $('#maltitleerror').hide();
            $('#titleerror1').hide();
            $('#maltitleerror1').hide();
            $('#subtitleerror').hide();
            $('#malsubtitleerror').hide();
            $('#subtitleerror1').hide();
            $('#malsubtitleerror1').hide();
            $('#authorerror').hide();
            $('#authorerror1').hide();
            $('#brieferror').hide();
            $('#brieferror1').hide();
            $('#contenterror').hide();
            $('#contenterror1').hide();
            $('#tooltiperror').hide();
            $('#tooltiperror1').hide();
            $('#maltooltiperror').hide();
            $('#maltooltiperror1').hide();
            $('#alttexterror').hide();
            $('#alttexterror1').hide();
            $('#extraserror').hide();
            $('#extraserror1').hide();
            $('#imageerror1').hide();
            $('#imageerror').hide();
            $('#imageerror2').hide();
            $('#imageerror3').hide();

            $('.modal-title').text('Add New Download');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            // $("#transactionmodal").modal('show');
            var usertype = $("#usertypeid").val();
            var action_url = '';
            if (usertype == 4) {
                action_url = "{{ route('webadmin.articlecreate') }}";
            } else if (usertype == 2) {
                action_url = "{{ route('siteadmin.articlecreate') }}";
            }


            $.ajax({
                url: action_url,
                dataType: "json",
                success: function(data) {
                    if (usertype == 4) {
                        window.location.href = '/siteadmin/newarticlelist';
                    } else if (usertype == 5) {
                        window.location.href = '/siteadmin/newarticlelist';
                    } else if (usertype == 2) {
                        window.location.href = '/siteadmin/newarticlelist';
                    }
                   

                    /*$('#filetypes_id').empty();
                    $('#filetypes_id').append($('<option></option>').val('0').html('Select'));
                    $.each(data.filetype, function(index, element) {
                        $('#filetypes_id').append(
                            $('<option></option>').val(element.id).html(element.entitle)
                        );
                    });*/

                    $('#components_id').empty();
                    $('#components_id').append($('<option></option>').val('').html('Select'));
                    $.each(data.component, function(index, element) {
                        $('#components_id').append($('<option></option>').val(element.id).html(element.entitle));
                    });

                    $('#articlecategories_id').empty();
                    $('#articlecategories_id').append($('<option></option>').val('').html(
                        'Select'));
                    $.each(data.articlecategory, function(index, element) {
                        $('#articlecategories_id').append(
                            $('<option></option>').val(element.id).html(element
                                .entitle)
                        );
                    });





                    $('#entitle').val('');
                    $('#maltitle').val('');
                    $('#ensubtitle').val('');
                    $('#malsubtitle').val('');
                    $('#enauthor').val('');
                    $('#malauthor').val('');
                    $('#enbrief').val('');
                    $('#malbrief').val('');
                    $('#encontent').val('');
                    $('#malcontent').val('');
                    $('#extras').val('');
                    $('#alttext').val('');
                    $('#entooltip').val('');
                    $('#maltooltip').val('');


                    $('.modal-title').text('Add New Article');
                    $('#actionbutton').val('Save Details');
                    $('#action').val('Add');
                    $('#ajaxformresults').html('');
                    $("#transactionmodal").modal('show');
                }
            })

        });

        $('.ajaxmodalform').on('submit', function(event) { 
            var formData = new FormData(this);
            event.preventDefault();
            console.log($(this).serialize());
            var action_url = '';
            var usertype = $("#usertypeid").val();
            var action_url = '';
            if (usertype == 4) {
                if ($('#action').val() == 'Add')
                    action_url = "/webadmin/articlestore";

                if ($('#action').val() == 'Edit')
                    action_url = "/webadmin/articleupdate";
                // action_url = "/webadmin/articleedit/" + id;
            }  else if (usertype == 2) {
                if ($('#action').val() == 'Add')
                    action_url = "/siteadmin/articlestore";
                // action_url = "{{ route('siteadmin.articlestore') }}";

                if ($('#action').val() == 'Edit')
                    action_url = "/siteadmin/articleupdate";
                // action_url = "{{ route('siteadmin.articleupdate') }}";
                // action_url = "/siteadmin/articleedit/" + id;
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
                        swal("Warning", data.errors, "warning");

                    }
                    if (data.success) {

                        swal({
                                title: data.success,
                                text: data.success,
                                type: 'info',
                                buttonsStyling: false,
                                reverseButtons: true
                            })
                            .then((value) => {
                                if (value) {
                                    // $('#loader').show();
                                    $('#ajaxmodalform')[0].reset();
                                    window.location = 'articlelist';
                                }
                            });
                        //    html = '<div class="alert alert-success">' + data.success + '</div>';
                        //    $('#ajaxmodalform')[0].reset();
                        //    window.location.reload();
                        //    $('#transactionmodal').modal('hide');
                    }
                }
            });
        });



        $(document).on('click', '.edit', function() {
            $('#malbrieferror').hide();
            $('#malauthorerror').hide();
            $('#malcontenterror').hide();
            $('#titleerror').hide();
            $('#maltitleerror').hide();
            $('#titleerror1').hide();
            $('#maltitleerror1').hide();
            $('#subtitleerror').hide();
            $('#malsubtitleerror').hide();
            $('#subtitleerror1').hide();
            $('#malsubtitleerror1').hide();
            $('#authorerror').hide();
            $('#authorerror1').hide();
            $('#brieferror').hide();
            $('#brieferror1').hide();
            $('#contenterror').hide();
            $('#contenterror1').hide();
            $('#tooltiperror').hide();
            $('#tooltiperror1').hide();
            $('#maltooltiperror').hide();
            $('#maltooltiperror1').hide();
            $('#alttexterror').hide();
            $('#alttexterror1').hide();
            $('#extraserror').hide();
            $('#extraserror1').hide();
            $('#imageerror1').hide();
            $('#imageerror').hide();
            $('#imageerror2').hide();
            $('#imageerror3').hide();
            var id = $(this).attr('id');
            $('#ajaxformresults').html('');
            var usertype = $("#usertypeid").val();
            var action_url2 = '';
            if (usertype == 4) {
                action_url2 = "/webadmin/articleedit/" + id;
            } else if (usertype == 2) {
                action_url2 = "/siteadmin/articleedit/" + id;
            }
            $('#action').val('Edit');
            $.ajax({
                url: action_url2,
                dataType: "json",
                success: function(data) {
                    if (data.error) {
                        alert("The Article is Locked, So cannot be edited!");
                    } else {

                        $("#uploadedimage").attr('src', "{{asset('Article')}}/" + data
                            .resultdata.poster);
                        // alert(data.resultdata.entooltip);
                        $('#entitle1').val(data.resultdata.entitle);
                        $('#maltitle1').val(data.resultdata.maltitle);
                        $('#entooltip1').val(data.resultdata.entooltip);
                        $('#maltooltip1').val(data.resultdata.maltooltip);
                        $('#ensubtitle1').val(data.resultdata.ensubtitle);
                        $('#malsubtitle1').val(data.resultdata.malsubtitle);
                        $('#enauthor1').val(data.resultdata.enauthor);
                        $('#malauthor1').val(data.resultdata.malauthor);
                        /*$('#enbrief1').val(data.resultdata.enbrief);
                        $('#malbrief1').val(data.resultdata.malbrief);
                        $('#encontent1').val(data.resultdata.encontent);
                        $('#malcontent1').val(data.resultdata.malcontent);*/
                        $('#enbrief1').html(escape($('#enbrief1').summernote('code', data.resultdata.enbrief)));
                        $('#malbrief1').html(escape($('#malbrief1').summernote('code', data.resultdata.malbrief)));
                        $('#encontent1').html(escape($('#encontent1').summernote('code', data.resultdata.encontent)));

                        $('#malcontent1').html(escape($('#malcontent1').summernote('code', data.resultdata.malcontent)));


                        // var encnt=jQuery('<table />').text(data.resultdata.encontent).html();
                        // alert(jQuery('<table />').text(data.resultdata.encontent).html());
                        // tinymce.init({
                        //     selector: "#enbrief1"
                        // });
                        // tinymce.get("enbrief1").setContent(data.resultdata.enbrief);
                        // $('#encontent1').val(data.resultdata.encontent);
                        // $('#enbrief1').val(data.resultdata.enbrief);
                        // $('#malbrief1').summernote('code', data.resultdata.malbrief);
                        // $('#encontent1').summernote('code', escape(encnt));
                        // $('#malcontent1').summernote('code', data.resultdata.malcontent);
                        $('#extras1').val(data.resultdata.extras);
                        $('#alttext1').val(data.resultdata.alt);

                        if (data.resultdata.homepagestatus == 1) {
                            $('#homepagestatus1').prop('checked', true);
                        } else {
                            $('#homepagestatus1').prop('checked', false);
                        }


                        $('#components_id1').empty();
                        $('#components_id1').append($('<option></option>').val('').html(
                            'Select'));
                        $.each(data.component, function(index, element) {
                            $('#components_id1').append(
                                $('<option></option>').val(element.id).html(element
                                    .entitle)
                            );
                            element.id == data.resultdata.components_id ? $(
                                '#components_id1').val(element.id).prop('selected',
                                true) : '';
                        });

                        $('#articlecategories_id1').empty();
                        $('#articlecategories_id1').append($('<option></option>').val('').html(
                            'Select'));
                        $.each(data.articlecategory, function(index, element) {
                            $('#articlecategories_id1').append(
                                $('<option></option>').val(element.id).html(element
                                    .entitle)
                            );
                            element.id == data.resultdata.articlecategories_id ? $(
                                '#articlecategories_id1').val(element.id).prop(
                                'selected', true) : '';
                        });




                        $('#hidden_id1').val(id);
                        $('.modal-title').text('Edit Details');
                        $('#actionbutton1').val('Update Details');
                        $('#action1').val('Edit');
                        $('#transactionmodal1').modal('show');
                    }
                }
            })
        });


        $(document).on('click', '.uplddet', function() {
            var id = $(this).attr('id');
            $('#malbrieferror').hide();
            $('#malauthorerror').hide();
            $('#malcontenterror').hide();
            $('#titleerror').hide();
            $('#maltitleerror').hide();
            $('#titleerror1').hide();
            $('#maltitleerror1').hide();
            $('#subtitleerror').hide();
            $('#malsubtitleerror').hide();
            $('#subtitleerror1').hide();
            $('#malsubtitleerror1').hide();
            $('#authorerror').hide();
            $('#authorerror1').hide();
            $('#brieferror').hide();
            $('#brieferror1').hide();
            $('#contenterror').hide();
            $('#contenterror1').hide();
            $('#tooltiperror').hide();
            $('#tooltiperror1').hide();
            $('#maltooltiperror').hide();
            $('#maltooltiperror1').hide();
            $('#alttexterror').hide();
            $('#alttexterror1').hide();
            $('#extraserror').hide();
            $('#extraserror1').hide();
            $('#imageerror1').hide();
            $('#imageerror').hide();
            $('#imageerror2').hide();
            $('#imageerror3').hide();
            $('#ajaxformresults').html('');
            var usertype = $("#usertypeid").val();
            var action_url2 = '';
            if (usertype == 4) {
                action_url2 = "/webadmin/articleuplddet/" + id;
            } else if (usertype == 2) {
                action_url2 = "/siteadmin/articleuplddet/" + id;
            }
            $('.uploaddet').empty();
            $.ajax({
                url: action_url2,
                dataType: "json",
                success: function(data) {

                    $.each(data.resultdata, function(index, element) {
                        $('.uploaddet').append('<p>' + element.entitle + '</p>');

                    });



                    $('.modal-title').text('Details');
                    $('#transactionmodalupld').modal('show');
                }

            })
        });

        $(document).on('click', '.active', function() {

            var id = $(this).attr('id');
            var usertype = $("#usertypeid").val();
            var action_url3 = '';
            if (usertype == 4) {
                action_url3 = "/webadmin/articlestatus/" + id;
            } else if (usertype == 2) {
                action_url3 = "/siteadmin/articlestatus/" + id;
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
                action_url4 = "/webadmin/articledestroy/" + element_id;
            } else if (usertype == 2) {
                action_url4 = "/siteadmin/articledestroy/" + element_id;
            }
            swal({
                    title: "Deleting Article List",
                    text: "Are you sure to delete Article List?",
                    type: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((isconfirm) => {
                    if (isconfirm) {
                        $.ajax({
                            url: action_url4,
                            dataType: "json",
                            success: function(data) {
                                $('#loader').hide();
                                swal({
                                        title: 'Article List Deleted',
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
                            }
                        });
                    }
                });
        });

        $('#ok_button').click(function() {
            var usertype = $("#usertypeid").val();
            var action_url4 = '';
            if (usertype == 4) {
                action_url4 = "/webadmin/articledestroy/" + element_id;
            } else if (usertype == 2) {
                action_url4 = "/siteadmin/articledestroy/" + element_id;
            }

            $.ajax({
                url: action_url4,
                dataType: "json",

                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        window.location.reload();
                        alert('Data Deleted');
                    }, 200);
                }
            })
        });



        $(".close1").click(function() {
            $('#transactionmodal').modal('hide');

        });

        $(document).on('click', '.view', function() {
            // alert("sss")
            $('#viewmodal').modal('show');
            var usertype = $("#usertypeid").val();
            var element_id = $(this).attr('id');
            alert(element_id)
            var action_url_view = '';
            if (usertype == 4) {
                action_url_view = "/webadmin/viewdetailsarticle/" + element_id;
            } else if (usertype == 2) {
                action_url_view = "/siteadmin/viewdetailsarticle/" + element_id;
            }

            $.ajax({
                url: action_url_view,
                dataType: "json",

                success: function(data) {

                }
            })
        });

        /*---------------------------------- End of Document Ready ---------------------------*/
    });
</script>
@endsection
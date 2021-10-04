@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
  <div class="row ">
    <div class="col-12 py-2  ">
      <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
        <ol class="breadcrumb justify-content-end px-3 pt-2">

          @if(Auth::user()->usertypes_id==4)
          <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
          @elseif(Auth::user()->usertypes_id==3)
          <li class="breadcrumb-item"><a class="no_link" href="{{ route('siteadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
          @endif
        </ol>

      </nav>
    </div> <!-- col12 -->
    <div class="col-12 py-1 px-2 ">
      <p class="eng_xxs px-3 fg-darkBrown"> Widgetlink List </p>
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
<!-- Modal -->
<div class="modal fade" id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->

      @if(Auth::user()->usertypes_id==4)
      <form action="{{ route('webadmin.widgetlinkstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
        @elseif(Auth::user()->usertypes_id==3)
        <form action="{{ route('siteadmin.widgetlinkstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
          @endif
          @csrf
          <div class="modal-body adminpage">

            <div id="form_section">

              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Menu Type </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <select required class="form-control customform eng_xxxs fg-darkCrimson" id="menutypeid" name="menutypeid"></select>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow" id="showdiv">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Path </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">

                  <input type="text" id="urlpath" name="urlpath" class="form-control customform eng_xxxs fg-darkCrimson">
                  <p class="ErrP" id="urlpatherror" style="display:none; color:#FF0000;">
                    Invalid format.
                  </p>
                  <p class="ErrP" id="imageerror2" style="display:none; color:#FF0000;">
                    Invalid File format.
                  </p>
                  <p class="ErrP" id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                    Allowed size 1 MB.
                  </p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow" id="showdiv2">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Article </label>
                  <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the article.</small>
                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <select required class="form-control customform eng_xxxs fg-darkCrimson" id="articleid" name="articleid">
                    <option>Select Component</option>
                  </select>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->


              <div class="row customformrow" id="showdiv1">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <a href="" id="fileview" target="_blank">View</a>
                  <input type="file" id="filename" name="filename">
                  <p class="ErrP" id="fileerror2" style="display:none; color:#FF0000;">
                    Invalid File format.
                  </p>
                  <p class="ErrP" id="fileerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                    Allowed size 1 MB.
                  </p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Poster </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="file" id="image" name="image" required>
                  <p class="ErrP" id="imageerror" style="display:none; color:#FF0000;">
                    Invalid File format.
                  </p>
                  <p class="ErrP" id="imageerror1" style="display:none; color:#FF0000;" class="mal_xxxs">
                    Allowed size 1 MB.
                  </p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext" name="alttext" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3">
                  <p class="ErrP" id="alttexterror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3">
                  <p class="ErrP" id="titleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="250" minlength="3">
                  <p class="ErrP" id="maltitleerror" style="display:none; color:#FF0000;">Only malayalam Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
                  
                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon" name="icon" aria-describedby="HELPNAME" placeholder="Name" maxlength="150" minlength="3">
                    <p class="ErrP" id="iconerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->   
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip" name="entooltip" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3">
                  <p class="ErrP" id="tooltiperror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip" name="maltooltip" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="250" minlength="3">
                  <p class="ErrP" id="maltooltiperror" style="display:none; color:#FF0000;">Only malayalam Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3">
                  <p class="ErrP" id="subtitleerror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="250" minlength="3">
                  <p class="ErrP" id="malsubtitleerror" style="display:none; color:#FF0000;">Only malayalam Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="5000" minlength="3"></textarea>
                  <p class="ErrP" id="contenterror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <textarea required class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="10000" minlength="3"></textarea>
                  <p class="ErrP" id="malcontenterror" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>

                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
                  
                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon" name="icon" aria-describedby="HELPNAME" placeholder="Name" maxlength="150" minlength="3">
                    <p class="ErrP" id="iconerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
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
    </div> <!-- ./modal-content -->
  </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->

<!-- Modal -->
<div class="modal fade" id="transactionmodal1" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->

      @if(Auth::user()->usertypes_id==4)
      <form action="{{ route('webadmin.widgetlinkupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
        @elseif(Auth::user()->usertypes_id==3)
        <form action="{{ route('siteadmin.widgetlinkupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">

          @endif
          @csrf
          <div class="modal-body adminpage">

            <div id="form_section">
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Menu Type </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <select class="form-control customform eng_xxxs fg-darkCrimson" id="menutypeid1" name="menutypeid1"></select>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow" id="showdiv3">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Path </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">

                  <input type="text" id="urlpath1" name="urlpath1" class="form-control customform eng_xxxs fg-darkCrimson">
                  <p class="ErrP" id="urlpatherror1" style="display:none; color:#FF0000;">
                    Invalid format.
                  </p>
                  <p class="ErrP" id="imageerror2" style="display:none; color:#FF0000;">
                    Invalid File format.
                  </p>
                  <p class="ErrP" id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                    Allowed size 1 MB.
                  </p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow" id="showdiv5">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Article </label>
                  <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the article.</small>
                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <select class="form-control customform eng_xxxs fg-darkCrimson" id="articleid1" name="articleid1">
                    <option>Select Component</option>
                  </select>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->


              <div class="row customformrow" id="showdiv4">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <a href="" id="fileview1" target="_blank">View</a>
                  <!-- <div class="imagedittt"> -->
                  <input type="file" id="filename12" name="filename12">
                  <p class="ErrP" id="fileerror6" style="display:none; color:#FF0000;">
                    Invalid File format.
                  </p>
                  <p class="ErrP" id="fileerror7" style="display:none; color:#FF0000;" class="mal_xxxs">
                    Allowed size 1 MB.
                  </p>
                  <!-- </div> -->
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow filerow" style="display:none">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">File </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">

                  <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="uploadedimagefie">

                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Poster </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="uploaded">
                  <input type="file" id="imageedit" name="imageedit">
                  <p class="ErrP" id="imageerror4" style="display:none; color:#FF0000;">
                    Invalid File format.
                  </p>
                  <p class="ErrP" id="imageerror5" style="display:none; color:#FF0000;" class="mal_xxxs">
                    Allowed size 1 MB.
                  </p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Alternative Text </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext1" name="alttext1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                  <p class="ErrP" id="alttexterror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle1" name="entitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                  <p class="ErrP" id="titleerror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle1" name="maltitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                  <p class="ErrP" id="maltitleerror1" style="display:none; color:#FF0000;">Only malayalam Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entooltip1" name="entooltip1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="3">
                  <p class="ErrP" id="tooltiperror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Tooltip in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltooltip1" name="maltooltip1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                  <p class="ErrP" id="maltooltiperror1" style="display:none; color:#FF0000;">Only malayalam Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle1" name="ensubtitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="3">
                  <p class="ErrP" id="subtitleerror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle1" name="malsubtitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="100" minlength="3">
                  <p class="ErrP" id="malsubtitleerror1" style="display:none; color:#FF0000;">Only malayalam Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent1" name="encontent1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea>
                  <p class="ErrP" id="contenterror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>
                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>

                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                  <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent1" name="malcontent1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea>
                  <p class="ErrP" id="malcontenterror1" style="display:none; color:#FF0000;">Only A -Z a-z Characters are allowed.</p>

                </div> <!-- ./col-md-6 -->
              </div> <!-- ./row -->
              <div class="row customformrow">
                <div class="col-md-6 py-2">
                  <label for="IDNAME" class="eng_xxxs fg-darkBrown">Icon </label>
                  
                </div> <!-- ./col-md-6 -->
                <div class="col-md-6 py-2">
                    <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="icon1" name="icon1" aria-describedby="HELPNAME" placeholder="Name" maxlength="150" minlength="3">
                    <p class="ErrP" id="iconerror1" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
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
    $('#showdiv').hide();
    $('#showdiv1').hide();
    $('#showdiv2').hide();

    $('#showdiv3').hide();
    $('#showdiv4').hide();
    $('#showdiv5').hide();



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
    $('#filename').bind('change', function() {

      var ext = $('#filename').val().split('.').pop().toLowerCase();
      // console.log("sadasd "+ext);
      if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        // console.log("sadasd "+ext);

        $('#fileerror2').slideDown("slow");
        $('#fileerror3').slideUp("slow");
        $('#filename').val('');

      } else {
        var picsize = (this.files[0].size);
        if (picsize > 1000000) {
          $('#fileerror3').show();
          $('#fileerror3').slideDown("slow");
          $('#filename').val('');

        } else {
          $('#fileerror3').hide();
          $('#fileerror3').slideUp("slow");
        }
        $('#fileerror2').hide();
        $('#fileerror2').slideUp("slow");
      }
    });

    $('#filename1').bind('change', function() {

      var ext = $('#filename1').val().split('.').pop().toLowerCase();
      // console.log("sadasd "+ext);
      if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        // console.log("sadasd "+ext);

        $('#fileerror4').slideDown("slow");
        $('#fileerror5').slideUp("slow");
        $('#filename1').val('');

      } else {
        var picsize = (this.files[0].size);
        if (picsize > 1000000) {
          $('#fileerror5').show();
          $('#fileerror5').slideDown("slow");
          $('#filename1').val('');

        } else {
          $('#fileerror5').hide();
          $('#fileerror5').slideUp("slow");
        }
        $('#fileerror4').hide();
        $('#fileerror4').slideUp("slow");
      }
    });
    $('#filename12').bind('change', function() {

      var ext = $('#filename1').val().split('.').pop().toLowerCase();
      // console.log("sadasd "+ext);
      if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        // console.log("sadasd "+ext);

        $('#fileerror6').slideDown("slow");
        $('#fileerror7').slideUp("slow");
        $('#filename12').val('');

      } else {
        var picsize = (this.files[0].size);
        if (picsize > 1000000) {
          $('#fileerror7').show();
          $('#fileerror7').slideDown("slow");
          $('#filename12').val('');

        } else {
          $('#fileerror7').hide();
          $('#fileerror7').slideUp("slow");
        }
        $('#fileerror6').hide();
        $('#fileerror6').slideUp("slow");
      }
    });
    $('#urlpath').on('change ', function(e) {
      var testval = this.value;
      var tested = "";
      if ($('#menutypeid').val() == 2) { //url
        tested = new RegExp("((http|https)://)(www.)?[a-zA-Z0-9@:%._\\+~#?&//=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%._\\+~#?&//=]*)");

      }
      if ($('#menutypeid').val() == 1) { //anchor
        tested = new RegExp('^[a-zA-Z0-9 _\\-\\/\s]+$');
      }
      // console.log("sadasddd "+menutypeid);
      // if($('#menutypeid').val()==3){
      //     var ext = $('#filename').val().split('.').pop().toLowerCase();
      //     console.log("sadasd "+ext);
      //   if ($.inArray(ext, ['png','jpg','jpeg']) == -1){
      //     $('#imageerror2').slideDown("slow");
      //     $('#imageerror3').slideUp("slow");
      //     $('#filename').val('');

      //   }else{
      //     var picsize = (this.files[0].size);
      //     if (picsize > 1000000){
      //       $('#imageerror3').slideDown("slow");
      //       $('#filename').val('');

      //     }else{

      //       $('#imageerror3').slideUp("slow");
      //     }
      //     $('#imageerror2').slideUp("slow");
      //   } 
      // }

      if ($('#menutypeid').val() == '') {
        $('#urlpath').val('');

        $('#urlpatherror').slideDown("slow");
      }
      if (!tested.test(testval)) {
        $('#urlpath').val('');

        $('#urlpatherror').slideDown("slow");

      } else {
        $('#urlpatherror').hide();

      }

    });
    $('#urlpath1').on('change ', function(e) {
      var testval = this.value;
      var tested = "";
      if ($('#menutypeid1').val() == 2) { //url
        tested = new RegExp("((http|https)://)(www.)?[a-zA-Z0-9@:%._\\+~#?&//=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%._\\+~#?&//=]*)");

      }
      if ($('#menutypeid1').val() == 1) { //anchor
        tested = new RegExp('^[a-zA-Z0-9 _\\-\\/\s]+$');
      }
      if (!tested.test(testval)) {
        $('#urlpath1').val('');

        $('#urlpatherror1').slideDown("slow");

      } else {
        $('#urlpatherror1').hide();

      }

    });

    // $('#entitle').on('change ', function(e) {
    //   var testval = this.value;
    //   var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //   if (!tested.test(testval)) {
    //     $('#entitle').val('');

    //     $('#titleerror').slideDown("slow");

    //   } else {
    //     $('#titleerror').hide();

    //   }

    // });
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
    //   var testval = this.value;
    //   var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
    //   if (!tested.test(testval)) {
    //     $('#entitle').val('');

    //     $('#titleerror1').slideDown("slow");

    //   } else {
    //     $('#titleerror1').hide();

    //   }

    // });

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

        $('authorerror').slideDown("slow");

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

    $('#enbrief').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#enbrief').val('');

        $('brieferror').slideDown("slow");

      } else {
        $('#brieferror').hide();

      }

    });

    $('#enbrief1').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#enbrief1').val('');

        $('#brieferror1').slideDown("slow");

      } else {
        $('#brieferror1').hide();

      }

    });

    $('#encontent').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#encontent').val('');

        $('#contenterror').slideDown("slow");

      } else {
        $('#contenterror').hide();

      }

    });

    $('#encontent1').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#encontent1').val('');

        $('#contenterror1').slideDown("slow");

      } else {
        $('#contenterror1').hide();
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
        if(!vald){
        $('#alttext').val('');

        $('#alttexterror').slideDown("slow");

      } else {
        $('#alttexterror').hide();

      }

    });

    $('#alttext1').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#alttext1').val('');

        $('#alttexterror1').slideDown("slow");

      } else {
        $('#alttexterror1').hide();

      }

    });

    $('#extras').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#extras').val('');

        $('#extraserror').slideDown("slow");

      } else {
        $('#extraserror').hide();

      }

    });

    $('#extras1').on('change ', function(e) {
      var testval = this.value;
      var vald=entitleregex(testval);
        if(!vald){
        $('#extras1').val('');

        $('#extraserror1').slideDown("slow");

      } else {
        $('#extraserror1').hide();

      }

    });

    // $('#maltitle').on('change ', function(e) {
    //   var testval = this.value;

    //   var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //   if (XRegExp.test(testval, pattern)) {
    //     $('#maltitleerror').hide();
    //   } else {
    //     $('#maltitle').val('');
    //     $('#maltitleerror').slideDown("slow");
    //   }

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

 $('#maltitle1').on('change ', function(e) {
     
     var testval = this.value;
     var tested = maltitleregex(testval);
     if (tested) {      
         $('#maltitleerror1').hide();
     }
     else{         
         $('#maltitle1').val('');
         $('#maltitleerror1').slideDown("slow");
     }

 });
    // $('#maltitle1').on('change ', function(e) {
    //   var testval = this.value;

    //   var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
    //   if (XRegExp.test(testval, pattern)) {
    //     $('#maltitleerror1').hide();
    //   } else {
    //     $('#maltitle1').val('');
    //     $('#maltitleerror1').slideDown("slow");
    //   }

    // });

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

    $('#malcontent').on('change ', function(e) {
      var testval = this.value;

      var tested = maltitleregex(testval);
        if (tested) { 
        $('#malcontenterror').hide();
      } else {
        $('#malcontent').val('');
        $('#malcontenterror').slideDown("slow");
      }

    });
    $('#malcontent1').on('change ', function(e) {
      var testval = this.value;

      var tested = maltitleregex(testval);
        if (tested) { 
        $('#malcontenterror1').hide();
      } else {
        $('#malcontent1').val('');
        $('#malcontenterror1').slideDown("slow");
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

    $('#menutypeid').on('change ', function(e) {
      var menutype = $("#menutypeid option:selected").text();
      if (menutype == 'File') {
        $('#showdiv').hide();
        $('#showdiv1').show();
        $('#showdiv2').hide();
      } else if (menutype == 'Article') {
        $('#showdiv').hide();
        $('#showdiv1').hide();
        $('#showdiv2').show();
      } else {
        $('#showdiv1').hide();
        $('#showdiv').show();
        $('#showdiv2').hide();
      }

    });

    $('#menutypeid1').on('change ', function(e) {
      var menutype1 = $("#menutypeid1 option:selected").text();

      if (menutype1 == 'File') {

        $('#showdiv3').hide();
        $('#showdiv4').show();
        $('#showdiv5').hide();
        // $(".imagedittt").detach().appendTo('#fileview1');
      } else if (menutype1 == 'Article') {
        $('#showdiv3').hide();
        $('#showdiv4').hide();
        $('#showdiv5').show();
      } else {
        $('#showdiv4').hide();
        $('#showdiv3').show();
        $('#showdiv5').hide();
      }

    });



    $("#transactionbutton").click(function(event) {
      event.preventDefault();
      $('.ErrP').hide();
      $('.modal-title').text('Add New Widgetlink');
      $('#actionbutton').val('Save Details');
      $('#action').val('Add');
      $('#ajaxformresults').html('');
      $("#transactionmodal").modal('show');

      var usertype = $("#usertypeid").val();
      var action_url = '';
      if (usertype == 3) {
        action_url = "{{ route('siteadmin.widgetlinkcreate') }}";
      } else if (usertype == 4) {
        action_url = "{{ route('webadmin.widgetlinkcreate') }}";

      }

      $.ajax({
        url: action_url,
        dataType: "json",
        success: function(data) {
          $('#menutypeid').empty();
          $('#menutypeid').append($('<option></option>').val('0').html('Select'));
          $.each(data.menutype, function(index, element) {
            $('#menutypeid').append(
              $('<option></option>').val(element.id).html(element.entitle)
            );
          });

          $('#articleid').empty();
          $('#articleid').append($('<option></option>').val('0').html('Select'));
          $.each(data.article, function(index, element) {
            $('#articleid').append(
              $('<option></option>').val(element.id).html(element.entitle)
            );
          });





          $('.modal-title').text('Add New Widgetlink');
          $('#actionbutton').val('Save Details');
          $('#action').val('Add');
          $('#ajaxformresults').html('');
          $("#transactionmodal").modal('show');
        }
      })


    });

    // $('#icon').on('change ', function(e) {
    //   var testval = this.value;
    //   var tested = new RegExp('^[a-zA-Z \s]+$');
    //   if (!tested.test(testval))
    //   {
    //     $('#icon').val('');
        
    //      $('#iconerror').slideDown("slow");

    //   }
    //   else
    //   {
    //      $('#iconerror').hide();
         
    //   }
          
    // });
    // $('#icon1').on('change ', function(e) {
    //   var testval = this.value;
    //   var tested = new RegExp('^[a-zA-Z \s]+$');
    //   if (!tested.test(testval))
    //   {
    //     $('#icon1').val('');
        
    //      $('#iconerror1').slideDown("slow");

    //   }
    //   else
    //   {
    //      $('#iconerror1').hide();
         
    //   }
          
    // });


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





    $(document).on('click', '.edit', function() {
      var id = $(this).attr('id');
      $('.ErrP').hide();
      $('#ajaxformresults').html('');
      var usertype = $("#usertypeid").val();
      var action_url2 = '';
      if (usertype == 4) {
        action_url2 = "/webadmin/widgetlinkedit/" + id;
      } else if (usertype == 3) {
        action_url2 = "/siteadmin/widgetlinkedit/" + id;
      }
      $.ajax({
        url: action_url2,
        dataType: "json",
        success: function(data) {

          $("#uploaded").attr('src', "{{asset('Widgetlink')}}/" + data.resultdata.file);
          $('#entitle1').val(data.resultdata.entitle);
          $('#maltitle1').val(data.resultdata.maltitle);
          $('#entooltip1').val(data.resultdata.entooltip);
          $('#maltooltip1').val(data.resultdata.maltooltip);
          $('#ensubtitle1').val(data.resultdata.ensubtitle);
          $('#malsubtitle1').val(data.resultdata.malsubtitle);
          $('#encontent1').val(data.resultdata.encontent);
          $('#malcontent1').val(data.resultdata.malcontent);
          $('#alttext1').val(data.resultdata.alt);
          $('#icon1').val(data.resultdata.icon);

          if (data.resultdata.homepagestatus == 1) {
            $('#homepagestatus1').prop('checked', true);
          } else {
            $('#homepagestatus1').prop('checked', false);
          }
          $('#menutypeid1').empty();
          $('#menutypeid1').append($('<option></option>').val('0').html('Select'));
          $.each(data.menutype, function(index, element) {
            $('#menutypeid1').append(
              $('<option></option>').val(element.id).html(element.entitle)
            );
            element.id == data.resultdata.menulinktypes_id ? $('#menutypeid1').val(element.id).prop('selected', true) : '';
            //  console.log("df "+data.resultdata.menulinktypes_id);
            if (data.resultdata.menulinktypes_id == 3) {
              $('.filerow').show();
              $("#uploadedimagefie").attr('src', "{{asset('Widgetlink')}}/" + data.resultdata.fileval);
            } else {
              $('.filerow').hide();
            }
          });

          if (data.resultdata.menulinktypes_id == 4) {

            $('#showdiv4').hide();
            $('#showdiv3').hide();
            $('#showdiv5').show();

            $('#articleid1').empty();
            $('#articleid1').append($('<option></option>').val('0').html('Select'));
            $.each(data.article, function(index, element) {
              $('#articleid1').append(
                $('<option></option>').val(element.id).html(element.entitle)
              );
              element.id == data.resultdata.fileval ? $('#articleid1').val(element.id).prop('selected', true) : '';
            });



          } else if (data.resultdata.menulinktypes_id == 5) {
            $('#showdiv5').hide();
            $('#showdiv4').show();
            $('#showdiv3').hide();
            $("#fileview1").attr('href', "{{asset('Widgetlink')}}/" + data.resultdata.fileval);
          } else {

            $('#showdiv3').show();
            $('#showdiv4').hide();
            $('#showdiv5').hide();
            $("#uploadedimagefie").attr('src', "{{asset('Widgetlink')}}/" + data.resultdata.fileval);
            $('#urlpath1').val(data.resultdata.fileval);
          }
          // 







          $('#hidden_id1').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton1').val('Update Details');
          $('#action1').val('Edit');
          $('#transactionmodal1').modal('show');
        }
      })
    });

    $(document).on('click', '.active', function() {

      var id = $(this).attr('id');
      var usertype = $("#usertypeid").val();
      var action_url3 = '';
      if (usertype == 4) {
        action_url3 = "/webadmin/widgetlinkstatus/" + id;
      } else if (usertype == 3) {
        action_url3 = "/siteadmin/widgetlinkstatus/" + id;
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
        action_url4 = "/webadmin/widgetlinkdestroy/" + element_id;
      } else if (usertype == 3) {
        action_url4 = "/siteadmin/widgetlinkdestroy/" + element_id;
      }
      swal({
          title: "Deleting Widgetlink List",
          text: "Are you sure to delete Widgetlink List?",
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
                    title: 'Widgetlink List Deleted',
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

    //   $('#ok_button').click(function(){
    //     var usertype=$("#usertypeid").val(); 
    //       var action_url4 = '';
    //       if(usertype==4){
    //          action_url4 = "/webadmin/widgetlinkdestroy/"+element_id;
    //       } else if(usertype==3){
    //          action_url4 = "/siteadmin/widgetlinkdestroy/"+element_id;
    //       } 

    //     $.ajax({
    //             url:action_url4,
    //             dataType:"json",

    //             success:function(data)
    //             {
    //                setTimeout(function(){
    //                $('#confirmModal').modal('hide');
    //                window.location.reload();
    //                alert('Data Deleted');
    //                }, 200);
    //             }
    //     })
    // });



    $(".close1").click(function() {
      $('#transactionmodal').modal('hide');

    });

    /*---------------------------------- End of Document Ready ---------------------------*/
  });
</script>
@endsection
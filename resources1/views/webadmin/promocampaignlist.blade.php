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
        @endif
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown"> Promocampaign List </p>
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
     <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs"  id="transactionbutton" name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
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
                    <td><span class="eng_xxxxs"> {{ $res->entitle }} <hr class="py-1"> {{ $res->maltitle }}</span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->ensubtitle }} <hr class="py-1"> {{ $res->malsubtitle }}</span> </td>
                  
                  <td><span class="active" id="{{ $res->id }}"> @if($res->status==1)<i class="fas fa-check-square"></i>@elseif($res->status==2)  <i class="fas fa-window-close fg-darkTaupe"></i>@endif </span></td>
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
<div class="modal fade"  id="transactionmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
       @if(Auth::user()->usertypes_id==3)
        <form action="{{ route('siteadmin.promocampaignstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
        @elseif(Auth::user()->usertypes_id==4)
        <form action="{{ route('webadmin.promocampaignstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
        @endif
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <select class="form-control customform eng_xxxs fg-darkCrimson" id="contenttypes_id" name="contenttypes_id" required></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="filetypediv">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">File Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="filetypes_id" name="filetypes_id" required></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="uploaddiv">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="file"  id="image" name="image" required>
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
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="alttext" name="alttext" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p class="ErrP" id="alttexterror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p class="ErrP" id="titleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                <p class="ErrP" id="maltitleerror" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle" name="ensubtitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p class="ErrP" id="subtitleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle" name="malsubtitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                <p class="ErrP" id="malsubtitleerror" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Description </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="endesc" name="endesc" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3"></textarea>
                <p class="ErrP" id="endescerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Description in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea  class="form-control customform eng_xxxs fg-darkCrimson" id="maldesc" name="maldesc" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="250" minlength="3"></textarea>
                <p class="ErrP" id="maldescerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
           
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea>
                <p class="ErrP" id="encontenterror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea>
                <p class="ErrP" id="malcontenterror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Size </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="size" name="size" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p class="ErrP" id="sizeerror" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Duration </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="duration" name="duration" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p class="ErrP" id="durationerror" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
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
                <input type="checkbox" id="displaystatus" value="1" name="displaystatus" >
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
<div class="modal fade"  id="transactionmodal1" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
       @if(Auth::user()->usertypes_id==3)
         <form action="{{ route('siteadmin.promocampaignupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
           @elseif(Auth::user()->usertypes_id==4)
         <form action="{{ route('webadmin.promocampaignupdate') }}" id="ajaxmodalform1" method="post" class="form-horizontal" enctype="multipart/form-data">
         @endif
      
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                 <select class="form-control customform eng_xxxs fg-darkCrimson" id="contenttypes_id1" name="contenttypes_id1" ></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="filetypediv1">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">File Type </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="filetypes_id1" name="filetypes_id1" ></select>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow" id="uploaddiv1">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <img src="" class="img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson" alt="Image" id="uploadedimage">
                <span id="upfile"></span>
                <input type="file"  id="imageedit" name="imageedit" >
                  <p class="ErrP" id="imageerror2" style="display:none; color:#FF0000;">
                  Invalid File format.
                  </p>
                  <p class="ErrP" id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
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
                <p class="ErrP" id="alttexterror1" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle1" name="entitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p class="ErrP" id="titleerror1" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle1" name="maltitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                <p class="ErrP" id="maltitleerror1" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="ensubtitle1" name="ensubtitle1" aria-describedby="HELPNAME" placeholder="Name" maxlength="20" minlength="3">
                <p class="ErrP" id="subtitleerror1" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sub Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malsubtitle1" name="malsubtitle1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                <p class="ErrP" id="malsubtitleerror1" style="display:none; color:#FF0000;" >Only malayalam Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Description </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="endesc1" name="endesc1" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3"></textarea>
                <p class="ErrP" id="endescerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Description in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea  class="form-control customform eng_xxxs fg-darkCrimson" id="maldesc1" name="maldesc1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="250" minlength="3"></textarea>
                <p class="ErrP" id="maldesc1error" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
           
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="encontent1" name="encontent1" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea>
                <p class="ErrP" id="encontenterror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="malcontent1" name="malcontent1" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3"></textarea>
                <p class="ErrP" id="malcontent1error1" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Size </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="size1" name="size1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p class="ErrP" id="sizeerror1" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Duration </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="duration1" name="duration1" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="2">
                <p class="ErrP" id="durationerror1" style="display:none; color:#FF0000;" >Only numbers are allowed.</p>
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
                <input type="checkbox" id="displaystatus1" value="1" name="displaystatus1" >
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

<div id="confirmModal" class="modal" tabindex="-1"  role="dialog">
    <div class="modal-dialog"  role="document">
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
$(document).ready(function(){ 

  

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$('#resposivetable').DataTable( {
    responsive: true,
    aoColumnDefs: [
  {
     bSortable: false,
     aTargets: [ -1 ]
  }
]
} );
 

  $('#title').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#title').val('');
    
     $('#titleerror').slideDown("slow");

  }
  else
  {
     $('#titleerror').hide();
     
  }
      
});
$('#title1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#title1').val('');
    
     $('#titleerror1').slideDown("slow");

  }
  else
  {
     $('#titleerror1').hide();
     
  }
      
});

  $('#subtitle').on('change ', function(e) {
    var testval = this.value;
    var tested = new RegExp('^[a-zA-Z \s]+$');
    if (!tested.test(testval))
    {
      $('#subtitle').val('');
      
      $('#subtitleerror').slideDown("slow");

    }
    else
    {
      $('#subtitleerror').hide();
      
    }
      
});

$('#subtitle1').on('change ', function(e) {
    var testval = this.value;
    var tested = new RegExp('^[a-zA-Z \s]+$');
    if (!tested.test(testval))
    {
      $('#subtitle1').val('');
      
      $('#subtitleerror1').slideDown("slow");

    }
    else
    {
      $('#subtitleerror1').hide();
      
    }
      
});






$('#entitle').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#entitle').val('');
    
     $('#titleerror').slideDown("slow");

  }
  else
  {
     $('#titleerror').hide();
     
  }
      
});
$('#entitle1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#entitle1').val('');
    
     $('#titleerror1').slideDown("slow");

  }
  else
  {
     $('#titleerror1').hide();
     
  }
      
});

$('#ensubtitle').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#ensubtitle').val('');
    
     $('#subtitleerror').slideDown("slow");

  }
  else
  {
     $('#subtitleerror').hide();
     
  }
      
});
$('#ensubtitle1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#ensubtitle1').val('');
    
     $('#subtitleerror1').slideDown("slow");

  }
  else
  {
     $('#subtitleerror1').hide();
     
  }
      
});


$('#icon').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#icon').val('');
    
     $('#iconerror').slideDown("slow");

  }
  else
  {
     $('#iconerror').hide();
     
  }
      
});
$('#icon1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#icon1').val('');
    
     $('#iconerror1').slideDown("slow");

  }
  else
  {
     $('#iconerror1').hide();
     
  }
      
});




$('#encontent').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#encontent').val('');
    
     $('#encontenterror').slideDown("slow");

  }
  else
  {
     $('#encontenterror').hide();
     
  }
      
});
$('#encontent1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#encontent1').val('');
    
     $('#encontenterror1').slideDown("slow");

  }
  else
  {
     $('#encontenterror1').hide();
     
  }
      
});


$('#maldesc').on('change ', function(e) {
  var testval = this.value;
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
  $('#maldescerror').hide();
  
  }
  else
  {
    $('#maldesc').val('');
    
    $('#maldescerror').slideDown("slow");

     
  }
      
});
$('#maldesc1').on('change ', function(e) {
  var testval = this.value;
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
    
  $('#maldescerror1').hide();
  }
  else
  {
    $('#maldesc1').val('');
    
     $('#maldescerror1').slideDown("slow");
     
     
  }
      
});


$('#malcontent').on('change ', function(e) {
  var testval = this.value;
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
 
  $('#malcontenterror').hide();
  }
  else
  {
    $('#malcontent').val('');
    
    $('#malcontenterror').slideDown("slow");
   
    
     
  }
      
});
$('#malcontent1').on('change ', function(e) {
  var testval = this.value;
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
  $('#malcontenterror1').hide();
  
  }
  else
  {
   
    
    $('#malcontent1').val('');
    
    $('#malcontenterror1').slideDown("slow");
     
  }
      
});







$('#icon1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#icon1').val('');
    
     $('#iconerror1').slideDown("slow");

  }
  else
  {
     $('#iconerror1').hide();
     
  }
      
});
$('#icon').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#icon').val('');
    
     $('#iconerror').slideDown("slow");

  }
  else
  {
     $('#iconerror').hide();
     
  }
      
});

$('#endesc1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#endesc1').val('');
    
     $('#endescerror1').slideDown("slow");

  }
  else
  {
     $('#endescerror1').hide();
     
  }
      
});
$('#endesc').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#endesc').val('');
    
     $('#endescerror').slideDown("slow");

  }
  else
  {
     $('#endescerror').hide();
     
  }
      
});


  $('#alttext').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#alttext').val('');
    
     $('#alttexterror').slideDown("slow");

  }
  else
  {
     $('#alttexterror').hide();
     
  }
      
});

  $('#alttext1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#alttext1').val('');
    
     $('#alttexterror1').slideDown("slow");

  }
  else
  {
     $('#alttexterror1').hide();
     
  }
      
});

  $('#maltitle').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#maltitleerror').hide();
}
else{
$('#maltitle').val('');
  $('#maltitleerror').slideDown("slow");
}
      
});
$('#maltitle1').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#maltitleerror1').hide();
}
else{
$('#maltitle1').val('');
  $('#maltitleerror1').slideDown("slow");
}
      
});

$('#malsubtitle').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#malsubtitleerror').hide();
}
else{
$('#malsubtitle').val('');
  $('#malsubtitleerror').slideDown("slow");
}
      
});
$('#malsubtitle1').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
     $('#malsubtitleerror1').hide();
}
else{
$('#malsubtitle1').val('');
  $('#malsubtitleerror1').slideDown("slow");
}
      
});

 $('#size').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#size').val('');
    
     $('#sizeerror').slideDown("slow");

  }
  else
  {
     $('#sizeerror').hide();
     
  }
      
});

  $('#size1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#size1').val('');
    
     $('#sizeerror1').slideDown("slow");

  }
  else
  {
     $('#sizeerror1').hide();
     
  }
      
});

$('#duration').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#duration').val('');
    
     $('#durationerror').slideDown("slow");

  }
  else
  {
     $('#durationerror').hide();
     
  }
      
});

  $('#duration1').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[0-9. \s]+$');
  if (!tested.test(testval))
  {
    $('#duration1').val('');
    
     $('#durationerror1').slideDown("slow");

  }
  else
  {
     $('#durationerror1').hide();
     
  }
      
});

$('#image').bind('change', function() {
    var filetyp =$( "#filetypes_id option:selected" ).text(); 
    var ext = $('#image').val().split('.').pop().toLowerCase();
    if (ext!=filetyp){
      $('#imageerror').slideDown("slow");
      $('#imageerror1').slideUp("slow");
      $('#image').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror1').slideDown("slow");
        $('#image').val('');
     
      }else{
     
        $('#imageerror1').slideUp("slow");
      }
      $('#imageerror').slideUp("slow");
    }
  });

  $('#imageedit').bind('change', function() {
    var filetyp =$( "#filetypes_id1 option:selected" ).text(); 
    var ext = $('#imageedit').val().split('.').pop().toLowerCase(); 
    if (ext!=filetyp){
      $('#imageerror2').slideDown("slow");
      $('#imageerror3').slideUp("slow");
      $('#image1').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror3').slideDown("slow");
        $('#image1').val('');
     
      }else{
     
        $('#imageerror3').slideUp("slow");
      }
      $('#imageerror2').slideUp("slow");
    }
  });



$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.ErrP').hide();
    $('.modal-title').text('Add New Promo Campaign');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');
    $('#filetypediv').hide();
    $('#uploaddiv').hide();

    var usertype=$("#usertypeid").val(); 
    var action_url = '';
    if(usertype==3){
       action_url = "{{ route('siteadmin.promocampaigncreate') }}";
    } else if(usertype==4){
       action_url = "{{ route('webadmin.promocampaigncreate') }}";
    }
    
  $.ajax({
       url: action_url,
       dataType:"json",
       success:function(data)
        {
            

            /*$('#filetypes_id').empty();
            $('#filetypes_id').append($('<option></option>').val('0').html('Select'));
            $.each(data.filetype, function(index, element) {
                $('#filetypes_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });*/

            $('#contenttypes_id').empty();
            $('#contenttypes_id').append($('<option></option>').val('').html('Select'));
            $.each(data.contenttype, function(index, element) {
                $('#contenttypes_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

            

            $('#entitle').val('');
            $('#maltitle').val('');
            $('#ensubtitle').val('');
            $('#malsubtitle').val('');
            $('#endesc').val('');
            $('#maldesc').val('');
            $('#encontent').val('');
            $('#malcontent').val('');
            $('#size').val('');
            $('#duration').val('');
            $('#icon').val('');
            $('#alttext').val('');

            
            $('.modal-title').text('Add New Promo Campaign');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
       })
    
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
  

  $(document).on('change', '#contenttypes_id', function(){
    var id = $(this).val(); 
    $('.ErrP').hide();
    if(id!=''){
      var usertype=$("#usertypeid").val(); 
      var action_url2 = '';
      if(usertype==3){
         action_url2 = "/siteadmin/promofiletypelist/"+id;
      } else if(usertype==4){
         action_url2 = "/webadmin/promofiletypelist/"+id;
      }
    $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
            $('#filetypediv').show();
            $('#uploaddiv').show();
            $('#filetypes_id').empty();
            $('#filetypes_id').append($('<option></option>').val('').html('Select'));
            $.each(data.filetype, function(index, element) {
                $('#filetypes_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

        } 
    }); 
    }  else {
        $('#filetypediv').hide();
        $('#uploaddiv').hide();
    } 
  });

  $(document).on('change', '#contenttypes_id1', function(){
    var id = $(this).val(); 
    $('.ErrP').hide();
    if(id!=''){
       var usertype=$("#usertypeid").val(); 
      var action_url3 = '';
      if(usertype==3){
         action_url3 = "/siteadmin/promofiletypelist/"+id;
      } else if(usertype==4){
         action_url3 = "/webadmin/promofiletypelist/"+id;
      }
    $.ajax({
       url :action_url3,
       dataType:"json",
       success:function(data)
        { 
            $('#filetypediv1').show();
            $('#uploaddiv1').show();
            $('#filetypes_id1').empty();
            $('#filetypes_id1').append($('<option></option>').val('').html('Select'));
            $.each(data.filetype, function(index, element) {
                $('#filetypes_id1').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

        } 
    }); 
    } else {
        $('#filetypediv1').hide();
        $('#uploaddiv1').hide();
    }   
  }); 

  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('.ErrP').hide();
      $('#ajaxformresults').html('');
      var usertype=$("#usertypeid").val(); 
      var action_url4 = '';
      if(usertype==3){
         action_url4 = "/siteadmin/promocampaignedit/"+id;
      } else if(usertype==4){
         action_url4 = "/webadmin/promocampaignedit/"+id;
      }

      $.ajax({
       url :action_url4,
       dataType:"json",
       success:function(data)
        { 
          var resfile=data.resultdata.file;
          var ext=resfile.split('.');
          var filshs='';     
          // $("#uploadedimage").attr('src',"{{asset('Promocampaign')}}/"+data.resultdata.file);  
          var pathsurr="{{asset('Promocampaign')}}/";
          if(ext[1]=='jpg'){
            $('#upfile').html('');
            $("#uploadedimage").show();
            $("#uploadedimage").attr('src',pathsurr+data.resultdata.file); 
          }
          if(ext[1]=='mp3'){
            $('#upfile').html('');
            filshs=`
            <audio controls autoplay>
              <source src="${pathsurr+data.resultdata.file}" type="audio/ogg">
              <source src="${pathsurr+data.resultdata.file}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            `;
            $("#uploadedimage").hide();
            $('#upfile').append(filshs);

          }
          if(ext[1]=='mp4'){
            $('#upfile').html('');
            filshs=`
              <video controls autoplay>
                <source src="${pathsurr+data.resultdata.file}" type="video/mp4">
                <source src="${pathsurr+data.resultdata.file}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
            `;
            $("#uploadedimage").hide();
            $('#upfile').append(filshs);
          }
           
          $('#entitle1').val(data.resultdata.entitle);
          $('#maltitle1').val(data.resultdata.maltitle);
          $('#ensubtitle1').val(data.resultdata.ensubtitle);
          $('#malsubtitle1').val(data.resultdata.malsubtitle);
          $('#alttext1').val(data.resultdata.alt);
          $('#endesc1').val(data.resultdata.endesc);
          $('#maldesc1').val(data.resultdata.maldesc);
          $('#encontent1').val(data.resultdata.encontent);
          $('#malcontent1').val(data.resultdata.malcontent);
          $('#size1').val(data.resultdata.size);
          $('#duration1').val(data.resultdata.duration);
          $('#icon1').val(data.resultdata.icon);
          if(data.resultdata.displaystatus==1){
            $('#displaystatus1').prop('checked', true);
          } else {
            $('#displaystatus1').prop('checked', false);
          }

          $('#filetypes_id1').empty();
          $('#filetypes_id1').append($('<option></option>').val('').html('Select'));
          $.each(data.filetype, function(index, element) {
              $('#filetypes_id1').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
          element.id == data.resultdata.filetypes_id ? $('#filetypes_id1').val(element.id).prop('selected', true) : '';    
          });

          $('#contenttypes_id1').empty();
          $('#contenttypes_id1').append($('<option></option>').val('').html('Select'));
          $.each(data.contenttype, function(index, element) {
              $('#contenttypes_id1').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
          element.id == data.resultdata.contenttypes_id ? $('#contenttypes_id1').val(element.id).prop('selected', true) : '';     
          });
         
         
          $('#hidden_id1').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton1').val('Update Details');
          $('#action1').val('Edit');
          $('#transactionmodal1').modal('show');
        }
      })
  });

   $(document).on('click', '.active', function(){

    var id = $(this).attr('id'); 
    var usertype=$("#usertypeid").val(); 
      var action_url5 = '';
      if(usertype==3){
         action_url5 = "/siteadmin/promocampaignstatus/"+id;
      } else if(usertype==4){
         action_url5 = "/webadmin/promocampaignstatus/"+id;
      }
    $.ajax({
      url:action_url5,
      dataType:"json",

      success:function(data)
      {
        if(data.error)
        {
          //alert("Already an active Alert exists!!!");
          
        }
        if(data.success)
        { 
          window.location.reload();
        } 
         
        
      }
    })
  });

  var element_id;

  $(document).on('click', '.delete', function(){
      element_id = $(this).attr('id');
      var usertype=$("#usertypeid").val(); 
      var action_url6 = '';
      if(usertype==3){
         action_url6 = "/siteadmin/promocampaigndestroy/"+element_id;
      } else if(usertype==4){
         action_url6 = "/webadmin/promocampaigndestroy/"+element_id;
      }
      swal(
            {
              title: "Deleting Promocampaign List",
              text: "Are you sure to delete Promocampaign List?",
              type: "warning",
              buttons: true,
              dangerMode: true
            })
          .then((isconfirm) => {
            if (isconfirm) {
              $.ajax({
                  url:action_url6,
                  dataType:"json",
                  success:function(data)
                  {
                    $('#loader').hide();
                      swal({
                                                        title:'Promocampaign List Deleted',
                                                        text:data.success,
                                                        type:'info',                                               
                                                        buttonsStyling:false,
                                                        reverseButtons:true
                                                    })
                        .then((value) => {
                            if (value) {
                              $('#loader').show();
                              $('#ajaxmodalform')[0].reset();
                              window.location.reload();
                            }
                       });
              }});
            }
        });
  });

//   $('#ok_button').click(function(){
//     var usertype=$("#usertypeid").val(); 
//       var action_url6 = '';
//       if(usertype==3){
//          action_url6 = "/siteadmin/promocampaigndestroy/"+element_id;
//       } else if(usertype==4){
//          action_url6 = "/webadmin/promocampaigndestroy/"+element_id;
//       }

//     $.ajax({
//             url:action_url6,
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



$( ".close1" ).click(function() {
      $('#transactionmodal').modal('hide');
        
 });

/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('webadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  
  <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown"> App Department List </p>
  </div> <!-- ./col12 -->
 
  <div class="col-12 py-1">
     <button type="button" class="btn btn-sm  text-white bg-magenta fg-lighTaupe eng_xxxs"  id="transactionbutton" name="transactionbutton"> <i class="fas fa-plus-square "></i>&nbsp;Add New</button>
     <!-- Button trigger modal -->

  </div> <!-- ./col12 -->
  <div class="col-12 py-1">
    <div class="responsive">
          <table class="table table-stripped table-sm table-hover box-shadow--6dp" id="resposivetable">
            <thead class="eng_xxxs thlist">
              <tr class="bg-teal">
                <th>#</th>
                <th>Name</th>
                <th>Name in Malayalam</th>
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
                    <td><span class="eng_xxxxs"> {{ $res->entitle }}</span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->maltitle }}</span> </td>
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
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Department Category </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="deptcategories_id" name="deptcategories_id" aria-describedby="HELPNAME" required></select>
                <p id="deptcategories_iderror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
           
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Department </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <select class="form-control customform eng_xxxs fg-darkCrimson" id="departments_id" name="departments_id" aria-describedby="HELPNAME" required></select>
                <p id="departments_iderror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
           
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="500" minlength="3">
                <p id="nameerror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" minlength="3">
                <p id="maltitleerror" class="ErrP"  style="display:none; color:#FF0000;" >Only Malayalam Characters and spaces are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">About </label>
              
            
                <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="enabout" name="enabout" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3"></textarea> -->
                <textarea required class="summernote" id="enabout" name="enabout" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="enabouterror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">About in Malayalam</label>
              
          
              
               <textarea required class="summernote" id="malabout" name="malabout" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
               <p id="malabouterror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Structure </label>
              
         
              
                <textarea required class="summernote" id="enstructure" name="enstructure" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="enstructureerror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Structure in Malayalam</label>
           
                <textarea required class="summernote" id="malstructure" name="malstructure" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                <p id="malstructureerror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Contact </label>
              
          
                <textarea required class="summernote" id="encontact" name="encontact" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="encontacterror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Contact in Malayalam</label>
              
          
                <textarea required class="summernote" id="malcontact" name="malcontact" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                <p id="malcontacterror"  class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Related Links </label>
              
           
                <textarea required class="summernote" id="enrelatedlinks" name="enrelatedlinks" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="enrelatedlinkserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Related Links in Malayalam</label>
              
         
                <textarea required class="summernote" id="malrelatedlinks" name="malrelatedlinks" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                <p id="malrelatedlinkserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Services </label>
              
           
                <textarea required class="summernote" id="enservices" name="enservices" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="enserviceserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Services in Malayalam</label>
         
                <textarea required class="summernote" id="malservices" name="malservices" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                <p id="malservicesserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
           
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->

        </div> <!-- ./form_section -->

      </div> <!-- ./modal-body -->
      <div class="modal-footer modalover">
        <textarea id="hid_enabout" hidden="hidden" class="hid_enabout" cols="50" rows="3" style="padding:5px;" name="hid_enabout" >   </textarea>
   <textarea id="hid_malabout" hidden="hidden" class="hid_malabout" cols="50" rows="3" style="padding:5px;" name="hid_malabout" >   </textarea>

  <textarea id="hid_enstructure" hidden="hidden" class="hid_enstructure" cols="50" rows="3" style="padding:5px;" name="hid_enstructure" >   </textarea>
   <textarea id="hid_malstructure" hidden="hidden" class="hid_malstructure" cols="50" rows="3" style="padding:5px;" name="hid_malstructure" >   </textarea>
  
   <textarea id="hid_encontact" hidden="hidden" class="hid_encontact" cols="50" rows="3" style="padding:5px;"  name="hid_encontact" >   </textarea>
   <textarea id="hid_malcontact" hidden="hidden" class="hid_malcontact" cols="50" rows="3" style="padding:5px;"  name="hid_malcontact" >   </textarea>

  <textarea id="hid_enrelatedlinks" hidden="hidden" class="hid_enrelatedlinks" cols="50" rows="3" style="padding:5px;"  name="hid_enrelatedlinks" >   </textarea>
   <textarea id="hid_malrelatedlinks" hidden="hidden" class="hid_malrelatedlinks" cols="50" rows="3" style="padding:5px;"  name="hid_malrelatedlinks" >   </textarea>

   <textarea id="hid_enservices" hidden="hidden" class="hid_enservices" cols="50" rows="3" style="padding:5px;"   name="hid_enservices" >   </textarea>
   <textarea id="hid_malservices" hidden="hidden" class="hid_malservices" cols="50" rows="3" style="padding:5px;"   name="hid_malservices" >   </textarea>



        <input type="hidden" name="action" id="action" value="Add" />
        <input type="hidden" name="hidden_id" id="hidden_id" />
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

  $('.summernote').summernote();

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

$('.dob').inputmask("date",{
    mask: "1/2/y",
    placeholder: "dd-mm-yyyy",
    leapday: "-02-29",
    separator: "/",
    alias: "dd/mm/yyyy"
  });
 

  $('#entitle').on('change ', function(e) {
  var testval = this.value;
  var vald=entitleregex(testval);
        if(!vald){
    $('#entitle').val('');
    
     $('#nameerror').slideDown("slow");

  }
  else
  {
     $('#nameerror').hide();
     
  }
      
  });

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
$('#enabout').on('summernote.change', function(we, contents, $editable) {
  // console.log('summernote\'s content is chandged.');
  var textareaValue = $('#enabout').summernote('code');
        var retval=summernoteval('enabout');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#malabout').on('summernote.change', function(we, contents, $editable) {
  var textareaValue = $('#malabout').summernote('code');
        var retval=summernoteval('malabout');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});

$('#enstructure').on('summernote.change', function(we, contents, $editable) {
  var textareaValue = $('#enstructure').summernote('code');
        var retval=summernoteval('enstructure');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#malstructure').on('summernote.change', function(we, contents, $editable) {
  var textareaValue = $('#malstructure').summernote('code');
        var retval=summernoteval('malstructure');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#encontact').on('summernote.change', function(we, contents, $editable) {
  // console.log('summernote\'s content is chandged.');
        var textareaValue = $('#encontact').summernote('code');
        var retval=summernoteval('encontact');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#malcontact').on('summernote.change', function(we, contents, $editable) {
   var textareaValue = $('#malcontact').summernote('code');
        var retval=summernoteval('malcontact');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#enrelatedlinks').on('summernote.change', function(we, contents, $editable) {
   var textareaValue = $('#enrelatedlinks').summernote('code');
        var retval=summernoteval('enrelatedlinks');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#malrelatedlinks').on('summernote.change', function(we, contents, $editable) {
   var textareaValue = $('#malrelatedlinks').summernote('code');
        var retval=summernoteval('malrelatedlinks');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});

$('#enservices').on('summernote.change', function(we, contents, $editable) {
  // console.log('summernote\'s content is chandged.');
        var textareaValue = $('#enservices').summernote('code');
        var retval=summernoteval('enservices');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
        
         
});
$('#malservices').on('summernote.change', function(we, contents, $editable) {
  var textareaValue = $('#malservices').summernote('code');
        var retval=summernoteval('malservices');
        if (retval) {
            $(we.target).siblings(".ErrP").css("display", "none");    
        } else {  
            $(we.target).siblings(".ErrP").css("display", "block");     
                    
        }
         
});

//  $('#enabout').on('summernote.init', function () {
//         $('textarea.hid_enabout').html($('#enabout').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_enabout').html($('#enabout').summernote("code"))
//        // $('enabout').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });
// $('#malabout').on('summernote.init', function () {
//         $('textarea.hid_malabout').html($('#malabout').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_malabout').html($('#malabout').summernote("code"))
//        // $('malabout').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });


//    $('#enstructure').on('summernote.init', function () {
//         $('textarea.hid_enstructure').html($('#enstructure').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_enstructure').html($('#enstructure').summernote("code"))
//        // $('enstructure').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });
// $('#malstructure').on('summernote.init', function () {
//         $('textarea.hid_malstructure').html($('#malstructure').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_malstructure').html($('#malstructure').summernote("code"))
//        // $('malstructure').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });

//      $('#encontact').on('summernote.init', function () {
//         $('textarea.hid_encontact').html($('#encontact').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_encontact').html($('#encontact').summernote("code"))
//        // $('encontact').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });
// $('#malcontact').on('summernote.init', function () {
//         $('textarea.hid_malcontact').html($('#malcontact').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_malcontact').html($('#malcontact').summernote("code"))
//        // $('malcontact').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });
        
//   $('#enrelatedlinks').on('summernote.init', function () {
//         $('textarea.hid_enrelatedlinks').html($('#enrelatedlinks').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_enrelatedlinks').html($('#enrelatedlinks').summernote("code"))
//        // $('enrelatedlinks').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });
// $('#malrelatedlinks').on('summernote.init', function () {
//         $('textarea.hid_malrelatedlinks').html($('#malrelatedlinks').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_malrelatedlinks').html($('#malrelatedlinks').summernote("code"))
//        // $('malrelatedlinks').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });

//      $('#enservices').on('summernote.init', function () {
//         $('textarea.hid_enservices').html($('#enservices').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_enservices').html($('#enservices').summernote("code"))
//        // $('enservices').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });
// $('#malservices').on('summernote.init', function () {
//         $('textarea.hid_malservices').html($('#malservices').summernote("code"))
//     }).on("summernote.blur", function () {
//          $('textarea.hid_malservices').html($('#malservices').summernote("code"))
//        // $('malservices').summernote('code',$('textarea.someDummyClassName').html())

//     }).summernote({
//         height: 200,
       
//         });

 /* $('#enabout').on('change ', function(e) {
  var testval = this.value;
  var vald=entitleregex(testval);
        if(!vald){
    $('#enabout').val('');
    
     $('#enabouterror').slideDown("slow");

  }
  else
  {
     $('#enabouterror').hide();
     
  }
      
});

  $('#enstructure').on('change ', function(e) {
  var testval = this.value;
  var vald=entitleregex(testval);
        if(!vald){
    $('#enstructure').val('');
    
     $('#enstructureerror').slideDown("slow");

  }
  else
  {
     $('#enstructureerror').hide();
     
  }
      
});

  $('#encontact').on('change ', function(e) {
  var testval = this.value;
  var vald=entitleregex(testval);
        if(!vald){
    $('#encontact').val('');
    
     $('#encontacterror').slideDown("slow");

  }
  else
  {
     $('#encontacterror').hide();
     
  }
      
});


  $('#enrelatedlinks').on('change ', function(e) {
  var testval = this.value;
  var vald=entitleregex(testval);
        if(!vald){
    $('#enrelatedlinks').val('');
    
     $('#enrelatedlinkserror').slideDown("slow");

  }
  else
  {
     $('#enrelatedlinkserror').hide();
     
  }
      
});

  $('#enservices').on('change ', function(e) {
  var testval = this.value;
  var vald=entitleregex(testval);
        if(!vald){
    $('#enservices').val('');
    
     $('#enserviceserror').slideDown("slow");

  }
  else
  {
     $('#enserviceserror').hide();
     
  }
      
});*/


$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.ErrP').hide();
    $('.modal-title').text('Add New App Department');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

    var actionurl = '';
  
    action_url = "{{ route('webadmin.appdepartmentcreate') }}";
  
   

     $.ajax({
       url: action_url,
       dataType:"json",
       success:function(data)
        {
          
            $('#deptcategories_id').empty();
            $('#deptcategories_id').append($('<option></option>').val('0').html('Select'));
            $.each(data.deptcategory, function(index, element) {
                $('#deptcategories_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

            $('#departments_id').empty();
            $('#departments_id').append($('<option></option>').val('0').html('Select'));
            $.each(data.depts, function(index, element) {
                $('#departments_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });
             
            $('#entitle').val('');
            $('#maltitle').val('');
            $('#enabout').summernote('code', '');
            $('#malabout').summernote('code', '');
            $('#enstructure').summernote('code', '');
            $('#malstructure').summernote('code', '');
            $('#encontact').summernote('code', '');
            $('#malcontact').summernote('code', '');
            $('#enrelatedlinks').summernote('code', '');
            $('#malrelatedlinks').summernote('code', '');
            $('#enservices').summernote('code', '');
            $('#malservices').summernote('code', '');
           
            $('.modal-title').text('Edit App Department');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
    })
    
});



$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    $('.ErrP').hide();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('webadmin.appdepartmentstore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('webadmin.appdepartmentupdate') }}";

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
              swal("Warning", data.errors, "warning");
               
            }
            if(data.success)
            {
              swal({
                                                title:'App Department List',
                                                text:data.success,
                                                type:'info',
                                                buttonsStyling:false,
                                                reverseButtons:true
                                            })
                .then((value) => {
                    if (value) {
                      $('#loader').show();
                      $('#transactionmodal').modal('hide');
                      $('#ajaxmodalform')[0].reset();
                      window.location.replace("{{route('webadmin.appdepartmentlist')}}");
                    }
                });
            }
         }
    });
  });


  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('.ErrP').hide();
      $('#ajaxformresults').html('');
      $.ajax({
       url :"/webadmin/appdepartmentedit/"+id,
       dataType:"json",
       success:function(data)
        { 
                    
          $('#deptcategories_id').empty();
          $('#deptcategories_id').append($('<option></option>').val('0').html('Select'));
          $.each(data.deptcategory, function(index, element) {
              $('#deptcategories_id').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
              element.id == data.resultdata.deptcategories_id ? $('#deptcategories_id').val(element.id).prop('selected', true) : '';
          });

          $('#departments_id').empty();
          $('#departments_id').append($('<option></option>').val('0').html('Select'));
          $.each(data.depts, function(index, element) {
              $('#departments_id').append(
                  $('<option></option>').val(element.id).html(element.entitle)
              );
              element.id == data.resultdata.departments_id ? $('#departments_id').val(element.id).prop('selected', true) : '';
          });  
          $('#entitle').val(data.resultdata.entitle);
          $('#maltitle').val(data.resultdata.maltitle);
          /*$('#enabout').val(data.resultdata.enabout);
          $('#malabout').val(data.resultdata.malabout);
          $('#enstructure').val(data.resultdata.enstructure);
          $('#malstructure').val(data.resultdata.malstructure);
          $('#encontact').val(data.resultdata.encontact);
          $('#malcontact').val(data.resultdata.malcontact);
          $('#enrelatedlinks').val(data.resultdata.enrelatedlinks);
          $('#malrelatedlinks').val(data.resultdata.malrelatedlinks);
          $('#enservices').val(data.resultdata.enservices);
          $('#malservices').val(data.resultdata.malservices);*/
          $('#enabout').summernote('code', data.resultdata.enabout);
          $('#malabout').summernote('code', data.resultdata.malabout);
          $('#enstructure').summernote('code', data.resultdata.enstructure);
          $('#malstructure').summernote('code', data.resultdata.malstructure);
          $('#encontact').summernote('code', data.resultdata.encontact);
          $('#malcontact').summernote('code', data.resultdata.malcontact);
          $('#enrelatedlinks').summernote('code', data.resultdata.enrelatedlinks);
          $('#malrelatedlinks').summernote('code', data.resultdata.malrelatedlinks);
          $('#enservices').summernote('code', data.resultdata.enservices);
          $('#malservices').summernote('code', data.resultdata.malservices);
          
          
          
         
          $('#hidden_id').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton').val('Update Details');
          $('#action').val('Edit');
          $('#transactionmodal').modal('show');
        }
      })
  });

   $(document).on('click', '.active', function(){

    var id = $(this).attr('id'); 
    $.ajax({
      url:"/webadmin/appdepartmentstatus/"+id,
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
      swal(
            {
              title: "Deleting App Department List",
              text: "Are you sure to delete App Department List?",
              type: "warning",
              buttons: true,
              dangerMode: true
            })
          .then((isconfirm) => {
            //$('#loader').show();
            
            if (isconfirm) {
              $.ajax({
                  url:"/webadmin/appdepartmentdestroy/"+element_id,
                  dataType:"json",

                  success:function(data)
                  {
                    //  setTimeout(function(){
                    //  $('#confirmModal').modal('hide');
                    // 

                    $('#loader').hide();
                    
                      swal({
                                                        title:'App Department List Deleted',
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
                    //  swal("Info","Data Deleted","info");
                    //  alert('Data Deleted');
                    //  }, 200);
              }});
            }
        });
  });

//   $('#ok_button').click(function(){

//     $.ajax({
//             url:"/webadmin/appdepartmentdestroy/"+element_id,
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
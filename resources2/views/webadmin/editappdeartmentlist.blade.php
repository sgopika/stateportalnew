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
    <p class="eng_xxs px-3 fg-darkBrown">Edit App Department List </p>
  </div> <!-- ./col12 -->
  <div class="col-12 py-1">
            <div class="responsive">
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name in English</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input required type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="500" minlength="3">
                <p id="nameerror" class="ErrP" style="display:none; color:#FF0000;" >A -Z a-z Characters,Numbers and special characters(like "",&()-$_=) allowed.</p>
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">About in English</label>
              
            
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Structure in English</label>
              
         
              
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Contact in English</label>
              
          
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
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Related Links in English</label>
              
           
                <textarea class="summernote" id="enrelatedlinks" name="enrelatedlinks" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="enrelatedlinkserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Related Links in Malayalam</label>
              
         
                <textarea class="summernote" id="malrelatedlinks" name="malrelatedlinks" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
                <p id="malrelatedlinkserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Services in English</label>
              
           
                <textarea class="summernote" id="enservices" name="enservices" aria-describedby="HELPNAME" placeholder="Name" maxlength="3000000" minlength="3"></textarea>
                <p id="enserviceserror" class="ErrP" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-12 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Services in Malayalam</label>
         
                <textarea class="summernote" id="malservices" name="malservices" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="3000000" minlength="3"></textarea>
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
        <input type="hidden" name="rowid" id="rowid" value="{{$id}}">
        <button type="submit" class="btn btn-sm btn-flat eng_xxxs fg-grayWhite bg-darkMagenta"> <i class="fas fa-save"></i> &nbsp;Save changes</button>
        <button type="button" onclick="window.location='{{ URL::previous() }}'" class="btn btn-sm btn-flat eng_xxxs bg-lightBrown fg-darkCrimson"> <i class="fa fa-times"></i> &nbsp;Cancel</button>          
        <input type="hidden" name="usertypeid" id="usertypeid" value="{{ Auth::user()->usertypes_id }}">
      </div> <!-- ./modal-footer  -->
    </form>
</div>
</div>

</div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Modal -->




@endsection

@section('customscripts')
<script>
$(document).ready(function(){ 
  $('.summernote').summernote({
            // height: 400,
            
            
        });

    var id = $("#rowid").val();
    editdata(id);
});

// validation
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



// edit DETAILS START
function editdata(id)
{
    // alert(id);
         $('#ajaxformresults').html('');
      $.ajax({
       url :"/webadmin/appdepartmentedit/"+id,
       dataType:"json",
       success:function(data)
        { 
          console.log(data);            
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
}
// SAVE DETAILS STOP
// SAVE DETAILS START
$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    $('.ErrP').hide();
    var action_url = '';
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
              swal({title:'App Department List updated',
                    text:data.success,
                    type:'info',
                    buttonsStyling:false,
                    reverseButtons:true
                  })
                .then((value) => {
                    if (value) {
                      $('#loader').show();
                      $('#ajaxmodalform')[0].reset();
                      window.location.replace("{{route('webadmin.appdepartmentlist')}}");
                    }
                });
            }
         }
    });
  });
// SAVE DETAILS STOP
</script>
@endsection
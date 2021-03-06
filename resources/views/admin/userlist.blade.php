@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('adminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
      </ol>
      
    </nav>
  </div> <!-- col12 -->
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
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp;  Users List </strong></p>
   </div>
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
                    <td><span class="eng_xxxxs"> {{ $res->name }}</span> </td>
                  <td> <a type="button" class="active" name="statusbtn" id="{{ $res->id }}">@if($res->status==1)  <i class="fas fa-check-circle"></i>  @else <i class="fas fa-window-close fg-darkTaupe"></i> @endif</a></td>
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
      <form id="ajaxmodalform" method="post" class="form-horizontal">
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the name.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="name" name="name" aria-describedby="HELPNAME" placeholder="Placeholder value">
          <p id="nameerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
 <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Malayalam Name </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam name.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="malname" name="malname" aria-describedby="HELPNAME" placeholder="Placeholder value">
          <p id="malnameerror" style="display:none; color:#FF0000;" >Only Malayalam Characters are allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Mobile number </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted">Enter the mobile number.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="mobile" name="mobile" aria-describedby="HELPNAME" placeholder="Placeholder value">
          <p id="mobileerror" style="display:none; color:#FF0000;" >Only numbers allowed.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
    
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Staff Category </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the staff category.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <select class="form-control customform eng_xxxs fg-darkCrimson" id="staffcategoryid" name="staffcategoryid">
            <option>Select Staff Category</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Department </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the department.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="deptid" name="deptid">
            <option>Select Department</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Field Department </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the Field department.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="fielddepartments_id" name="fielddepartments_id">
            <option>Select Field Department</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Designation </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the designation.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="desgnid" name="desgnid">
            <option>Select Designation</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Office </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the office.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <select class="form-control customform eng_xxxs fg-darkCrimson" id="officeid" name="officeid">
            <option>Select Office</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Usertype </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the usertype.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <select class="form-control customform eng_xxxs fg-darkCrimson" id="usertypeid" name="usertypeid">
            <option>Select Usertype</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
     <div class="row customformrow" id="districtrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">District </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the district.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <select class="form-control customform eng_xxxs fg-darkCrimson" id="district" name="district">
            <option>Select District</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
 <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Email </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the email.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="email" name="email" aria-describedby="HELPNAME" placeholder="Placeholder value">
          <p id="emailerror" style="display:none; color:#FF0000;" >Invalid email id.</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

 <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Password </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the password.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="password" class="form-control customform eng_xxxs fg-darkCrimson" id="password" name="password" aria-describedby="HELPNAME" placeholder="Placeholder value">
           <p id="passworderror" style="display:none; color:#FF0000;">Allowed Characters are A -Z a-z 0-9 hiphen(-) at(@) hash(#) underscore(_) dot(.)</p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Confirm Password </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the confirm password.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
          <input type="password" class="form-control customform eng_xxxs fg-darkCrimson" id="confirmpassword" name="confirmpassword" aria-describedby="HELPNAME" placeholder="Placeholder value">

          <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
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

<div id="confirmModal" class="modal" tabindex="-1"  role="dialog">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header modalover">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div> <!-- ./modal-header -->
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div> <!-- ./modal-body -->
            <div class="modal-footer modalover">
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
$("#districtrow").hide();

$('#deptid').on('change', function(e) {

  //alert("ddd");
        var deptid = $(this).val();

         $.ajax({
          method:"post",
          dataType:"json",
            data: {deptid:deptid},
            url: '{{ route('admin.getfielddepartment') }}',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) 
            { 
               
               $('#fielddepartments_id').html('');
               $('#fielddepartments_id').append($('<option></option>').val('').html('Select Field Department'));
                $.each(data, function (i,data) {
                   // console.log(data.field_departments_id);

                    $('#fielddepartments_id').append("<option value='" + data.id + "'>" + data.name + "</option>");

                });
               
            }
        });
     });
 
/**/
  $('#name').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#name').val('');
    
     $('#nameerror').slideDown("slow");

  }
  else
  {
     $('#nameerror').hide();
     
  }
      
});


 $('#malname').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _.,]+$");
if (XRegExp.test(testval, pattern)) {
   // console.log("Valid");
    $('#malnameerror').hide();
}
else{
 // console.log("not Valid");
$('#malname').val('');
  $('#malnameerror').slideDown("slow");
}
      
});

  $('#mobile').on('change ', function() {
  $('#mobileerror').hide();
    var mobile = $("#mobile").val();
    var tested = new RegExp('^[0-9]+$');
   
      if(mobile.length!=10 || !tested.test(mobile)){
        $("#mobile").val('');
        $('#mobileerror').slideDown("slow");
        
      } else {
        $('#mobileerror').hide();
      }
});


$("#mobile").keypress(function(e){
  var keyCode = e.which;
  if(keyCode == 69 || keyCode == 101)
  {
    e.preventDefault();
     $("#mobile").val('');
  }
  }) 
$('#email').on('change ', function(e) {
  var testval = this.value;
  if(testval != '')
  {
    var tested = new RegExp('^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$');
    if (!tested.test(testval))
    {
      $('#email').val('');
      $('#emailerror').slideDown("slow");
     
    }
    else
    {
       $('#emailerror').hide();
       
      
    }
 }
});

$('#password').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9-@#_. \s]+$');
  if (!tested.test(testval))
  {
    $('#password').val('');
    $("#password").focus();
    $('#passworderror').slideDown("slow");

  }
  else
  {
    $('#passworderror').hide();
    
  }
      
});


$('#usertypeid').on('change ', function(e) {
  var utype = this.value;
  if(utype==10){
    $('#districtrow').show();
  } else {
    $('#districtrow').hide();
  }
      
});



/* Confirm password check*/

$("#confirmpassword").on('keyup', function(){
    var password = $("#password").val();
    var confirmPassword = $("#confirmpassword").val();
    if (password != confirmPassword)
        $("#CheckPasswordMatch").html("Password does not match !").css("color","red");
    else
        $("#CheckPasswordMatch").html("Password match !").css("color","green");
   });  


$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.modal-title').text('Add New User');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');

    $('#name').val('');
    $('#mobile').val(''); 
    $('#email').val(''); 
    $('#password').val('');

     $.ajax({
       url: "{{ route('admin.usercreate') }}",
       dataType:"json",
       success:function(data)
        {
          
             $('#staffcategoryid').empty();
            $('#staffcategoryid').append($('<option></option>').val('0').html('Select'));
            $.each(data.staffcategory, function(index, element) {
                $('#staffcategoryid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });
             $('#deptid').empty();
            $('#deptid').append($('<option></option>').val('0').html('Select'));
            $.each(data.department, function(index, element) {
                $('#deptid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });
             $('#desgnid').empty();
            $('#desgnid').append($('<option></option>').val('0').html('Select'));
            $.each(data.designation, function(index, element) {
                $('#desgnid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });
            $('#officeid').empty();
            $('#officeid').append($('<option></option>').val('0').html('Select'));
            $.each(data.office, function(index, element) {
                $('#officeid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });
            $('#usertypeid').empty();
            $('#usertypeid').append($('<option></option>').val('0').html('Select'));
            $.each(data.usertype, function(index, element) {
                $('#usertypeid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });
            $('#district').empty();
            $('#district').append($('<option></option>').val('0').html('Select'));
            $.each(data.district, function(index, element) {
                $('#district').append(
                    $('<option></option>').val(element.id).html(element.name)
                );
            });

           
            $('.modal-title').text('Add New User');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
       })
    
});



$('#ajaxmodalform').on('submit', function(event){ 
    event.preventDefault();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('admin.userstore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('admin.userupdate') }}";

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
               alert("Already an user with same name exists");
               
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
  });


  $(document).on('click', '.edit', function(){
      var id = $(this).attr('id'); 
      $('#ajaxformresults').html('');
      $.ajax({
       url :"/admin/useredit/"+id,
       dataType:"json",
       success:function(data)
        { 
                    
            
          $('#name').val(data.resultdata.name);
          $('#malname').val(data.resultdata.malname);
           $('#mobile').val(data.resultdata.mobile);
            $('#email').val(data.resultdata.email);
          
           $('#staffcategoryid').empty();
            $('#staffcategoryid').append($('<option></option>').val('0').html('Select'));
            $.each(data.staffcategory, function(index, element) {
                $('#staffcategoryid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
                element.id == data.resultdata.staffcategories_id ? $('#staffcategoryid').val(element.id).prop('selected', true) : '';
            });
             $('#deptid').empty();
            $('#deptid').append($('<option></option>').val('0').html('Select'));
            $.each(data.department, function(index, element) {
                $('#deptid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
                element.id == data.resultdata.departments_id ? $('#deptid').val(element.id).prop('selected', true) : '';
            });
             $('#desgnid').empty();
            $('#desgnid').append($('<option></option>').val('0').html('Select'));
            $.each(data.designation, function(index, element) {
                $('#desgnid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
                element.id == data.resultdata.designations_id ? $('#desgnid').val(element.id).prop('selected', true) : '';
            });
            $('#officeid').empty();
            $('#officeid').append($('<option></option>').val('0').html('Select'));
            $.each(data.office, function(index, element) {
                $('#officeid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
                element.id == data.resultdata.offices_id ? $('#officeid').val(element.id).prop('selected', true) : '';
            });
            $('#usertypeid').empty();
            $('#usertypeid').append($('<option></option>').val('0').html('Select'));
            $.each(data.usertype, function(index, element) {
                $('#usertypeid').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
              element.id == data.resultdata.usertypes_id ? $('#usertypeid').val(element.id).prop('selected', true) : '';
            });


             $('#fielddepartments_id').empty();
          $('#fielddepartments_id').append($('<option></option>').val('').html('Select'));
          $.each(data.fielddepartment, function(index, element) {
              $('#fielddepartments_id').append(
                  $('<option></option>').val(element.id).html(element.name)
              );
          element.id == data.resultdata.fielddepartments_id ? $('#fielddepartments_id').val(element.id).prop('selected', true) : '';    
          });
          if(data.resultdata.usertypes_id==10){
            $("#districtrow").show();
          $('#district').empty();
            $('#district').append($('<option></option>').val('0').html('Select'));
            $.each(data.district, function(index, element) {
                $('#district').append(
                    $('<option></option>').val(element.id).html(element.name)
                );
              element.id == data.resultdata.districts_id ? $('#district').val(element.id).prop('selected', true) : '';
            });
          }
         
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
      url:"/admin/userstatus/"+id,
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
      $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){

    $.ajax({
            url:"/admin/userdestroy/"+element_id,
            dataType:"json",

            success:function(data)
            {
               setTimeout(function(){
               $('#confirmModal').modal('hide');
               window.location.reload();
               alert('Data Deleted');
               }, 200);
            }
    })
});



$( ".close1" ).click(function() {
      $('#transactionmodal').modal('hide');
        
 });

  /*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
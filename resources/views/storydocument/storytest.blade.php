@extends('layouts.basemain')
@section('content')
<!-- Start of breadcrumb -->

<!-- End of breadcrumb -->
<div class="container-fluid homepage adminpage">
<div class="row ">
  <div class="col-12 py-2  ">
    <nav aria-label="breadcrumb" class="breadcrumbinner py-1 eng_xxxs">
      <ol class="breadcrumb justify-content-end px-3 pt-2">
       
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('contributorhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         
      </ol>
      
    </nav>
  </div> <!-- col12 -->
  <div class="col-12 py-1">
     <p class="py-2"> <strong > <i class="fas fa-hand-point-right"></i> &nbsp;Story</strong></p>
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
                <th>Attachment</th>
                <th>GO No.</th>
                <th>Status</th>
                <th>TimeStamp</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="eng_xxxs">
               @php
                $i=1
                @endphp

                @foreach($displayval as $res)

                <tr>
                    <td><span class="eng_xxxxs"> {{ $i }} </span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->entitle  }} </span> </td> 
                    <td><span class="eng_xxxxs">
                      @foreach($attachment as $attachments)
                      @if($attachments->stories_id==$res->id)
                        @if($attachments->filetype=='pdf')
                        <a target="_blank" href="{{ asset('Story').'/'.$attachments->file }}">View File</a>
                        @else
                      <img src="{{ asset('Story').'/'.$attachments->file }}" class='img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson' alt='Image' id='uploadedimage' width='150px'>
                      @endif
                      @endif
                      @endforeach
                    
                      </span> </td>
                     <td><span class="eng_xxxxs"> {{ $res->documentnumber  }} </span> </td>
                  <td><span class="active" id="{{ $res->id }}"> @if($res->status==1)<i class="fas fa-check-square"></i>@elseif($res->status==2)  <i class="fas fa-window-cldocumentdateose fg-darkTaupe"></i>@endif </span></td>
                   <td><span class="eng_xxxxs"> {{ date('d-m-Y H:i:s', strtotime($res->created_at)) }} </span> </td>
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
    
       <form id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
      <div class="modal-body adminpage">
        
        <div id="form_section">
         <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Category </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the category.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="categories_id" name="categories_id" required="required">
            <option>Select Category</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Go number </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the Go number.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="documents_id" name="documents_id" required="required">
            <option>Select GO number</option>
                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="entitle" name="entitle" aria-describedby="HELPNAME" placeholder="Name" maxlength="50" minlength="3" required="required">
                <p id="titleerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Title in Malayalam</label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="maltitle" name="maltitle" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="50" minlength="3">
                <p id="maltitleerror" style="display:none; color:#FF0000;" >Only Malayalam Characters and spaces are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
         <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content </label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the content.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                
                <textarea class="ckeditor" id="encontent" name="encontent" aria-describedby="HELPNAME" placeholder="Name" maxlength="1000" minlength="3" required="required"></textarea>
                <p id="encontenterror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Content in Malayalam</label>
              <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Enter the malayalam content.</small>
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
              
                <textarea class="summernote" id="malcontent" name="malcontent" aria-describedby="HELPNAME" placeholder="Name in Malayalam" maxlength="1000" ></textarea>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
                    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Status </label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> Select the status.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select class="form-control customform eng_xxxs fg-darkCrimson" id="status" name="status" required="required">
            <option>Select</option>
            <option value="1">Active</option>
            <option value="2">Inactive</option>

                     </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
          
          <div class="row customformrow">
            <div class="col-md-6 py-2">
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Remarks </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
                <textarea class="form-control customform eng_xxxs fg-darkCrimson" id="remark" name="remark" aria-describedby="HELPNAME" placeholder="Keywords" maxlength="1000"></textarea>
                
                <p id="remarkerror" style="display:none; color:#FF0000;" >Only A -Z a-z Characters are allowed.</p>
            </div> <!-- ./col-md-6 -->
          </div> <!-- ./row -->
          <div class="row customformrow">
            <div class="col-md-6 py-2">
            
              <label for="IDNAME" class="eng_xxxs fg-darkBrown">Upload File </label>
              
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6 py-2">
              <div id="filepdf"> </div>
              <div id="hideedit">
                <input type="file"  id="filename1" name="filename1" >
                      <p id="imageerror" style="display:none; color:#FF0000;">
                      Invalid File format. 
                      </p>
                      <p id="imageerror1" style="display:none; color:#FF0000;" class="mal_xxxs">
                      Allowed size 1 MB.
                      </p>
                  <input type="file"  id="filename2" name="filename2" >
                      <p id="imageerror2" style="display:none; color:#FF0000;">
                      Invalid File format. 
                      </p>
                      <p id="imageerror3" style="display:none; color:#FF0000;" class="mal_xxxs">
                      Allowed size 1 MB.
                      </p>
                  <input type="file"  id="filename3" name="filename3" >
                      <p id="imageerror4" style="display:none; color:#FF0000;">
                      Invalid File format. 
                      </p>
                      <p id="imageerror5" style="display:none; color:#FF0000;" class="mal_xxxs">
                      Allowed size 1 MB.
                      </p>
                      </div>

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


<!-- Modal -->
<div class="modal fade"  id="transactionmodalupld" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modalover">
        <p class="modal-title eng_xxs fg-darkEmerald" id="addmodalLabel"><i class="fab fa-wpforms"></i>&nbsp;Modal title</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- ./modal-header -->
       <div class="uploaddet ml-3"></div>
     	
    </div> <!-- ./modal-content -->
  </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->
@endsection

@section('customscripts')

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>

$(document).ready(function(){ 

 if (CKEDITOR.instances.encontent) {
     CKEDITOR.instances.encontent.destroy();
}

  CKEDITOR.replace('encontent', {
  allowedContent:
    'h1 h2 h3 p blockquote strong em;' +
    'a[!href];' +
    'img(left,right)[!src,alt,width,height];' +
    'table tr th td caption;' +
    'span{!font-family};' +
    'span{!color};' +
    'span(!marker);' +
    'del ins'
});
 
   

var max_year=new Date().getFullYear().toString();

$("#filedate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy", "yearrange":{minyear: 1957, maxyear: max_year }});
  $('.summernote').summernote({
      toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'ol', 'paragraph']],

  ],

  });



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


$('#encontent').on('change ', function(e)
 {
  alert("ffffff");
    var testval = this.value;
    var tested = new RegExp('^[a-zA-Z-(),/.&; \s]+$');
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
 
$('#numberen').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9/()., \s]+$');
  if (!tested.test(testval))
  {
    $('#numberen').val('');
    
     $('#numberenerror').slideDown("slow");

  }
  else
  {
     $('#numberenerror').hide();
     
  }
      
});
 $('#numbermal').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _./(),]+$");
if (XRegExp.test(testval, pattern)) {
     $('#numbermalerror').hide();
}
else{
$('#numbermal').val('');
  $('#numbermalerror').slideDown("slow");
}
      
});

 $('#filename1').bind('change', function() {
    
    var ext = $('#filename1').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png','jpeg','jpg','pdf']) == -1){
      $('#imageerror').slideDown("slow");
      $('#imageerror1').slideUp("slow");
      $('#image').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror1').slideDown("slow");
        $('#filename1').val('');
     
      }else{
     
        $('#imageerror1').slideUp("slow");
      }
      $('#imageerror').slideUp("slow");
    }
  });



 $('#filename2').bind('change', function() {
    
    var ext = $('#filename2').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png','jpeg','jpg','pdf']) == -1){
      $('#imageerror2').slideDown("slow");
      $('#imageerror3').slideUp("slow");
      $('#image').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror3').slideDown("slow");
        $('#filename2').val('');
     
      }else{
     
        $('#imageerror3').slideUp("slow");
      }
      $('#imageerror2').slideUp("slow");
    }
  });

$('#filename3').bind('change', function() {
    
    var ext = $('#filename3').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png','jpeg','jpg','pdf']) == -1){
      $('#imageerror4').slideDown("slow");
      $('#imageerror5').slideUp("slow");
      $('#image').val('');
     
    }else{
      var picsize = (this.files[0].size);
      if (picsize > 1000000){
        $('#imageerror5').slideDown("slow");
        $('#filename3').val('');
     
      }else{
     
        $('#imageerror5').slideUp("slow");
      }
      $('#imageerror4').slideUp("slow");
    }
  });



   $('#entitle').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
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


   $('#remark').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9/()., \s]+$');
  if (!tested.test(testval))
  {
    $('#remarks').val('');
    
     $('#remarkerror').slideDown("slow");

  }
  else
  {
     $('#remarkerror').hide();
     
  }
      
});

/*Validation end*/


$("#transactionbutton").click(function(event){
    event.preventDefault();
    $('.modal-title').text('Add New Story');
    $('#actionbutton').val('Save Details');
    $('#action').val('Add');
    $('#ajaxformresults').html('');
    $("#transactionmodal").modal('show');
  var usertype=$("#usertypeid").val(); 
  var action_url = '';
 action_url="{{ route('storycontributor.storycreate') }}";
    
  $.ajax({
       url: action_url,
       dataType:"json",
       success:function(data)
        {
            
          $('#categories_id').empty();
            $('#categories_id').append($('<option></option>').val('').html('Select'));
            $.each(data.category, function(index, element) {
                $('#categories_id').append(
                    $('<option></option>').val(element.id).html(element.name)
                );
            });


           $('#documents_id').empty();
            $('#documents_id').append($('<option></option>').val('').html('Select'));
            $.each(data.documents, function(index, element) {
                $('#documents_id').append(
                    $('<option></option>').val(element.id).html(element.documentnumber)
                );
            });

  
            
            $('#entitle').val('');
            $('#maltitle').val('');
            $('#enabstract').val('');
            $('#malabstract').val('');
            $('#enkeyword').val('');
            $('#malkeyword').val('');
            $('#encontent').val('');
            $('#malcontent').val('');

         

            
            $('.modal-title').text('Add New Story');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
       })
    
});



$('#ajaxmodalform').on('submit', function(event){ 
   var formData = new FormData(this);
    event.preventDefault();
    var action_url = '';
    if($('#action').val() == 'Add')
        action_url = "{{ route('storycontributor.storystore') }}";

    if($('#action').val() == 'Edit')
        action_url = "{{ route('storycontributor.storyupdate') }}";

    $.ajax({
         url: action_url,
         method:"post",
         data:formData,
         cache:false,
         contentType: false,
         processData: false,
         dataType:"json",
         success:function(data)
         { 
          
            var html = '';
            if(data.errors)
            {
               alert("Already a RTS document exists");
               
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
      var usertype=$("#usertypeid").val(); 
      var action_url2 = '';
      
         action_url2 = "/storycontributor/storyedit/"+id;
      
    
      $.ajax({
       url :action_url2,
       dataType:"json",
       success:function(data)
        { 
          if(data.error){
            alert("The Article is Locked, So cannot be edited!");
          } else {
             
 
            $('#entitle').val(data.resultdata.entitle);
            $('#maltitle').val(data.resultdata.maltitle);
               CKEDITOR.instances.encontent.setData(data.resultdata.encontent);
           // $('#encontent').val(data.resultdata.encontent);
            $('#malcontent').summernote('code', data.resultdata.malcontent);
            $.each(data.processing, function(index, element) {
             $('#remark').html(element.contributor_remarks);
             });

      
            $.each(data.storyattachment, function(index, element) {
              var urlpath="{{asset('Story')}}/"+element.file;
                var attachid=element.id;
                 if(attachid!=''){ $('#hideedit').css('display','none');}

              if(element.filetype=='pdf')
                {
                   
                  $("#filepdf").append("<div id='imgdiv"+attachid+"'><a target='_blank' href="+urlpath+">View File</a></div>");

                }
                else
                {
                   $("#filepdf").append("<div id='imgdiv"+attachid+"'><img src="+urlpath+" class='img-thumbnail displaythumbnail customform eng_xxxs fg-darkCrimson' alt='Image' id='uploadedimage' width='50%'> <button type='button' id="+attachid+" class='remove_image btn btn-sm btn-danger' name='delete'  ><i class='fas fa-trash-alt'></i>&nbsp;</button></div>");
                   //$("#filepdf").append("<img target='_blank' href="+urlpath+">View File</a>");
                }
             
               
             });

           $('#categories_id').empty();
            $('#categories_id').append($('<option></option>').val('').html('Select'));
            $.each(data.category, function(index, element) {
                $('#categories_id').append(
                    $('<option></option>').val(element.id).html(element.name)
                );
                 element.id == data.resultdata.storycategories_id ? $('#categories_id').val(element.id).prop('selected', true) : '';  
            });


           $('#documents_id').empty();
            $('#documents_id').append($('<option></option>').val('').html('Select'));
            $.each(data.documents, function(index, element) {
                $('#documents_id').append(
                    $('<option></option>').val(element.id).html(element.documentnumber)
                );

                 element.id == data.resultdata.documents_id ? $('#documents_id').val(element.id).prop('selected', true) : '';  
            });

          $("#status [value=" + data.resultdata.status + "]").attr("selected", "true"); 
         
          $('#hidden_id').val(id);
          $('.modal-title').text('Edit Details');
          $('#actionbutton').val('Update Details');
          $('#action').val('Edit');
          $('#transactionmodal').modal('show');
          }
        }
      })
  });
  
   $(document).on('click', '.remove_image', function(){
     
   var id = $(this).attr('id');
   
   $.ajax({
    url:"/image.imageremove/"+id,
    dataType:"json",
    success:function(data)
    {
     
     if(data.msg==1){ $("#imgdiv"+id).css('display','none'); alert('Data Deleted');   }else{alert('Error');}
     
     
     
   }
 })
 });
  
  

   $(document).on('click', '.active', function(){

    var id = $(this).attr('id'); 
      var usertype=$("#usertypeid").val(); 
      var action_url3 = '';
      
         action_url3 = "/storycontributor/storystatus/"+id;
     
    $.ajax({
      url:action_url3,
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
    var usertype=$("#usertypeid").val(); 
      var action_url4 = '';
     
         action_url4 = "/storycontributor/storydestroy/"+element_id;
     

    $.ajax({
            url:action_url4,
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
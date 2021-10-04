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
       <li class="breadcrumb-item"><a class="no_link" href="{{ route('appadminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('appadmin.communicationlist') }}"> &nbsp;Communication List</a></li>
         @elseif(Auth::user()->usertypes_id==9)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('appmanagerhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('appmanager.communicationlist') }}"> &nbsp;Communication List</a></li>
         @elseif(Auth::user()->usertypes_id==10)
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('appclienthome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
         <li class="breadcrumb-item"><a class="no_link" href="{{ route('appclient.communicationlist') }}"> &nbsp;Communication List</a></li>
         @endif
         
      </ol>
      
    </nav>
  </div> <!-- col12 -->
 
  <div class="col-12 py-1 px-2 ">
    <p class="eng_xxs px-3 fg-darkBrown"> Add Communication </p>
  </div> <!-- ./col12 --> 
  <div class="col-12 md-whiteframe-2dp ">
    
      @if(Auth::user()->usertypes_id==2)
        <form action="{{ route('appadmin.communicationstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
         @elseif(Auth::user()->usertypes_id==9)
        <form action="{{ route('appmanager.communicationstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
           @elseif(Auth::user()->usertypes_id==10)
        <form action="{{ route('appclient.communicationstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" enctype="multipart/form-data">
         @endif
        @csrf
    <div id="form_section">
    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Communication Type</label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> additional information.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select required class="form-control customform eng_xxxs fg-darkCrimson" id="communicationtypes_id" name="communicationtypes_id" required>
              <option value="">--SELECT--</option>
              @foreach($commtypes as $commtypesres)
                <option value="{{ $commtypesres->id }}">{{ $commtypesres->entitle }}</option>
              @endforeach
            </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME" class="eng_xxxs fg-darkBrown">Sent to</label>
        <small id="HELPNAME" class="form-text eng_xxxxs text-muted"> additional information.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <select required class="form-control customform eng_xxxs fg-darkCrimson" id="communicationto" name="communicationto" required>
              <option value="">--SELECT--</option>
              @foreach($committee as $committeeres)
                <option value="{{ $committeeres->id }}">{{ $committeeres->entitle }}</option>
              @endforeach
            </select>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME1" class="eng_xxxs fg-darkBrown">Subject</label>
        <small id="HELPNAME1" class="form-text eng_xxxxs text-muted"> additional information.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
        <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="subject" name="subject" aria-describedby="HELPNAME" placeholder="Name" maxlength="250" minlength="3"> 
      <p id="subjecterror"></p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    <div class="row customformrow">
      <div class="col-md-6 py-2">
        <label for="IDNAME2" class="eng_xxxs fg-darkBrown">Body </label>
        <small id="HELPNAME2" class="form-text eng_xxxxs text-muted"> additional information.</small>
      </div> <!-- ./col-md-6 -->
      <div class="col-md-6 py-2">
           <!-- <textarea class="form-control customform eng_xxxs fg-darkCrimson" name="content" id="content"></textarea> -->
           <textarea class="summernote" name="content" id="content" minlength="3" maxlength="1000" required></textarea>
            <p id="summernoteerror"></p>
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->
    <div class="row customformrow">
      <div class="col-md-12 py-2">
    <div class="form-group{{ $errors->has('imagename') ? ' has-danger' : '' }}" id="photo_div">
         <label for="IDNAME2" class="eng_xxxs fg-darkBrown">Attachments </label>
                                  
        <div class="needsclick dropzone customform eng_xxxs fg-darkCrimson" id="document-dropzone">
        </div>                                    
    </div>
  </div>
  </div>
    <div class="row customformrow">
      <div class="col-md-6 py-2 justify-content-center d-flex">
        
        <button class="btn btn-sm btn-flat eng_xxxs bg-lightOrange fg-darkCrimson"> <i class="fas fa-broom"></i>&nbsp;Reset </button> &nbsp;&nbsp;
        </div>
        <div class="col-md-6 py-2 justify-content-center d-flex">
        
           <button class="btn btn-sm btn-flat eng_xxxs bg-darkAmber fg-lightGray px-3"> <i class="fas fa-save"></i>&nbsp;Sent Communication </button>
       
      </div> <!-- ./col-md-6 -->
    </div> <!-- ./row -->

    </div> <!-- ./form_section -->
  </form>
  </div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./container -->

@endsection

@section('customscripts')
<script>
 $('#subject').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z \s]+$');
  if (!tested.test(testval))
  {
    $('#subject').val('');  
    $('#subjecterror').show();
    $('#subjecterror').css("color","red");
    $('#subjecterror').html("Alphabets Only");
    $('#subjecterror').slideDown("slow");
 
    // console.log("f");
  

  }
  else
  { 
    $('#subjecterror').hide();
    // console.log("T");
    
     
  }
      
});
$('.summernote').summernote({
  callbacks: {
    onChange: function(contents, $editable) {
      var textareaValue = $('.summernote').summernote('code').replace(/<\/?[^>]+(>|$)/g, "");;
      console.log("dsd "+textareaValue);
      var charRegExp ="/^[!~@#$%^*]+$/";
      var tested = new RegExp('[@#$%^*()?":{}|<>]+$');
      if (!tested.test(textareaValue))
      {
        // var textareaValue = $('.summernote').summernote('code');
        
        $('#summernoteerror').html("");
        console.log(textareaValue +" dfgf ");
      }
      else
      {
        $('#summernoteerror').html("Invalid Characters");
            $('#summernoteerror').css("color","red");
            $('#summernote').summernote('reset');
      
        
      }
      // if (textareaValue.search(charRegExp) != 0) {
      //   $('#summernoteerror').html('');
        
      // }else{
      //   // $('#summernoteerror').html('');
      //   $('#summernoteerror').html("Alphabets only");
      //   $('#summernoteerror').css("color","red");
      //   $('#summernote').summernote('reset');
      // }

    //   var charRegExp = /^[!~@#$%^*\<script>\<\/script>]+$/
    // // console.log(textareaValue +" dddhiiss ")/^[a-zA-Z0-9 '.-]+$/ ^[0-9a-zA-Z \,\.\&\\(\\)\\-\\/\\s\\<p>\</p>];
    // var tested = new RegExp('[!~@#$%^*\<script>\<\/script>]+$');
    // if (!tested.test(textareaValue))
    // {
    //   var textareaValue = $('.summernote').summernote('code');
    //   $('#summernoteerror').html("Alphabets only");
    //   $('#summernoteerror').css("color","red");
    //   $('#summernote').summernote('reset');
      
      


    // }
    // else
    // {
    //   $('#summernoteerror').html('');
      
    // }
    }
  }
});
$(document).ready(function(){ 
  // var textareaValue = $('.summernote').summernote('code');
  //   // console.log(textareaValue +" dddhiiss ");
  //   var tested = new RegExp('^[a-zA-Z \s\<p>\</p>]+$');
  // if (!tested.test(textareaValue))
  // {
  //   var textareaValue = $('.summernote').summernote('code');
  //   console.log(textareaValue +" dddhddii ");

  // }
  // else
  // {
  //   console.log(textareaValue +" dddhiinddnnnnnn ");
  // }
  // $('.summernote').summernote({
  //     toolbar: [
  //   ['style', ['style']],
  //   ['font', ['bold', 'underline', 'clear']],
  //   ['para', ['ul', 'ol', 'paragraph']],

  // ], hint: {
  //   words: ['apple', 'orange', 'watermelon', 'lemon'],
  //   match: /\b(\w{1,})$/,
  //   search: function (keyword, callback) {
  //     callback($.grep(this.words, function (item) {
  //       var tested = new RegExp('^[a-zA-Z \s\<p>\</p>]+$');
  //       var textareaValue = $('.summernote').summernote('code');
  //   // console.log(textareaValue +" dddhiiss ");
  // if (!tested.test(textareaValue))
  // {
  //   var textareaValue = $('.summernote').summernote('code');
  //   console.log(textareaValue +" dddhii ");

  // }
  // else
  // {
  //   console.log(textareaValue +" dddhiinnnnnnn ");
  // }
  //       // return item.indexOf(keyword) === 0;
  //     }));
      
     
  //   }
  // }

  // });

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

$("#photo_div").hide();

$('#communicationtypes_id').on('change ', function(e) {
  var id = this.value;
  if(id==1){
    $("#photo_div").hide();
  } else {
    $("#photo_div").show();
  }
      
});



/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
<script>
  
  var uploadedDocumentMap = {}

     Dropzone.options.documentDropzone = {
     url: '{{ route('appadmin.storecommunicationimg') }}',
      maxFilesize: 2, // MB
      addRemoveLinks: true,
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      success: function (file, response) {
        
        $('form').append('<input type="hidden" name="documentimg[]" value="' + response.name + '">')
        
          // console.log(albumname);
          
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="documentimg[]"][value="' + name + '"]').remove()
      },
      init: function () {
        
        @if(isset($project) && $project->document)
          
          var files =
            {!! json_encode($project->documentimg) !!}
          for (var i in files) {
            var file = files[i]
            this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="documentimg[]" value="' + file.file_name + '">')
            
          }
        @endif
      }
    }
</script>
@endsection
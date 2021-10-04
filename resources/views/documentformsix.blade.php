@extends('layouts.basefront')
@section('content')
<div class="row py-2 px-2">
  <div class="col-12">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb breadcrumbrow">
        <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $doccategory->title }}</li>
      </ol>
    </nav>
  </div> <!-- ./col12-->
</div> <!-- ./row -->
<div class="row py-2 px-2">
  <div class="col-md-10">
    <div class="row px-5 py-2 mt-5 ">
  <div class="col-md-12">
  <div class="card searchcardinner">
    <div class="card-header innerformtitle maintext text-center">
    <p class="eng_xxs"> <i class="fas fa-filter"></i>&nbsp;{{ $doccategory->title }} </p>
    </div> <!-- ./card-header -->
 <div class="row py-2">
  <div class="col-12">
    
  </div> <!-- ./col12 -->
  <div class="col-12" id="searchresult" >
    <div class="table-responsive">
      <table class="table table-sm table-hover table-bordered table-striped" id="resposivetable">
        <thead class="eng_xxxs">
          <tr > 
            <th> # </th>
           
            <th> Title </th>
            <th> Content </th>
           
          </tr>

        </thead>
        <tbody class="eng_yxs">
            @php
                $i=1
                @endphp

                @foreach($latestgo as $res)

                <tr>
                    <td><span class="eng_xxxxs"> {{ $i }} </span> </td>
                    <td><span class="eng_xxxxs"> {{ $res->title  }} </span> </td>
                    <td><span class="eng_xxxxs"> {!! $res->content !!} </span> </td> 
                  </tr>
                  @endforeach
        </tbody>
      </table>
    </div> <!-- ./table-responsive -->
  </div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./card -->
  </div> <!-- ./col12 -->

</div> <!-- ./row -->


  </div> <!-- ./col10-->
  <div class="col-md-2 relateditemcard articlebg">
    <div class="col-12 relatedheading pt-3 text-center">
      <p class="eng_xxs">  Documents&nbsp;<i class="fas fa-file-download"></i> </p>
    </div> <!-- ./col12 -->
    <ul class="list-group list-group-flush eng_ys">
     @foreach($relateddocuments as $relateddocument)
      @if($relateddocument->id!=$doccategory->id)
      <li class="list-group-item relateditemlist "><a href="{{ route('documentdetailview',Crypt::encrypt($relateddocument->id))}}"> {{ $relateddocument->title }} </a> </li>
      @else
      <li class="list-group-item relateditemlist "> 
        <span class="relitemspan "><a href="{{ route('documentdetailview',$relateddocument->id)}}"> {{ $relateddocument->title }} </span> </a></li>
        @endif
        @endforeach
     
      <li class="list-group-item  "> Kerala Gazette  </li>
      
    </ul>
  </div> <!-- /col2 -->
</div> <!-- ./row -->


</div> <!-- ./container-->
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
 
$('#departments_id').on('change ', function(e) {
        var deptid = $(this).val();

         $.ajax({
          method:"post",
          dataType:"json",
            data: {deptid:deptid},
            url: '{{ route('getfielddepartment') }}',
            success: function (data) 
            { 
               
               $('#fielddepartments_id').html('');
               $('#fielddepartments_id').append($('<option></option>').val('').html('Select Field Department'));
                $.each(data, function (i,data) {
                   
                    $('#fielddepartments_id').append("<option value='" + data.id + "'>" + data.name + "</option>");

                });
               
            }
        });
     });


 $('#ajaxmodalform').on('submit', function(event){ 
   var formData = new FormData(this);
    event.preventDefault();
    
        action_url = "{{ route('documentsearch') }}";

   

    $.ajax({
         url: action_url,
         method:"post",
          data:$(this).serialize(),
         dataType:"json",
         success:function(data)
         { 
            var html = '';
            $('#tbodyviewdet').html('');
            if(data.success==2)
            {
              $('#searchresult').css('display','block');
            html = '<tr><td colspan="5"><div class="alert alert-danger text-center">No Data Found</div></td></tr>';  
            $('#tbodyviewdet').append(html);             
            }
            else if(data.success==1)
            {

               $('#searchresult').css('display','block');
               var j=0;
               $.each(data.latestgo, function (i) {
                j=j+1;

                 var url="{{ asset('Govtorder') }}/"+ data.latestgo[i].filepath;
              var updateddt = new Date(data.latestgo[i].documentdate);
             var dd = updateddt.getDate();
             var mm = updateddt.getMonth()+1; //January is 0! 
             var yyyy = updateddt.getFullYear();
             var updateddt = dd+'-'+mm+'-'+yyyy; 

               $('#tbodyviewdet').append('<tr><td>'+j+'</td><td>'+data.latestgo[i].deptname+'</td><td>'+data.latestgo[i].title+'</td><td>'+updateddt+'</td><td><a href="'+url+'" target="_blank"> <i class="far fa-file-pdf"></i> &nbsp;('+data.latestgo[i].size+'-KB) </a></td></tr>');

             });


                $('#tablegosarch').DataTable();
             
              
            }
         }
    });
  });



/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
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
    <p class="eng_xxs"> <i class="fas fa-filter"></i>&nbsp;Search {{ $doccategory->title }} </p>
    </div> <!-- ./card-header -->
 <form id="ajaxmodalform" method="post">
  @csrf
    <div class="card-body articlebg">
      
      <div class="row listborders py-2 ">
        <div class="col-md-3">
          <p class="eng_xxxs"> {{ $formlabel->deptlbl }}</p>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
          <select class="form-control form-control-sm" id="departments_id" name="departments_id">
              <option >Secretariat Department</option>
        </select>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
          <p class="eng_xxxs"> {{ $formlabel->fielddeptlbl }}</p>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
          <select class="form-control form-control-sm" id="fielddepartments_id" name="fielddepartments_id">
              <option >Field Department</option>
        </select>
        </div> <!-- ./col6 -->
      </div> <!-- ./inner-row -->
        
      <div class="row listborders  py-2">
        <div class="col-md-3">
          <p class="eng_xxxs"> {{ $formlabel->fromdtlbl }}</p>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
           <input data-inputmask-alias="date" class="form-control form-control-sm" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" placeholder="dd/mm/yyyy" id="fromdate" name="fromdate" min="10" maxlength="10" />
         
        </div> <!-- ./col6 -->

        <div class="col-md-3  py-2">
          <p class="eng_xxxs"> {{ $formlabel->todtlbl }}</p>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
           <input data-inputmask-alias="date" class="form-control form-control-sm" data-inputmask-inputformat="dd/mm/yyyy" im-insert="false" placeholder="dd/mm/yyyy" id="todate" name="todate" min="10" maxlength="10" />
          
        </div> <!-- ./col6 -->
      </div> <!-- ./inner-row -->
      <div class="row listborders  py-2">
        <div class="col-md-3">
          <p class="eng_xxxs">  {{ $formlabel->golbl }}</p>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
          <input type="text" class="form-control form-control-sm" id="gonumber" name="gonumber" aria-describedby="emailHelp" placeholder="E.g. 36/2021/ITD">
        </div> <!-- ./col6 -->

        <div class="col-md-3">
          <p class="eng_xxxs"> {{ $formlabel->keyword }}</p>
        </div> <!-- ./col6 -->
        <div class="col-md-3">
          <input type="text" class="form-control form-control-sm" id="keywords" name="keywords" aria-describedby="emailHelp" >
        </div> <!-- ./col6 -->
      </div> <!-- ./inner-row -->
           
      <div class="row   py-2">
        <div class="col-12 pt-2 d-flex justify-content-end">
          <input type="hidden"  id="hidden_doccatergoryid" name="hidden_documenttypeid" value="{{ $doccategory->id }}" >
          <button class="btn btn-sm btn-flat primarydark maintext"> <span class="eng_xxxs"> <i class="fab fa-searchengin"></i>&nbsp;{{ $doccategory->title }} </span> </button>
        </div> <!-- ./col12 -->
      </div> <!-- ./inner-row -->
    </div> <!-- ./card-body -->
</form>

</div> <!-- ./card -->
  </div> <!-- ./col12 -->

</div> <!-- ./row -->
<div class="row py-2">
  <div class="col-12">
    <div class="alert alert-success" role="alert">
      <p class="eng_xxxs">Results based on your search criterion are as follows. </p>
    </div> <!-- ./alert -->
  </div> <!-- ./col12 -->
  <div class="col-12" id="searchresult" style="display:none;">
    <div class="table-responsive">
      <table class="table table-sm table-hover table-bordered table-striped" id="resposivetable">
        <thead class="eng_xxxs">
          <tr > 
            <th> # </th>
            <th> Department </th>
            <th> Title </th>
            <th> Date </th>
            <th> File </th>
          </tr>
        </thead>
        <tbody class="eng_yxs" id="tbodyviewdet">
           
        </tbody>
      </table>
    </div> <!-- ./table-responsive -->
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
@extends('layouts.basefront')
@section('content')
<div class="row py-2 px-2">
  <div class="col-12">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb breadcrumbrow">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
      </ol>
    </nav>
  </div> <!-- ./col12-->
</div> <!-- ./row -->  
<div class="row py-3">

    @foreach($newsvolumes as $res)

	<div class="col-md-3 p-2">
		<div class="card ">
			<div class="card-body text-center ">
				<a href="{{url('Newslettervolume').'/'.$res->poster}}" target="_blank"><p class=""> {{ $res->title }} </p></a>
			</div> <!-- ./card-body -->
		</div> <!-- ./card -->
	</div> <!-- ./col3 -->

  @endforeach

</div> <!-- ./row -->
</div> <!-- ./container -->
@endsection

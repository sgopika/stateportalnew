<?php
include ('innerhtmlheader.php');
include ('navheader.php');
?>
<div class="container-fluid homepage adminpage">
<div class="row ">
	<div class="col-12 py-2  ">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb breadbar justify-content-end">
		    <li class="breadcrumb-item eng_xxxs">Dashboard</li>
		    <li class="breadcrumb-item eng_xxxs">List</li>
		  </ol>
		</nav>
	</div> <!-- col12 -->
	<div class="col-12 py-1 px-2 ">
		<p class="eng_xxs px-3 fg-darkBrown"> Page Title </p>
	</div> <!-- ./col12 -->	
	<div class="col-12 md-whiteframe-2dp ">
		<div id="form_section">
		<div class="row customformrow">
			<div class="col-md-6 py-2">
				<label for="IDNAME" class="eng_xxxs fg-darkBrown">label name </label>
				<small id="HELPNAME" class="form-text eng_xxxxs text-muted"> additional information.</small>
			</div> <!-- ./col-md-6 -->
			<div class="col-md-6 py-2">
			    <input type="email" class="form-control customform eng_xxxs fg-darkCrimson" id="IDNAME" aria-describedby="HELPNAME" placeholder="Placeholder value">
			</div> <!-- ./col-md-6 -->
		</div> <!-- ./row -->

		<div class="row customformrow">
			<div class="col-md-6 py-2">
				<label for="IDNAME1" class="eng_xxxs fg-darkBrown">label name </label>
				<small id="HELPNAME1" class="form-text eng_xxxxs text-muted"> additional information.</small>
			</div> <!-- ./col-md-6 -->
			<div class="col-md-6 py-2">
			    <input type="email" class="form-control customform eng_xxxs fg-darkCrimson" id="IDNAME1" aria-describedby="HELPNAME1" placeholder="Placeholder value">
			</div> <!-- ./col-md-6 -->
		</div> <!-- ./row -->

		<div class="row customformrow">
			<div class="col-md-6 py-2">
				<label for="IDNAME2" class="eng_xxxs fg-darkBrown">label name </label>
				<small id="HELPNAME2" class="form-text eng_xxxxs text-muted"> additional information.</small>
			</div> <!-- ./col-md-6 -->
			<div class="col-md-6 py-2">
			     <select class="form-control customform eng_xxxs fg-darkCrimson" id="IDNAME2" aria-describedby="HELPNAME2">
				 	 <option>Default select</option>
				 </select>
			</div> <!-- ./col-md-6 -->
		</div> <!-- ./row -->

		<div class="row customformrow">
			<div class="col-md-6 py-2 justify-content-center d-flex">
				
				<button class="btn btn-sm btn-flat eng_xxxs bg-lightOrange fg-darkCrimson"> <i class="fas fa-broom"></i>&nbsp;Reset </button> &nbsp;&nbsp;
				</div>
				<div class="col-md-6 py-2 justify-content-center d-flex">
				
			     <button class="btn btn-sm btn-flat eng_xxxs bg-darkAmber fg-lightGray px-3"> <i class="fas fa-save"></i>&nbsp;Save </button>
			 
			</div> <!-- ./col-md-6 -->
		</div> <!-- ./row -->

		</div> <!-- ./form_section -->
	</div> <!-- ./col12 -->
</div> <!-- ./row -->
</div> <!-- ./container -->
<?php
include ('sectionfooter.php');
include ('jsfooter.php');
include ('scriptfooter.php');
include ('htmlfooter.php');
?>
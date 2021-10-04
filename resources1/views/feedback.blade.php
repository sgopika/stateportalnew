@extends('layouts.basefront')
@section('content')
<div class="article-container">

        <div class="container-lg">
            <div class="article-back text-end d-none d-md-block">
                <a href="{{ url('/') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left"></i></span>Back</a>
            </div>
            <form action="{{ route('feedbackstore') }}" id="ajaxmodalform" method="post" class="form-horizontal" >
            @csrf
            <div class="row row-no-gutters justify-content-center pt-2 pb-md-5 pb-sm-2">
                <div class="col-12 py-1">
                  @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}
                </div>
                 @endif
                </div>
                <div class="col-12 col-md-7 col-lg-8 text-left ms-lg-4 my-4 my-md-0">
                  <h1 class="article-current-title fw-bold mb-3 head-dark kg-ix-font font-merriweather-normal mx-3 mx-lg-0 text-center text-md-start">Feedback</h1>
                    <div id="form_section">
                        <div class="row customformrow">
                          <div class="col-md-6 py-2">
                            <label for="IDNAME" class="eng_xxxs fg-darkBrown">Name</label>
                            
                          </div> <!-- ./col-md-6 -->
                          <div class="col-md-6 py-2">
                              <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="name" name="name" minlength="3" maxlength="50" aria-describedby="HELPNAME" placeholder="Enter Name">
                          </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                          <div class="col-md-6 py-2">
                            <label for="IDNAME1" class="eng_xxxs fg-darkBrown">Email </label>
                            
                          </div> <!-- ./col-md-6 -->
                          <div class="col-md-6 py-2">
                              <input type="email" class="form-control customform eng_xxxs fg-darkCrimson" id="email" name="email" minlength="10" maxlength="40" aria-describedby="HELPNAME1" placeholder="Enter Email">
                          </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                          <div class="col-md-6 py-2">
                            <label for="IDNAME2" class="eng_xxxs fg-darkBrown">Mobile </label>
                            
                          </div> <!-- ./col-md-6 -->
                          <div class="col-md-6 py-2">
                               <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="mobile" name="mobile" minlength="10" maxlength="12" aria-describedby="HELPNAME1" placeholder="Enter mobile">
                          </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                          <div class="col-md-6 py-2">
                            <label for="IDNAME2" class="eng_xxxs fg-darkBrown">Subject </label>
                            
                          </div> <!-- ./col-md-6 -->
                          <div class="col-md-6 py-2">
                               <input type="text" class="form-control customform eng_xxxs fg-darkCrimson" id="subject" name="subject" minlength="3" maxlength="50" aria-describedby="HELPNAME1" placeholder="Enter subject">
                          </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                          <div class="col-md-6 py-2">
                            <label for="IDNAME2" class="eng_xxxs fg-darkBrown">Content </label>
                            
                          </div> <!-- ./col-md-6 -->
                          <div class="col-md-6 py-2">
                              <textarea class="form-control customform eng_xxxs fg-darkCrimson summernote" id="content" name="content" aria-describedby="HELPNAME" placeholder="Content" maxlength="1000" minlength="3"></textarea>
                          </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                        <div class="row customformrow">
                          <div class="col-md-6 py-2 justify-content-center d-flex">
                            
                            
                            </div>
                            <div class="col-md-6 py-2 justify-content-center d-flex">
                            
                               <button class="btn btn-sm btn-flat btn w-auto font-mulish-normal dark-border"  id="btn-kg-back"> <i class="fas fa-save"></i>&nbsp;Save </button>
                           
                          </div> <!-- ./col-md-6 -->
                        </div> <!-- ./row -->

                    </div> <!-- ./form_section -->
                </div>
            </div>
            </form>
        </div>
    </div>



@endsection

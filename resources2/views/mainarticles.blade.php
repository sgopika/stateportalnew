@extends('layouts.basefront')
@section('content')
<div class="article-container">

        <div class="container-lg">
            <div class="article-back text-end d-none d-md-block">
                <a href="{{ url('/') }}" id="btn-kg-back" class="btn w-auto font-mulish-normal dark-border"><span class="btn-label pe-2"><i class="fa fa-angle-double-left"></i></span>Back</a>
            </div>
           
            <div class="row row-no-gutters justify-content-center pt-2 pb-md-5 pb-sm-2">

                <div class="col-12 col-md-7 col-lg-8 text-left ms-lg-4 my-4 my-md-0">
                  <h1 class="article-current-title fw-bold mb-3 head-dark kg-ix-font font-merriweather-normal mx-3 mx-lg-0 text-center text-md-start">Contact Us</h1>
                    <div id="form_section">
                      <div class="row customformrow">
                        <div class="col-md-12 py-2">
                          {!! $mainarticles->content !!}
                          
                        </div> <!-- ./col-md-6 -->
                       
                      </div> <!-- ./row -->

                     

                      </div> <!-- ./form_section -->
                </div>
            </div>
            
        </div>
    </div>


@endsection

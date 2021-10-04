<!DOCTYPE html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Kerala State Portal </title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" type="image" href="assets/images/favicon.png" />

        <!-- ========================= CSS here ========================= -->
        <link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/login.css') }}" />
    </head>

    <body class="bgcolor">
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card border-0">
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <div class="row d-flex">
                        <div class="col-lg-6">
                            <div class="card1 pb-5">
                                <div class="row d-flex justify-content-center text-center" > <img src="{{ asset('assets/webassets/assets/images/login/logo.svg') }}" class="logo"> </div><br>

                                <div class="row d-flex justify-content-center text-center border-line"> <img src="{{ asset('assets/webassets/assets/images/login/network.png') }}" class="img-fluid myimage"> </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="card2 card border-0 px-4 py-5">
                                    
                                     <div class="row px-5 text-center"> 
                                        <label class="mb-1"><h5 class="mb-0 text-sm">{{ __('Reset Password') }}</h5></label> 
                                         
                                    </div>
                                    <div class="row px-3"> 
                                        <label class="mb-1"><h6 class="mb-0 text-sm">{{ __('E-Mail Address') }}</h6></label> 
                                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    </div>
                                    <div class="row mb-3 px-3"> 
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                    <hr />
                                </div>
                            </form>
                        </div>
                          
                    </div>
             
            </div>
        </div>
    </body>
</html>
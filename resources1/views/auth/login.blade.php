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
                <form method="POST" action="{{ route('checklogin') }}">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-lg-6">
                            <div class="card1 pb-5">
                                <div class="row d-flex justify-content-center text-center" > <img src="{{ asset('assets/webassets/assets/images/login/logo.svg') }}" class="logo"> </div><br>

                                <div class="row d-flex justify-content-center text-center border-line"> <img src="{{ asset('assets/webassets/assets/images/login/network.png') }}" class="img-fluid myimage"> </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card2 card border-0 px-4 py-5">
                                <div class="row px-3"> 
                                    <label class="mb-1"><h6 class="mb-0 text-sm">{{ __('E-Mail Address') }}</h6></label> 
                                    <input id="email" type="email" class="mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter a valid email address">

                                </div>

                                <div class="row px-3"> 
                                    <label class="mb-1"><h6 class="mb-0 text-sm">{{ __('Password') }}</h6></label> 
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password"> 
                                </div>

                               <!--  <div class="row px-3 captcha"> 
                                    <label class="mb-1"><h6 class="mb-0 text-sm">{!! captcha_img() !!}&ensp;<button type="button" class="btn btn-danger refresh-captcha" id="refresh-captcha">&#x21bb;</button></h6></label> 
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"  required>

                                        @if ($errors->has('captcha'))
                                            <span class="help-block text-danger"><strong>*{{ $errors->first('captcha') }}</strong></span>
                                        @endif
                                </div> -->
                                <div class="row px-3"> 
                                    @if(isset($message))
                                           
                                        <strong class="text-danger">{{ $message }}</strong>        
                                    @endif 
                                </div>  

                                <div class="px-3 mb-4">
                                    @if (Route::has('password.request'))
                                    <a class="ml-auto mb-0 text-sm" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>


                                <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                                <hr />
                            </div>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </body>
</html>
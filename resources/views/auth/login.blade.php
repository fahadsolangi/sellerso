@extends('layouts.main')
@section('content')
<div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">&nbsp;</h5>
   <form method="POST" action="{{ route('login') }}" class="contact-form">
    @csrf     
<div class="comment-box contact-box">
<div class="row z-index ">
<div class="col-xl-6 col-lg-5 col-md-5 text-center">  
<img class="customer-img" src="{{asset('images/customer-login-img.png')}}"/>

</div>
<div class="col-xl-6 col-lg-7 col-md-7 new-login">
<div class="card-info">
  <div class="row z-index ">
<div class="col-xl-12 col-lg-12">   
   @if(isset($_GET['verified']) && $_GET['verified'] != "")
    <span style="color: #1f890a;
    font-weight: 600;">Your Email is verified successfully. Please login your account.</span>
    @endif
  <h5 class="inner-heading mb-4">Login as Customer</h5>
</div>
<div class="col-xl-12 col-lg-12 order-12 order-lg-1 ">  
<div class="row">
     <input type="hidden" name="role" value="2" >
     <input type="hidden" name="redirectTo" value="{{ isset($_GET['redirectTo']) ? $_GET['redirectTo'] : ''}}" >
<div class="col-md-12 mb-4">
<label>{{Helper::errorField('email',$errors)}}</label>
<input class="border-input login-input" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
</div>
<div class="col-md-12 mb-4">
    <label>{{Helper::errorField('password',$errors)}}</label>
<input class="border-input login-input" type="password" name="password" placeholder="Enter Password">
</div>

<div class="col-12 mb-4 text-right">
<a href="{{ route('home')}}/password/reset">Forgot Passsword?</a>
</div>
</div>
<button class="btn text-uppercase text-center btn-block">Sign In</button>
</div>

</div>
   
</div>
<div class="clearfix"></div>
<div class="col-12 new-account p-0">
<label class="mt-4">Don't have an account?</label>
<a class="mt-0" href="{{route('register')}}?type=customer"> Click here to signup<i class="fa fa-long-arrow-right ml-1" aria-hidden="true"></i></a>
</div>

</div>
</div>
</div>

</form>
<div class="clearfix"></div>



</div>
</div>

<?php /*
<div class="login">
<!-- Login -->
<div class="login__block active" id="l-login">
<div class="login__block__header">
    <i class="zmdi zmdi-account-circle"></i>
    Hi there! Please Sign in
</div>
<form method="POST" action="{{ route('login') }}">
@csrf
<div class="login__block__body">
    <div class="form-group form-group--float form-group--centered">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        <label>Email Address</label>
        <i class="form-group__bar"></i>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group form-group--float form-group--centered">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        <label>Password</label>
        <i class="form-group__bar"></i>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group form-group--float form-group--centered">
        <div class="checkbox">
            <input class="form-check-input" type="checkbox" name="remember" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
            <label class="checkbox__label" for="customCheck1">{{ __('Remember Me') }}</label>
        </div>
    </div>
    <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
</div>
</form>
</div>
</div>
*/ ?>
@endsection
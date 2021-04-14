@extends('layouts.main')
@section('content')
  {{--  <section id="contact_page">
    <div class="container">
      <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                    <div class="section-title marginnone">
                        <h1>New Registration {{(isset($_GET['type']) ? 'Customer' : 'Seller')}}</h1>
                    </div>
                </div>
        <div class="col-sm-6 col-md-offset-3">
            <form method="POST" action="{{ route('register') }}" class="contact-form">
            @csrf
            <div class="row">
             <!-- <div class="col-sm-12">
                <label>User Type</label> 
                <select name="role" class="select2_parent">
                  <option value="1">Supplier</option>
                  <option value="2">Customer</option>
                </select>
             </div> -->
             <input type="hidden" name="role" value="{{(isset($_GET['type']) ? '2' : '1')}}">
              <div class="col-sm-12">
                <label>Name</label> 
                <input id="name" type="text" class="form-control{{ $errors->register->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->register->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->register->first('name') }}</strong>
                                    </span>
                                @endif
             </div>
            <div class="col-sm-12">
                <label>E-mail Address</label> 
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->register->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->register->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="col-sm-12">
                <label>Password</label> 
                <input id="password" type="password" class="form-control{{ $errors->register->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->register->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->register->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="col-sm-12">
                <label>Confirm Password</label> 
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
              <div class="col-sm-12">
                <input type="submit" name="submit" value="Register" class="submit_btn">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> --}}




  <div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">&nbsp;</h5>
<form method="POST" action="{{ route('register') }}" class="contact-form">
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
  <h5 class="inner-heading mb-4">Registration as {{(isset($_GET['type']) ? 'Customer' : 'Seller')}}</h5>
</div>
<div class="col-xl-12 col-lg-12 order-12 order-lg-1 ">  
<div class="row">
<input type="hidden" name="role" value="{{(isset($_GET['type']) ? '2' : '1')}}">
 <div class="col-md-12 mb-4">

<input class="border-input login-input{{ $errors->register->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus type="text" id="name" placeholder="Full Name">
@if ($errors->register->has('name'))
    <span class="invalid-feedback" role="alert" style="display: block">
        <strong>{{ $errors->register->first('name') }}</strong>
    </span>
@endif
</div>    
<div class="col-md-12 mb-4">

<input class="border-input login-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required id="email" type="email" placeholder="Email Address" >
@if ($errors->register->has('email'))
    <span class="invalid-feedback" role="alert" style="display: block">
        <strong>{{ $errors->register->first('email') }}</strong>
    </span>
@endif
</div>
<div class="col-md-12 mb-4">
<input class="border-input login-input{{ $errors->register->has('password') ? ' is-invalid' : '' }}" name="password" required id="password" type="password" placeholder="Enter Password">
@if ($errors->register->has('password'))
    <span class="invalid-feedback" role="alert" style="display: block">
        <strong>{{ $errors->register->first('password') }}</strong>
    </span>
@endif
</div>
<div class="col-md-12 mb-4">
<input id="password-confirm" type="password" class="border-input login-input" name="password_confirmation" required placeholder="Confirm Password">
</div>
<div class="col-12 mb-4 text-right">
{{-- <a href="{{ route('home')}}/password/reset">Forgot Passsword?</a> --}}
</div>
</div>
<button class="btn text-uppercase text-center btn-block">Register</button>
</div>

</div>
   
</div>
<div class="clearfix"></div>
<div class="col-12 new-account p-0">
<label class="mt-4">Already have an account?</label>
<a class="mt-0" href="{{route('supplier_login')}}"> Click here to login as seller<i class="fa fa-long-arrow-right ml-1" aria-hidden="true"></i></a>
<a class="mt-0" href="{{route('login')}}"> Click here to login as customer<i class="fa fa-long-arrow-right ml-1" aria-hidden="true"></i></a>
</div>

</div>
</div>
</div>

</form>
<div class="clearfix"></div>



</div>
</div>
@endsection

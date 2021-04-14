@extends('layouts.main')
@section('content')

{{--      <section id="contact_page">
    <div class="container">
      <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                    <div class="section-title marginnone">
                        <h1>Login As Seller</h1>
                    </div>
                </div>
        <div class="col-sm-6 col-md-offset-3">
            <form method="POST" action="{{ route('login') }}" class="contact-form">
            @csrf
            <div class="row">
              <input type="hidden" name="role" value="1" >
              <div class="col-sm-12">
                <label>Email Address {{Helper::errorField('email',$errors)}}</label> 
                <input name="email" placeholder="Enter Email" type="email" value="{{ old('email') }}">
             </div>
            <div class="col-sm-12">
                <label>Password {{Helper::errorField('password',$errors)}}</label> 
                <input name="password" placeholder="Enter Password" type="password">
            </div>
            <div class="col-sm-12">
                <a href="{{route('register')}}">Create a new Account</a>
                <a href="{{ route('home')}}/password/reset" style="float:right;">Forget Password?</a>
            </div>
              <div class="col-sm-12">
                <input type="submit" name="submit" value="Sign In" class="submit_btn">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> --}}

  {{-- <div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">Login As Seller</h5>
<form method="POST" action="{{ route('login') }}" class="contact-form">
            @csrf 
<div class="comment-box contact-box">
<div class="row z-index ">
<div class="col-xl-10 col-lg-7 mb-5 mb-lg-0 mb-xl-0">  
<div class="row">
<input type="hidden" name="role" value="1" >
<div class="col-md-12 mb-4">
<label> {{Helper::errorField('email',$errors)}}</label> 
<input class="border-input" name="email" placeholder="Enter Email" type="email" value="{{ old('email') }}">
</div>
<div class="col-md-12 mb-4">
    <label>{{Helper::errorField('password',$errors)}}</label> 
<input class="border-input" type="password" name="password" placeholder="Enter Password">
</div>
</div>
<button class="btn text-uppercase" type="submit">Submit</button>
</div>
</div>
</div>
    </form>
<div class="clearfix"></div>
</div>
</div> --}}


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
  <h5 class="inner-heading mb-4">Login as Seller</h5>
</div>
<div class="col-xl-12 col-lg-12 order-12 order-lg-1 ">  
<div class="row">
     <input type="hidden" name="role" value="1" >
     
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
<a class="mt-0" href="{{route('register')}}"> Click here to signup<i class="fa fa-long-arrow-right ml-1" aria-hidden="true"></i></a>
</div>

</div>
</div>
</div>

</form>
<div class="clearfix"></div>



</div>
</div>



@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
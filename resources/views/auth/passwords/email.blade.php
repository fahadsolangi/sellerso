@extends('layouts.main')
@section('content')

  <!-- <section id="contact_page">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--              <div class="col-sm-6 col-md-offset-3">-->
  <!--                  <div class="section-title marginnone">-->
  <!--                      <h1>Reset Password</h1>-->
  <!--                  </div>-->
  <!--              </div>-->
  <!--      <div class="col-sm-6 col-md-offset-3">-->
  <!--          <form method="POST" action="{{ route('Auth.resetEmail') }}">-->
  <!--                      @csrf-->
  <!--          <div class="row">-->
                
  <!--            <div class="col-sm-12">-->
  <!--              <label>Email Address {{Helper::errorField('email',$errors)}}</label> -->
  <!--              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>-->

  <!--                              @if ($errors->has('email'))-->
  <!--                                  <span class="invalid-feedback" role="alert">-->
  <!--                                      <strong>{{ $errors->first('email') }}</strong>-->
  <!--                                  </span>-->
  <!--                              @endif-->
  <!--           </div>-->

  <!--          <div class="col-sm-12">-->
                
  <!--          </div>-->
  <!--            <div class="col-sm-12">-->
  <!--              <input type="submit" name="submit" value="Send Password Reset Link" class="submit_btn">-->
  <!--            </div>-->
  <!--          </div>-->
  <!--        </form>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</section>-->
  
  <div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">&nbsp;</h5>
   <form method="POST" action="{{ route('Auth.resetEmail') }}">
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
  <h5 class="inner-heading mb-4">Reset Password</h5>
</div>
<div class="col-xl-12 col-lg-12 order-12 order-lg-1 ">  
<div class="row">
     <input type="hidden" name="role" value="2" >
     <input type="hidden" name="redirectTo" value="{{ isset($_GET['redirectTo']) ? $_GET['redirectTo'] : ''}}" >
<div class="col-md-12 mb-4">
<label>{{Helper::errorField('email',$errors)}}</label>
<input class="border-input login-input" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required>
@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
</div>



</div>
<button type="submit" class="btn text-uppercase text-center btn-block">Send Password Reset Link</button>
</div>

</div>
   
</div>


</div>
</div>
</div>

</form>
<div class="clearfix"></div>



</div>
</div>

@endsection

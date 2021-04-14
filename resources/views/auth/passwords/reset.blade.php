@extends('layouts.main')
@section('content')
<section id="contact_page">
    <div class="container">
      <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                    <div class="section-title marginnone">
                        <h1>Reset Password</h1>
                    </div>
                </div>
        <div class="col-sm-6 col-md-offset-3">
          <form method="POST" action="{{ route('Auth.resetpassword') }}">
            @csrf
            <input type="hidden" name="remember_token" value="{{Request::segment(3)}}">
            <div class="row">
              <div class="col-sm-12">
                <label>Password {{Helper::errorField('password',$errors)}}</label> 
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="col-sm-12">
                <label>Confirm Password </label> 
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
              <div class="col-sm-12">
                <input type="submit" name="submit" value="Reset Password" class="submit_btn">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

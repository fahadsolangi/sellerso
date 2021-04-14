@extends('layouts.main')
@section('content')

     <section id="contact_page">
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
                <input type="submit" name="submit" value="Sign In" class="submit_btn">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
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
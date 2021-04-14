@extends('layouts.main')
@section('content')
<style type="text/css">
  .border-input{
    margin-bottom: 10px;
  }
</style>
<div class="container-fluid text-center">    
  <h1>Account Information</h1>
  @if($user->is_active == 0)
    <p style="color:red">Please verfied your account. Verification link has been sent to your email address</p>
  @endif
  <div class="row content">
    @include('customer.sidebar1')
    <div class="col-sm-9"> 
      <section class="myAacount">
        <div class="container">
          <div class="col-md-10 col-xs-12 col-sm-7 col-md-offset-1">
            <div class="myAccountForm">
              <form method="POST" action="{{ route('customer.update.user')}}">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
              <label>{{Helper::errorField('first_name',$errors)}}</label>
              <input type="text" name="first_name" value="{{$user->first_name}}" placeholder="First Name" class="border-input">
              <label>{{Helper::errorField('last_name',$errors)}}</label>
              <input type="text" name="last_name" value="{{$user->last_name}}" placeholder="Last Name" class="border-input">
              <label>{{Helper::errorField('email',$errors)}}</label>
              <input type="text" name="email" value="{{$user->email}}" placeholder="Email" readonly="readonly" class="border-input">
              <label>{{Helper::errorField('city',$errors)}}</label>
              <input type="text" name="city" value="{{$user->city}}" placeholder="City" class="border-input">
              <label>{{Helper::errorField('phone',$errors)}}</label>
              <input type="text" name="phone" value="{{$user->phone}}" placeholder="Phone" class="border-input">
              <button class="btn text-uppercase" type="submit">Submit</button>
         </form>
            </div>
          </div>
        </div>
      </section>
      <div class="clearfix"></div>
      <hr>
    </div>
  </div>
</div>
@endsection
@section('css')
<style type="text/css">
.container {
    width: 1030px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
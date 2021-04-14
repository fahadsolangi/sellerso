@extends('layouts.main')

@section('content')
<style type="text/css">
  .border-input{
    margin-bottom: 10px;
  }
</style>

<div class="container-fluid text-center">    

  <h1>Update Password</h1>

  <div class="row content">

    @include('customer.sidebar1')

    <div class="col-sm-9"> 

      <section class="myAacount">

        <div class="container">

          <div class="col-md-10 col-xs-12 col-sm-7 col-md-offset-1">

            <div class="myAccountForm">

              <form method="POST" action="{{ route('customer.submitpass')}}">

              @csrf

                <label>New Password  {{Helper::errorField('newpass',$errors)}}</label>

                <input type="password" name="newpass"  placeholder="******" class="border-input">

                <label>Confirm Password {{Helper::errorField('cnfrmpass',$errors)}}</label>

                <input type="password" name="cnfrmpass" placeholder="********" class="border-input">

               <button class="btn text-uppercase" type="submit">Change Password</button>

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
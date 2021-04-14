@extends('supplier.layout.main')
@section('content')
<section class="main-people-say">
  <div class="container">
    <div class="row">
       <div class="col-md-12 col-xs-12 col-sm-9">
          <div class="people-img-text">
            <div class="signinfrom-area">
                <form method="POST" action="{{ route('customer.submitpass') }}">
                  @csrf
                  <div class="signinfrom-input">
                    <label>New Password {{Helper::errorField('newpass',$errors)}}</label>
                    <input type="password" name="newpass" placeholder="******" class="form-control">
                  </div>
                  <div class="signinfrom-input">
                    <label>Confirm Password {{Helper::errorField('cnfrmpass',$errors)}}</label>
                    <input type="password" name="cnfrmpass" placeholder="******" class="form-control">
                  </div>
                  <div class="signinfrom-input">
                    <input name="" type="submit" value="Change Password">
                  </div>
                </form>
            </div>
          </div>
        </div>
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
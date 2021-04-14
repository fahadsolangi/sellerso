@extends('layouts.main')
@section('content')
<!-- <form class="CrudForm" id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error" method="POST" action="{{route('contactusSubmit')}}">
@csrf
<div class="form-group">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Helper::errorField('inquiries_name',$errors)}}
      <input placeholder="First Name" name="inquiries_name" value="{{old('inquiries_name')}}" type="text" class="form-control">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Helper::errorField('inquiries_lname',$errors)}}
      <input placeholder="Last Name" name="inquiries_lname" value="{{old('inquiries_lname')}}" type="text" class="form-control">
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Helper::errorField('inquiries_email',$errors)}}
      <input placeholder="Email"  name="inquiries_email" value="{{old('inquiries_email')}}" type="text" class="form-control">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      {{Helper::errorField('inquiries_phone',$errors)}}
      <input placeholder="Phone Number" name="inquiries_phone" value="{{old('inquiries_phone')}}" type="text" class="form-control">
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <textarea placeholder="Comment" name="extra_content" class="form-control">{{old('extra_content')}}</textarea>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="contact_btn">
        <input type="submit" class="form-control" value="Submit">
      </div>
    </div>
  </div>
</div>
</form> -->

<div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">Contact Us</h5>
<form class="CrudForm" id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error" method="POST" action="{{route('contactusSubmit')}}">
@csrf    
<div class="comment-box contact-box">
<div class="row z-index ">
<div class="col-xl-8 col-lg-7 mb-5 mb-lg-0 mb-xl-0">  
<div class="row">
<div class="col-md-12 mb-4">
    {{Helper::errorField('inquiries_name',$errors)}}
<input class="border-input" placeholder="First Name" name="inquiries_name" value="{{old('inquiries_name')}}" type="text">
</div>
<div class="col-md-12 mb-4">
    {{Helper::errorField('inquiries_lname',$errors)}}
<input class="border-input" placeholder="Last Name" name="inquiries_lname" value="{{old('inquiries_lname')}}" type="text">
</div>
<div class="col-md-12 mb-4">
    {{Helper::errorField('inquiries_email',$errors)}}
<input class="border-input" placeholder="Email" name="inquiries_email" value="{{old('inquiries_email')}}" type="text">
</div>
</div>
<textarea class="border-input mb-4" placeholder="Message" name="extra_content">{{old('extra_content')}}</textarea>
@if(env('GOOGLE_RECAPTCHA_KEY'))
     <div style="    float: right;" class="g-recaptcha"
          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
@endif
<button type="submit" class="btn text-uppercase">Submit</button>
</div>
</form>
<div class="col-xl-4 col-lg-5">
<div class="contact-info">
   <p>Lorem ipsum dolor sit amet, adipiscing condimentum tristique vel, eleifend sed turpis. Amet, consectetur adipising elit Integer.</p> 
   <h5 class="sub-heading mt-3">Phone</h5>
   <p class="info-detail"><i class="fa fa-phone" aria-hidden="true"></i>+ 2 012345678910</p>
   <p class="info-detail"><i class="fa fa-fax" aria-hidden="true"></i>+ 2 012345678910</p>
   <h5 class="sub-heading mt-4">Email</h5>
   <p class="info-detail"><i class="fa fa-envelope" aria-hidden="true"></i>info@name.com</p>
   <h5 class="sub-heading mt-4">Address</h5>
   <p class="info-detail"><i class="fa fa-map-marker" aria-hidden="true"></i>Address Goes here</p>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>



</div>
</div>

    
    <!--container end-->
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
function inquiry_error(res){
  if(res){
    if(isJSON(res)){
      res = JSON.parse(res);
      if(res.errors){
        var _errors='';
        for(j in res.errors){
          _errors+=res.errors[j].join('</br>')+'</br>';
        }
        generateNotification('0',_errors);
      }
    }
  }
}
function inquiry_success(_msg){
    if(_msg.status){
        generateNotification('1','Thank you! your message has been sent to admin.');
    $('#inquiry_form')[0].reset();
    }
}
</script>
@endsection
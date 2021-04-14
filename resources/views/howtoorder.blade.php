@extends('layouts.main')
@section('content')
<style type="text/css">
    .inner-page .inner-banner {
    min-height: auto;
    background-image: url(../images/inner-bg.png);
    background-size: contain;
    background-repeat: no-repeat;
    padding: 40px 20px 0;
    width: 100%;
    display: block;
    padding-bottom: 80px;
}
</style>
<div class="inner-banner">
<div class="container">
<?php Helper::inlineEditable("h5",['class'=>'inner-heading mb-4'],'How to Order','homeMenu'); ?>
{{-- <h5 class="inner-heading mb-4">About Us</h5> --}}
<div class="comment-box contact-box">
<div class="row z-index ">
<div class="col-md-12">
<?php Helper::inlineEditable("p",['class'=>''],"All transactions are directly between you and the developer of this application. The developer may set its own policies on pricing , usage, and cancelation related to this application. Because Marketplace Appstore isn't directly involved in the development or sale of this application, you will need to contact the developer for any technical support or customer service questions.",'homeMenu'); ?>
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
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
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
<?php Helper::inlineEditable("h5",['class'=>'inner-heading mb-4'],'About Us','homeMenu'); ?>
{{-- <h5 class="inner-heading mb-4">About Us</h5> --}}
<div class="comment-box contact-box">
<div class="row z-index ">
<div class="col-md-12">
<?php Helper::inlineEditable("p",['class'=>''],'Marketplace Appstore is a digital catalog with hundreds of software listings from independent software vendors that make it easy to find, test, buy software at a discount and in bundles. Automate, Manage and Grow your Business.','homeMenu'); ?>


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
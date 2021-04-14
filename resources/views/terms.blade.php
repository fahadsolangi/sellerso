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
<?php Helper::inlineEditable("h5",['class'=>'inner-heading mb-4'],'Terms and Conditions','homeMenu'); ?>
<div class="comment-box contact-box">
<div class="row z-index ">
<div class="col-md-12">
<?php Helper::inlineEditable("p",['class'=>''],"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",'homeMenu'); ?>


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
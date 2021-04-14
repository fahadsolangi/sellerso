@extends('layouts.main')
@section('content')
 <section id="process_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 div_center">
                    <div class="section-title text-center marginnone">
                        <h1>How It Works</h1>
                    </div>
                    <p class="txt_para text-center">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <div class="process_div">
                        <div class="process_icon">
                            <img src="{{asset('images/searchapp_icon.png')}}" class="img-responsive">
                        </div>
                        <h3 class="process_title">Browse or Search the Apps</h3>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="process_div">
                        <div class="process_icon">
                            <img src="{{asset('images/addcart_icon.png')}}" class="img-responsive">
                        </div>
                        <h3 class="process_title">Add one or more Apps to your Cart</h3>
                        <span class="process_sub_title">(More apps = more discounts)</span>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="process_div">
                        <div class="process_icon">
                            <img src="{{asset('images/subscribe_icon.png')}}" class="img-responsive">
                        </div>
                        <h3 class="process_title">Subscribe and Connect</h3>
                        <span class="process_sub_title">(Simple as that)</span>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="process_div">
                        <div class="process_icon">
                            <img src="{{asset('images/manageall_icon.png')}}" class="img-responsive">
                        </div>
                        <h3 class="process_title">Manage all under one Portal</h3>
                        <span class="process_sub_title">(Only applies to subscriptions through our site)</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
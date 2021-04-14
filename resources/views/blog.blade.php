@extends('layouts.main')
@section('content')
{{--  <section id="blog_section">
    <div class="container">
      <div class="row">
                <div class="col-sm-12">
                    <div class="section-title marginnone">
                        <h1>Blog</h1>
                    </div>
                </div>
                @foreach($blog as $val)
        <div class="col-md-6 col-sm-6">
          <div class="blog_div">
                      <div class="blog_img_div">
                        <img src="{{ImageUtil::getHref($val->img_id,'555','347')}}" class="img-responsive">
                        </div>
                      <div class="blog_details_div">    
                            <h2><a href="javascript:void(0);">{{ $val->name}}</a></h2>
                            <span>{{ date('F',strtotime($val->date)) }} {{ date('d',strtotime($val->date)) }}, {{ date('Y',strtotime($val->date)) }}</span> <span class="admin_span">by <a href="javascript:void(0);" class="admin_name">{{ $val->blogby}}</a></span>
                            {!! $val->detail !!}
                            <a href="javascript:void(0);" class="details_btn">Read More</a>
                        </div>
                    </div>
        </div>

      @endforeach

      </div>
    </div>
  </section>
 --}}
<div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">Blog</h5>
    
<div class="row">
@foreach($blog as $val)
<div class="col-md-6 col-lg-4 blog-space">
<div class="blog-card">
<span class="blog-img">
<img src="{{ImageUtil::getHref($val->img_id,'555','347')}}" alt="">
</span>
<div class="blog-content">
<h5 class="sub-heading mt-3">{{ $val->name}}</h5>
<p class="mb-2"><span class="icon mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>{{ date('F',strtotime($val->date)) }} {{ date('d',strtotime($val->date)) }}, {{ date('Y',strtotime($val->date)) }} by <a class="d-inline" href="#">{{ $val->blogby}}</a></p>
{!! $val->detail !!}
<button class="btn mt-3 btn-sm">Read More</button>
</div>
</div>  
</div>
@endforeach
{{-- 
<div class="col-md-6 col-lg-4 blog-space">
<div class="blog-card">
<span class="blog-img">
<img src="{{asset('images/blog-2.png')}}" alt="">
</span>
<div class="blog-content">
<h5 class="sub-heading mt-3">Welcome to Marketplace Appstore</h5>
<p class="mb-2"><span class="icon mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>February 15, 2020 by <a class="d-inline" href="#">Admin</a></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
<button class="btn mt-3 btn-sm">Read More</button>
</div>  
</div>
</div>


<div class="col-md-6 col-lg-4 blog-space">
<div class="blog-card">
<span class="blog-img">
<img src="{{asset('images/blog-3.png')}}" alt="">
</span>
<div class="blog-content">
<h5 class="sub-heading mt-3">Welcome to Marketplace Appstore</h5>
<p class="mb-2"><span class="icon mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>February 15, 2020 by <a class="d-inline" href="#">Admin</a></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
<button class="btn mt-3 btn-sm">Read More</button>
</div>  
</div>
</div>


<div class="col-md-6 col-lg-4 blog-space">
<div class="blog-card">
<span class="blog-img">
<img src="{{asset('images/blog-4.png')}}" alt="">
</span>
<div class="blog-content">
<h5 class="sub-heading mt-3">Welcome to Marketplace Appstore</h5>
<p class="mb-2"><span class="icon mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>February 15, 2020 by <a class="d-inline" href="#">Admin</a></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
<button class="btn mt-3 btn-sm">Read More</button>
</div>  
</div>
</div>


<div class="col-md-6 col-lg-4 blog-space">
<div class="blog-card">
<span class="blog-img">
<img src="{{asset('images/blog-1.png')}}" alt="">
</span>
<div class="blog-content">
<h5 class="sub-heading mt-3">Welcome to Marketplace Appstore</h5>
<p class="mb-2"><span class="icon mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>February 15, 2020 by <a class="d-inline" href="#">Admin</a></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
<button class="btn mt-3 btn-sm">Read More</button>
</div>
</div>  
</div>


<div class="col-md-6 col-lg-4 blog-space">
<div class="blog-card">
<span class="blog-img">
<img src="{{asset('images/blog-2.png')}}" alt="">
</span>
<div class="blog-content">
<h5 class="sub-heading mt-3">Welcome to Marketplace Appstore</h5>
<p class="mb-2"><span class="icon mr-2"><i class="fa fa-calendar" aria-hidden="true"></i></span>February 15, 2020 by <a class="d-inline" href="#">Admin</a></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
<button class="btn mt-3 btn-sm">Read More</button>
</div>
</div>  
</div> --}}

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
@extends('layouts.main')
@section('content')
  <!--container start-->

  <div class="inner-banner">
<div class="container-fluid">

<div class="left-sidebar tabs">
<h5 class="inner-heading mb-4 mt-4">Refine by</h5>
<div class="accordion sidebar-accordion" id="accordionExample">
 

  <div class="card">
    <div class="card-header" id="headingOne">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           Category Page
        </button>
    </div>
    <div id="collapseOne" class="collapse side-collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
<ul>   
   @foreach ($category as $cat)     
    <li>    
        <label class="checkbox">{{ $cat->name}}
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
  @endforeach
   {{--  <li>
        <label class="checkbox">Automated Pricing
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Inventory and Order Management
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Shipping Solutions
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Advertising
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Promotions
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Product Research and Scouting
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Feedback and Reviews
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Buyer/Seller Messaging
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Analytics and Reporting
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
      </li>
    <li>
        <label class="checkbox">Accounting and Tax Remittance
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Ecommerce Solution Connectors
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Full Service Solutions
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label></li> --}}
</ul>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingTwo">
       <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Avg. Customer Review
        </button>
    </div>
    <div id="collapseTwo" class="collapse side-collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">

<ul>        
    <li>    
        <label class="checkbox"><span class="customer-review"><img src="{{asset('images/rate-1.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>    
        <label class="checkbox"><span class="customer-review"><img src="{{asset('images/rate-2.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>    
        <label class="checkbox"><span class="customer-review"><img src="{{asset('images/rate-3.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>    
        <label class="checkbox"><span class="customer-review"><img src="{{asset('images/rate-4.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
  </ul>
     </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingThree">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Pricing type
        </button>
    </div>
    <div id="collapseThree" class="collapse side-collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
       <ul>        
    <li>    
        <label class="checkbox">Free Trial
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Subscription
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">One Time Purchase
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
  </ul>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingFour">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Programs supported
        </button>
    </div>
    <div id="collapseFour" class="collapse side-collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
              <ul>        
    <li>    
        <label class="checkbox">Global Selling 
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Amazon Business (B2B) 
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Brand Owner 
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">Fulfillment by Amazon (FBA) 
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">Buy Shipping API (MSS) 
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">Seller Fulfilled Prime (SFP) 
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">Merchant Fulfilled (MFN) 
          <input type="checkbox" checked=" ">
          <span class="checkmark"></span>
        </label>
    </li>
  </ul>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingFive">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
         Languages supported
        </button>
    </div>
    <div id="collapseFive" class="collapse side-collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
            <ul>        
    <li>    
        <label class="checkbox">Arabic 
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Chinese 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Dutch 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
      <li>
        <label class="checkbox">French 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">German 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">Hindi  
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">English  
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
        <li>
        <label class="checkbox">Italian 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
            <li>
        <label class="checkbox">Japanese 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
            <li>
        <label class="checkbox">Korean 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>

            <li>
        <label class="checkbox">Polish 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
            <li>
        <label class="checkbox">Portuguese
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
            <li>
        <label class="checkbox">Russian 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Slovak 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
      <label class="checkbox">Spanish 
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
      </label>
    </li>
    <li>
      <label class="checkbox">Turkish  
          <input type="checkbox" checked="">
          <span class="checkmark"></span>
      </label>
    </li>

  </ul>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingSix">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
         Marketplaces supported
        </button>
    </div>
    <div id="collapseSix" class="collapse side-collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
      <div class="card-body">
        
      <div class="country">
      <label>North America</label>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="checked">
          <span class="checkmark"><img src="{{asset('images/us.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/canada.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/mexico.jpg')}}" alt=""></span>
      </label>
      </span>
      </div>
    <div class="country">
      <label class="mt-3">South America</label>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/south-africa.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Europe</label>

       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/turkey.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/uk.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/netherland.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/spain.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/italy.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/germany.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/france.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Middle East</label>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/saudiarabia.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/egypt.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/UAE.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Asia</label>

           <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/singapore.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/japan.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/china.jpg')}}" alt=""></span>
      </label>
      </span>
 
    </div>
    <div class="country">
      <label class="mt-3">India</label>
        <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="">
          <span class="checkmark"><img src="{{asset('images/india.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Australia</label>
        <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" checked="checked">
          <span class="checkmark"><img src="{{asset('images/australia.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>

      </div>
    </div>
  </div>



</div>
</div>



<div class="listing">
<h5 class="inner-heading">One Time Purchase</h5>
@if(count($product) == 0)
<p>No Softwares found in selected category</p>
@endif
<div class="row mt-5">
  @foreach ($product as $pro)
<div class="custom-width mb-5">
<a class="common-box blue app-main" href="{{ url('product-detail/'.$pro->slug)}}">
<h5 class="sub-heading">{{ $pro->name}}</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
<img src="{{ ImageUtil::getHref($pro->img_id,'106','61')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
{{ str_limit(strip_tags($pro->description), $limit = 80, $end = '...')}}
</div>
</div>
</a>
</div>
@endforeach

{{-- <div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">Merchize</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
<img src="{{asset('images/merchize-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div>

<div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">myEcommerce</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
<img src="{{asset('images/myecommerce-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div>

<div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">Brickfox</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
<img src="{{asset('images/brickfox-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div>

<div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">Solid Commerce</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
  <img src="{{asset('images/solid-commerce-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div>

<div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">DataCaciques</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
  <img src="{{asset('images/datacaciques-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div>

<div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">AMan Pro</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
  <img src="{{asset('images/amnpro-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div>

<div class="custom-width mb-5">
<a class="common-box blue app-main" href="product-detail.html">
<h5 class="sub-heading">Sellware Merchan Central</h5>
<div class="app-detail-border">
<div class="app-detail">
<span class="app-logo">
 <img src="{{asset('images/sellware-logo.png')}}" alt="">
</span>
<span class="star mb-2 mt-2 d-block">
<img src="{{asset('images/star-rating-2.png')}}" alt="">
</span>
<p>Sellics is the leading All-in-One Marketplace software platform that powers sellers to manage</p>
</div>
</div>
</a>
</div> --}}

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
@endsection
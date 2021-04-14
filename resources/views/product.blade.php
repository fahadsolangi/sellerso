@extends('layouts.main')
@section('content')
  <!--container start-->

<div class="inner-banner">
<div class="container-fluid">


<div class="left-sidebar tabs">
<h5 class="inner-heading mb-4 mt-4">Refine by</h5>
 <form method="POST" action="{{ route('productfilters') }}" id="prodfilere">
              @csrf
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
          <input type="checkbox" value="{{$cat->id}}" name="category[{{$cat->id}}]" class="filters" {{isset($request->category[$cat->id]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
  @endforeach
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
          <input type="checkbox" value="1" name="reviewrate[1]" class="filters" {{isset($request->reviewrate[1]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
    <li>    
        <label class="checkbox"><span class="customer-review"><img src="{{asset('images/rate-2.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" value="2" name="reviewrate[2]" class="filters" {{isset($request->reviewrate[2]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
    <li>    
        <label class="checkbox"><span class="customer-review"><img src="{{asset('images/rate-3.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" value="3" name="reviewrate[3]" class="filters" {{isset($request->reviewrate[3]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
    <li>    
        <label class="checkbox" value="4" name="reviewrate[4]" class="filters" {{isset($request->reviewrate[4]) ? 'checked="checked"' : ''}}><span class="customer-review"><img src="{{asset('images/rate-4.png')}}" alt=""><span class="text">&up</span></span>
          <input type="checkbox" >
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
          <input type="checkbox"  name="pricing_type[1]" class="filters" value="1" {{isset($request->pricing_type[1]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">Subscription
          <input type="checkbox" checked=" " name="pricing_type[2]" class="filters" value="1" {{isset($request->pricing_type[2]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
    <li>
        <label class="checkbox">One Time Purchase
          <input type="checkbox" checked=" " name="pricing_type[3]" class="filters" value="1" {{isset($request->pricing_type[3]) ? 'checked="checked"' : ''}}>
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
    @foreach ($program_support as $sup)     
    <li>    
        <label class="checkbox">{{ $sup->name}}
          <input type="checkbox"  value="{{$sup->id}}" name="program_support[{{$sup->id}}]" class="filters" {{isset($request->program_support[$sup->id]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
  @endforeach        
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
    @foreach ($language_support as $lang)     
    <li>    
        <label class="checkbox">{{ $lang->name}}
          <input type="checkbox" name="language_support[{{$lang->id}}]"  value="{{$lang->id}}" class="filters" {{isset($request->language_support[$lang->id]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"></span>
        </label>
    </li>
  @endforeach  
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
          <input type="checkbox" value="1" name="country[1]"  class="filters" {{isset($request->country[1]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/us.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="2" name="country[2]" class="filters" {{isset($request->country[2]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/canada.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="3" name="country[3]" class="filters" {{isset($request->country[3]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/mexico.jpg')}}" alt=""></span>
      </label>
      </span>
      </div>
    <div class="country">
      <label class="mt-3">South America</label>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="4" name="country[4]" class="filters" {{isset($request->country[4]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/south-africa.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Europe</label>

       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="5" name="country[5]" class="filters" {{isset($request->country[5]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/turkey.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="6" name="country[6]" class="filters" {{isset($request->country[6]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/uk.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="7" name="country[7]" class="filters" {{isset($request->country[7]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/netherland.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="8" name="country[8]" class="filters" {{isset($request->country[8]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/spain.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="9" name="country[9]" class="filters" {{isset($request->country[9]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/italy.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="10" name="country[10]" class="filters" {{isset($request->country[10]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/germany.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="11" name="country[11]" class="filters" {{isset($request->country[11]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/france.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Middle East</label>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="12" name="country[12]" class="filters" {{isset($request->country[12]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/saudiarabia.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="13" name="country[13]" class="filters" {{isset($request->country[13]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/egypt.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="14" name="country[14]" class="filters" {{isset($request->country[14]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/UAE.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Asia</label>

           <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="15" name="country[15]" class="filters" {{isset($request->country[15]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/singapore.jpg')}}" alt=""></span>
      </label>
      </span>
      <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="16" name="country[16]" class="filters" {{isset($request->country[16]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/japan.jpg')}}" alt=""></span>
      </label>
      </span>
       <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="17" name="country[17]" class="filters" {{isset($request->country[17]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/china.jpg')}}" alt=""></span>
      </label>
      </span>
 
    </div>
    <div class="country">
      <label class="mt-3">India</label>
        <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="18" name="country[18]" class="filters" {{isset($request->country[18]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/india.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>
    <div class="country">
      <label class="mt-3">Australia</label>
        <span class="flag">
      <label class="flag-checkbox">
          <input type="checkbox" value="1" name="country[19]" class="filters" {{isset($request->country[19]) ? 'checked="checked"' : ''}}>
          <span class="checkmark"><img src="{{asset('images/australia.jpg')}}" alt=""></span>
      </label>
      </span>
    </div>

      </div>
    </div>
  </div>



</div>
</div>

</form>

<div class="listing">
<h5 class="inner-heading">{{ ucfirst(($slug == "" ? "Listing" : $slug)) }}</h5>
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
{{ str_limit(strip_tags($pro->description), $limit = 80, $end = '...')}}</div>
</div>
</a>
</div>
@endforeach

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
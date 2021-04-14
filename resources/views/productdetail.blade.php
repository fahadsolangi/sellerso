@extends('layouts.main')
@section('content')
<style type="text/css">
.rate-area {
    border-style: none;
}

.rate-area:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rate-area:not(:checked) > label {
    float: right;
    width: .80em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 40px;
    line-height: 32px;
    color: lightgrey;
    margin-bottom: 10px !important;
}

.rate-area:not(:checked) > label:before {
    content: '★';
}

.rate-area > input:checked ~ label {
    color: #e8262d;
    text-shadow: none;
}

.rate-area:not(:checked) > label:hover,
.rate-area:not(:checked) > label:hover ~ label {
    color: #e8262d;
    
}

.rate-area > input:checked + label:hover,
.rate-area > input:checked + label:hover ~ label,
.rate-area > input:checked ~ label:hover,
.rate-area > input:checked ~ label:hover ~ label,
.rate-area > label:hover ~ input:checked ~ label {
    color: #e8262d;
    text-shadow: none;
    
}

.rate-area > label:active {
    position:relative;
    top:0px;
    left:0px; 
}
</style>
<div class="inner-banner">

<div class="container">
<div class="product-head mb-5">
<div class="row">
<div class="col-md-12 col-lg-3">
<div class="logo">
<img src="{{ ImageUtil::getHref($productDetail->img_id,'235','235')}}" alt="">
</div>
</div>  
<div class="col-md-6 col-lg-4 border-left-right">
<div class="product-info">
<h5 class="inner-heading">{{ $productDetail->name}}</h5>
<p class="back">by {{ $productDetail->product_by}}</p>
<span class="customer-review mt-2"><img src="{{asset('images/rate-4.png')}}" alt=""><span class="text">10 customer ratings</span></span>
</div>
</div>  
<div class="col-md-6 col-lg-5">
<div class="product-contact">
<h5 class="inner-heading">Developer info and support</h5>
<span class="product-contact-inner">
<span class="info">
<p class="back"><a href="tel:{{ $productDetail->dev_phone}}">{{ $productDetail->dev_phone}}</a></p>
<p class="back"><a href="mailto:{{ $productDetail->dev_email}}">{{ $productDetail->dev_email}}</a></p>
<p class="back">Visit developer support website</p>
</span>
<span class="price-btn">
@if($productDetail->subscriptionid != '' && $productDetail->connection_type != 3)
@if(isset(Auth::user()->role) && Auth::user()->role == 2)
<button class="btn red-btn details_btn fontsize12 sameheight" data-toggle="modal" data-target="#exampleModalCenter">PRICE</button>
@elseif(isset(Auth::user()->role))
<button class="btn red-btn details_btn fontsize12 sameheight" onclick="generateNotification('error','Seller is not allow to buy software. Please login with buyer account');">PRICE</button>
@else
<button class="btn red-btn details_btn fontsize12 sameheight" data-toggle="modal" data-target="#exampleModalCenter">PRICE</button>
@endif
@endif
@if($productDetail->connection_type == 3)
<a href="{{$productDetail->affiliate_url}}" class="details_btn fontsize12 sameheight" target="_blank">Click for Affiliate Program</a>
@endif
</span>
</span>

</div>
</div>  
</div>
</div>
</div>


<div class="container-fluid">
<div class="left-sidebar tabs">
<a href="{{ route('product')}}" class="backtopreviouspage_link" class="back mb-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>Back to Listing</a>

<div class="sidebar-accordion overflow-hidden advertisement same-size p-0 mb-4 ">
<a href="#" class="best-offer sponsored">
<div class="best-offer-logo">
<img src="{{ ImageUtil::getHref($productDetail->img_id,'235','235')}}" alt="">
</div>
<div class="best-offer-content">
<h3>best selling </h3>
<p class="text-white">get the discount of <span class="best-offer-priceing">5%</span> off</p>
</div>
</a>
</div>

<div class="sidebar-accordion overflow-hidden advertisement same-size p-0">
<a href="#" class="best-offer seller-flix sponsored">
<div class="best-offer-logo">
<img src="{{asset('images/seller-flix-logo.png')}}" alt="">
</div>
<div class="best-offer-content">
<h3>best selling </h3>
<p class="text-white">get the discount of <span class="best-offer-priceing">9%</span> off</p>
</div>
</a>
</div>
<p class="mt-2 mb-4 "><a href="{{ route('contactus') }}" class="ml-2 text-decoration-underline d-inline red-link">Click here to advertise your software</a></p>

<div class="sidebar-accordion p-4 mb-4">
<h5 class="sub-heading mb-3">Languages supported</h5>
<ul class="red-point blue-point">
<li>German</li>
<li>English</li>
</ul>
</div>

<div class="sidebar-accordion p-4">
<h5 class="sub-heading mb-3">Marketplaces supported</h5>

<span class="selected-flag">
  <span class="flag">
  <img src="{{asset('images/us.jpg')}}" alt="">US
  </span>  
  <span class="flag">
  <img src="{{asset('images/canada.jpg')}}" alt="">Canada
  </span>
  <span class="flag"> 
  <img src="{{asset('images/mexico.jpg')}}" alt="">Mexico
  </span>
  <span class="flag">
  <img src="{{asset('images/france.jpg')}}" alt="">France
  </span>
  <span class="flag">
  <img src="{{asset('images/germany.jpg')}}" alt="">Germany
  </span>
  <span class="flag">
  <img src="{{asset('images/italy.jpg')}}" alt="">Italy
  </span>
  <span class="flag">
  <img src="{{asset('images/spain.jpg')}}" alt="">Spain
  </span>
  <span class="flag">
  <img src="{{asset('images/netherland.jpg')}}" alt="">Netherland
  </span>
  <span class="flag">
  <img src="{{asset('images/uk.jpg')}}" alt=""> UK
  </span>
  <span class="flag">
  <img src="{{asset('images/india.jpg')}}" alt="">India
  </span>
</span>
    
</div>

</div>



<div class="listing product-detail-content">


<div class="row">
<div class="col-md-12 col-lg-6 mb-4 mt-4 mt-md-0">
<h5 class="sub-heading mb-3">Preview</h5>
<div id="preview" class="owl-carousel">
    @foreach ($all_images as $key=>$val)
    <div class="item">
      <img class="img-responsive" src="{{ !empty($val->id) ? ImageUtil::getHref($val->id,'205','128') : '' }}" alt="">
    </div>   
    @endforeach
    

   </div>
</div>
<div class="col-md-12 col-lg-6 mt-4 pt-3 mb-4">
<div class="video">
 <iframe width="100%" height="266" src="{{ $productDetail->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</div>
</div>


<div class="row">
<div class="col-md-6 mb-4">
<h5 class="sub-heading mb-3">Functionality</h5>
<ul class="red-point">
{!! $productDetail->functionality !!}
</ul>
</div>

<div class="col-md-6 mb-4">
<h5 class="sub-heading mb-3">Features</h5>
<ul class="red-point blue-point">
{!! $productDetail->features !!}
</ul>
</div>

</div>


<div class="mb-4">
<h5 class="sub-heading mb-3">Description</h5>
{!! $productDetail->description !!}
</div>

<div class="mb-4">
<h5 class="sub-heading mb-3">Who should use this?</h5>
{!! $productDetail->whoshould !!}
</div>


<div class="mb-4">
<h5 class="sub-heading mb-3">Reviews</h5>

<div class="row">

@foreach ($rating as $val)
<div class="col-xl-4 col-lg-6 mb-4">
<div class="reviews-card">
<div class="profile-detail">
<span class="img">
  <img src="{{asset('images/profile-1.png')}}" alt="">
</span>
<span class="name-rate">
<span class="name mb-1">{{$val->rating_name}}</span>
<span class="rating"><img src="{{asset('images/rate-4.png')}}" alt=""></span>
</span>
</div> 
<span class="date-time"><img src="{{asset('images/date-icon.png')}}" alt="">{{$val->created_at}}</span>
<span class="date-time"><img src="{{asset('images/time-icon.png')}}" alt="">{{$val->created_at}}</span>
{{$val->rating_content}}
</div>
</div>
@endforeach

{{-- 
<div class="col-xl-4 col-lg-6 mb-4">
<div class="reviews-card">
<div class="profile-detail">
<span class="img">
 <img src="{{asset('images/profile-2.png')}}" alt="">
</span>
<span class="name-rate">
<span class="name mb-1">Jack</span>
<span class="rating"><img src="{{asset('images/rate-3.png')}}" alt=""></span>
</span>
</div> 
<span class="date-time"><img src="{{asset('images/date-icon.png')}}" alt="">2020-06-13</span>
<span class="date-time"><img src="{{asset('images/time-icon.png')}}" alt="">07:23:14</span>
<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
</div>
</div>

<div class="col-xl-4 col-lg-6 mb-4">
<div class="reviews-card">
<div class="profile-detail">
<span class="img">
 <img src="{{asset('images/profile-1.png')}}" alt="">
</span>
<span class="name-rate">
<span class="name mb-1">Fahad Solangi</span>
<span class="rating"><img src="{{asset('images/rate-4.png')}}" alt=""></span>
</span>
</div> 
<span class="date-time"><img src="{{asset('images/date-icon.png')}}" alt="">2020-06-13</span>
<span class="date-time"><img src="{{asset('images/time-icon.png')}}" alt="">07:23:14</span>
<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
</div>
</div>
<div class="col-xl-4 col-lg-6 mb-4">
<div class="reviews-card">
<div class="profile-detail">
<span class="img">
  <img src="{{asset('images/profile-1.png')}}" alt="">
</span>
<span class="name-rate">
<span class="name mb-1">Fahad Solangi</span>
<span class="rating"><img src="{{asset('images/rate-4.png')}}" alt=""></span>
</span>
</div> 
<span class="date-time"><img src="{{asset('images/date-icon.png')}}" alt="">2020-06-13</span>
<span class="date-time"><img src="{{asset('images/time-icon.png')}}" alt="">07:23:14</span>
<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
</div>
</div>

<div class="col-xl-4 col-lg-6 mb-4">
<div class="reviews-card">
<div class="profile-detail">
<span class="img">
 <img src="{{asset('images/profile-2.png')}}" alt="">
</span>
<span class="name-rate">
<span class="name mb-1">Jack</span>
<span class="rating"><img src="{{asset('images/rate-3.png')}}" alt=""></span>
</span>
</div> 
<span class="date-time"><img src="{{asset('images/date-icon.png')}}" alt="">2020-06-13</span>
<span class="date-time"><img src="{{asset('images/time-icon.png')}}" alt="">07:23:14</span>
<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
</div>
</div>

<div class="col-xl-4 col-lg-6 mb-4">
<div class="reviews-card">
<div class="profile-detail">
<span class="img">
 <img src="{{asset('images/profile-1.png')}}" alt="">
</span>
<span class="name-rate">
<span class="name mb-1">Fahad Solangi</span>
<span class="rating"><img src="{{asset('images/rate-4.png')}}" alt=""></span>
</span>
</div> 
<span class="date-time"><img src="{{asset('images/date-icon.png')}}" alt="">2020-06-13</span>
<span class="date-time"><img src="{{asset('images/time-icon.png')}}" alt="">07:23:14</span>
<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
</div>
</div> --}}



</div>
</div>


@if(Auth::check() && Auth::user()->id != $productDetail->user_id)
<div class="comment-box">
<h5 class="sub-heading mb-3">Leave a comment</h5>
<form class="CrudForm" id="rating_form" data-noinfo="true" data-customcallback="rating_success" data-customcallbackFail="rating_error" method="POST" action="{{route('ratingSubmit')}}">
@csrf
<input type="hidden" name="product_id" value="{{$productDetail->id}}">
<div class="mb-4">
<label>Add Review</label>
{{-- <img src="{{asset('images/add-revieew.png')}}" alt=""> --}}
<div class="rating-box">                  
  <ul class="rate-area">
                <input type="radio" id="5-star" name="rating_star" value="5">
<label for="5-star" title="Amazing"></label>
                <input type="radio" id="4-star" name="rating_star" value="4">
<label for="4-star" title="Good"></label>
                <input type="radio" id="3-star" name="rating_star" value="3">
<label for="3-star" title="Average"></label>
                <input type="radio" id="2-star" name="rating_star" value="2">
<label for="2-star" title="Not Good"></label>
                <input type="radio" id="1-star" required=""
 name="rating_star" value="1" aria-required="true">
<label for="1-star" title="Bad"></label>
              </ul>
</div>

</div>
<div class="row">
<div class="col-lg-6 col-md-12 mb-4">
    {{Helper::errorField('rating_name',$errors)}}
<input class="border-input" type="name" placeholder="Name" name="rating_name" value="{{$users->name}}" readonly>
</div>
<div class="col-lg-6 col-md-12 mb-4">
    {{Helper::errorField('rating_email',$errors)}}
<input class="border-input" type="email" name="rating_email" value="{{$users->email}}" readonly placeholder="Email">
</div>
<div class="col-lg-6 col-md-12 mb-12">
   <textarea class="border-input mb-4" placeholder="Message" name="rating_content">{{old('rating_content')}}</textarea>
</div>
</div>



<div class="mb-4">
 @if(env('GOOGLE_RECAPTCHA_KEY'))
     <div class="g-recaptcha"
          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
@endif
</div>
<button class="btn text-uppercase" type="submit">Post comment</button>
</form>
</div>

</div>
@endif
<div class="clearfix"></div>

</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Packages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
            @if(count($pricePackage) > 0)
            @foreach ($pricePackage as $key=>$value)
            @if($key%4 == 0)
                <div class="clearfix"></div>
            @endif
                <div class="col-md-3" style="padding-top: 12px;margin-bottom:50px">
                    <div class="columns">
                      <ul class="price">
                        <li class="header" style="background:#00d0c4;">{{ $value->name}}</li>
                        <li class="grey">{{Session::get('currencycode')}} {{ Helper::setCurrency(Session::get('currencycode'),$value->price)}} for {{($value->otp == 1 ? 'Life time' : $value->months.' months')}} Access<br> {{($value->free_trail == 1 ? '('.$value->free_days." Days trail)" : "")}}</li>
                        {!! $value->detail !!}
                        <li class="grey">
                        <a href="javascript:void(0);" class="button" onclick="AddCart(this)" data-proid="{{$productDetail->id}}" data-packageid="{{$value->id}}" data-packagetype="{{$value->package_type}}" style="background:#00d0c4;">Add to Cart</a>
                        </li>
                      </ul>
                    </div>
                </div>
            @endforeach
            @else
                <tr><td colspan="6"><h1 class="text-center">No Package Available</h1></td></tr>  
            @endif    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<style type="text/css">
.videoWrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.modal-dialog {
    width: 1200px;
    margin: 30px auto;
}
* {
  box-sizing: border-box;
}


/* Style the list */
.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

/* Add shadows on hover */
.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

/* Pricing header */
.price .header {
  background-color: #3a94ba;
  color: white;
  font-size: 25px;
}

/* List items */
.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

/* Grey list item */
.price .grey {
  background-color: #eee;
  font-size: 14px;
}

/* The "Sign Up" button */
.button {
  background-color: #3a94ba;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

/* Change the width of the three columns to 100%
(to stack horizontally on small screens) */
@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
.columns p{
    padding: 20px;
    text-align: center;
}
.rating input {
    display: contents;
}
label {
    display: contents !important;
}
</style>
<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 100%; /* New width for default modal */
        }
    }
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
function AddCart(obj){
  $('#exampleModalCenter').modal('toggle');
  var qty = 1
  var proid = $(obj).data('proid');
  var packageid = $(obj).data('packageid');
  var packagetype = $(obj).data('packagetype');
  ajaxifyN({id:packageid,qty:qty,proid:proid,packtype:packagetype,},'POST',base_url('cart-add'),AddCartAfter,'cart').then(function(q){
   if(q.msg=='success'){
    generateNotification('success','Package has been added in cart');  
    // ReloadPage();

    setTimeout(function(){
       location.reload();
   },1000);
    } else {
      generateNotification('error',q.msgTxt);
    } 
});
}
$(document).on('ready', function() {
            $(".prdct_img_slider").slick({
                dots: true,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1
            });

            $(".freetrialsslider").slick({
                dots: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });

        });
$(document).ready(function(){
            //FANCYBOX
            //https://github.com/fancyapps/fancyBox
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
</script>
@endsection
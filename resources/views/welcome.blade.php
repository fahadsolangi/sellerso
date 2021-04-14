@extends('layouts.main')
@section('content')


<div class="banner">
<div class="container-fluid p-0">
<div class="row">

<div class="col-xl-5 col-lg-6 col-md-12 px-xl-3 d-flex align-items-center blue-left">
<div class="float-left w-100 h-auto z-index">
<h1>Discount Marketplace for Seller Softwares</h1>
<div class="search-input">
  <?php
    $searchby = isset($_GET['category']);
    //dd($searchby);
  ?>
<form id="target" action="{{url('product-listing')}}">
<div class="dropdown">
<input class="dropdown-toggle" placeholder="Search your software" type="search" name="search" data-toggle="dropdown">
<button class="search-button"><img src="{{asset('images/search-icon.png')}}" alt=""></button>
         <ul class="dropdown-menu">
          <span>
             <?php
                $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc limit 20');
              ?>
            @foreach ($category as $cat)
              <li><a href="{{('product-listing/').$cat->slug}}" value="{{$cat->slug}}" {{$searchby==$cat->slug?'selected':''}}>{{$cat->name}}</a></li>
            @endforeach
            </span>
         </ul>
       </div> 
</form>
</div>
<div class="offers float-left w-100">
<div class="offer-card float-left ">
<p class="pricing">5% <span>Off</span></p>
<p>1 Subscriptions</p>
</div>
<div class="offer-card float-left ">
<p class="pricing">10% <span>Off</span></p>
<p>2 Subscriptions</p>
</div>
<div class="offer-card float-left ">
<p class="pricing">15% <span>Off</span></p>
<p>3 Subscriptions</p>
</div>
</div>
</div>

</div>

<div class="col-xl-7 col-lg-6 col-md-12 px-xl-4 video-right">

<div class="video-frame">
<div class="head-video">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#video1" data-slide-to="0" class="active"></li>
    <li data-target="#video2" data-slide-to="1"></li>
    <li data-target="#video3" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div id="video1" class="carousel-item active">
      <img src="{{asset('images/video.jpg')}}" alt="">
    </div>
    <div id="video2" class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
          <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
        </video>
    </div>
    <div id="video3" class="carousel-item">
      <img src="{{asset('images/video.jpg')}}" alt="">
    </div>
  </div>
</div>



</div>
</div>

</div>

</div>
</div>
</div>
</div>


<div class="permotions">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-7 p-0">

   <div id="recommend" class="owl-carousel">
    @foreach($recommendProduct as $recmdPd)
         <div class="item">
            <a href="{{ url('product-detail/'.$recmdPd->slug)}}">
              <div class="we-recommend">
              <div class="recommend-detail">
              <h2>We recommend</h2>
              <img src="{{asset('images/star-rating.png')}}" alt="">
              <p class="sub-heading-permo mt-2">{{ $recmdPd->name}}</p>
              {!! substr($recmdPd->description,0,95) !!}
              </div>
              <div class="recommend-logo mt-3">
              <img src="{{ ImageUtil::getHref($recmdPd->img_id,'176','68')}}" alt="">
              </div>
              </div>  
            </a>
         </div>  
    @endforeach             
   </div>

</div>
<div class="col-md-12 col-lg-5 p-0">
<div class="best-offer">
<div class="best-offer-logo">
<img src="{{asset('images/merchize-w-logo.png')}}" alt="">
</div>
<div class="best-offer-content">
<h3>best selling </h3>
<p>get the discount of <span class="best-offer-priceing">5%</span> off</p>
</div>
</div>
</div>
</div>
</div>
</div>

<!---permotions-end-->



<div class="how-it-work mb-100">
<div class="container">
<h4 class="text-center mb-4">How It Works</h4>
<div class="row">
<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
<div class="common-box text-center">
<div class="icon">
<img class="active" src="{{asset('images/search-active.png')}}" alt="">
<img class="unactive" src="{{asset('images/search-unactive.png')}}" alt="">
</div>
<div class="work-detail">
<h5 class="sub-heading">Browse or Search the Apps</h5>
</div>
</div>  
</div>
<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
<div class="common-box text-center">
<div class="icon">
<img class="active" src="{{asset('images/cart-active.png')}}" alt="">
<img class="unactive" src="{{asset('images/cart-unactive.png')}}" alt="">
</div>
<div class="work-detail">
<h5 class="sub-heading">Add one or more Apps to your Cart</h5>
<p>(More apps = more discounts)</p>
</div>
</div>  
</div>
<div class="col-md-6 col-lg-3 mb-5 mb-md-0 mb-lg-0">
<div class="common-box text-center">
<div class="icon">
<img class="active" src="{{asset('images/like-active.png')}}" alt="">
<img class="unactive" src="{{asset('images/like-unactive.png')}}" alt="">
</div>
<div class="work-detail">
<h5 class="sub-heading">Subscribe and Connect</h5>
<p>(Simple as that)</p>
</div>
</div>  
</div>
<div class="col-md-6 col-lg-3">
<div class="common-box text-center">
<div class="icon">
<img class="active" src="{{asset('images/manage-active.png')}}" alt="">
<img class="unactive" src="{{asset('images/manage-unactive.png')}}" alt="">
</div>
<div class="work-detail">
<h5 class="sub-heading">Manage all under one Portal</h5>
<p>(Only applies to subscriptions through our site)</p>
</div>
</div>  
</div>
</div>
</div>
</div>

<!---how-it-work-end-->



<div class="popular-apps ">
<div class="container">
<h4 class="text-center mb-4">Popular Apps</h4>

     <div id="apps" class="owl-carousel">

        @foreach($popuplarProduct as $key=>$value)
          <div class="item">
              <a class="common-box blue app-main" href="{{ url('product-detail/'.$value->slug)}}">
              <h5 class="sub-heading">{{ $value->name}}</h5>
              <div class="app-detail-border">
              <div class="app-detail">
              <span class="app-logo">
              <img src="{{ ImageUtil::getHref($value->img_id,'248','96')}}" alt="">
              </span>
              <span class="star mb-2 mt-2 d-block">
              <img src="{{asset('images/star-rating-2.png')}}" alt="">
              </span>
              {!! substr($value->description,0,95) !!}
              </div>
              </div>
              </a>
          </div>
        @endforeach     


   </div>

</div>
</div>


<!---popular-apps-end-->



<div class="explore-categories mb-100">
<div class="container">
<h4 class="text-center mb-4">Explore by Categories</h4>

    <ul class="nav nav-tabs">
        <div id="Categories" class="owl_1 owl-carousel owl-theme">
            @foreach($category as $key => $cat)
              <div class="item">
                    <li class="{{$key == 0 ? 'active' : ''}}"><a data-toggle="tab" href="#menu{{$cat->id}}"><img src="{{ ImageUtil::getHref($cat->img_id,'36','49')}}" alt="">{{$cat->name}}</a></li>
              </div>
            @endforeach
        </div>
    </ul>
    <div class="tab-content">
    @foreach($category as $key => $cat)
    <div id="menu{{$cat->id}}" class="tab-pane fade in {{$key == 0 ? 'active' : ''}}">
      <div class="row">
        @if(isset($ProductCategory[$cat->id]))
          <?php 
          foreach($ProductCategory[$cat->id] as $pkey => $product)
          { 
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-5">
              <a class="common-box red app-main" href="{{ url('product-detail/'.$product->slug)}}">
              <h5 class="sub-heading">{{ $product->name}}</h5>
              <div class="app-detail-border">
              <div class="app-detail">
              <span class="app-logo">
                <img src="{{ ImageUtil::getHref($product->img_id,'248','96')}}" alt="">
              </span>
              <span class="star mb-2 mt-2 d-block">
              <img src="{{asset('images/star-rating-2.png')}}" alt="">
              </span>
                {!! substr($product->description,0,95) !!}
              </div>
              </div>
              </a>
            </div>
          <?php } ?>
        @else
              <h5 class="sub-heading">No Software available in this category</h5>
         @endif    
      </div>
    </div> 
    @endforeach   
    </div>
<!-- partial -->

</div>
</div>

<!---Explore-Categories-end-->


<div class="free-trials">
<div class="container">
<h4 class="text-center mb-4">free-trials</h4>

     <div id="apps2" class="owl-carousel">
      @foreach($trailProduct as $key=>$value)
          <div class="item">
              <a class="common-box blue app-main" href="{{ url('product-detail/'.$value->slug)}}">
              <h5 class="sub-heading">{{ $value->name}}</h5>
              <div class="app-detail-border">
              <div class="app-detail">
              <span class="app-logo">
              <img src="{{ ImageUtil::getHref($value->img_id,'248','96')}}" alt="">
              </span>
              <span class="star mb-2 mt-2 d-block">
              <img src="{{asset('images/star-rating-2.png')}}" alt="">
              </span>
              {!! substr($value->description,0,95) !!}
              </div>
              </div>
              </a>
          </div>
      @endforeach

   </div>

</div>
</div>


<!---free-trials-end-->


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
@if(!empty(session('userDetail')))
{{-- dd(session('userDetail')) --}}
var data = {{ session('userDetail') }};
var content ='';
// console.log(data) 
/*ajaxifyN({id:data,},'POST',base_url('customer/order-details')).then(function(q){
  if(q.status==1){
    // console.log(q);
    // console.log(q.data[0]);
     $(".modal-body").html(`<input type="hidden" class="form-control" name="orderid" id="orderid" value="${data}">`)
    q.data.forEach(function(item){
        //console.error(item);
        content += `<div class="form-group">
            <label for="recipient-name" class="col-form-label">${item.toUpperCase()}:</label>
            <input type="text" class="form-control" name="${item}" id="${item}" value="${item}" readonly>
          </div>`
    })
    $(".modal-body").append(content);
    $('#exampleModal').modal({
        backdrop: 'static',
        keyboard: false
    })
    $('#exampleModal').modal('show');
    //generateNotification('success','Data found');  
    // ReloadPage();
   //  setTimeout(function(){
   //     location.reload();
   // },1000);
    } else {
      //generateNotification('error',q.msgTxt);
      generateNotification('success','Order successfully created..!');
    } 
});*/

@endif 
// $('#exampleModal').modal('hide');
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
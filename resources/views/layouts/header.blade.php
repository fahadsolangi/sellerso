<?php
$CurrencyCCD = (Session::get('currencycode') != "" ? Session::get('currencycode') : Session::put('currencycode','USD') );
?>
<style type="text/css">
  .cart__count{
        position: absolute;
    font-size: 14px;
    margin-left: -14px;
    margin-top: -12px;
    color: #423d40
  }
</style>
<div class="banner-main">
<nav class="navbar navbar-expand-lg navbar-light ">

  <a class="navbar-brand" href="{{ route('home') }}">
    <img data-width="188" data-height="44" alt="logo" class="img-responsive" data-url="https://sellersoftwares.com/public/Uploads/resized/1/1-188x44.png" src="https://sellersoftwares.com/public/Uploads/resized/1/1-188x44.png">
  </a>
  <button class="navbar-toggler navbar-togglerr" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
       <div class="dropdown catdrop">
         <a href="" class="nav-link dropdown-toggle dropdowncategory" data-toggle="dropdown">Categories
         <span class="caret"><img src="{{asset('images/arow.png')}}" alt=""></span></a>
         <ul class="dropdown-menu categorymenu">
          <?php
            $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc limit 20');
          ?>
          @foreach ($category as $cat)
            <li><a href="{{ url('product-listing/'.$cat->slug) }}">{{ $cat->name}}</a></li>
          @endforeach
            {{-- <li><a href="javascript:void(0)">Automated Pricing</a></li>
            <li><a href="javascript:void(0)">Inventory and Order Management</a></li>
            <li><a href="javascript:void(0)">Shipping Solutions</a></li>
            <li><a href="javascript:void(0)">Advertising</a></li>
            <li><a href="javascript:void(0)">Promotions</a></li>
            <li><a href="javascript:void(0)">Product Research and Scouting</a></li>
            <li><a href="javascript:void(0)">Feedback and Reviews</a></li>
            <li><a href="javascript:void(0)">Buyer/Seller Messaging</a></li>
            <li><a href="javascript:void(0)">Analytics and Reporting</a></li>
            <li><a href="javascript:void(0)">Accounting and Tax Remittance</a></li>
            <li><a href="javascript:void(0)">Ecommerce Solution Connectors</a></li>
            <li><a href="javascript:void(0)">Full Service Solutions</a></li> --}}
         </ul>
       </div> 
      </li>
      <li class="nav-item">
       <div class="dropdown pricdrop">
         <a href="" class="nav-link dropdown-toggle dropdownpricing" data-toggle="dropdown">Pricing
         <span class="caret"><img src="{{asset('images/arow.png')}}" alt=""></span></a>
           <ul class="dropdown-menu pricemenu">
             <li><a href="{{ route('freetrail') }}">Free Trial</a></li>
             <li><a href="{{ route('subscription') }}">Subscription</a></li>
             <li><a href="{{ route('otp') }}">One Time Purchase</a></li>
           </ul>
       </div> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('blog') }}">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listapp') }}">List your App</a>
      </li>
      
    </ul>
 <span class="navbar-text">
      <?php 
      $user = Auth::user();
        //dd($user);
        //Auth::user()->role = 0;
       // $user = Auth::user()->role;
        
      ?>
      
      <?php if($user != null && $user->role == 1) {?>
      <a class="login-btn border-rgt" href="{{route('supplier.panel')}}">My Account</a>
      <a class="login-btn border-rgt" href="{{route('supplier.logout')}}">Log Out</a>
      <?php }elseif($user != null && $user->role == 2) {?>

      <a class="login-btn border-rgt" href="{{route('customer.panel')}}">My Account</a>
      <a class="login-btn border-rgt" href="{{route('customer.logout')}}">Log Out</a>
     
       <?php }elseif(Auth::user() == null) {?>
      <a class="login-btn border-rgt" href="{{ route('supplier_login') }}">Seller Login</a>
      <a class="login-btn border-rgt" href="{{ route('login') }}">Customer Login</a>
      
      <?php }?>
      <a href="{{route('cart')}}" class="cart login-btn">
                                <img src="{{asset('images/cart_icon.png')}}" width="38" height="26" class="cart__icon" alt="">
                                <span class="cart__count">{{Session::has('cart') ? count(Session::get('cart')) : ''}}</span>
                            </a>
    </span>
  </div>
</nav>

<!---banner-end-->
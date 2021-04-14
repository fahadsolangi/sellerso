<style type="text/css">
  .cart__count{
        position: absolute;
    font-size: 14px;
    margin-left: -14px;
    margin-top: -12px;
    color: #423d40
  }

  .inner-search {
    width: calc(100% - 304px);
    float: left;
    position: relative;
}
</style>
{{--  <div id="st-preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
 <header id="header">
        <div class="top_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-3">
                        <a class="logo" href="{{ route('home') }}">
                            <!-- <img src="images/logo.png" class="img-responsive" alt=""> -->
                            Marketplace Appstore
                        </a>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-6">
                        <div class="discount_banner_div">
                            Discount Marketplace for Seller Softwares
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3">
                        <div class="top_currency_div">
                            <span>Currency</span> 
                            <select id="currencyList">
                                <option value="USD" selected="selected" label="US dollar">USD</option>
                                <option value="EUR" label="Euro">EUR</option>
                                <option value="JPY" label="Japanese yen">JPY</option>
                                <option value="GBP" label="Pound sterling">GBP</option>
                                <option disabled>──────────</option>
                                <option value="AED" label="United Arab Emirates dirham">AED</option>
                                <option value="BRL" label="Brazilian real">BRL</option>
                                <option value="BSD" label="Bahamian dollar">BSD</option>
                                <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                                <option value="BWP" label="Botswana pula">BWP</option>
                                <option value="BYN" label="Belarusian ruble">BYN</option>
                                <option value="BZD" label="Belize dollar">BZD</option>
                                <option value="CAD" label="Canadian dollar">CAD</option>
                                <option value="CDF" label="Congolese franc">CDF</option>
                                <option value="CHF" label="Swiss franc">CHF</option>
                                <option value="EUR" label="EURO">EUR</option>
                            </select>
                        </div>
                        <div class="alignright_div">
                            <a href="#">Login</a> | 
                            <a href="#">Register</a> | 
                            <a href="#" class="cart">
                                <img src="images/cart_icon.png" width="38" height="26" class="cart__icon" alt="">
                                <span class="cart__count">5</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('extends.nav')
    </header> --}}
<?php
$CurrencyCCD = (Session::get('currencycode') != "" ? Session::get('currencycode') : Session::put('currencycode','USD') );
?>

<div class="banner-main">
<nav class="navbar navbar-expand-lg navbar-light ">

  <a class="navbar-brand" href="{{ route('home') }}">
    <?php 
          print Helper::dynamicImages(asset('/'),'images/logo.png',array("data-width"=>"188","data-height"=>"44","alt"=>"logo","class"=>"img-responsive"),'logo',true); 
    ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="inner-search-main">
    <div class="inner-search">
    <form action="{{ route('product')}}" method="GET">
      <input type="text" name="search" placeholder="Search your software">
      <button class="search-btn" type="submit"><img src="{{asset('images/search-icon-reed.png')}}" alt=""> </button>
    </form>
    </div>

    <span class="navbar-text">
      <?php 
      $user = Auth::user();
        //dd($user);
        //Auth::user()->role = 0;
       // $user = Auth::user()->role;
        
      ?>
      
      <?php if($user != null && $user->role == 1) {?>
      <a class="login-btn border-rgt" href="{{route('supplier.panel')}}">My Account</a>
      <a class="login-btn" href="{{route('supplier.logout')}}">Log Out</a>
      <?php }elseif($user != null && $user->role == 2) {?>

      <a class="login-btn border-rgt" href="{{route('customer.panel')}}">My Account</a>
      <a class="login-btn" href="{{route('customer.logout')}}">Log Out</a>
     
       <?php }elseif(Auth::user() == null) {?>
      <a class="login-btn border-rgt" href="{{ route('supplier_login') }}">Seller Login</a>
      <a class="login-btn" href="{{ route('login') }}">Customer Login</a>
      
      <?php }?>
      <a href="{{route('cart')}}" class="cart cart-head d-none d-sm-block">
                                <img src="{{asset('images/cart_icon.png')}}"  class="cart__icon" alt="">
                                <span class="cart__count">{{Session::has('cart') ? count(Session::get('cart')) : ''}}</span>
                            </a>
    </span>
</div>
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
  </div>
</nav>
</div>
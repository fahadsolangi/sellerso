<?php
$category_foot = Helper::fireQuery('Select * from category where is_active=1 order by id limit 8'); 
?>
<footer>
<div class="container"> 
<div class="row">
<div class="col-md-12 col-lg-6 our-services">
<h5 class="sub-heading mb-4">Our Services</h5>
<ul>
    @foreach($category_foot as $key => $cat)
    <li><a href="{{url('product-listing').'/'.$cat->slug}}">{{$cat->name}} </a></li>
   @endforeach
</ul>
</div>
<div class="col-md-6 mt-4 mt-lg-0 col-sm-6 col-lg-3">
<h5 class="sub-heading mb-4">Pricing</h5>
<ul>
    <li><a href="{{ route('freetrail') }}">Free Trail</a></li>
    <li><a href="{{ route('subscription') }}">Subscription</a></li>
    <li><a href="{{ route('otp') }}">One Time Purchase </a></li>
</ul>
</div>
<div class="col-md-6 mt-4 mt-lg-0 col-sm-6 col-lg-3">
<h5 class="sub-heading mb-4">Let Us Help You</h5>
<ul>
    <li><a href="{{ route('howtoorder') }}">How to Order?</a></li>
    <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
    <li><a href="{{ route('contactus') }}">Contact Us</a></li>
</ul>
</div>
</div>
<div class="copyright">
Copyright © <?=date('Y')?> Marketplace App Store - All rights reserved.
</div>
</div>
</footer>




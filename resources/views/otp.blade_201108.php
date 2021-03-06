@extends('layouts.main')
@section('content')
  <!--container start-->

    <section id="listing_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="product_results_div">
                        <p>1-48 of 132 results for <b>US</b> : <b>English</b> <span>: Automated Pricing</span></p>
                    </div> -->
                </div>
                <div class="clearfix"></div>
               <!--  <div class="col-sm-2">
                    <div class="left_sidebar_wrpr">
                        <div class="listing_title">
                            <h3>Refine By</h3>
                        </div>
                        <div class="cat_list_div">
                            <div class="categorylist_title"><i class="fa fa-angle-left"></i> Category Page</div>
                            <ul class="cat_ul">
                                @foreach ($category as $cat)
                                      <li><a href="{{ url('product-listing/'.$cat->slug) }}">{{ $cat->name}}</a></li>
                                @endforeach
                              </ul>
                        </div>
                        <div class="rating_star_div">
                            <h4 class="leftsidebar_title">Avg. Customer Review</h4>
                            <div class="categorylist_linke"><a href="#"><i class="fa fa-angle-left"></i> Clear</a></div>
                            <span class="rating_stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>& Up</span>
                            </span>
                            <span class="rating_stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <span>& Up</span>
                            </span>
                            <span class="rating_stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <span>& Up</span>
                            </span>
                            <span class="rating_stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <span>& Up</span>
                            </span>
                        </div>
                        <div class="checkbox_filter_div">
                            <h4 class="leftsidebar_title">Pricing type</h4>
                            <div class="filterchecbox_wrpr">
                                <div class="checkbox">
                                    <input id="checkbox1" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkbox1">
                                        Free Trial
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox2" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkbox2">
                                        Subscription
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox3" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkbox3">
                                        One Time Purchase
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox_filter_div">
                            <h4 class="leftsidebar_title">Programs supported</h4>
                            <div class="filterchecbox_wrpr">
                                <div class="checkbox">
                                    <input id="checkboxpro1" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro1">
                                        Global Selling
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxpro2" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro2">
                                        Amazon Business (B2B)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxpro3" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro3">
                                        Brand Owner
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxpro4" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro4">
                                        Fulfillment by Amazon (FBA)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxpro5" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro5">
                                        Buy Shipping API (MSS)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxpro6" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro6">
                                        Seller Fulfilled Prime (SFP)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxpro7" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxpro7">
                                        Merchant Fulfilled (MFN)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox_filter_div">
                            <h4 class="leftsidebar_title">Languages supported</h4>
                            <div class="filterchecbox_wrpr">
                                <div class="checkbox">
                                    <input id="checkbox4" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox4">
                                        Arabic
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox5" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox5">
                                        Chinese
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox6" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox6">
                                        Dutch
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox7" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox7">
                                        French
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox8" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox8">
                                        German
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox9" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox9">
                                        Hindi
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox10" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox10">
                                        English
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox11" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox11">
                                        Italian
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox12" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox12">
                                        Japanese
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox13" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox13">
                                        Korean
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox14" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox14">
                                        Polish
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox15" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox15">
                                        Portuguese
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox16" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox16">
                                        Russian
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox17" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox17">
                                        Slovak
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox18" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox18">
                                        Spanish
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkbox19" class="styled" value="option1" name="radioInline1" type="checkbox">
                                    <label for="checkbox19">
                                        Turkish
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox_filter_div">
                            <h4 class="leftsidebar_title">Marketplaces supported</h4>
                            <div class="filterchecbox_wrpr flaglist_wrpr">
                                <h6>North America</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag1" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag1">
                                        <img src="{{asset('images/US_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag2" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag2">
                                        <img src="{{asset('images/canada_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag3" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag3">
                                        <img src="{{asset('images/mexico_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <h6>South America</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag4" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag4">
                                        <img src="{{asset('images/brazil_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <h6>Europe</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag5" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag5">
                                        <img src="{{asset('images/france_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag6" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag6">
                                        <img src="{{asset('images/germany_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag7" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag7">
                                        <img src="{{asset('images/italy_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag9" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag9">
                                        <img src="{{asset('images/spain_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                        <input id="checkboxflag9" class="styled" value="option1" name="radioInline" type="checkbox">
                                        <label for="checkboxflag9">
                                            <img src="{{asset('images/netherland_flag.jpg')}}" class="select_flag_icon" alt="">
                                        </label>
                                    </div>
                                <div class="checkbox">
                                        <input id="checkboxflag9" class="styled" value="option1" name="radioInline" type="checkbox">
                                        <label for="checkboxflag9">
                                            <img src="{{asset('images/UK_flag.jpg')}}" class="select_flag_icon" alt="">
                                        </label>
                                    </div>
                                <div class="checkbox">
                                    <input id="checkboxflag10" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag10">
                                        <img src="{{asset('images/turkey_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <h6>Middle East</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag11" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag11">
                                        <img src="{{asset('images/UAE_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag12" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag12">
                                        <img src="{{asset('images/egypt_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag13" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag13">
                                        <img src="{{asset('images/saudiarabia_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <h6>Asia</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag14" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag14">
                                        <img src="{{asset('images/china_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag15" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag15">
                                        <img src="{{asset('images/japan_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="checkboxflag16" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag16">
                                        <img src="{{asset('images/singapore_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <h6>India</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag17" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag17">
                                        <img src="{{asset('images/india_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                                <h6>Australia</h6>
                                <div class="checkbox">
                                    <input id="checkboxflag18" class="styled" value="option1" name="radioInline" type="checkbox">
                                    <label for="checkboxflag18">
                                        <img src="{{asset('images/australia_flag.jpg')}}" class="select_flag_icon" alt="">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-10">
                    <div class="prodct_wrpr">
                        <div class="listing_title">
                            <h3>One time purchase Products</h3>
                        </div>
                        <div class="row">
                            @foreach ($product as $pro)
                            <div class="col-md-3 col-sm-3">
                                <div class="product_div">
                                    <div class="productinner_div">
                                        <a href="{{ url('product-detail/'.$pro->slug)}}">
                                            <div class="prdct_img">
                                                <img src="{{ ImageUtil::getHref($pro->img_id,'186','182')}}" class="img-responsive">
                                            </div>
                                            <div class="description_div">
                                                <h4>{{ $pro->name}}</h4>
                                                <p class="company_para">{{ $pro->product_by}}</p>
                                                <p class="yellow_para">{{ $pro->price}}</p>
                                                
                                                {!! $pro->functionality !!}
                                                    
                                             
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>

    <!--container end-->
@endsection
@section('css')
<style type="text/css">
</style>
@endsection
@section('js')
@endsection
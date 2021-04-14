@extends('layouts.main')
@section('content')

<section id="prdct_details_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('product')}}" class="backtopreviouspage_link"><i class="fa fa-angle-left"></i> Back to Listing</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-9 customcol_9">
                    <div class="prdct_top_details_div">
                        <div class="row">
                            <div class="col-sm-7 col-md-7">
                                <div class="row">
                                <?php $stars = Helper::fireQuery("SELECT CEIL(AVG(rating_star)) AS avg_rating, count(product_id) AS totalcount ,product_id FROM rating GROUP BY product_id ORDER BY product_id desc ");
                                    // dd($stars);
                                $starArray = array();
                                foreach($stars as $star){
                                  $starArray[$star->product_id] = $star;
                                }
                                ?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="product_detail_img_div">
                                            <img src="{{ ImageUtil::getHref($productDetail->img_id,'235','235')}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="product_detail_div">
                                            <h3 class="prdct_detail_title">{{ $productDetail->name}}</h3>
                                            <p class="marginnone">by {{ $productDetail->product_by}}</p>
                                            <p class="yellowcolorpara">{{ $productDetail->price}}</p>
                                            <span class="rating_stars">
                                                @if(isset($starArray[$productDetail->id]) AND $starArray[$productDetail->id]->product_id == $productDetail->id)
                                                @for($i = 1; $i<=5; $i++)
                                                  @if($i <= $starArray[$productDetail->id]->avg_rating)
                                                     <i class="fa fa-star" aria-hidden="true"></i>
                                                  @else
                                                    <i class="fa fa-star chng-rating" aria-hidden="true"></i>
                                                  @endif
                                                @endfor  
                                                @else
                                                    <i class="fa fa-star chng-rating" aria-hidden="true"></i>
                                                    <i class="fa fa-star chng-rating" aria-hidden="true"></i>
                                                    <i class="fa fa-star chng-rating" aria-hidden="true"></i>
                                                    <i class="fa fa-star chng-rating" aria-hidden="true"></i>
                                                    <i class="fa fa-star chng-rating" aria-hidden="true"></i>
                                              @endif 
                                                <span>{{ count($rating)}} customer ratings</span>
                                            </span>
                                            <hr>
                                            <h5>Developer info and support</h5>
                                            <p class="bluecolorpara"><a href="tel:{{ $productDetail->dev_phone}}" class="link">{{ $productDetail->dev_phone}}</a></p>
                                            <p class="bluecolorpara"><a href="mailto:{{ $productDetail->dev_email}}" class="link">{{ $productDetail->dev_email}}</a></p>
                                            <p class="bluecolorpara"><a href="{{ $productDetail->dev_website}}" class="link">Visit developer support website</a></p>
                                            <div class="price_btn_div">
                                                <a href="#" class="demo_btn"><i class="fa fa-user"></i> DEMO ACCOUNT</a>
                                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="details_btn fontsize12 sameheight">PRICE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5">
                               
                                <div class="video_div">
                                    <iframe width="100%" height="266" src="{{ $productDetail->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prdct_imgslider_div">
                        <h6>Preview</h6>
                        <div class="prdct_img_slider slider">
                            <div>
                                <a class="fancybox" rel="ligthbox" href="{{asset('images/mac_thumbnail1.jpeg')}}">
                                    <img class="img-responsive" src="{{asset('images/mac_thumbnail1.jpeg')}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a class="fancybox" rel="ligthbox" href="{{asset('images/mac_thumbnail2.jpg')}}">
                                    <img class="img-responsive" src="{{asset('images/mac_thumbnail2.jpg')}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a class="fancybox" rel="ligthbox" href="{{asset('images/mac_thumbnail3.jpg')}}">
                                    <img class="img-responsive" src="{{asset('images/mac_thumbnail3.jpg')}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a class="fancybox" rel="ligthbox" href="{{asset('images/mac_thumbnail1.jpeg')}}">
                                    <img class="img-responsive" src="{{asset('images/mac_thumbnail1.jpeg')}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a class="fancybox" rel="ligthbox" href="{{asset('images/mac_thumbnail2.jpg')}}">
                                    <img class="img-responsive" src="{{asset('images/mac_thumbnail2.jpg')}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a class="fancybox" rel="ligthbox" href="{{asset('images/mac_thumbnail3.jpg')}}">
                                    <img class="img-responsive" src="{{asset('images/mac_thumbnail3.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="function_txt_div">
                        <h4>Functionality</h4>
                        {!! $productDetail->functionality !!}
                    </div>
                    <hr>
                    <div class="function_txt_div">
                        <h4>Features</h4>
                        {!! $productDetail->features !!}
                    </div>
                    <hr>
                    <div class="function_txt_div">
                        <h4>Description</h4>
                        {!! $productDetail->description !!}
                    </div>
                    <hr>
                    <div class="function_txt_div">
                        <h4>Who should use this?</h4>
                        {!! $productDetail->whoshould !!}
                    </div>
                    <hr>
                    <div class="function_txt_div">
                        <h4>Pricing information</h4>
                       {!! $productDetail->pricing_information !!}
                    </div>
                    <hr>
                    {{-- <div class="customer_reviews_div">
                        <h4>Customer reviews</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="customerreview_inerdiv">
                                    <span class="rating_stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p>5 out of 5 stars</p>
                                    <div class="fivestar_rating_div">
                                        <table class="cstm_table">
                                            <tr>
                                                <td>5 star</td>
                                                <td>
                                                    <div class="rating_bar_div yellow_bg">

                                                    </div>
                                                </td>
                                                <td align="right">100%</td>
                                            </tr>
                                            <tr>
                                                <td>4 star</td>
                                                <td>
                                                    <div class="rating_bar_div">

                                                    </div>
                                                </td>
                                                <td align="right">0%</td>
                                            </tr>
                                            <tr>
                                                <td>3 star</td>
                                                <td>
                                                    <div class="rating_bar_div">

                                                    </div>
                                                </td>
                                                <td align="right">0%</td>
                                            </tr>
                                            <tr>
                                                <td>2 star</td>
                                                <td>
                                                    <div class="rating_bar_div">

                                                    </div>
                                                </td>
                                                <td align="right">0%</td>
                                            </tr>
                                            <tr>
                                                <td>1 star</td>
                                                <td>
                                                    <div class="rating_bar_div">

                                                    </div>
                                                </td>
                                                <td align="right">0%</td>
                                            </tr>
                                        </table>
                                        <p class="bluecolorpara"><a href="#" class="link">See all verified purchased reviews</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="writeyourreview_div">
                                    <p>Share your thoughts with other customer</p>
                                    <a href="#" class="blue_btn_light marginbtm10">Write a customer review</a>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div> --}}
                   {{--  <div class="function_txt_div">
                        <h4>Recent reviews</h4>
                        <p>BobsNeatStuff</p>
                        <span class="rating_stars alignleft">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>Great app for research and scouting</span>
                        </span>
                        <p>May 2, 2019</p>
                        <p class="yellowcolorpara">Verified User</p>
                        <p>Have been using for several years as a paid monthly subscriber. Very reliable and great data, easy to make decent decisions.</p>
                        <p class="bluecolorpara"><a href="#" class="link">Report abuse</a></p>
                        <div class="writeyourreview_div">
                            <p><a href="#" class="link">See all 1 reviews</a></p>
                            <a href="#" class="blue_btn_light marginbtm10">Write a customer review</a>
                        </div>

                </div> --}}
                </div>
                <div class="col-sm-12 col-md-3 customcol_3">
                    <div class="sidebar_wrpr">
                        <div class="sidebar_box_div">
                            <p>This application can be purchased or downloaded from the developer website. <a href="#" class="link">Learn More</a></p>
                            <a href="#" class="blue_btn">Visit SellerEngine Software, Inc. Website</a>
                        </div>
                        <div class="sidebar_box_div">
                            <p>Already own this app? You may need to authorize it to access your seller data. <a href="#" class="link">Learn More</a></p>
                            <a href="#" class="blue_btn_light marginbtm10">Authorize Now</a>
                            <p>You may de-authorize an app at any time.</p>
                            <a href="#" class="link">Click here to manage your authorizations</a>
                        </div>
                        <div class="sidebar_box_div bg_lightblue">
                            <h5>Languages supported</h5>
                            <p>German</p>
                            <p>English</p>
                        </div>
                        <div class="sidebar_box_div bg_lightblue">
                            <h5>Marketplaces supported</h5>
                            <ul class="country_flaglist_ul">
                                <li><img src="{{asset('images/US_flag.jpg')}}" class="flag_icon" alt=""> US</li>
                                <li><img src="{{asset('images/canada_flag.jpg')}}" class="flag_icon" alt=""> Canada</li>
                                <li><img src="{{asset('images/mexico_flag.jpg')}}" class="flag_icon" alt=""> Mexico</li>
                                <li><img src="{{asset('images/france_flag.jpg')}}" class="flag_icon" alt=""> France</li>
                                <li><img src="{{asset('images/germany_flag.jpg')}}" class="flag_icon" alt=""> Germany</li>
                                <li><img src="{{asset('images/italy_flag.jpg')}}" class="flag_icon" alt=""> Italy</li>
                                <li><img src="{{asset('images/spain_flag.jpg')}}" class="flag_icon" alt=""> Spain</li>
                                <li><img src="{{asset('images/netherland_flag.jpg')}}" class="flag_icon" alt=""> Netherland</li>
                                <li><img src="{{asset('images/UK_flag.jpg')}}" class="flag_icon" alt=""> UK</li>
                                <li><img src="{{asset('images/india_flag.jpg')}}" class="flag_icon" alt=""> India</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="main_tabs_text">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-xs-12 col-sm-12">
          <div class="tab-content">
            <div class="tab-pane fade active in" id="menu23">
              <div class="leavereply">
                <h1>Reviews</h1>
                <div class="proreviews">
                  @foreach ($rating as $val)
                  <div class="row">
                        <div class="col-md-1"><center>
                          <img alt="" class="img-responsive" style="width: 50px;height: 50px;" src="{{ asset('images/avator1.png')}}"></center>
                        </div>
                        <div class="col-md-6">
                          <div class="rating rating2">
                            @for ($i = 0; $i < 5; $i++)
                                @if($i < $val->rating_star)
                                   <span class="fa fa-star"></span>                               
                                @else                                   
                                   <!-- <span class="fa fa-star" style="color: #ccc;"></span>   -->   
                                @endif
                                
                            @endfor
                          </div>
                          <div class="review-name">Name : {{$val->rating_name}}</div>
                          <div class="review-date">Date : {{$val->created_at}}</div>
                          <div class="review-detail">Detail : {{$val->rating_content}}</div>
                        </div>
                        <div class="col-md-4"></div>

                  </div>
                  <hr>
                @endforeach
                </div>
              </div>
              <div class="leavereply">
                <h1>leave a comment</h1>
                <div class="proreviews">                    
                </div>
                 <form class="CrudForm" id="rating_form" data-noinfo="true" data-customcallback="rating_success" data-customcallbackFail="rating_error" method="POST" action="{{route('ratingSubmit')}}">
                          @csrf
                <input type="hidden" name="product_id" value="{{$productDetail->id}}">
                <div class="rating-box">                  
                                    <div class="rating"><!--
                                      --><input name="rating_star" value="5" id="e5" type="radio"></a><label class="str" for="e5">☆</label><!--
                                      --><input name="rating_star" value="4" id="e4" type="radio"></a><label class="str" for="e4">☆</label><!--
                                      --><input name="rating_star" value="3" id="e3" type="radio"></a><label class="str" for="e3">☆</label><!--
                                      --><input name="rating_star" value="2" id="e2" type="radio"></a><label class="str" for="e2">☆</label><!--
                                      --><input name="rating_star" value="1" id="e1" type="radio"></a><label class="str" for="e1">☆</label>
                                    </div>
                </div> 
                    {{Helper::errorField('rating_name',$errors)}}
                    <input placeholder="Name" type="text" name="rating_name" value="{{old('rating_name')}}"> 
                    {{Helper::errorField('rating_email',$errors)}}
                    <input placeholder="Email" type="email" name="rating_email" value="{{old('rating_email')}}"> 
                    <textarea placeholder="Message" name="rating_content">{{old('rating_content')}}</textarea> 
                    <input type="submit" value="POST COMMENT">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
                <div class="col-md-3">
                    <div class="columns">
                      <ul class="price">
                        <li class="header">{{ $value->name}}</li>
                        <li class="grey">${{ number_format($value->price,2)}} / year</li>
                        {!! $value->detail !!}
                        <li class="grey">
                        <a href="javascript:void(0);" class="button" onclick="AddCart(this)" data-proid="{{$productDetail->id}}" data-packageid="{{$value->id}}">Buy Now</a>
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
  font-size: 20px;
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
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
function AddCart(obj){
  var qty = 1
  var proid = $(obj).data('proid');
  var packageid = $(obj).data('packageid');
  ajaxifyN({id:packageid,qty:qty,proid:proid,},'POST',base_url('cart-add'),AddCartAfter,'cart').then(function(q){
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
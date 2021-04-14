@extends('layouts.main')
@section('content')
 


<div id="landing-page">
  <div class="banner">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-12 px-xl-3 order-lg-2 d-flex align-items-center blue-left">
          <div class="float-left w-100 h-auto z-index">
            <div class="video-frame-bg">
              <div class="video-landing">
                <video class="video-fluid">
                  <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
                </video>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-7 col-lg-6 col-md-12 px-xl-4 order-lg-1 ">
          <div class="float-left w-100 h-auto z-index">
            <div class="banner-header-text">
              <h1>Start Selling on SellerSoftware <br/>
                MarketPlace</h1>
              <p>Sed ut perspiciatis unde omnis iste error sit voluptatem <br/>
                perspiciatis unde omnis iste error sit voluptatem</p>
              <a href="{{url('register')}}"><button class="btn banner-button">Register now</button></a>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>
  
  <!---banner-end--> 
  
  <!---why list software here-->
  <div class="list-software-here text-center mb-100 mt-100">
    <div class="container landing-container">
      <h2>Here is the Reasons</h2>
      <h3>Why List your Software Here?</h3>
      <div class="row ten-columns list-software-bg d-flex justify-content-center mt-100">
    <div class="col-md-4 col-xl-2 phone-odd-down">
    <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/b2b-active.png')}}" alt=""> <img class="unactive" src="{{asset('images/b2b-uncative.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">B2B marketplace </h5>
              <p>B2B marketplace for the amazon sellers and software companies</p>
            </div>
          </div>
    </div>
    <div class="col-md-4 col-xl-2 odd-down odd-down-sm">
        <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/renewal-active.png')}}" alt=""> <img class="unactive" src="{{asset('images/renewal-unactive.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Auto Renewal </h5>
              <p>Auto renewal Plans and receive payments to your account.</p>
            </div>
          </div>
    </div>
    <div class="col-md-4 col-xl-2 phone-odd-down">
    <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/marketplace-active.png')}}" alt=""> <img class="unactive" src="{{asset('images/marketplace-unactive.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Amazon MarketPlace </h5>
              <p>Support multiple amazon marketplace</p>
            </div>
          </div>
    </div>
    <div class="col-md-4 col-xl-2 odd-down">
    <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/signup-active.png')}}" alt=""> <img class="unactive" src="{{asset('images/signup-unactive.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Easy Signup </h5>
              <p>Easy signup with no upfront payment</p>
            </div>
          </div>
    </div>
    <div class="col-md-4 col-xl-2 last_odd_down">
    <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/earnings-active.png')}}" alt=""> <img class="unactive" src="{{asset('images/earnings-unactive.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Increase Earnings </h5>
              <p>Increase your earning by reaching hundreds of amazon sellers</p>
            </div>
          </div>
    </div>
  </div>
  
      
    </div>
  </div>
  <!---why list software here-end--> 
  

    <!---how its works--> 
  <div class="how-it-work ten-columns landing-how-its-work mb-100">
    <div class="container how-its-work-container">
      <h4 class="text-center mb-4">How It Works</h4>
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5 mb-lg-0">
          <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/lock_icon_hover.png')}}" alt=""> 
            <img class="unactive" src="{{asset('images/lock_icon.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Easy Registration</h5>
            </div>
            <div class="steps-box">
                Step 1
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5 mb-lg-0">
          <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/check_hover.png')}}" alt=""> <img class="unactive" src="{{asset('images/check_how.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Submit Software for Approval</h5>
            </div>
            <div class="steps-box">
                Step 2
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5 mb-md-0 mb-lg-0">
          <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/calcualtor_hover.png')}}" alt=""> <img class="unactive" src="{{asset('images/calcualtor.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Add Plan for your Software</h5>
            </div>
            <div class="steps-box">
                Step 3
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 ">
          <div class="common-box text-center">
            <div class="icon"> <img class="active" src="{{asset('images/software_icon_hover.png')}}" alt=""> <img class="unactive" src="{{asset('images/software_icon.png')}}" alt=""> </div>
            <div class="work-detail">
              <h5 class="sub-heading">Start Selling on  SellerSoftware Marketplace</h5>
            </div>
            <div class="steps-box">
                Step 4
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!---how-it-work-end--> 

<div class="testimonials-section  mt-100">
    <div class="container testimonials-container">
        <h4 class="text-center"> CUSTOMER REVIEWS </h4>
        <div id="testimonials" class="owl-carousel">
            <div class="item">
                <div class="testimonials_outer">
                    <div class="testimonials text-center">
                        <div class="client-img  d-inline">
                            <img class="d-inline" src="{{asset('images/client_img.png')}}" alt=" " />
                        </div>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                      <div class="author_name">
                        <strong>Zachary Fisher</strong>
                      </div>
                    </div>          
                </div>          
            </div>          
            
        </div>
    </div>
</div>


<div class="register-section">
    <div class="container register-container">
        <div class="d-lg-flex  justify-content-center justify-content-lg-between align-items-center">
            <h5>If you want <strong>Discount</strong> for Multiple Marketplace </h5>
            <a href="{{url('register')}}"><button class="text-uppercase register-btn">Register Now</button></a>
        </div>
    </div>
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
<script src="js/owl.custom.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
<script type="text/javascript">
    
  
  
  $(function(){
  $('.owl-item a').click(function(){
  $('.owl-item').removeClass('current');
  $(this).parents('.owl-item').addClass('current');
  var target = $(this).attr('href');
  $('.tab-content').find('.tab-pane').removeClass('active');
  $('.tab-content').find(target).addClass('active');
  
  });
  })
    
  </script>
@endsection
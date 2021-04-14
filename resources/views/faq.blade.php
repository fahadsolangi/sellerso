@extends('layouts.main')
@section('content')

 <div class="inner-banner">
<div class="container">
<h5 class="inner-heading">FAQ</h5>
          <h5 class="sub-heading mt-4 mb-4 mt-md-5">General questions</h5>
               <div class="accordion faq" id="faqExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <span class="question">Is account registration required?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                        <div class="card-body">
                            Account registration at PrepBootstrap is only required if you will be selling or buying themes. This ensures a valid communication channel for all parties involved in any transactions. 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                         <span class="question"> Can I submit my own Bootstrap templates or themes?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                        <div class="card-body">
                           A lot of the content of the site has been submitted by the community. Whether it is a commercial element/template/theme or a free one, you are encouraged to contribute. All credits are published along with the resources. 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                             <span class="question"> What is the currency used for all transactions?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                        <div class="card-body">
                            All prices for themes, templates and other items, including each seller's or buyer's account balance are in USD
                        </div>
                    </div>
                </div>
           </div>
            <h5 class="sub-heading mt-5 mb-4">Sellers</h5>
              <div class="accordion faq" id="faqExample2">
          
                <div class="card">
                    <div class="card-header" id="heading4">
                        <h5 class="mb-0">
                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                             <span class="question"> Who cen sell items?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#faqExample2">
                        <div class="card-body">
                           Any registed user, who presents a work, which is genuine and appealing, can post it on PrepBootstrap. 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading5">
                        <h5 class="mb-0">
                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                         <span class="question">I want to sell my items - what are the steps?</span>
                          <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                          </span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#faqExample2">
                        <div class="card-body">
                           The steps involved in this process are really simple. All you need to do is:
             <ul class="red-point">
                 <li>Register an account</li>
                 <li>Activate your account</li>
                 <li>Go to the Themes section and upload your theme</li>
                 <li>The next step is the approval step, which usually takes about 72 hours.</li>
             </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading6">
                        <h5 class="mb-0">
                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                              <span class="question">How much do I get from each sale?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#faqExample2">
                        <div class="card-body">
                            Here, at PrepBootstrap, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc. 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading7">
                        <h5 class="mb-0">
                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                              <span class="question">Why sell my items here?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#faqExample2">
                        <div class="card-body">
                            There are a number of reasons why you should join us:
             <ul class="red-point">
                 <li>A great 70% flat rate for your items.</li>
                 <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>
                 <li>We are not an exclusive marketplace. This means that you can sell your items on PrepBootstrap, as well as on any other marketplate, and thus increase your earning potential.</li>
             </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="heading8">
                        <h5 class="mb-0">
                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                          <span class="question">What are the payment options?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#faqExample2">
                        <div class="card-body">
                           The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment. 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading9">
                        <h5 class="mb-0">
                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                              <span class="question">When do I get paid?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#faqExample2">
                        <div class="card-body">
                            Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account. The minimum amount of your balance should be at least 70 USD. 
                        </div>
                    </div>
                </div>
           </div>
              <h5 class="sub-heading mt-5 mb-4">Buyers</h5>
              <div class="accordion faq" id="faqExample3">
                <div class="card">
                    <div class="card-header" id="heading10">
                        <h5 class="mb-0">
                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                              <span class="question">I want to buy a theme - what are the steps?</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </button>
                          </h5>
                    </div>
                    <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#faqExample3">
                        <div class="card-body">
                           Buying a theme on PrepBootstrap is really simple. Each theme has a live preview. Once you have selected a theme or template, which is to your liking, you can quickly and securely pay via Paypal. Once the transaction is complete, you gain full access to the purchased product. 
                        </div>
                    </div>
                  </div>
                   <div class="card">
                    <div class="card-header" id="heading11">
                        <h5 class="mb-0">
                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                         <span class="question">Is this the latest version of an item</span>
                              <span class="open-close-icon">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <i class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#faqExample3">
                        <div class="card-body">
                          Each item in PrepBootstrap is maintained to its latest version. This ensures its smooth operation. 
                        </div>
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
<script>
  $(document).ready(function(){
    $(".navbar-toggler").click(function(){
    $(".navbar-collapse").toggleClass("hide");
    });
  });
  </script>
@endsection
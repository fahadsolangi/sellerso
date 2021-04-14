@extends('layouts.main')
@section('content')
<?php
$get_bundle =  DB::select("SELECT * from bundle order by subscription");
$em = "";
$package_ids = "";
$discount = 0;
$get_bundle_pack = 0;
$singledis = 0;
$total_dis = 0;
$subtotal = 0;
foreach (Session::get('cart') as $key=>$items) {
  if($items['packtype'] == 1){
     $get_bundle_pack ++;
  }
}
foreach ($get_bundle as $value) {
  if($get_bundle_pack >= $value->subscription)
  {
     $discount = $value->bundle_discount;
  }
}
?>
<div class="checkout-area">
      <div class="container">
        <div class="row">
          <form action="{{ route('checkout.submit') }}" method="post" id="payment-form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="orderId" id="orderId">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="checkbox-form">
                <h3>Order Details</h3>
                <div class="row">
                <?php $email = '';$Bfname = ''; $Blname = '';$Bcompany='';$Bcountry='';$Baddress='';$Bcity='';$Bdistrict='';$Bzip='';$Bphone='';$Bapartment='';$Sfname = ''; $Slname = '';$Scompany='';$Scountry='';$Saddress='';$Scity='';$Scity='';$Szip='';$Sphone='';?>
                @if(Auth::check())
                    <?php 
                      $user = Auth::user();
                      
                      $checkout_details = Helper::returnRow('orders',"user_id = ".Auth::user()->id." order by order_id desc");
                      //dd($checkout_details);
                      $Bfname = $user->first_name;
                      $Blname = $user->last_name;
                      if(count($checkout_details) > 0):
                        $Baddress = $checkout_details->billing_address;
                        $Bcompany = $checkout_details->billing_company;
                        $Bcountry = $checkout_details->billing_country;
                        $Bcity = $checkout_details->billing_city;
                        $Bzip = $checkout_details->billing_zip;
                        $Bphone = $checkout_details->billing_phone;
                        $Bapartment = $checkout_details->billing_apartment;
                        $Bdistrict = $checkout_details->billing_district;
                        $Sfname = $checkout_details->shipping_first_name;
                        $Slname = $checkout_details->shipping_last_name;
                        $Saddress = $checkout_details->shipping_address;
                        $Scompany = $checkout_details->shipping_company;
                        $Scountry = $checkout_details->shipping_country;
                       // $Scity = $checkout_details->shipping_city;
                       // $Sstate = $checkout_details->shipping_state;
                        $Sphone = $checkout_details->shipping_phone;
                        $Szip = $checkout_details->shipping_zip;
                      endif;  
                    ?>
                @endif
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>First Name<span class="require">*</span> {{Helper::errorField('billing_first_name',$errors)}}</label>
                       <input placeholder="" id="billing_first_name" type="text" name="billing_first_name" value="{{ $user->first_name }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="checkout-form-list">
                      <label>Last Name<span class="require">*</span> {{Helper::errorField('billing_last_name',$errors)}}</label>
                       <input placeholder="" id="billing_last_name" type="text" name="billing_last_name" value="{{ $user->last_name }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="checkout-form-list">
                      <label>Company Name</label> <input placeholder="" id="billing_company" type="text" name="billing_company" value="{{ $Bcompany }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="checkout-form-list">
                      <label>Postcode / Zip<span class="require">*</span> {{Helper::errorField('billing_zip',$errors)}}</label>
                       <input placeholder="Postcode / Zip" name="billing_zip" id="billing_zipcode" type="text" value="{{ $user->zipcode }}">
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Phone<span class="require">*</span> {{Helper::errorField('billing_phone',$errors)}}</label>
                     <input placeholder="Phone" name="billing_phone" id="billing_phone" type="text" value="{{ $user->phone }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="checkout-form-list">
                    <label>Email Address</label> <br>
                     @if(!empty($user->email))
                      <span>{{$user->email}}</span>
                      <input placeholder="" type="hidden" name="email" id="billing_email" value="{{$user->email}}">
                     @else
                      <input placeholder="" type="email" name="email" id="billing_email">
                    @endif
                  </div>
                </div>
                @if(!Auth::check())
                <div class="col-md-12">
                  <div class="checkout-form-list create-acc">
                    <input id="cbox" name="create_account" type="checkbox"> <label>Create an account?</label>
                  </div>
                  <div class="checkout-form-list create-account" id="cbox_info">
                    <p>Create An Account By Entering The Information Below. If You Are A Returning Customer Please Login At The Top Of The Page.</p>
                    <label id="label_password" style="display: none">Account password</label>
                     <input placeholder="password" name="password" id="password" type="hidden">
                  </div>
                </div>
                @endif
                <div class="shipping-method">
                  
                  
            <div class="col-md-12">
              <div class="ship-card">
              </div>
            </div>
            <div class="col-md-12">
			<div id="payment-method-paypal">
     <div class="form-group">
                                            <div class="card-header">
                                                <label for="card-element">
                                                    Enter your card information
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                        </div>   
      </div>
			<input type="hidden" name="transaction_id" id="transaction_id" value="12233" />
              <input class="mainButton" type="submit" value="Place Order" >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="col-md-6">
        <div class="country-select">
          <label>Country<span class="require">*</span> {{Helper::errorField('billing_country',$errors)}}</label>
          <select name="billing_country" id="country">
            <option value="">Select Country</option>
            @if(count($countries) > 0)
              @foreach($countries as $cont)
                @if($Bcountry != "" and $Bcountry == $cont->id)
                   <option value="{{ $cont->sortname }}" data-countryId="{{ $cont->id }}" selected="selected">{{$cont->name}}</option>
                @else
                  <option value="{{ $cont->sortname }}" data-countryId="{{ $cont->id }}">{{$cont->name}}</option>
                @endif
              @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="checkout-form-list">
          <label>State / Province<span class="require">*</span> {{Helper::errorField('billing_state',$errors)}}</label>
           <select name="billing_state" id="state">
              <option>State/Province:</option>
            </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="checkout-form-list">
          <label>Town / City</label>
           <select name="billing_city" id="city">
              <option>Town/City:</option>
            </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="checkout-form-list">
          <label>Address<span class="require">*</span> {{Helper::errorField('billing_address',$errors)}}</label> 
          <input placeholder="Street address" id="billing_address" type="text" name="billing_address" value="{{ $user->address }}">
        </div>
      </div>
  <div class="your-order-area pb-80">
    <div class="">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="your-order">
            <div class="col-md-12">
              <h3>YOUR ORDER</h3>
            </div>
            <div class="col-md-12">
              <div class="your-order-table border-table">
                <table>
                  <thead>
                    <tr>
                      <th class="product-name">Product Name</th>
                      <th class="product-total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total=0;?>
                      @if(Session::has('cart') && count(Session::get('cart') )>0)
                        @foreach(Session::get('cart') as $key=>$items)
                          <tr class="{{$key != 0 ? 'border' : '' }}">
                            <td class="product-name">{{$items['name']}}</td>
                            <td class="product-total"><span>{{Session::get('currencycode')}} {{ Helper::setCurrency(Session::get('currencycode'),$items['price'] * $items['qty'])}} </span></td>
                          </tr>
                           @if($discount > 0 && $items['packtype'] == 1)
                          <?php
                            $singledisrate = $items['price']/100 * $discount;
                            $singledis = $items['price'] - $singledisrate;
                          ?>
                          @else
                          <?php
                            $singledisrate = 0;
                            $singledis = $items['price'];
                          ?>
                          @endif 
                           <?php $total += $items['price'] * $items['qty']; ?>
                           <?php 
                              $subtotal += $items['price'];
                              $total_dis +=  $singledisrate;

                           ?>
                        @endforeach
                      @endif
                  </tbody>
                  <tfoot>
                  @if($discount > 0)
                  <tr>
                  <th>Discount</th>
                  <td><span class="amount"> 
                   {{Session::get('currencycode')}} {{  number_format(Helper::setCurrency(Session::get('currencycode'),$total_dis),2)}}
                  </span></td>
                  </tr>
                  @endif
                  <tr>
                    <th>Total</th>
                    <td><span class="amount">{{Session::get('currencycode')}} {{ number_format(Helper::setCurrency(Session::get('currencycode'),$total - $total_dis),2)}}</span></td>
                    <input type="hidden" name="camount" value="{{number_format($total - $total_dis,2)}}">
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</div>
<div class="clearfix"></div>
</div>
</div>




@endsection
@section('css')
<style type="text/css">

</style>
@endsection
@section('js')

</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe('{{ env("STRIPE_KEY") }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

$("#cbox").click(function(){
  if($(this).is(':checked'))
  {
    $("#label_password").show();
    $("#password").attr('type','password')
  }
  else{
    $("#label_password").hide();    
    $("#password").attr('type','hidden')
  }

})  
$(document).ready(function(){
  /* countries,states and cities script*/
  $( "#country" ).change(function() {
        //alert( "Handler for .change() called." );
           $("#state").html('');
   
       var country_id = $('option:selected', this).attr('data-countryId');
  

        // alert(country_id)
        var  data = { country_id: country_id };
  
      $.ajax({
        type    : 'POST',
        data    : data,
        dataType : 'json',
         cache: false,
        //async: true,
        //contentType: false,
        //processData: false,
        url     : '{{url('/states')}}',
        beforeSend: function (request) {
        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
    
        //alert(result.states.length);
    
        var res = result.states;
    
        //var opts = "<option value='""'>'Select State'</option>";
        var opts = '';
        for (var i = 0; i < result.states.length; i++) {
            if( $('#state_prev').val() == res[i].name ) {
                opts += "<option selected='selected' value='" + res[i].name + "' data-stateId='" + res[i].id + "'>" + res[i].name + "</option>";
            } {

            selected = "";

                opts += "<option '" + selected + "' value='" + res[i].name + "' data-stateId='" + res[i].id + "'>" + res[i].name + "</option>";
 
            }
            }
            
                $("#state").append(opts);
                $("#state").change();
            },
            error:function (error) {
            generateNotification('error','Could not fetched please try again');
        }
        });
    
      
  });

        $( "#state" ).change(function() {
            $("#city").html('');
            var state_id = $('option:selected', this).attr('data-stateId');
            var  data = { state_id: state_id };
            
            $.ajax({
            type    : 'POST',
            data    : data,
            dataType : 'json',
                    cache: false,
            url     : '{{url('/cities')}}',
            beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (result) {
            
            var res = result.cities;
            
            var opts = '';
            for (var i = 0; i < result.cities.length; i++) {
                if( $('#city_prev').val() == res[i].name ) {
                    opts += "<option selected='selected'  value='" + res[i].name + "'>" + res[i].name + "</option>";
                } {
                    opts += "<option '" + selected + "'  value='" + res[i].name + "'>" + res[i].name + "</option>";
                }
            }
            $("#city").append(opts);
        },
        error:function (error) {
        generateNotification('error','Could not fetched please try again');
        }
        });
    });
    $("#country").change();
})
</script>
<script>
$(document).ready(function(){
  /* countries,states and cities script*/
  $( "#country2" ).change(function() {
        //alert( "Handler for .change() called." );
           $("#state2").html('');
   
       var country_id = $('option:selected', this).attr('data-countryId');
  

        // alert(country_id)
        var  data = { country_id: country_id };
  
      $.ajax({
        type    : 'POST',
        data    : data,
        dataType : 'json',
         cache: false,
        //async: true,
        //contentType: false,
        //processData: false,
        url     : '{{url('/states')}}',
        beforeSend: function (request) {
        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
    
        //alert(result.states.length);
    
        var res = result.states;
    
        //var opts = "<option value='""'>'Select State'</option>";
        var opts = '';
        for (var i = 0; i < result.states.length; i++) {
            if( $('#state_prev').val() == res[i].name ) {
                opts += "<option selected='selected' value='" + res[i].name + "' data-stateId='" + res[i].id + "'>" + res[i].name + "</option>";
            } {

            selected = "";

                opts += "<option '" + selected + "' value='" + res[i].name + "' data-stateId='" + res[i].id + "'>" + res[i].name + "</option>";
 
            }
            }
            
                $("#state2").append(opts);
                $("#state2").change();
            },
            error:function (error) {
            generateNotification('error','Could not fetched please try again');
        }
        });
    
      
  });

        $( "#state2" ).change(function() {
            $("#city2").html('');
            var state_id = $('option:selected', this).attr('data-stateId');
            var  data = { state_id: state_id };
            
            $.ajax({
            type    : 'POST',
            data    : data,
            dataType : 'json',
                    cache: false,
            url     : '{{url('/cities')}}',
            beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (result) {
            
            var res = result.cities;
            
            var opts = '';
            for (var i = 0; i < result.cities.length; i++) {
                if( $('#city_prev').val() == res[i].name ) {
                    opts += "<option selected='selected'  value='" + res[i].name + "'>" + res[i].name + "</option>";
                } {
                    opts += "<option '" + selected + "'  value='" + res[i].name + "'>" + res[i].name + "</option>";
                }
            }
            $("#city2").append(opts);
        },
        error:function (error) {
        generateNotification('error','Could not fetched please try again');
        }
        });
    });
    $("#country2").change();
})

</script>
@endsection

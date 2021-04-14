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
<style type="text/css">
  div#card-errors {
    color: white !important;
}
input.InputElement.is-empty.Input.Input--empty::placeholder {
    color: aliceblue !important;
}
input.InputElement.is-empty.Input.Input--empty:-ms-input-placeholder {
    color: aliceblue !important;
}
input.InputElement.is-empty.Input.Input--empty::-ms-input-placeholder {
    color: aliceblue !important;
}
</style>
<div class="inner-banner">
<form action="{{ route('checkout.submit') }}" method="post" id="payment-form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="orderId" id="orderId">
<div class="container">
<h5 class="inner-heading mb-4">Order Details</h5>
    
<div class="comment-box contact-box check-out-main">
<div class="row z-index ">
<div class="col-xl-7 col-lg-6 order-12 order-lg-1 ">  
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
<div class="col-md-6 mb-4">
<input class="border-input" id="billing_first_name" type="text" name="billing_first_name" value="{{ $user->first_name }}" placeholder="First Name">
 {{Helper::errorField('billing_first_name',$errors)}}
</div>
<div class="col-md-6 mb-4">
<input class="border-input" id="billing_last_name" type="text" name="billing_last_name" value="{{ $user->last_name }}" placeholder="Last Name">
{{Helper::errorField('billing_last_name',$errors)}}
</div>
<div class="col-md-6 mb-4">
<input class="border-input" id="billing_company" type="text" name="billing_company" value="{{ $Bcompany }}" placeholder="Company Name">
</div>
<div class="col-md-6 mb-4">
<input class="border-input" placeholder="Postcode / Zip" name="billing_zip" id="billing_zipcode" type="text" value="{{ $user->zipcode }}">
{{Helper::errorField('billing_zip',$errors)}}
</div>
<div class="col-md-6 mb-4">
<input class="border-input" placeholder="Phone" name="billing_phone" id="billing_phone" type="text" value="{{ $user->phone }}">
{{Helper::errorField('billing_phone',$errors)}}
</div>
<div class="col-md-6 mb-4">
<label class="mb-0">Email Address</label>
@if(!empty($user->email))
<p><strong>{{$user->email}}</strong></p>
<input placeholder="" type="hidden" name="email" id="billing_email" value="{{$user->email}}">
@else
<input placeholder="" type="email" name="email" id="billing_email">
@endif
</div>

<div class="col-md-12 mb-4">
<input class="border-input" placeholder="Street address" id="billing_address" type="text" name="billing_address" value="{{ $user->address }}">
{{Helper::errorField('billing_address',$errors)}}
</div>


<div class="col-md-12 mb-4">
  <label>Town/City</label>
  <input class="border-input" id="city" placeholder="city" name="billing_city" type="text" value="{{ $user->billing_city }}">
{{Helper::errorField('billing_city',$errors)}}

</div>
<div class="col-md-6 mb-4">
  <label>State/Province*</label>
<div class="dropdown-custom">
<input class="border-input" id="state" placeholder="state" name="billing_state" type="text" value="{{ $user->billing_state }}">
{{Helper::errorField('billing_state',$errors)}}
</div>
</div>


<div class="col-md-6 mb-4">
  <label>Country*</label>
<div class="dropdown-custom">
<select class="border-input" name="billing_country" id="country">
  @if(count($countries) > 0)
  @foreach($countries as $cont)
                @if($Bcountry != "" and $Bcountry == $cont->id)
<option value="{{ $cont->sortname }}" data-countryId="{{ $cont->id }}" selected="selected">{{$cont->name}}</option>
 @else
                  <option value="{{ $cont->sortname }}" {{$cont->sortname == 'US' ? 'selected="selected"' : ''}} data-countryId="{{ $cont->id }}">{{$cont->name}}</option>
                @endif
              @endforeach
            @endif
</select>
{{Helper::errorField('billing_country',$errors)}}
</div>
</div>






</div>

<button class="btn text-uppercase" type="submit">Place Order</button>
</div>
<div class="col-xl-5 col-lg-6 order-1">
<div class="card-info" id="payment-method-paypal" style="width: 114%;">
  <h5 class="text-white">Enter Your Card Information</h5>
   <div class="credit-card">
    <div class="card-body">
            <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
            </div>
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
   </div>
   <!-- <div class="card-date">
   <input class="border-input transparent-input" name="" placeholder="MM/YY">
   </div>
   <input class="border-input transparent-input cvc" name="credit-cvc" placeholder="CVC">
   <input type="hidden" name="transaction_id" id="transaction_id" value="12233" /> -->
</div>


<div class="float-left w-100 mt-5 mb-4">
<h5 class="inner-heading mb-3">Your Order</h5>

<div class="contact-info p-0">
<div class="table-responsive">
<table class="table m-0">
  <tr>
    <th class="border-0">Product Name</th>
    <th class="border-0 text-right">Total</th>
  </tr>
  <?php $total=0;?>
                      @if(Session::has('cart') && count(Session::get('cart') )>0)
                        @foreach(Session::get('cart') as $key=>$items)
  <tr class="{{$key != 0 ? 'border' : '' }}">
    <td class="product-name">{{$items['name']}}</td>
    <td class="text-right product-total"><span>{{Session::get('currencycode')}} {{ Helper::setCurrency(Session::get('currencycode'),$items['price'] * $items['qty'])}} </span></td>
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
    @if($discount > 0)
    <tr>
      <td></td>
      <td class="text-right"><span class="total">Discount <span class="price amount">{{Session::get('currencycode')}} {{  number_format(Helper::setCurrency(Session::get('currencycode'),$total_dis),2)}}</span></span></td>
    </tr>
    @endif
  <tr>
    <td></td>
    <td class="text-right"><span class="total">Total <span class="price amount">{{Session::get('currencycode')}} {{ number_format(Helper::setCurrency(Session::get('currencycode'),$total - $total_dis),2)}}</span></span></td>
    <input type="hidden" name="camount" value="{{number_format($total - $total_dis,2)}}">
  </tr>

</table>
</div>
</div>
</div>



</div>
</div>
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
    color: '#FFFFF',
    iconColor: '#FFFFF'
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

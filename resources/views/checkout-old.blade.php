@extends('layouts.main')
@section('content')
<div class="checkout-area">
      <div class="container">
        <div class="row">
          <form action="{{ route('saveaddress') }}" method="post" id="payment-form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="orderId" id="orderId">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="checkbox-form">
                <h3>Billing Information</h3>
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
                    <div class="country-select">
                      <label>Country<span class="require">*</span> {{Helper::errorField('billing_country',$errors)}}</label>
                      <select name="billing_country" id="country">
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
                <div class="col-md-12">
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
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <input placeholder="Apartment, suite, unit etc. (optional)" name="billing_apartment" type="text" value="{{ $Bapartment }}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="checkout-form-list">
                    <label>District {{Helper::errorField('billing_district',$errors)}}</label>
                     <input placeholder="" type="text" name="billing_district" value="{{ $Bdistrict }}">
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
			<div id="payment-method-paypal"></div>
			{{-- <input type="hidden" name="transaction_id" id="transaction_id" value="12233" />
              <input class="mainButton" type="submit" value="Place Order" > --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="col-md-12">
        <h3>Shipping Information:</h3>
        <label for="checkid"  style="word-wrap:break-word">
          <input id="copy_info"  type="checkbox" value="test" /> SAME AS BILLING
        </label>
      </div>
      <div class="col-md-6">
        <div class="checkout-form-list">
          <label>First Name<span class="require">*</span> {{Helper::errorField('shipping_first_name',$errors)}}</label> 
          <input placeholder="" type="text" id="shipping_first_name" name="shipping_first_name" value="{{ $Sfname }}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="checkout-form-list">
          <label>Last Name<span class="require">*</span> {{Helper::errorField('shipping_last_name',$errors)}}</label> 
          <input placeholder="" type="text" id="shipping_last_name" name="shipping_last_name" value="{{ $Slname }}">
        </div>
      </div>
      <div class="col-md-12">
        <div class="checkout-form-list">
          <label>Address<span class="require">*</span> {{Helper::errorField('shipping_address',$errors)}}</label> 
          <input placeholder="Street address" id="shipping_address" name="shipping_address" type="text" value="{{ $Saddress }}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="checkout-form-list">
          <label>Country<span class="require">*</span> {{Helper::errorField('shipping_country',$errors)}}</label>
          <select name="shipping_country" id="country2">
            @if(count($countries) > 0)
              @foreach($countries as $cont)
                @if($Scountry != "" and $Scountry == $cont->id)
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
          <label>State/Province<span class="require">*</span> {{Helper::errorField('shipping_state',$errors)}}</label>
           <select name="shipping_state" id="state2">
            <option>State/Province:</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="checkout-form-list">
        <label>City</label>
         <select name="shipping_city" id="city2">
          <option>Town/City:</option>
          </select>
      </div>
    </div>
  <div class="col-md-6">
    <div class="checkout-form-list">
      <label>Zip/Postal Code<span class="require">*</span> {{Helper::errorField('shipping_zip',$errors)}}</label>
       <input placeholder="Zip/Postal Code" id="shipping_zip" name="shipping_zip" type="text" value="{{ $Szip }}">
    </div>
  </div>
  <div class="col-md-6">
    <div class="checkout-form-list">
      <label>Telephone<span class="require">*</span> {{Helper::errorField('shipping_phone',$errors)}}</label>
       <input placeholder="Telephone" name="shipping_phone" id="shipping_phone" type="text" value="{{ $Sphone }}">
    </div>
  </div>
  <div class="col-md-6">
    <div class="checkout-form-list">
      <label>Company</label> 
        <input placeholder="Company" name="shipping_company" id="shipping_company" type="text" value="{{ $Scompany }}">
    </div>
  </div>
  <div class="col-md-12">
    <div class="add-info">
      <h3>Additional Information</h3><label>Order Notes</label>
      <textarea cols="30" placeholder="Not About Order, E.G Special Notes For Delivery" rows="10" name="remarks"></textarea>
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
                            <td class="product-total"><span>$ {{$items['price'] * $items['qty'] }} </span></td>
                          </tr>
                           <?php $total += $items['price'] * $items['qty']; ?>
                        @endforeach
                      @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Total</th>
                    <td><span class="amount">$ {{$total}}</span></td>
                    <input type="hidden" name="camount" value="{{$total}}">
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


<script src="https://www.paypal.com/sdk/js?client-id=AYnU6u9hm7Ye69rQPmJekoiSYf-7RrWHX5g-pdjYyp92nxuSl6x7mPcOpm7mJmwuNwFyLL4qjS7zNuIA&vault=true"></script>


<script type="text/javascript">
  paypal.Buttons({
   createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{ number_format($total,2) }}'
          }
        }]
      });
    },
  onClick: function(data, actions) {
     const first_name = $("#billing_first_name").val();
     const last_name = $("#billing_last_name").val();
     const address = $("#billing_address").val();
     const country = $("#country").val();
     const state = $("#state").val();
     const zipcode = $("#billing_zipcode").val();
     const email = $("#billing_email").val();
     const phone = $("#billing_phone").val();
     //alert(first_name+last_name+address+country+state+zipcode+email+phone)
     if(first_name && last_name && address  && country  && state && zipcode  && email  && phone)
     {
        return actions.resolve();
     }
     else
     {
       generateNotification("error","Please fill the requires fields")
       return actions.reject();
     }
  },
    onApprove: function(data) {
      //$("#payment-form").submit()
      console.log(data)

    
    var DOEC_URL = "{{ route('verifypayment') }}";

    return fetch(DOEC_URL, {
      method: 'post',
      headers: {
        'content-type': 'application/json'
      },
      body: JSON.stringify({
        amount:{{ number_format($total,2) }},
        orderID:   data.orderID,
        payerID: data.payerID,

        first_name : $("#billing_first_name").val(),
        last_name : $("#billing_last_name").val(),
        // company : $("#company").val(),
        address : $("#billing_address").val(),
        // address2 : $("#address2").val(),
        country : $("#country").val(),
        state : $("#state").val(),
        // city : $("#city").val(),
        zipcode : $("#billing_zipcode").val(),
        email : $("#billing_email").val(),
        phone : $("#billing_phone").val(),
        // note : $("#note").val(),
        _token:$("meta[name='csrf-token']").attr('content')
      })
    })
  .then(function(res) {
        return res.json();
    })
  .then(function(result){
    //alert()
      console.log(result)
        if(result.status == '1')
        {
          $('#orderId').val(result.data);
          generateNotification('success','Thank you for your Payment. Your payment has been submitted');
         setTimeout(function(){ $("#payment-form").submit() },2000);
        }
        else
          generateNotification('0',result.data);
        
    })
  },
  onCancel: function(data, actions) {
    generateNotification('error','Payment Failed');
  }
}).render('#payment-method-paypal');
</script>

{{-- <script src="https://www.paypal.com/sdk/js?client-id=ARFuGOxWDahnJxxBXJDYE1f_lkRLUIg39ZQBDzL7lHY0BAORZ0jQDBeqx9A6k6oAlXOKr2JX8k7B5CHX"></script> --}}
<script>
// paypal.Buttons({
//     createOrder: function(data, actions) {
//       // This function sets up the details of the transaction, including the amount and line item details.
//       return actions.order.create({
//         purchase_units: [{
//           amount: {
//             value: '{{number_format($total,2)}}'
//           }
//         }]
//       });
//     },onApprove: function(data, actions) {
//       // This function captures the funds from the transaction.
//       return actions.order.capture().then(function(details) {
// 		  //console.log(details.id);
//         // This function shows a transaction success message to your buyer.
// 		$('#transaction_id').val(details.id)
// 		$('.mainButton').eq(0).show();
// 		$('.mainButton').eq(0).click();
// 		$('#paypal-button-container').hide();
//         //alert('Transaction completed by ' + details.payer.name.given_name);
//       });
//     }
//   }).render('#paypal-button-container');
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
$("#copy_info").click(function(){
  if($(this).is(':checked'))
    {
    $("#shipping_first_name").val($("#billing_first_name").val())
    $("#shipping_last_name").val($("#billing_last_name").val())
    $("#shipping_address").val($("#billing_address").val())
    $("#shipping_company").val($("#billing_company").val())
    $("#shipping_zip").val($("#billing_zip").val())
    $("#shipping_phone").val($("#billing_phone").val())
    $("#country2").val($("#country").find('option:selected').val())
    $("#country2").change()
    setTimeout( function(){
      $("#state2").val($("#state").find('option:selected').val())
      $("#state2").change() 
    },2000)
      
    setTimeout( function(){
      $("#city2").val($("#city").find('option:selected').val())
    },5000)
  }
  else
    {
    $("#shipping_first_name").val('')
    $("#shipping_last_name").val('')
    $("#shipping_address").val('')
    $("#shipping_company").val('')
    $("#shipping_zip").val('')
    $("#shipping_phone").val('')
    $("#country2").val('AF')
    $("#country2").change()
    $("#state2").val('')
    $("#city2").val('')
  }
})
</script>
@endsection

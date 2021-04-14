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


<div class="inner-banner">
<div class="container">
<h5 class="inner-heading mb-4">Cart</h5>
    
<div class="comment-box contact-box ">
<div class="row z-index ">
<div class="col-xl-12">  

<div class="contact-info mb-5">
<div class="table-responsive">
<table class="table m-0 min-w-550">
    <tr>
      <th class="border-0">Software</th>
      <th class="border-0">Plan</th>
      <th class="border-0">Unit Price</th>
      <th class="border-0">Sub Price</th>
      <th class="border-0">Action</th>
    </tr>

    <form method="post" action="{{ route('update_cart') }}" id="update-cart">
       @csrf

                   <?php $total=0;
                   //dd(Session::get('cart')); ?>

      @if(Session::has('cart') && count(Session::get('cart')) > 0)

        @foreach(Session::get('cart') as $key=>$items)
        <?php
          $prod_det = array();
          $prod_det = DB::select("SELECT * from products where id = ".$items['proid']);
        ?>

    <tr>
      <td>{{$prod_det[0]->name }}</td>
      <td>{{$items['name'] }}</td>
      <td>{{ Helper::setCurrency(Session::get('currencycode'),$items['price'])}}</td>
      <td>
      @if($discount > 0 && $items['packtype'] == 1)
                      <?php
                        $singledisrate = $items['price']/100 * $discount;
                        $singledis = $items['price'] - $singledisrate;
                      ?>
                      {{ Helper::setCurrency(Session::get('currencycode'),$singledis)}}
                      @else
                      <?php
                        $singledisrate = 0;
                        $singledis = $items['price'];
                      ?>
                      {{ Helper::setCurrency(Session::get('currencycode'),$singledis)}}
                      @endif 
    </td>
      <td>
       {{--  <button class="close float-left text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></button> --}}
       <a class="remove_cart remove removeproduct" rel="2" href="javascript:void(0);" onclick="removeCart('{{$key}}',this)" style="font-size: 16px;">

                          x</a>
      </td>
    </tr>
     <?php 
        $subtotal += $items['price'];
        $total_dis +=  $singledisrate;
     ?>

     @endforeach
      @else
        <tr><td colspan="6"><h1 class="text-center">No product found</h1></td></tr>  
      @endif


   <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="text-right"><span class="total">Sub total <span class="price">{{Session::get('currencycode')}} {{ Helper::setCurrency(Session::get('currencycode'),$subtotal)}}</span></span></td>
    </tr>

   @if($discount > 0)               
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="text-right"><span class="total">Discount <span class="price">{{Session::get('currencycode')}} {{ Helper::setCurrency(Session::get('currencycode'),$total_dis)}}</span></span></td>
    </tr>
    @endif   

    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="text-right"><span class="total">Total <span class="price">{{Session::get('currencycode')}} {{ Helper::setCurrency(Session::get('currencycode'),$subtotal - $total_dis)}}</span></span></td>
    </tr>
</table>
</div>
</div>
{{-- <button href="{{route('checkout')}}" class="btn text-uppercase">Procced to check out</button> --}}
 <a class="btnStyle btn text-uppercase" href="{{route('checkout')}}">Procced to check out</a>
</div>

</div>
</div>
<div class="clearfix"></div>



</div>
</div>

@endsection

@section('css')

<style type="text/css">

  /*in page css here*/

</style>

@endsection

@section('js')

<script type="text/javascript">

 $(document).on('click', ".updateCart", function(e){

 // alert()

   //alert($("#qty").val());

   var check = 1;

    if($(".quantity_cart").length > 1)

    {  

      $(".quantity_cart").each(function(ind,val){

        if(parseInt($(this).val()) < 1 || $(this).val() == '')

        {

          generateNotification('error','quantity must be an integer and greater than 0');

          check = 0;

        }      

      })

    } 

    else if(parseInt($(".quantity_cart").val()) < 1 || $(".quantity_cart").val() == '')

    {

      generateNotification('error','quantity must be an integer and greater than 0');

      check = 0;

    }

    if(check == 1)

      $('#update-cart').submit();

    

});

        $('.btn-number').click(function(e){

          e.preventDefault();



          fieldName = $(this).attr('data-field');

          type      = $(this).attr('data-type');

          var input = $("input[name='"+fieldName+"']");

          var currentVal = parseInt(input.val());

          if (!isNaN(currentVal)) {

              if(type == 'minus') {



                  if(currentVal > input.attr('min')) {

                      input.val(currentVal - 1).change();

                  }



              } else if(type == 'plus') {



                  if(currentVal < input.attr('max')) {

                      input.val(currentVal + 1).change();

                  }



              }

          } else {

              input.val(1);

          }

      });

</script>

@endsection


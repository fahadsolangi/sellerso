@extends('layouts.main')
@section('content')
  <div class="inner-banner">
    <div class="container">
    <div class="comment-box contact-box">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{$data['curOrder']->invoice_number}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-3">
    				<address>
    				<strong>Billed To:</strong><br>
    					Name : {{$data['curOrder']->billing_first_name}} {{$data['curOrder']->billing_last_name}}<br>
						Phone : {{$data['curOrder']->billing_phone}}<br>
    					Street Address : {{$data['curOrder']->billing_address}}<br>
    					Apartment : {{$data['curOrder']->billing_apartment}}<br>
    					Country : {{$data['curOrder']->billing_country}} <br>City : {{$data['curOrder']->billing_city}}<br>State :  {{$data['curOrder']->billing_state}}<br>Zip Code : {{$data['curOrder']->billing_zip}}
    				</address>
    			</div>
    			<div class="col-xs-3 col-xs-offset-3 text-left">
    				<address>
        			<strong>Subscription Details:</strong><br>
    					@if(isset($data['curOrder']->subscription_trail_start))
                        Trail Start Date: {{date('d-m-Y',strtotime($data['curOrder']->subscription_trail_start))}}<br>
                        @endif

                        @if(isset($data['curOrder']->subscription_trail_end))
                        Trail End Date: {{date('d-m-Y',strtotime($data['curOrder']->subscription_trail_end))}}<br>
						@endif

                        @if(isset($data['curOrder']->subscription_start_date))
                        Plan Start Date : {{date('d-m-Y',strtotime($data['curOrder']->subscription_start_date))}}<br>
    					@endif

                        @if(isset($data['curOrder']->subscription_end_date))
                        Plan End Date : {{date('d-m-Y',strtotime($data['curOrder']->subscription_end_date))}}<br>
    					@endif
                        Subscription Status : {{$data['curOrder']->payment_status_message }}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-3">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ date('Y-F-d H:i:s a',strtotime($data['curOrder']->created_at))}}<br><br>
    				</address>
    			</div>
    		</div>
     </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                    <td class="text-right"><strong>Subscription Status</strong></td>
                                    <td class="text-right"><strong>Order Remarks</strong></td>
        							<td class="text-right"><strong>Action</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    						<?php $subtotal = 0;
                            //dd($data['curOrderDet']);
                             ?>

							@foreach($data['curOrderDet'] as $items)
    							<tr>
                                <?php
                                    $subtotal+= ($items->product_qty*$items->product_price);
                                    $name = Helper::returnRow("package","id = ".$items->product_id);
                                ?>
				    				<td class="">{{ $items->product_name}}</td>   
                                    <td class="text-center">${{number_format($items->product_price,2)}}</td>
								    <td class="text-center">{{$items->product_qty}}</td>
                                    <td class="text-right">$<?php echo number_format($items->product_qty*$items->product_price,2, '.', ''); ?></td>
                                    <td class="text-right"><?=(isset($data['stripe_subscpt'][$items->orders_products_id]->status) ? $data['stripe_subscpt'][$items->orders_products_id]->status : '')?></td>
                                    <td class="text-right"><?=$items->user_subscription_api_error.' '.$items->user_registration_api_error?></td>
    								<td class="text-right"><a href="javascript:void(0);" class="btn btn-primary">Cancel Subscription</a></td>
                                </tr>
                            @endforeach
								<tr>
    								<td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">${{number_format($subtotal, 2, '.', '')}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">${{number_format($subtotal, 2, '.', '')}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

</div>
</div>
</div>
<div class="clearfix"></div>
  @endsection
  @section('pageJS')

@endsection

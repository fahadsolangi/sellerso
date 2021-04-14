@extends('supplier.layout.main')
@section('content')
<section class="account-sec padding-70">
  <div class="container">
    <div class="row">
      <div class="justify-accountcontent-center">
  <div class="col-md-12" style="margin-top: 37px;background: white;">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order #
                 {{$orders->invoice_number}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					Name : {{$orders->billing_first_name}}<br>
                       
						Phone : {{$orders->billing_phone}}<br>
    					Street Address : {{$orders->billing_address}}<br>
    					Apartment : {{$orders->billing_apartment}}<br>
    					Country : {{$orders->billing_country}} <br>City : {{$orders->billing_city}}<br>State :  {{$orders->billing_state}}<br>Zip Code : {{$orders->billing_zip}}
    				</address>
    			</div>
    			<div class="col-xs-3 col-xs-offset-3 text-left">
    				<address>
        			<strong>Shipped To:</strong><br>
    					Name : {{$orders->shipping_first_name}}<br>
						Phone : {{$orders->shipping_phone}}<br>
    					Street Address : {{$orders->shipping_address}}<br>
    					Country : {{$orders->shipping_country}}<br>
						City : {{$orders->shipping_city}}<br>
						State : {{$orders->shipping_state}}<br>
						Zip Code : {{$orders->shipping_zip}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-3">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ date('Y-F-d H:i:s a',strtotime($orders->created_at))}}<br><br>
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
                                </tr>
    						</thead>
    						<tbody>
    						<?php $subtotal = $orders->total_amount; ?>

								<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">${{number_format($subtotal, 2, '.', '')}}</td>
    							</tr>
    							<tr>
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
</div>
</div>
</section>

  @endsection
  @section('pageJS')
<script>
$(document).ready(function() {
 
});
</script>
@endsection
@section('pageCSS')
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}
#payment_form_submit{
	display:none;
}
.table > tbody > tr > .no-line {
    border-top: none;
}
.table > thead > tr > .no-line {
    border-bottom: none;
}
.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
@endsection
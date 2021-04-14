<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Order Confirmation</title>
</head>
<style>
    table tr:first-child > td > center{
        /*background: #ff0000;*/
    }
</style>
<body>

<table style="background:#FFFF; border:#01D1C4 3px solid;" width="900" cellspacing="0" cellpadding="0" border="0"
       align="center">
    <tbody>
    <tr class="first">
        <td>
            <center>
                <img src="{{asset('images/email_logo.png')}}" style="padding: 15px;height:100px" >
            </center>
        </td>
    </tr>
    <tr>
        <td height="1"></td>
    </tr>
    <tr>
        <td style="font-family:Arial, Helvetica, sans-serif;" bgcolor="#f5f9f6">
            <table width="900" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                    <?php $subtotalt=0; ?>
		@foreach($order_products as $item)
		<?php 
			$subtotalt+= ($item->product_qty*$item->product_price);
		?>
		@endforeach
                <tr>
                    <td style="padding:8px 15px;"><p><strong>Dear {{$data->billing_first_name}} {{$data->billing_last_name}}</strong></p></td>
                </tr>
                <!--<tr>-->
                <!--    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">-->
                <!--    <h4><b><a href="{{ url('invoice',$data->order_id) }}">Click here to see invoice</a></b></h4>-->
                <!--    </td>-->
                <!--</tr>-->
                <tr style="margin:20px 0; float:left;height:50px;     background-color: #01D1C4;" bgcolor="#68A13E">
                    <td width="900">
                        <table style="margin-top:20px;" width="900" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                            <tr style="color:#fff;  ">

                                <td width="251" align="left ">Order# : <b>{{$data->invoice_number}}</b></td>
                                
                                <td width="50">&nbsp;</td>
                            

                                <td width="50">&nbsp;</td>
                                <td width="300" align="right">Order date : {{ date('Y-F-d H:i:s a',strtotime($data->created_at))}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">
                        <!-- <strong>
                            Expected delivery within 5 working days (please allow for up to 10 working days for delivery outside the UK).
                        </strong><br /> -->
                        Your email ID: {{$data->billing_email}} <br>
                        <!--Your delivery address: <?/*=$userdata['signup_address1']*/?> <br>-->
                        <!-- Scedule date & time : <strong></strong> -->
                    </td>
                </tr>

                <tr style="margin:0px 0; float:left; height:50px;" bgcolor="#f6f5f5">
                    <td width="900">
                        <table style="margin-top:15px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                            <tr style="color:#000;  ">
                                <td style="font-size:28px;" width="251" align="left ">Payment details</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr style="float:left; padding:0 0 10px;border-bottom: 1px solid #cbcaca; margin-bottom:15px; "
                    bgcolor="#f6f5f5">

                    <td width="900">
                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                                <?php $subtotal = 0; ?>
                                @foreach($order_products as $items)
                                <?php
                                    $subtotal+= ($items->product_qty*$items->product_price);
                                    $shipping = $data->shipping_rate;
                                    $discount = $data->discountprice;
                                    $totalamount = $data->total_amount;
                                    $name = Helper::returnRow("products","id = ".$items->product_id)
                                ?>
                                <tr style="color:#000; height:30px;  ">
                                    <td colspan="3" width="251" align="left">
                                        Product Name : {{$items->product_name}}
                                    </td>
                                </tr>
                                    <tr style="color:#000; height:30px;  ">
                                        <td width="251" align="left ">
                                            Sub total (Qty {{$items->product_qty}})
                                        </td>
                                        <td width="50">&nbsp;</td>
                                        <td width="251" align="right">$<?php echo number_format($items->product_qty*$items->product_price,2, '.', ''); ?></td>
                                    </tr>
                                <?
                                endforeach;?>

                            <tr>
                                <td colspan="3" style="color:#000;font-weight:bold">
                                    ------------------------------------------------------------------------------------------------------------
                                </td>
                            </tr>
                            <!--<tr style="color:#000;height:30px;">-->
                            <!--    <td width="251" align="left"><strong>Shipping</strong></td>-->
                            <!--    <td width="50">&nbsp;</td>-->
                            <!--    <td width="251" align="right"><strong>£{{number_format($shipping, 2, '.', '')}}</strong></td>-->
                            <!--</tr>-->
                            <!--<tr style="color:#000;height:30px;">-->
                            <!--    <td width="251" align="left"><strong>Discount</strong></td>-->
                            <!--    <td width="50">&nbsp;</td>-->
                            <!--    <td width="251" align="right"><strong>£{{number_format($discount, 2, '.', '')}}</strong></td>-->
                            <!--</tr>-->
                            <tr style="color:#000;height:30px;">
                                <td width="251" align="left"><strong>Total</strong></td>
                                <td width="50">&nbsp;</td>
                                <td width="251" align="right"><strong>${{number_format($totalamount, 2, '.', '')}}</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
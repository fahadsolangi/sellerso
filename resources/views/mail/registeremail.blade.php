<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Registration Email</title>
</head>
<style>
    table tr:first-child > td > center{
        /*background: #ff0000;*/
    }
</style>
<body>

<table style="background:#ffffff;  border:#01D1C4 3px solid;;" width="900" cellspacing="0" cellpadding="0" border="0"
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
                  
                <tr>
                    <td style="padding:8px 15px;"><p><strong>Dear {{ $data->name }}, </strong></p>
					<p><b>Thank you for your registration</b> </p>
                    <p><b>Please click on below link for email verfication</b> </p>
                    <a href="{{($data->role == 1 ? route('supplier_login') : route('login'))}}?verified={{$data->verified}}">Verify Email</a>  
					</td>
                </tr>
                <!--<tr>-->
                <!--    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">-->
                <!--    <h4><b><a href="{{ url('invoice',$data->order_id) }}">Click here to see invoice</a></b></h4>-->
                <!--    </td>-->
                <!--</tr>-->
                <tr>
                    <td width="900">
                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                            <tr><td width="251" align="left ">Account Type : <b>{{($data->role == 1 ? 'Seller' : 'Customer')}}</b></td> </tr> 
                            <tr><td width="251" align="left ">Name : <b>{{$data->name}}</b></td> </tr>   
                            <tr><td width="251" align="left ">Email: <b>{{$data->email}}</b></td></tr>
							</tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;"><p><strong>Seller Softwares </strong></p>
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
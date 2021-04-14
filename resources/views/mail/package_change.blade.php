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

<table style="background:#ffffff; border:#000000 1px solid;" width="622" cellspacing="0" cellpadding="0" border="0"
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
            <table width="622" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                  
                <tr>
                    <td style="padding:8px 15px;"><p><strong>Dear {{ $userdetail->name }}, </strong></p>
					<p><b>Supplier has been done some changes in package. You can subscribe again by using your seller software account.</b> </p>
                    <p><b>Kindly check below is details of updated plan.</b> </p>
                    </td>
                </tr>
                <tr>
                    <td width="622">
                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                            <tr><td width="251" align="left ">Package Name : <b>{{$pachage_data->name}}</b></td> </tr> 
                            <tr><td width="251" align="left ">Price : <b>{{$pachage_data->price}}</b></td> </tr>   
                            <tr><td width="251" align="left ">Month : <b>{{$pachage_data->months}}</b></td></tr>
							</tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;">
                        <p><strong>Thanks, </strong></p>
                        <p><strong>Best Regard's, </strong></p>
                        <p><strong>Seller Softwares </strong></p>
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
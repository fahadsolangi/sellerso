<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Reset Email</title>
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
                    <td style="padding:8px 15px;"><p><strong>Dear {{ $data['name'] }}, </strong></p>
					<p><b>Please click on below link for reset email</b> </p>
                    <a href="{{ route('home')}}/password/reset/{{$data['remember_token']}}">Reset Password LINK</a>  
					</td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;">
                        <p><strong>Best Regard's</strong></p>
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
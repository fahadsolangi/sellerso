<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Error with supplier connection</title>
</head>
<style>
    table tr:first-child > td > center{
        /*background: #ff0000;*/
    }
</style>
<body>

<table style="background:#ffffff;  border:#01D1C4 3px solid;" width="900" cellspacing="0" cellpadding="0" border="0"
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
                    <td style="padding:8px 15px;"><p><strong>Dear {{ $data['name'] }}, </strong></p>
                    <p><b>{!! $data['message'] !!}</b> </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;">
                        <p><strong>Regard's,</strong></p>
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
<?php
$automessage = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Smart forms - Email message template</title>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center>
        <table style="padding:15px 15px;background:#F4F4F4;width:100%;font-family:arial" cellpadding="0" cellspacing="0">

                <tbody>
                    <tr>
                        <td>

                            <table style="max-width:540px;min-width:320px" align="center" cellspacing="0">
                                <tbody>

                                    <tr>
                                        <td style="background:#fff;border:1px solid #D8D8D8;padding:30px 30px" align="center">

                                            <table align="center">
                                                <tbody>

                                                    <tr>
                                                        <td style="border-bottom:1px solid #D8D8D8;color:#666;text-align:center;padding-bottom:30px">

                                                            <table style="margin:auto" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="color:#005f84;font-size:22px;font-weight:bold;text-align:center;font-family:arial">
                                                                            ORDER CONFIRMATION
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                               <td style="color:#666;padding:15px; padding-bottom:0;font-size:14px;line-height:20px;font-family:arial;text-align:left">

                                                    <div style="font-style:normal;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left">

                                                        <p> Hello <span style="font-weight:bold;color:#4296CE;font-size:16px">'.$_POST['stripeBillingName'].'</span>
														we have received your order and we thank you kindly.  Please allow 3-5 business days for handling.  We will contact you with your tracking number once your order has shipped.</p>

														<p style="border-bottom:1px solid #D8D8D8; height:0; color:#666;text-align:center;padding:15px 0 0 0"></p>
														<p><span style="font-weight:bold;font-size:16px">Order QTY:</span> '.$_POST['qty'].'</p>
                                                        <p><span style="font-weight:bold;font-size:16px;">Shipping Address:</span> </p>
                                                        <p style="margin-bottom:0;"> '.$_POST['stripeShippingAddressLine1'].'</br>
                                                                                     '.$_POST['stripeShippingAddressCity'].', '.$_POST['stripeShippingAddressState'].' ' . $_POST['stripeShippingAddressZip'].'
                                                         </p>

                                                      </div>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table style="max-width:650px" align="center">
                                <tbody>
                                    <tr>
                                        <td style="color:#b4b4b4;font-size:11px;padding-top:10px;line-height:15px;font-family:arial">
                                            <span> &copy; TheGearSafe 2014 - '.$currYear.' - ALL RIGHTS RESERVED </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
            </tbody>
        </table>
    </center>
</body>
</html>';
?>

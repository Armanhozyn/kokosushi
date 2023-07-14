<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!--[if gte mso 9]><xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <!-- fix outlook zooming on 120 DPI windows devices -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
    <meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS 7-9 -->
    <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS 7-9 -->
    <title>New Order | Kokorosushi</title>

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-spacing: 0;
        }

        table td {
            border-collapse: collapse;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .ReadMsgBody {
            width: 100%;
            background-color: #ebebeb;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        .yshortcuts a {
            border-bottom: none !important;
        }

        @media screen and (max-width: 599px) {
            .force-row,
            .container {
                width: 100% !important;
                max-width: 100% !important;
            }
        }
        @media screen and (max-width: 400px) {
            .container-padding {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }
        .ios-footer a {
            color: #aaaaaa !important;
            text-decoration: underline;
        }
        a[href^="x-apple-data-detectors:"],
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
    </style>
</head>

<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
    <tr>
        <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

            <br>

            <!-- 600px container (white background) -->
            <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
                <tr>
                    <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px">
                        <img style="width: 100%" src="https://kokorosushi.be/assets/images/kokorosushi-logo.png">
                    </td>
                </tr>
                <tr>
                    <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
                        <br>

                        <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Order Details</div>
                        <br>

                        <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
                            <table border="1" cellpadding="2" width="100%">
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>


                                </tr>
                                <?php
                                $sl = 1;
                                foreach($cart_contents as $items): ?>
                                    <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $this->Product_Model->getDisplayCode($items['id']); ?></td>
                                    <td>
                                    <div style="font-size: 16px;"><?php echo $items['name']; ?></div>
                                    <div style="color: #ff3131;"><b>sauce: </b><?php echo $items['sauce_select'] ?></div>
                                        <div><strong>Note: </strong><?php echo @$this->Shopping_cart_model->get_note($items['rowid']) ?></div>
                                    </td>
                                    <td><?php echo $items['qty']; ?></td>
                                    <td>€<?php echo $this->cart->format_number($items['price']); ?></td>
                                    <td>€<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                    </tr>
                                <?php
                                $sl++;
                                endforeach; ?>

                                <tr>
                                    <td colspan="5"  align="right"><strong>Grand Total</strong></td>



                                    <td><strong>€<?php echo $this->cart->total(); ?></strong></td>

                                </tr>
                                <tr>
                                    <td colspan="5"  align="right"><strong>Delivery Method</strong></td>



                                    <td><strong><?php echo $checkoutInfo['payment_method']; ?></strong></td>

                                </tr>
                            </table>

                            <br><br>
                            <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Customer & Shipping Details</div>
                            <table>
                                <tr>
                                    <td style="min-width: 100px">Full Name</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['full_name']; ?></td>

                                </tr>

                                <tr>
                                    <td style="min-width: 100px">Phone Number</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['telephone']; ?></td>

                                </tr>
                                <tr>
                                    <td style="min-width: 100px">Address</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['address']; ?></td>

                                </tr>

                                <tr>
                                    <td style="min-width: 100px">City</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['city']; ?></td>

                                </tr>
                                <tr>
                                    <td style="min-width: 100px">Postal Code</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['zip']; ?></td>

                                </tr>
                                <tr>
                                    <td style="min-width: 100px">Country</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['country']; ?></td>
                                </tr>

                                <tr>
                                    <td style="min-width: 100px">Comment/Note</td>
                                    <td style="min-width: 10px;">:</td>
                                    <td><?php echo $checkoutInfo['note']; ?></td>
                                </tr>



                            </table>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
                        <br><br>
                        Copyright: © <?php echo date('Y'); ?> KOKORO SUSHI & BENTO.
                        <br><br>



                        <strong>KOKORO SUSHI & BENTO.</strong><br>
                        <span class="ios-footer">
             Corbiestraat 21 - 2400 Mol<br>
              + 32 14 872 587<br>
               kokorosushimol2400@gmail.com<br>

            </span>

                        <a href="https://www.kokorosushi.be/" style="color:#aaaaaa">www.kokorosushi.be</a><br>

                        <br><br>

                    </td>
                </tr>
            </table>
            <!--/600px container -->


        </td>
    </tr>
</table>
<!--/100% background wrapper-->

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Print</title>

    <style>
        body{
            /*width: 80mm;*/
        }
        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 80mm;
            background: #fff;
        }
        #invoice-POS ::selection {
            background: #f31544;
            color: #fff;
        }
        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #fff;
        }
        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }
        #invoice-POS h2 {
            font-size: 0.9em;
        }
        #invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }
        #invoice-POS p {
            /*font-size: 0.7em;*/
            font-size: 1em;
            color: #666;
            line-height: 1.2em;
        }
        #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #eee;
        }
        #invoice-POS #top {
            min-height: 100px;
        }
        #invoice-POS #mid {
            min-height: 80px;
        }
        #invoice-POS #bot {
            min-height: 50px;
        }
        #invoice-POS #top .logo {
            height: 60px;
            width: 60px;
            background: url("<?php echo base_url() ?>assets/images/logo_pos.png") no-repeat;
            background-size: 60px 60px;
        }
        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }
        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }
        #invoice-POS .title {
            float: right;
        }
        #invoice-POS .title p {
            text-align: right;
        }
        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }
        #invoice-POS .tabletitle {
            font-size: 1em;
            background: #eee;
        }
        #invoice-POS .service {
            border-bottom: 1px solid #eee;
        }
        #invoice-POS .item {
            width: 40mm;
        }
        #invoice-POS .itemtext {
            font-size: 1em;
        }
        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }

    </style>
</head>
<body>


<div id="invoice-POS">

    <center id="top">
        <div class="logo"></div>
        <div class="info">
            <h2>KOKORO SUSHI</h2>
        </div><!--End Info-->
    </center><!--End InvoiceTop-->

    <div id="mid">
        <div class="info">
            <h2>Contact Info</h2>
            <p>
                Address : Corbiestraat 21 - 2400 Mol</br>
                Email   : kokorosushi21@gmail.com</br>
                Phone   : + 32 14 872 587</br>
            </p>
        </div>
    </div><!--End Invoice Mid-->

    <div id="bot">
<h2>Order Details #<?php echo $orderInfo->order_id; ?></h2>

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="Hours"><h2>Qty</h2></td>
                    <td class="Rate"><h2>Sub Total</h2></td>
                </tr>

                <?php foreach ($orderItemList as $item): ?>
                    <tr class="service">
                        <td class="tableitem"><p class="itemtext"><?php echo $item['name'] ?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item['qty'] ?></p></td>
                        <td class="tableitem"><p class="itemtext">€<?php echo $item['total_price'] ?></p></td>
                    </tr>
                <?php endforeach; ?>
<!---->
<!--                <tr class="service">-->
<!--                    <td class="tableitem"><p class="itemtext">Communication</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">5</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">$375.00</p></td>-->
<!--                </tr>-->
<!---->
<!--                <tr class="service">-->
<!--                    <td class="tableitem"><p class="itemtext">Asset Gathering</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">3</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">$225.00</p></td>-->
<!--                </tr>-->
<!---->
<!--                <tr class="service">-->
<!--                    <td class="tableitem"><p class="itemtext">Design Development</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">5</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">$375.00</p></td>-->
<!--                </tr>-->
<!---->
<!--                <tr class="service">-->
<!--                    <td class="tableitem"><p class="itemtext">Animation</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">20</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">$1500.00</p></td>-->
<!--                </tr>-->
<!---->
<!--                <tr class="service">-->
<!--                    <td class="tableitem"><p class="itemtext">Animation Revisions</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">10</p></td>-->
<!--                    <td class="tableitem"><p class="itemtext">$750.00</p></td>-->
<!--                </tr>-->


<!--                <tr class="tabletitle">-->
<!--                    <td></td>-->
<!--                    <td class="Rate"><h2>tax</h2></td>-->
<!--                    <td class="payment"><h2>$419.25</h2></td>-->
<!--                </tr>-->

                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate"><h2>Total</h2></td>
                    <td class="payment"><h2><?php echo $orderInfo->grand_total; ?></h2></td>
                </tr>

            </table>
        </div><!--End Table-->
        <div>
            <h2> Customer & Shipping Details</h2>
            <p>
            First Name	:	<?php echo $orderInfo->first_name ?><br/>
            Last Name	:	<?php echo $orderInfo->last_name ?><br/>
            Phone Number	:	<?php echo $orderInfo->telephone ?><br/>
            Address 1	:	<?php echo $orderInfo->address1 ?><br/>
            Address 2	:   <?php echo $orderInfo->address2 ?><br/>
            City	:	<?php echo $orderInfo->city ?><br/>
            Postal Code	:	<?php echo $orderInfo->zip ?><br/>
            Country	:	<?php echo $orderInfo->country ?><br/>
            Comment/Note :	<?php echo $orderInfo->note ?></p>

        </div>

        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your purchase!</strong>
            </p>
        </div>

    </div><!--End InvoiceBot-->
</div><!--End Invoice-->

</body>
</html>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="row">
    <div class="col-sm-12 mgb-20">

        <?php echo form_open('',array('autocomplete'=>'off')); ?>
        <h2>Checkout</h2>

        <?php if(validation_errors()): ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <p></p>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Billing Details</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="telePhone">Phone Number</label>
                        <input type="text" name="telephone" class="form-control" id="telePhone"  autocomplete="NoAutocomplete" >
                    </div>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" name="full_name" class="form-control" id="fullName">
                    </div>
<!--                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="firstName">
                    </div>-->
<!--                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="lastName" >
                    </div>-->
<!--                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="text" name="email" class="form-control" id="emailAddress" >
                    </div>-->


                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address1">Address</label>
                        <input type="text" name="address" class="form-control" id="address1" >
                    </div>
 <!--                   <div class="form-group">
                        <label for="address1">Address 1</label>
                        <input type="text" name="address1" class="form-control" id="address1" >
                    </div>
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" name="address2" class="form-control" id="address2" >
                    </div>-->
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city" >
                    </div>
                    <div class="form-group">
                        <label for="zip">Postal Code</label>
                        <input readonly type="text" name="zip" class="form-control" id="zip" value="<?php echo $this->session->userdata('zip_code');  ?>">
                        <div><a onclick="changeZip(this)" href="javascript: void(0);">Change</a></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <select name="country" onchange="preventChange()" class="form-control" id="country">
                            <option value="">Select</option>
                            <?php
                            $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                            foreach($countries as $country):
                                ?>
                                <option value="<?php echo $country; ?>"<?php echo $country == 'Belgium'? ' selected="selected"': null ?>><?php echo $country; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment/Note (optional)</label>
                        <textarea class="form-control" rows="5" id="comment" name="note"></textarea>
                    </div>

                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Payment Method</h3>
            </div>
            <div class="panel-body">

                <?php if($this->session->has_userdata('zip_code') && $this->session->userdata('zip_code') != 0 && $this->session->has_userdata('zip_code') && $this->session->userdata('zip_code') != 0 && $this->cart->total() > 19): ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="payment_method" id="optionsRadios1" value="Cash on Delivery" checked="checked">
                        Cash on delivery
                    </label>

                </div>
                <?php endif; ?>
                <div class="radio">
                <label>
                    <input type="radio" name="payment_method" id="optionsRadios1" value="Take Away" checked>
                    Take Away
                </label>
                    <?php if($this->session->userdata('zip_code') && $this->session->userdata('zip_code') == 2400 ): ?>
                        <?php if($this->cart->total() < 20): ?>
                            <p style="color: red"><strong>Special Note: </strong> We do not deliver food to home for below €20 Euro in 2400 Mol, Belgium. </p>
                        <?php endif; ?>
                    <?php else: ?>
                        <h3 style="color: red">
                            Please call us to know the minimum order amount to get delivery at your home outside of Mol, Belgium. Phone: <a href="callto:+3214872578">+ 32 14 872 578</a></h3>
                    <?php endif; ?>


                </div>
<!--                <div class="radio">
                    <label>
                        <input type="radio" name="payment_method" id="optionsRadios1" value="portwallet" checked>
                        PortWallet
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="payment_method" id="optionsRadios2" value="bank_transfer" disabled="disabled">
                        Bank Transfer
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="payment_method" id="optionsRadios2" value="bkash" disabled>
                        bKash
                    </label>
                </div>-->
            </div>
        </div>
        <div><button type="submit" class="btn btn-success btn-md pull-right">Confirm Order</button></div>

        <?php echo form_close(); ?>
        <hr/>



        <div class="snippet-clear"></div>

    </div>
</div>

<!-- Change Zip Modal -->
<div class="modal fade" id="changeZipModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Postal Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code">Postal Code</label>
                    <input type="number" class="form-control" id="postal-code" placeholder="Enter Postal Code">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="zip-save-btn" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> <!-- Change Zip Modal ends -->

<script>

    $(function () {
       //telePhone
        // Single Select
        $( "#telePhone" ).autocomplete({
            source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url: "<?php echo site_url("order_manager/get_order_contacts_ajax"); ?>",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                $('#telePhone').val(ui.item.label); // display the selected text
               // $('#selectuser_id').val(ui.item.value); // save selected id to input
                getOrderInfo(ui.item.value);
                return false;
            },
            minLength: 4
        });
    });


    function changeZip(el){
        $("#postal-code").val( $("#zip").val());
        $("#changeZipModal").modal('show');
    }

    $("#zip-save-btn").click(function () {
        $.ajax({
            url: "<?php echo base_url(); ?>shopping_cart/change_zip",
            method: "POST",
            data: {

                zip: $("#postal-code").val(),

            },
            success: function (data) {
                //$("#zip").val($("#postal-code").val());
                if(data.status == 1){
                    $("#changeZipModal").modal('hide');
                    $("#zip").val($("#postal-code").val());
                    $.notify("<strong>Success!</strong><br />Postal Changed Successfully", {
                        animate: {
                            enter: 'animated rollIn',
                            exit: 'animated rollOut'
                        },
                        type: 'success'
                    });

                }else if(data.status == -1){


                    $.notify("<strong>Error!</strong><br />" + data.error, {
                        animate: {
                            enter: 'animated rollIn',
                            exit: 'animated rollOut'
                        },
                        type: 'danger'
                    });
                }


            }
        });
    });


    function getOrderInfo(orderId){
        var firstName = $("#firstName");
        var lastName = $("#lastName");
        var phoneNumber = $("#telePhone");
        var address1 = $("#address1");
        var address2 = $("#address2");
        var city = $("#city");
        var postal = $("#zip");

        $.ajax({
            url: "<?php echo base_url(); ?>order_manager/orderinfo_ajax",
            method: "POST",
            data: {

                order_id: orderId,

            },
            success: function (data) {
              if(data.status == 1){
                  firstName.val(data.data.first_name);
                  lastName.val(data.data.last_name);
                  phoneNumber.val(data.data.telephone);
                  address1.val(data.data.address1);
                  address2.val(data.data.address2);
                  city.val(data.data.city);
                  postal.val(data.data.zip);
              }
            }
        });
    }


</script>
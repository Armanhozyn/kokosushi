<div class="row"> 

                    <div class="col-sm-6">

                      <div class="cart-item-title"><strong><?php echo "{$product_info->display_id}) {$product_info->name}";?></strong></div>

                      <div class="card-item-price" style="margin-left: 30px; font-weight: bold;">€<span id="hp_final_cost"><?php echo $this->cart->format_number($product_info->price); ?></span></div>

                    </div>



					<div class="col-sm-6">

                        <div class="form-group">

                            <label for="itemNote">Note (optional)</label>

                            <textarea name="item_note" class="form-control" id="itemNote" rows="2" cols="5"></textarea>

                        </div>

					</div>

</div>

   <input type="hidden" id="selected_item_id" value="<?php echo $product_info->id ?>">

					<input type="hidden" id="selected_item_price" value="<?php echo $this->cart->format_number($product_info->price); ?>">





<div class="row">

    <div class="col-md-6">



        <?php  if(!empty($size_list)):?>



            <?php

            $i = 0;

            $extra = 0;

        foreach ($size_list as $item):

            if($i==0){

                $extra = $item['attr_id'];

            }

            ?>

            <div class="form-check">

                <label class="form-check-label">

                    <input class="form-check-input" type="radio" name="item_option_id" data-price="<?php echo $this->cart->format_number($item['price'] + $product_info->price); ?>" value="<?php echo $item['attr_id']; ?>" <?php echo $i==0 ? 'checked="checked"': '' ?> onclick="sizeChange(this);">



                    <span><?php echo $item['attr_value'] ?></span>

                    <span>€<?php echo $this->cart->format_number($item['price'] + $product_info->price);  ?></span>



                </label>

            </div>



        <?php

        $i++;

        endforeach;?>

            <input type="hidden" id="extra_id" value="<?php echo $extra; ?>">







        <?php endif;?>

    </div>



    <div class="col-md-6">



        <a href="javascript:void(0);" onclick="addToCart()" class="btn btn-sm btn-round btn-danger card-btn">Add to Cart</a>

    </div>

</div>

<script>

    function sizeChange(el){

        //alert("Works!");

        var basePriceSelector = $("#hp_final_cost");

        var hiddenProductId = $("#selected_item_id");

        var hiddenPrice = $('#selected_item_price');

        var hiddenExtraId = $("#extra_id");

        var sizePrice = parseInt($(el).data('price'));

        basePriceSelector.text(sizePrice);

        hiddenExtraId.val($(el).val());

        hiddenPrice.val(sizePrice);

    }



    function addToCart(){

        var basePriceSelector = $("#hp_final_cost");

        var hiddenProductId = $("#selected_item_id");

        var hiddenPrice = $('#selected_item_price');

        var hiddenExtraId = $("#extra_id");



        $.ajax({

            url: "<?php echo base_url(); ?>shopping_cart/add",

            method: "POST",

            data: {

                product_id: <?php echo $product_info->id; ?>,

                product_name: "<?php echo str_replace(array("\n", "\r"), '', $product_info->name); ?>",

                product_price: hiddenPrice.val(),

                quantity: 1,

                extra_id: hiddenExtraId.val(),

                note: $("#itemNote").val()

            },

            success: function (data) {

                if(data.status == 1){

                    $('#addToCartWithExtraModal').modal('hide');

/*                    $.notify("<strong>Success!</strong><br />Item added to cart.", {

                        animate: {

                            enter: 'animated rollIn',

                            exit: 'animated rollOut'

                        },

                        type: 'success'

                    });*/

                }else if(data.status == 0){



                    /********

                     * Show postal code Modal

                     * ****/

                    var pidInput = $("#pid-input");

                    $('#addToCartModal').modal('show');

                    pidInput.val(product_id);



                }else{

                    $.notify("<strong>Error!</strong><br />Something wrong. Please try again later.", {

                        animate: {

                            enter: 'animated rollIn',

                            exit: 'animated rollOut'

                        },

                        type: 'danger'

                    });

                }





                // alert("Product Added into Cart");

                console.log('add time response',data);

                $('#cart-data').html(data.html);

                getCartQtyAjaxCount();

                qtySelector.val(1);

            }

        });

    }





</script>

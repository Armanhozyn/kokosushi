<div class="fixed top-[0%] left-[5%] z-20 h-screen container px-10 mx-auto flex items-center justify-center">
        <div class="cart w-full  md:w-10/12 lg:w-8/12 xl:w-7/12  bg-gray-100 p-10 pt-10 sm:p-12 md:px-14 lg:px-20 rounded-3xl shadow-inner shadow-gray-400 relative drop-shadow-2xl mr-[13%] sm:mr-0">
            <div class="cart-header flex justify-between">
                <h2 class="text-[#ff3131] font-semibold text-lg md:text-xl"><span><i class="fa-solid fa-cart-shopping pr-2 pb-7"></i></span>Add to Cart</h2>
                <!-- <i onclick="hide_cart_part();" class="fa-solid fa-xmark text-xl text-[#fc0c0d] md:text-2xl py-2 px-4"></i> -->
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-semibold"><?php echo "{$product_info->display_id}) {$product_info->name}";?></h2>
                <ul>
                    <li class="text-lg font-semibold pb-6"><span><i class="fa-solid fa-euro-sign"></i></span><span id="hp_final_cost"><?php echo $this->cart->format_number($product_info->price); ?></span></li>
                </ul>
                <div class="cart-mid-flex sm:flex justify-between items-center">
                    <div class="cart-mid-1">
                    <input type="hidden" id="selected_item_id" value="<?php echo $product_info->id ?>">
                    <input type="hidden" id="selected_item_price_extra" value="<?php echo $this->cart->format_number($product_info->price); ?>">
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
                        <?php $i++;endforeach;?>
                        <input type="hidden" id="extra_id" value="<?php echo $extra; ?>">
                        <?php endif;?>
                        <!-- <h2 class="font-semibold text-2xl md:text-3xl">Sauce Choice</h2>
                        <?php foreach ($sauce_list as $item): ?>
                            <input type="checkbox" name="sauce_" value="<?php echo $item->sauce_id;  ?>" id="souce<?php echo $item->sauce_id;  ?>" >
                            <label for="souce<?php echo $item->sauce_id;  ?>" class="text-gray-600 md:text-lg"><?php echo "{$item->display_code}) {$item->souce_name}"; ?></label><br>
                        <?php endforeach; ?> -->
                        <button id="close_cart_2" onclick="hide_cart_part_2()" class="bg-[#fc0c0d] shadow-sm text-sm md:text-md shadow-[#fc0c0d] px-5 py-1 text-white rounded-3xl mt-5  hover:shadow-none">Close</button>
                    </div>
                    <div class="cart-mid-2 sm:absolute top-10 right-10 md:right-14 lg:right-20">
                        <h2 class="pt-7 text-lg md:text-xl pb-5">Note (Optional)</h2>
                        <div class="text-size space-y-5 ">
                            <textarea onkeydown="noteChange(this)" onchange="noteChange(this)" name="item_note" id="itemNote" cols="20" rows="4" class="sm:mx-auto block  rounded-2xl shadow-inner shadow-gray-300 outline-none p-5"></textarea>
                            <button class="bg-gradient-to-r from-[#fe1e62] via-[#fe5568] to-[#fe8a6d] shadow-sm text-sm md:text-md shadow-[#fc0c0d] px-3 py-1 text-white rounded-lg hover:shadow-none"><a href="javascript:void(0);" onclick="addToCart()" class="card-btn">Add To Cart</a></button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>








<script>

    function sizeChange(el){

        //alert("Works!");

        var basePriceSelector = $("#hp_final_cost");

        var hiddenProductId = $("#selected_item_id");

        var hiddenPrice = $('#selected_item_price_extra');

        var hiddenExtraId = $("#extra_id");

        var sizePrice = parseInt($(el).data('price'));

        basePriceSelector.text(sizePrice);

        hiddenExtraId.val($(el).val());

        hiddenPrice.val(sizePrice);

    }



    function addToCart(){

        var basePriceSelector = $("#hp_final_cost");

        var hiddenProductId = $("#selected_item_id");

        var hiddenPrice = $('#selected_item_price_extra');

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
                    toastr.success('Item added successfully')
                    let add_cart_section_2 = $("#add-cart-modal-2");
                    if(!add_cart_section_2.hasClass("hidden")){
                            add_cart_section_2.removeClass('fadeIn');
                            add_cart_section_2.addClass('fadeOut');
                            setTimeout(function () {
                                let full_width_2 = $('#full_width');
                                full_width_2.addClass('bg-white');
                                full_width_2.removeClass('blur-md');
                                full_width_2.removeClass('opacity-50');
                                full_width_2.removeClass('bg-gray-500');
                                add_cart_section_2.addClass('hidden');
                                add_cart_section_2.removeClass('fadeOut');
                            }, 250);
                        }
                        

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
                    console.log("vai");
                    var pidInput = $("#pid-input");

                    // $('#addToCartModal').modal('show');

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

                // qtySelector.val(1);

            }

        });

    }





</script>

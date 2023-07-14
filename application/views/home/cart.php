<div class="row">
    <div class="col-sm-12 mgb-20" style="margin-top: 50px;">
        <h2>Cart</h2>

        <p></p>
        <?php if(validation_errors()): ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>
        <?php echo form_open('',array('class'=> 'form-horizontal')) ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Remove</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $total = 0;
            foreach($cart_items as $item): ?>
                <tr>
                    <input type="hidden" name="rowid[]" value="<?php echo $item['rowid'];  ?>">
                    <td class=""><input name="product_remove[]" type="checkbox" value="<?php echo $item['rowid'] ?>">
                    </td>

                    <td><?php echo $item['name'] ?></td>

                    <td><input name="qty[]" type="number" value="<?php echo $item['qty'] ?>" class="input-mini" min="1"
                            max="9999" step="1"></td>
                    <td><?php echo $item['price'] ?> BDT</td>
                    <td><?php echo $item['subtotal'] ?> BDT</td>
                </tr>
                <?php
                $total += $item['subtotal'];
            endforeach; ?>


                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong><?php echo  $total; ?> BDT</strong></td>
                </tr>
            </tbody>
        </table>


        <fieldset>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Apply discount code
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                        aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="discount-code" class="col-sm-2 control-label">Discount code:
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="discount-code"
                                        placeholder="Enter your coupon here">
                                    <p class="help-block">You can only use one discount code at a time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Use gift voucher
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gift-voucher" class="col-sm-2 control-label">Gift voucher:
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="gift-voucher"
                                        placeholder="Enter your gift voucher here">
                                    <p class="help-block">You can use multiple gift vouchers at a time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit" name="update" value="update">Update</button>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="<?php echo site_url('products') ?>">Continue shopping</a>
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary pull-right" name="checkout"
                        value="checkout">Checkout</button>
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>

        <hr />



        <div class="snippet-clear"></div>

    </div>
</div>
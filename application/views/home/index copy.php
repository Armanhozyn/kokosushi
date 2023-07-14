<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/news-ticker/css/style.css">
<script src="<?php echo base_url(); ?>assets/news-ticker/js/acmeticker.min.js"></script> -->
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        opacity: 1;
    }

    .color-dallas{
        color: #786226;
    }
    .color-crimson{
        color: #d41525;
    }

    .modal-footer{
        display: block;
    }




    #ticker_container{margin-top:6px;}
    #newscontent {margin-right: 10px; float: left;}
    #newscontent a {color: #585858;}
    #news {display: none;}
    #controls { float: right; height: 16px;}
    #news {display: none;}
    .news_tricker{width:100%;}
 
</style>
<?php
$demo = "Combine Ground Beef and steak seasoning in large bowl, mixing lightly but thoroughly. Lightly shape into four 1/2-inch thick patties";
?>

<div class="row">
	<div class="col-md-12">


   <!-- <div class="acme-news-ticker-label">Popular Menus</div> -->
      <div class="news_tricker">
	  <!--	<div class="news_cover">Updates</div> -->
              <ul  id="ticker">
                
				<?php foreach ($tickers as $ticker): ?>
					<li><i style="color: #ea2227" class="fas fa-heart"></i> <?php echo $ticker['ticker_text'] ?></li>
				<?php endforeach; ?>
              </ul>

			</div>



	</div>
    <div class="col-md-12"><div class="m-2"></div></div>
    <div class="col-sm-10">
        <form>
            <div class="input-group mb-3 input-group-lg">
                <input id="search_text" type="text" class="form-control" name="search" placeholder="Search here.." id="search">
                <div class="input-group-prepend">
                            <span class="input-group-text btn-danger text-white btn-search">
                                <i class="fas fa-search"></i> <span class="search-btn-name"></span>
                            </span>
                </div>
            </div>
        </form>

    </div>

    <div class="col-sm-2">
        <button type="button" class="btn btn-danger btn-lg btn-cart-list" onclick="cart_items();">
            <i class="fas fa-cart-plus"></i> CART <span class="badge badge-dark" id="cart-item-count">0</span>
        </button>
    </div>
    <div class="col-sm-10"></div>
    <div class="col-sm-2" align="center" style="z-index: 1;">
        <div class="cart-expend hide"></div>
    </div>
    <div class="col-md-12 hide" id="cart-data">
        <div class="table-responsive-sm">
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="bg-danger text-white">
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr id="data"></tr>
                <tr class="cart-total bg-dark text-white">
                    <td colspan="3" style=" text-align: right;"><b>Total :</b></td>
                    <td colspan="2" style=""><b>€15.20</b></td>
                </tr>
                <tr class="bg-white">
                    <td colspan="5" align="center"><a href="<?php echo site_url('home/checkout'); ?>"  class="btn btn-danger btn-lg"><i class="fas fa-shopping-cart"></i> CHECKOUT</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="m-2"></div>

</div>



<!-- Cats Nav -->
<ul class="nav nav-pills cat-nav" role="tablist">
    <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#ALL">ALL</a></li>
    <?php foreach ($category_list as $cat): ?>
        <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#<?php echo "CAT{$cat['cat_id']}"; ?>"><?php echo strtoupper($cat['cat_name']); ?></a> </li>
    <?php endforeach; ?>
    <!--
    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#TARTARE">TARTARE</a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#CRIPSY_ROLL">CRIPSY ROLL</a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#SASHIMI">SASHIMI</a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#SUSHI_NIGIRI">SUSHI NIGIRI</a> </li> -->
</ul>


<!-- Tab panes -->
<div class="tab-content"  id="real-content">
    <div id="ALL" class="tab-pane active ">

        <!-- Category Loop  -->
        <?php foreach ($category_list as $cat): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-danger text-white cat">
                        <h4 class="cat-title"><?php echo $cat["cat_name"]; ?></h4>
                    </div>
                </div>

                <?php foreach($this->Product_Model->getProductsByCategory($cat['cat_id']) as $product): ?>
                    <div class="col-lg-6">
                        <div class="row" id="product-item">
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8">
                                <div class="product-info">
                                    <h5 class="product-title color-dallas"><?=$product['display_id'] . ') '.$product['name'];?></h5>
                                    <p class="product-details color-crimson"> <?=$product['attr1'];?></p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4" align="right">
                                <span style="display: none" class="price" >€   <?=$product['price'];?></span>
                                <div style="visibility: hidden"><input id='qty_<?php echo $product['id']  ?>' name="qty" type="hidden" min="1" max="100" value="1" class="form-control form-control-sm cart-quantity-value"></div>
                                <button onclick="get_item('<?=$product['id'];?>')" class="add_cart btn btn-xs btn-danger btn-cart btn-add-<?=$product['id'];?>"  title="ADD TO CART" data-productname="<?=$product['name'];?>" data-price="<?=$product['price'];?>" data-productid="<?=$product['id'];?>" data-hasextra="<?php echo $this->Product_Model->hasExtraItem($product['id']) == true ? '1':'0'; ?>"> €   <?=$product['price'];?> <i class="fa fa-plus"></i></button><br>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>    <!-- Category Loop End -->

    </div>

    <!-- Category Loop  -->
    <?php foreach ($category_list as $cat): ?>
    <div id="<?php echo "CAT{$cat['cat_id']}"; ?>" class="tab-pane">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-danger text-white cat">
                    <h4 class="cat-title"><?php echo $cat["cat_name"]; ?></h4>
                </div>
            </div>

            <?php foreach($this->Product_Model->getProductsByCategory($cat['cat_id']) as $product): ?>
                <div class="col-lg-6">
                    <div class="row" id="product-item">
                        <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                            <div class="product-info">
                                <h5 class="product-title color-dallas"><?=$product['display_id'] . ') '.$product['name'];?></h5>
                                <p class="product-details color-crimson"> <?=$product['attr1'];?></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-4" align="right">
                            <span style="display: none" class="price" >   <?=$product['price'];?></span>
                            <div style="visibility: hidden"><input id='qty_<?php echo $product['id']  ?>' name="qty" type="hidden" min="1" max="100" value="1" class="form-control form-control-sm cart-quantity-value"></div>
                            <button onclick="get_item('<?=$product['id'];?>')" class="add_cart btn btn-xs btn-danger btn-cart btn-add-<?=$product['id'];?>"  title="ADD TO CART" data-productname="<?=$product['name'];?>" data-price="<?=$product['price'];?>" data-hasextra="<?php echo $this->Product_Model->hasExtraItem($product['id']) == true ? '1':'0'; ?>" data-productid="<?=$product['id'];?>"> €   <?=$product['price'];?> <i class="fa fa-plus"></i></button><br>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
    <?php endforeach; ?>    <!-- Category Loop End -->



</div>

<div class="tab-content"  id="virtual-content">
</div>


<!-- Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Enter the postcode
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: none;" id="modal-notice" class="alert alert-danger"></div>
<p>Please enter your postcode so that we can check whether Kokoro Sushi & Bento also delivers to your address.
</p>
                <input id="pid-input" type="hidden" name="pid" value="">
                <div class="form-group">
                    <label for="postalCode">Postal Code</label>
                    <input type="number"  onkeypress="return (event.charCode !=8  && event.charCode ==0  || (  (event.charCode >= 48 && event.charCode <= 57)))" class="form-control" id="postalCode" placeholder="Enter Postal Code">

                <p>You still get the choice whether you want to collect your order yourself.
                    We are sorry but Kokoro Sushi & Bento does not deliver to your area (zip code: 1000).</p>

                <p>Choose a different location or select the option to pick up your order yourself.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="save-button">Save</button>
            </div>
        </div>
    </div>
</div>
</div> <!-- Modal End -->


<!-- Modal -->
<div class="modal fade" id="zipAddWithExtra" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Enter the postcode
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: none;" id="modal-notice" class="alert alert-danger"></div>
<p>Please enter your postcode so that we can check whether Kokoro Sushi & Bento also delivers to your address.
</p>
                <input id="pid-input" type="hidden" name="pid" value="">
                <input id="extraid-input" type="hidden" name="extra-id" value="">
                
                <div class="form-group">
                    <label for="postalCode">Postal Code</label>
                    <input type="number"  onkeypress="return (event.charCode !=8  && event.charCode ==0  || (  (event.charCode >= 48 && event.charCode <= 57)))" class="form-control" id="postalCode" placeholder="Enter Postal Code">

                <p>You still get the choice whether you want to collect your order yourself.
                    We are sorry but Kokoro Sushi & Bento does not deliver to your area (zip code: 1000).</p>

                <p>Choose a different location or select the option to pick up your order yourself.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-button-extra">Save</button>
            </div>
        </div>
    </div>
</div>
</div> <!-- Modal End -->

<!-- Modal -->
<div class="modal fade" id="addToCartWithExtraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <input id="pid-input" type="hidden" name="pid" value="">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Add to cart
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                

        	</div>
    </div>
</div>
</div> <!-- Modal End -->


<!-- Modal -->
<div class="modal fade" id="Add-Cart-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <input type="hidden" id="mod_pid" name="mod_pid" value="">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-cart-plus"></i> Add to Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="NoticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Notice</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <h2 style="font-size: 24pt; text-align: center; color: red;">Today and tomorrow restaurant is off</h2>
      </div>
      
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<script>
//    $('#addToCartModal').modal('show');
   // $("#Add-Cart-Modal").modal('show');
$("#NoticeModal").modal('hide');
    $("#addCartBtn").click(function () {
        console.log("It works!");
    });

    $(".cat-nav").click(function(){
        $('html, body').animate({
            scrollTop: $(this).offset().top+100
        }, 500);
      //  scrollToTop("");
    });
</script>
<script>
jQuery(function(){
		jQuery('#ticker').tickerme();
	});
	
	
	
	// js code for news ticker
	
	(function(e){e.fn.tickerme=function(t){var n=e.extend({},e.fn.tickerme.defaults,t);return this.each(function(){function a(){e(t).hide();e("body").prepend(r).prepend(i);var n='<div id="ticker_container">';n+='<div id="newscontent"><div id="news"></div></div>';n+='<div id="controls">';n+='<a href="#" id="pause_trigger"><svg class="icon icon-pause" viewBox="0 0 32 32"><use xlink:href="#icon-pause"></use></svg></a>';n+='<a href="#" id="play_trigger" style="display:none"><svg class="icon icon-play" viewBox="0 0 32 32"><use xlink:href="#icon-play"></use></svg></a>';n+='<a href="#" id="prev_trigger"><svg class="icon icon-prev" viewBox="0 0 32 32"><use xlink:href="#icon-prev"></use></svg></a>';n+='<a href="#" id="next_trigger"><svg class="icon icon-next" viewBox="0 0 32 32"><use xlink:href="#icon-next"></use></svg></a>';n+="</div>";n+="</div>";e(n).insertAfter(t);e(t).children().each(function(t){s[t]=e(this).html()});f()}function f(){if(o==s.length-1){o=0}else{o++}if(n.type=="fade"){e("#news").fadeOut(n.fade_speed,function(){e("#newscontent").html('<div id="news">'+s[o]+"</div>");e("#news").fadeIn(n.fade_speed)})}u=setTimeout(f,n.duration)}var t=e(this);var r='<svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="224" height="32" viewBox="0 0 224 32"><defs><g id="icon-play"><path class="path1" d="M6 4l20 12-20 12z"></path></g><g id="icon-pause"><path class="path1" d="M4 4h10v24h-10zM18 4h10v24h-10z"></path></g><g id="icon-prev"><path class="path1" d="M18 5v10l10-10v22l-10-10v10l-11-11z"></path></g><g id="icon-next"><path class="path1" d="M16 27v-10l-10 10v-22l10 10v-10l11 11z"></path></g></defs></svg>';var i='<style type="text/css">#ticker_container{width:100%}#newscontent{float:left}#news{display:none}#controls{float:right;height:16px}.icon{display:inline-block;width:16px;height:16px;fill:'+n.control_colour+"}.icon:hover{fill:"+n.control_rollover+"}</style>";var s=[];var o=-1;var u;a();e("a#pause_trigger").click(function(){clearTimeout(u);e(this).hide();e("#play_trigger").show();return false});e("a#play_trigger").click(function(){f();e(this).hide();e("#pause_trigger").show();return false});e("a#prev_trigger").click(function(){if(o==0){o=s.length-1}else{o--}e("#newscontent").html('<div id="news" style="display:block">'+s[o]+"</div>");if(n.auto_stop)e("a#pause_trigger").trigger("click");return false});e("a#next_trigger").click(function(){if(o==s.length-1){o=0}else{o++}e("#newscontent").html('<div id="news" style="display:block">'+s[o]+"</div>");if(n.auto_stop)e("a#pause_trigger").trigger("click");return false})})};e.fn.tickerme.defaults={fade_speed:500,duration:3e3,auto_stop:true,type:"fade",control_colour:"#333333",control_rollover:"#666666"}})(jQuery)
</script>

<!--suppress ALL -->
<style>
    .custab{
        border: 1px solid #ccc;
        padding: 5px;
        margin: 5% 0;
        box-shadow: 3px 3px 2px #ccc;
        transition: 0.5s;
    }
    .custab:hover{
        box-shadow: 3px 3px 0px transparent;
        transition: 0.5s;
    }

    table tr th{
        font-size: 14px !important;
        padding: 2px !important;
    }

    table  tr td{
        font-size: 14px !important;
        padding: 2px !important;
    }
    .btn-xs{
        padding: .25rem .5rem;
        font-size: .600rem;
        line-height: 1.5;
        border-radius: .2rem;
    }

    @-webkit-keyframes rotating /* Safari and Chrome */ {
        from {
            -webkit-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes rotating {
        from {
            -ms-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -webkit-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -ms-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .rotating:hover {
        -webkit-animation: rotating 2s linear infinite;
        -moz-animation: rotating 2s linear infinite;
        -ms-animation: rotating 2s linear infinite;
        -o-animation: rotating 2s linear infinite;
        animation: rotating 2s linear infinite;
        color: #3d84ff;
    }


</style>
<div class="container">
   <div class="row">
       <div class="col-md-12">


           <div style="text-align: center; margin-top: 10px;"><a title="Refresh" href="<?php echo site_url('order_manager/recent_orders'); ?>"><span style="color:#57ae1c;font-size:32pt; text-align: center" class="fa fa-recycle rotating"></span></a></div>
           <h2 style="margin: 0px; padding: 0px;">Recent Orders</h2>
           <table id="order-list" class="table table-striped custab">
        <tr>
<!--            <th>#</th>-->
            <th>Order ID</th>
            <th>Status</th>
            <th>Order Time</th>
            <th>Full Name</th>
            <th>Postal Code</th>
             <th>Telephone</th>
<!--            <th>Telephone</th>
            <th>Address 1</th>
            <th>Postal Code</th>
            <th>Total</th>
            <th>Delivery Method</th>-->

            <th>Action</th>

        </tr>
            <?php
            $sl = 1;
            $ids = array(0);
            foreach ($order_list as $item):
                if($item['is_viewed'] != 1){
                    $ids[] = $item['order_id'];
                }

                ?>
                <tr>
<!--                    <td>--><?php //echo $sl; ?><!--</td>-->
                    <td><?php echo $item['order_id'] ?></td>
                    <td><span class="badge badge-secondary">Old</span></td>
                    <td><?php echo date("Y-m-d H:I:s A", strtotime($item['time_added'] ))?></td>
                    <td><?php echo $item['first_name'] . " " . $item['last_name'] ?></td>
                    <td><?php echo $item['zip'] ?></td>
                    <td><?php echo $item['telephone'] ?></td>

<!--                    <td>--><?php //echo $this->Order_Model->getStatus($item['status']); ?><!--</td>-->
                    <td><button type="button" class="btn btn-primary btn-xs order-view-btn" href="<?php echo site_url("view_order/{$item['order_id']}"); ?>" data-orderid="<?php echo $item['order_id']; ?>">View</button></td>
                </tr>
            <?php
                $sl++;
            endforeach;
            $this->Order_Model->makeOrderViewed($ids);?>
        </table>
       </div>
   </div>

</div>

<!-- Modal -->
<div class="modal fade" id="orderViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3 style="font-size: 14px; padding-bottom: 0px; margin-bottom: 0px;">Ordered Items:</h3>

                <div id="orderDetails"></div>


                <table class="table custab table-striped" style="margin-top: 30px;">
                    <tr><th colspan="3" style="text-align: center">Customer & Shipping Details</th></tr>
                    <tr><td>Order ID</td><td>:</td><td id="order_id">---</td></tr>
                    <tr><td>First Name</td><td>:</td><td id="first_name">---</td></tr>
                    <tr><td>Last Name</td><td>:</td><td id="last_name">---</td></tr>
                    <tr><td>Telephone</td><td>:</td><td id="telephone">---</td></tr>
                    <tr><td>Address 1</td><td>:</td><td id="address1">---</td></tr>
                    <tr><td>Address 2</td><td>:</td><td id="address2">---</td></tr>
                    <tr><td>City</td><td>:</td><td id="city">---</td></tr>
                    <tr><td>Postal Code</td><td>:</td><td id="zip">---</td></tr>
                    <tr><td>Country</td><td>:</td><td id="country">---</td></tr>
                    <tr><td>Total</td><td>:</td><td id="sub_total">---</td></tr>
                    <tr><td>Delivery Method</td><td>:</td><td id="payment_method">---</td></tr>
                    <tr><td>Order Time</td><td>:</td><td id="time_added">---</td></tr>
                    <tr><td>Status</td><td>:</td><td id="status">---</td></tr>


                </table>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/audio.js"></script>
<script>
$(".order-view-btn").on('click', function(e) {
    var orderId = $(this).data('orderid');

    $("#orderModalTitle").text("Order Details: #" + orderId);
    e.preventDefault();
    console.log('order id', $(this).data('orderid'));
    $.ajax({
        url: "<?php echo site_url("order_manager/order_info_ajax"); ?>",
        method: "POST",
        data: {
            order_id: orderId
        },
        success: function (data) {
            if(data.status == 1){
                var orderData = data.order_info;
                $("#order_id").text(orderData.order_id);
                $("#first_name").text(orderData.first_name);
                $("#last_name").text(orderData.last_name);
                $("#telephone").text(orderData.telephone);
                $("#address1").text(orderData.address1);
                $("#address2").text(orderData.address2);
                $("#city").text(orderData.city);
                $("#zip").text(orderData.zip);
                $("#country").text(orderData.country);
                $("#sub_total").text(orderData.sub_total);
                $("#payment_method").text(orderData.payment_method);
                $("#time_added").text(orderData.time_added);
                $("#status").text(orderStatus(orderData.status));


                $("#orderDetails").html(data.ItemHtml);


            }
         $('#orderViewModal').modal('show');
            // alert("Product Added into Cart");
            console.log('responded data',data);

        }
    });
});

function newOrderView(orderId, el){
    $("#orderModalTitle").text("Order Details: #" + orderId);


    $.ajax({
        url: "<?php echo site_url("order_manager/order_info_ajax"); ?>",
        method: "POST",
        data: {
            order_id: orderId
        },
        success: function (data) {
            if(data.status == 1){
                var orderData = data.order_info;
                $("#order_id").text(orderData.order_id);
                $("#first_name").text(orderData.first_name);
                $("#last_name").text(orderData.last_name);
                $("#telephone").text(orderData.telephone);
                $("#address1").text(orderData.address1);
                $("#address2").text(orderData.address2);
                $("#city").text(orderData.city);
                $("#zip").text(orderData.zip);
                $("#country").text(orderData.country);
                $("#sub_total").text(orderData.sub_total);
                $("#payment_method").text(orderData.payment_method);
                $("#time_added").text(orderData.time_added);
                $("#status").text(orderStatus(orderData.status));


                $("#orderDetails").html(data.ItemHtml);


            }
            $('#orderViewModal').modal('show');
            // alert("Product Added into Cart");
            console.log('responded data',data);

            $(el).parent('td').parent('tr').removeClass('bg-success');

        }
    });
}

function orderStatus(code){
    var map = new Map();
    map.set('0', 'Completed');
    map.set('1', 'Pending');
    map.set('2', 'Processing');
return map.get(code.toString());
}
var audio = "";
var audioElement = document.createElement('audio');
//audioElement.setAttribute('src', 'http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');
//audioElement.setAttribute('src', 'data:audio/mpeg;base64,'+audio);
audioElement.setAttribute('src', '<?php echo base_url();?>assets/sound/noti1.mp3');

audioElement.addEventListener('ended', function() {
    this.play();
}, false);

audioElement.addEventListener("canplay",function(){
   // $("#length").text("Duration:" + audioElement.duration + " seconds");
   // $("#source").text("Source:" + audioElement.src);
   // $("#status").text("Status: Ready to play").css("color","green");
});

audioElement.addEventListener("timeupdate",function(){
  //  $("#currentTime").text("Current second:" + audioElement.currentTime);
});
audioElement.loop = false;
var toneLoop = 0;
window.setInterval(function () {
    if(toneLoop == 5){
        audioElement.pause();
        audioElement.currentTime = 0;
        toneLoop = 0;
    }

    $.getJSON( "<?php echo site_url("order_manager/getNewOrders") ?>", function( data ) {
    console.log('data received ', data);
    if(data.status == 1){
        audioElement.pause();
        audioElement.currentTime = 0;
        audioElement.play();
        toneLoop = 0;

        var items = "";

        $.each( data.data, function( key, val ) {
            //  items.push( "<li id='" + key + "'>" + val + "</li>" );
            console.log('key: ',key);
            console.log('value: ',val);
            items += '<tr class="bg-success"><td>'+ val.order_id +'</td><td><span class="badge badge-primary">New</span></td><td>'+ val.time_added +'</td><td>'+ val.first_name + ' ' +  val.last_name +'</td><td>'+ val.zip +'</td><td>'+ val.telephone +'</td><td><button type="button" class="btn btn-primary btn-xs order-view-btn new-entry-btn" href="<?php echo base_url(); ?>view_order/'+ val.order_id +'" data-orderid="'+val.order_id+'" onclick="newOrderView('+ val.order_id +', this)">View</button></td></tr>' + "\n";
        });
    }

        $("#order-list tr:eq(0)").after(items);


/*        $( "<ul/>", {
            "class": "my-new-list",
            html: items.join( "" )
        }).appendTo( "body" );

        $("")*/

    });
   // audioElement.pause();

    console.log("works!");
    toneLoop = toneLoop+ 1;
}, 3000);
</script>
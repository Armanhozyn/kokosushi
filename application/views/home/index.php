<!-- bannar -->
<div class="grid grid-cols-10 xl:pl-20 xl:pr-10 lg:pl-16 lg:pr-6 2xl:pl-40 2xl:pr-32 md:pl-10 md:pr-2 sm:mx-16 sm:pl-14 mx-6 pl-4 lg:mt-14 xl:mt-10 md:mt-16 mt-12 sm:mt-16 items-center py-0 md:py-10">
        <!-- <div class="col-span-12 sm:col-span-12 md:col-start-1 md:col-end-6 xl:col-start-1 xl:col-end-7 lg:col-start-1 lg:col-end-6 mt-[-10px] sm:mt-0 md:mt-10 lg:mt-16 xl:mt-[100px]"> -->
        <div class="text-center md:text-left col-span-12 sm:col-span-12 md:col-start-1 md:col-end-6 xl:col-start-1 xl:col-end-7 lg:col-start-1 lg:col-end-6 mt-[-10px] sm:mt-0">
            <h1 class="sm:text-5xl sm:leading-[60px] sm:font-bold text-3xl font-semibold">Melhor sushi & kabab em Lisboa</h1>
            <h2 class="text-lg my-4 text-[#fb5b5b]">SE VOCÊ PEDIR DO SITE, RECEBERÁ UM PRESENTE</h2>
            <div class="mt-5 relative">
                <!-- <div onmouseover="mouse_enter()" onmouseout="mouse_out()" class="lg:cursor-pointer inline-block"> -->
                <div class="lg:cursor-pointer inline-block">
                <a id="go_to_pro"><button class="cursor-default lg:cursor-pointer bg-gradient-to-r from-[#fe1e62] via-[#fe5568] to-[#fe8a6d] text-white rounded-2xl py-2 pl-4 pr-4 shadow-2xl shadow-red-600/40 hover:shadow duration-200">ORDER NOW</button></a>
                <!-- <i id="play_icon" class=""><img src="<?php echo base_url();?>assets/imagess/play-fill.png" class="absolute top-[-14px] left-[115px] scale-75" alt=""></i> -->
                <!-- <i id="pause_icon" class="hidden"><img src="<?php echo base_url();?>assets/imagess/pause-fill.png" class="absolute top-[-14px] left-[115px] scale-75" alt=""></i> -->
                </div>
            </div>
        </div>
        <div class="inline-block col-span-12 mt-4 md:inline-block md:col-start-8 md:col-end-11 xl:col-start-8 xl:col-end-10 lg:col-start-9 lg:col-end-12 lg:scale-110 xl:scale-125 md:mt-0">
            <img src="<?php echo base_url();?>assets/images/rainbow_sushi_mol.png" class="w-44 m-auto md:m-0 md:w-72" alt="rainbowsushi mol">
        </div>
    </div>
    <!-- bannar -->
	<div class="px-5 lg:px-20 2xl:px-40 md:px-5 lg:mt-14 xl:mt-10 md:mt-16 mt-4 sm:mt-16">
		<h2 class="text animated pulse h2-heading" style="    animation-fill-mode: both;
		animation-iteration-count: infinite;
		font-weight: bold;
		text-align: center;
		/* margin-top: 56px; */
		color: #c6071a;
		font-size: 18px;
		font-family: sans-serif;
		text-transform: uppercase;">Pickup (afhalen) 10% korting</h2>
	</div>

    <div class="m-auto relative w-[70%] sm:w-1/2 mt-4">
    <input id="search_text" name="search" class="text-lg outline-none border-gray-300 rounded-2xl h-10 pl-4 focus:shadow-none placeholder:text-center placeholder:text-gray-500 w-full border-[1px] px-3 py-6 shadow-2xl shadow-red-400/50 duration-200" type="text" placeholder="Search">
    <!-- <div id="sea_btn" class="absolute top-[10%] left-[42%]">Search</div> -->
    <i class="bg-gradient-to-r from-[#fe1e62] via-[#fe5568] to-[#fe8a6d] absolute top-[12%] right-[1%] py-[7px] px-5 rounded-xl cursor-pointer"><i class="fa fa-solid fa-magnifying-glass text-white cursor-pointer"></i></i>
    </div>



<div class="grid grid-cols-12 lg:px-20 2xl:px-40 md:px-5 lg:mt-14 xl:mt-10 md:mt-16 mt-12 sm:mt-16">
    <h3 class="sm:text-5xl text-3xl font-semibold sm:font-bold text-[#ff3131] text-center col-span-12 font-rou">CATAGORY</h3>
</div>
<div role="tablist" class="lg:mt-14 xl:mt-10 md:mt-16 mt-12 sm:mt-16 text-center cat-nav lg:px-10 xl:px-[61px] px-16 2xl:px-40 md:px-14 sm:px-14">
<button id="go_to_pro2" class="focus:bg-[#ff3131] focus:shadow focus:text-white cursor-default px-[10px] sm:px-[12px] text-center lg:cursor-pointer relative bg-white hover:text-white inline-block mx-1 mt-2 rounded-full duration-200 hover:bg-[#ff3131] font-semibold hover:shadow sm:text-lg text-base border-[0.1px] border-gray-300"> 
    All
        <!-- <i><img src="<?php echo base_url();?>assets/imagess/play-fill-black.png" class="absolute sm:-top-[5px] -top-[12px] sm:left-0 left-[-8px] sm:scale-50 scale-[.3]" alt=""></i>
        <i class="hidden"><img src="<?php echo base_url();?>assets/imagess/pause-fill.png" class="absolute sm:-top-[5px] -top-[12px] sm:left-0 left-[-8px] sm:scale-50 scale-[.3]" alt=""></i> for a tag sm:pl-[65px] pl-[36px] -->
    </button>
<?php foreach ($category_list as $cat): ?>
    <a id="cat_<?php echo "CAT{$cat['cat_id']}"; ?>" class="focus:bg-[#ff3131] focus:shadow focus:text-white cursor-default px-[10px] sm:px-[12px] text-center lg:cursor-pointer relative bg-white hover:text-white inline-block mx-1 mt-2 rounded-full duration-200 hover:bg-[#ff3131] font-semibold hover:shadow sm:text-lg text-base border-[0.1px] border-gray-300"> <h3> <?php echo strtoupper($cat['cat_name']);  ?>
        <!-- <i><img src="<?php echo base_url();?>assets/imagess/play-fill-black.png" class="absolute sm:-top-[5px] -top-[12px] sm:left-0 left-[-8px] sm:scale-50 scale-[.3]" alt=""></i>
        <i class="hidden"><img src="<?php echo base_url();?>assets/imagess/pause-fill.png" class="absolute sm:-top-[5px] -top-[12px] sm:left-0 left-[-8px] sm:scale-50 scale-[.3]" alt=""></i> for a tag sm:pl-[65px] pl-[36px] -->
		</h3>
    </a>
<?php endforeach; ?>
</div>

   


<div class="tab-content"  id="virtual-content">
</div>
<!-- catagory list end -->
<div class="tab-content lg:mt-14 xl:mt-10 md:mt-16 mt-12 sm:mt-16"  id="real-content">
    <div id="ALL" class="tab-pane">
        <?php foreach ($category_list as $cat): ?>
        <div class="grid grid-cols-12 text-center mt-12">
            <h3 class="text-[#ff3131] col-span-12 font-extrabold text-4xl inline-block font-rou"><?php echo $cat["cat_name"]; ?></h3>
        </div>
        <div class="grid grid-cols-12 lg:px-10 xl:px-[61px] px-16 2xl:px-40 md:px-14 sm:px-14 lg:mt-14 xl:mt-10 md:mt-16 mt-12 sm:mt-16 lg:gap-x-6 md:gap-x-4 md:gap-y-9 lg:gap-y-12 sm:gap-x-4 sm:gap-y-10 gap-y-8">
            <?php foreach($this->Product_Model->getProductsByCategory($cat['cat_id']) as $product): ?>
            <div class="sm:col-span-6 col-span-12 xl:col-span-3 lg:col-span-4 float-left bg-[#ebe3e333] md:px-9 sm:px-7 px-4 py-5 border-0 rounded-3xl inline-block hover:shadow-none shadow-2xl shadow-red-400/50 duration-200">
                <h4 class="text-2xl font-bold"><?=$product['display_id'] . ') '.$product['name'];?></h4>
                
                <p class="text-[20px] my-1 text-[#ff3131]"><?=$product['attr1'];?></p>
                <div class="my-4 <?php if((strlen($product['name'])) < 18) :?> <?php echo "mt-[48px]" ?><?php endif; ?>">
                    <!-- <div class="float-left bg-gradient-to-r from-[#fb1a1b] to-[#f77373] rounded-2xl px-[26px] py-1 text-white mr-3 hover:from-[#f77373] hover:to-[#fb1a1b] duration-200 lg:cursor-pointer">
                        <button class="lg:cursor-pointer cursor-default">&#x20AC;<?=$product['price'];?></button>
                    </div> -->
                    <div style="visibility: hidden"><input id='qty_<?php echo $product['id']  ?>' name="qty" type="hidden" min="1" max="100" value="1" class="cart-quantity-value"></div>
                    <div onclick="get_item('<?=$product['id'];?>')" data-productname="<?=$product['name'];?>" data-price="<?=$product['price'];?>" data-catagoryname="<?=$cat["cat_name"];?>" data-productid="<?=$product['id'];?>" data-hasextra="<?php echo $this->Product_Model->hasExtraItem($product['id']) == true ? '1':'0'; ?>" class="add_cart float-right bg-gradient-to-r from-[#fb1a1b] to-[#f77373] rounded-2xl px-6 py-1 text-white ml-3 hover:from-[#f77373] hover:to-[#fb1a1b] duration-200 relative lg:cursor-pointer flex justify-between space-x-2 items-center btn-add-<?=$product['id'];?>">
                        <button class="lg:cursor-pointer cursor-default">&#x20AC;<?=$product['price'];?></button>
                        <i class="fa-solid fa-plus"></i>
                        <!-- <i><img src="<?php echo base_url(); ?>assets/imagess/cart2.png" class="float-left scale-[.3] absolute -top-[17px] left-8" alt=""></i> -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>


    <div id="ALL2">
    <?php foreach ($category_list as $cat): ?>
        <div id="<?php echo "CAT{$cat['cat_id']}"; ?>" class="tab-pane hidden">
        <div  class="grid grid-cols-12 text-center mt-12">
            <h3 class="text-[#ff3131] col-span-12 font-extrabold text-4xl inline-block font-rou"><?php echo $cat["cat_name"]; ?></h3>
        </div>
        <div class="grid grid-cols-12 xl:px-[61px] lg:mt-14 xl:mt-10 lg:px-10 lg:gap-x-6 md:gap-x-4 md:gap-y-9 lg:gap-y-12 2xl:px-40 md:px-14 md:mt-16 mt-12 sm:px-14 sm:mt-16 sm:gap-x-4 sm:gap-y-10 px-16 gap-y-8">
            <?php foreach($this->Product_Model->getProductsByCategory($cat['cat_id']) as $product): ?>
            <div class="sm:col-span-6 col-span-12 xl:col-span-3 lg:col-span-4 float-left bg-[#ebe3e333] md:px-9 sm:px-7 px-4 py-5 border-0 rounded-3xl inline-block hover:shadow-none shadow-2xl shadow-red-400/50 duration-200">
                <h4 class="text-2xl font-bold"><?=$product['display_id'] . ') '.$product['name'];?></h4>
                
                <p class="text-[20px] my-1 text-[#ff3131]"><?=$product['attr1'];?></p>
                <div class="my-4 <?php if((strlen($product['name'])) < 18) :?> <?php echo "mt-[48px]" ?><?php endif; ?>">
                    <!-- <div class="float-left bg-gradient-to-r from-[#fb1a1b] to-[#f77373] rounded-2xl px-[26px] py-1 text-white mr-3 hover:from-[#f77373] hover:to-[#fb1a1b] duration-200 lg:cursor-pointer">
                        <button class="lg:cursor-pointer cursor-default">&#x20AC;<?=$product['price'];?></button>
                    </div> -->
                    <div style="visibility: hidden"><input id='qty_<?php echo $product['id']  ?>' name="qty" type="hidden" min="1" max="100" value="1" class="cart-quantity-value"></div>
                    <div onclick="get_item('<?=$product['id'];?>')" data-productname="<?=$product['name'];?>" data-price="<?=$product['price'];?>" data-catagoryname="<?=$cat["cat_name"];?>" data-productid="<?=$product['id'];?>" data-hasextra="<?php echo $this->Product_Model->hasExtraItem($product['id']) == true ? '1':'0'; ?>" class="add_cart float-right bg-gradient-to-r from-[#fb1a1b] to-[#f77373] rounded-2xl px-6 py-1 text-white ml-3 hover:from-[#f77373] hover:to-[#fb1a1b] duration-200 relative lg:cursor-pointer flex justify-between space-x-2 items-center btn-add-<?=$product['id'];?>">
                        <button class="lg:cursor-pointer cursor-default">&#x20AC;<?=$product['price'];?></button>
                        <i class="fa-solid fa-plus"></i>
                        <!-- <i><img src="<?php echo base_url(); ?>assets/imagess/cart2.png" class="float-left scale-[.3] absolute -top-[17px] left-8" alt=""></i> -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>




    <script>
    function cat_item_none_on_click(){
            <?php foreach ($category_list as $cat): ?>
            var cat_item_none<?php echo "CAT{$cat['cat_id']}"; ?> = document.getElementById('<?php echo "CAT{$cat['cat_id']}"; ?>');
            cat_item_none<?php echo "CAT{$cat['cat_id']}"; ?>.style.display = "none";
            if(cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.contains('bg-[#ff3131]')){
                cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.remove("bg-[#ff3131]");
                cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.remove("text-white");
                cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.add("bg-white");
                cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.add("text-black");
            }
            <?php endforeach; ?>
        }
</script>
<?php foreach ($category_list as $cat): ?>
<script>
var cat_btn_for_item<?php echo $cat['cat_id'] ?> = document.getElementById('cat_<?php echo "CAT{$cat['cat_id']}"; ?>');
const goToCatItem<?php echo $cat['cat_id'] ?> = () => {
    real_real_content.style.display = "block";
    virtual_content.style.display = "none";
    real_content.style.display = "none";
    real_content2.style.display = "block";
    cat_item_none_on_click();
    if(cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.contains('bg-white')){
        cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.remove("bg-white");
        cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.remove("text-black");
        cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.add("bg-[#ff3131]");
        cat_btn_for_item<?php echo $cat['cat_id'] ?>.classList.add("text-white");
    }
    // cat_btn_for_item<?php echo $cat['cat_id'] ?>.style.backgroundColor = "red";
    var cat_item<?php echo $cat['cat_id'] ?> = document.getElementById('<?php echo "CAT{$cat['cat_id']}"; ?>'); 
    cat_item<?php echo $cat['cat_id'] ?>.style.display = "block";
    cat_item<?php echo $cat['cat_id'] ?>.scrollIntoView({
        behavior: "smooth",
    });
};
cat_btn_for_item<?php echo $cat['cat_id'] ?>.addEventListener('click', goToCatItem<?php echo $cat['cat_id'] ?>);
</script>
<?php endforeach; ?>


<!-- some text about company -->
<div class="grid grid-cols-12 xl:px-20 2xl:px-40 lg:mt-14 xl:mt-10 md:mt-16 mt-12 sm:mt-16 lg:px-16 md:px-20 sm:px-28 px-14">
        <div class="col-span-12 sm:col-span-12 lg:col-start-1 lg:col-end-6 xl:col-start-1 xl:col-end-7 tracking-wide md:text-left text-xl font-lg leading-8 sm:text-center text-center">
            <h3 class="font-extrabold text-2xl">The Culinary Blend: Rainbow Sushi & Kabab's Journey through Flavors</h3>
            <p class="my-8">Embark on a culinary journey through the flavorful worlds of sushi and kabab at Rainbow Sushi & Kabab. These dishes, deeply rooted in the traditions of Japan and the Middle East, have become global favorites and are celebrated hallmarks of their respective culinary cultures.</p>
            <p class="my-8">At Rainbow Sushi & Kabab, experience a unique blend of vibrant sushi and aromatic kababs. Be it the delectable, cool salmon sushi or the juicy, marinated skewers of kabab, each bite is an explosion of flavors that will keep you wanting more.</p>
            <p class="my-8">The term "sushi" originates from an old Japanese phrase meaning "it's sour," harking back to its origins as a fermented dish. On the other hand, kababs have an age-old history, highlighting their enduring popularity.</p>

			<p class="my-8">The craft of making both sushi and kabab at Rainbow Sushi & Kabab requires precision, dedication, and passion. Each creation narrates a tale—a combination of tradition, culture, and flavor carefully composed to offer a memorable dining experience.</p>

			<p class="my-8">As you enjoy each savory bite, you delve into the stories behind these dishes—the traditions, cultures, and communities that have safeguarded their legacy. Sushi and kabab invite you to revel in their timeless appeal, experiencing flavors that bridge cultures and unite food lovers worldwide.</p>

			<p class="my-8">Dive into the culinary delights of Rainbow Sushi & Kabab—a fusion of elegance and bold tastes, where no flavor is out of bounds. This culinary journey will leave a lasting impression on your palate, igniting a lifelong love for these enchanting and diverse dishes. Welcome to Rainbow Sushi & Kabab—your gateway to an extraordinary gastronomic adventure.</p>
			
        </div>
        <div class="hidden lg:inline-block lg:col-start-8 lg:col-end-13 xl:col-start-8 xl:col-end-13 xl:mt-4 lg:mt-8">
            <img src="<?php echo base_url();?>assets/imagess/kokoro_sushi_mol.png" alt="Delicious Sushi">
        </div>
    </div>
    <div class="grid grid-cols-12 xl:px-20 2xl:px-40 mt-20 lg:px-16 md:px-20 md:mt-14 sm:px-28 sm:mt-20 px-14">
        <div class="hidden lg:inline-block xl:scale-125 lg:scale-110 xl:mt-[50px] lg:mt-[100px] xl:col-start-1 xl:col-end-6 lg:col-start-1 lg:col-end-7">
            <img src="<?php echo base_url();?>assets/imagess/food_safe_delivery.png" alt="Food safe delivery">
        </div>
        <div class="col-span-12 sm:col-span-12 lg:col-start-8 lg:col-end-13 xl:col-start-6 xl:col-end-13 tracking-wide md:text-right text-xl font-lg leading-8 sm:text-center text-center">
            <h3 class="font-extrabold text-2xl">Delivering Health and Flavor Straight to Your Doorstep</h3>

            <p class="my-8">Embarking on a healthier eating journey after months of indoor binge-eating? You'll be delighted to know that with just a few clicks, Rainbow Sushi & Kabab can bring mouthwatering sushi straight to your home. Complement your sushi order with a choice of refreshing beverages from our extensive menu. Simply select the items and quantities you desire, and our dedicated team will ensure it reaches you.</p>


            <p class="my-8">To get the best of our sushi platter, we recommend starting with our freshly prepared sashimi, then progressing to the artfully crafted maki rolls. These rolls often pack intricate flavor combinations with their mix of diverse ingredients.</p>


            <p class="my-8">At Rainbow Sushi & Kabab, every dish is thoughtfully crafted by our expert chefs, whether it's traditional sushi boasting classic ingredients like raw and cooked fish, or innovative culinary creations like our special sushi in Geel and sushi Lommel. </p>

			<p class="my-8">Savoring sushi, in its many forms, has become a widely enjoyed experience. Whether you love raw, sashimi-style fish, enjoy it flash-fried within a sushi roll, or diced up in a Poke-style sushi bowl, the taste adventure is limitless. </p>

			<p class="my-8">With our restaurant located at Rua Gonclaves Zarco 21c 1400-033, Lisbua, you can relive authentic flavors right at their origin. We offer a range of dishes like NAMI sushi Lisbon and sushi in Lisbua, and guarantee delivery, whether you order sushi Lisbon or kabab Lisbua.</p>

			<p class="my-8">So, why wait? Immerse yourself in the rich culture and flavor profiles of Japan by visiting our sushi bar Mol. We're committed to delivering authentic taste experiences and ensuring that delicious sushi finds its way to your plates. Because at Rainbow Sushi & Kabab, taste truly matters!</p>



        </div>
    </div>
    <!-- some text about company -->

<script>
	// const not_verify_cart = false;
</script>

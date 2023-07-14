var play_icon = document.getElementById("play_icon");
var pause_icon = document.getElementById("pause_icon");
function mouse_enter(){
    play_icon.style.display = "none";
    pause_icon.style.display = "block";
}
function mouse_out(){
    pause_icon.style.display = "none";
    play_icon.style.display = "block";
}
// order btn part
// var full_btn = document.querySelectorAll(".full_btn");
// full_btn.forEach(function(btn){
//     btn.addEventListener("mouseover", function(e){
//         e.target.children[0].style.display = "none";
//         e.target.children[1].style.display = "block";
//     });
// });
// full_btn.forEach(function(btn){
//     btn.addEventListener("mouseout", function(e){
//         e.target.children[0].style.display = "block";
//         e.target.children[1].style.display = "none";
//     });
// });


// search input: javascript


// var sea_btn = document.getElementById("sea_btn");
// function hide_se(){
//     sea_btn.style.display = "none";
// }
// function show_se(){
//     sea_btn.style.display = "block";
// }
var sea_ico_sm = document.getElementById("sea_ico_sm");
if(sea_ico_sm){
sea_ico_sm.addEventListener("click", function(){
    let nav_ele = document.getElementById("nav_ele");
    let search_ele = document.getElementById("search_ele");
    if(search_ele.classList.contains('hidden')){
        if(search_ele.classList.contains('fadeOut')){
            search_ele.classList.remove('fadeOut');
            search_ele.classList.add('fadeIn');
            nav_ele.classList.add('hidden');
            search_ele.classList.remove('hidden');
        }
        else{nav_ele.classList.add('hidden');
        search_ele.classList.remove('hidden');}
    }
    else{
        search_ele.classList.remove('fadeIn');
        search_ele.classList.add('fadeOut');
        setTimeout(() => {
            search_ele.classList.add('hidden');
            nav_ele.classList.remove('hidden');
            nav_ele.classList.add('fadeIn');
        }, 400);
    }
});
}


// popup: javascript
// var close_cart = document.getElementById("close_cart");
// close_cart.addEventListener("click", function(){
//     console.log("close_cart");
//     let add_cart_modal = document.getElementById("addToCartModal");
//     let full_width = document.getElementById("full_width");
//     if(!add_cart_modal.classList.contains('hidden')){
//         add_cart_modal.classList.remove('fadeIn');
//         add_cart_modal.classList.add('fadeOut');
//         setTimeout(() => {
//             add_cart_modal.classList.add('hidden');
//             add_cart_modal.classList.remove('fadeOut');
//             full_width.classList.remove('blur-md');
//             full_width.classList.remove('opacity-50');
//             full_width.classList.remove('bg-gray-500');
//             full_width.classList.add('bg-white');
//         }, 200);
//     }
// });



// var full_width = document.getElementById("full_width");
// var cart_btn = document.querySelectorAll(".cart_btn");
// var add_cart_modal = document.getElementById("addToCartModal");

// var cart_ent = document.getElementById("save-button");
// var cart_sec = document.getElementById("cart_sec");
// var close_cart_2 = document.getElementById("close_cart_2");
// cart_btn.addEventListener("click", function(){
//     if(add_cart_modal.classList.contains('hidden')){
//         if(add_cart_modal.classList.contains('fadeOut')){
//             add_cart_modal.classList.remove('fadeOut');
//             full_width.classList.remove('bg-white');
//             full_width.classList.add('blur-md');
//             full_width.classList.add('opacity-50');
//             full_width.classList.add('bg-gray-500');
//             full_width.classList.add('overflow-hidden');
//             full_width.classList.add('h-[100vh]');
//             add_cart_modal.classList.remove('hidden');
//             add_cart_modal.classList.add('fadeIn');
//             cart_btn.classList.add('hidden');
//         }
//         else{
//             full_width.classList.remove('bg-white');
//             full_width.classList.add('blur-md');
//             full_width.classList.add('opacity-50');
//             full_width.classList.add('bg-gray-500');
//             full_width.classList.add('overflow-hidden');
//             full_width.classList.add('h-[100vh]');
//             add_cart_modal.classList.remove('hidden');
//             add_cart_modal.classList.add('fadeIn');
//             cart_btn.classList.add('hidden');
//         }
//     }
// });
// close_cart.addEventListener("click", function(){
//     if(!add_cart_modal.classList.contains('hidden')){
//         add_cart_modal.classList.remove('fadeIn');
//         add_cart_modal.classList.add('fadeOut');
//         setTimeout(() => {
//             add_cart_modal.classList.add('hidden');
//             add_cart_modal.classList.remove('fadeOut');
//             full_width.classList.remove('blur-md');
//             full_width.classList.remove('opacity-50');
//             full_width.classList.remove('bg-gray-500');
//             full_width.classList.remove('overflow-hidden');
//             full_width.classList.remove('h-[100vh]');
//             full_width.classList.add('bg-white');
//             cart_btn.classList.remove('hidden');
//         }, 200);
//     }
// });
// cart_ent.addEventListener("click", function(){
//     if(!add_cart_modal.classList.contains('hidden')){
//         add_cart_modal.classList.remove('fadeIn');
//         add_cart_modal.classList.add('fadeOut');
//         setTimeout(() => {
//             add_cart_modal.classList.add('hidden');
//             if(cart_sec.classList.contains('hidden')){
//                 cart_sec.classList.remove('hidden');
//                 cart_sec.classList.add('fadeIn');
//             }
//         }, 200);
//     }
// });
// close_cart_2.addEventListener("click", function(){
//     if(!cart_sec.classList.contains('hidden')){
//         cart_sec.classList.remove('fadeIn');
//         cart_sec.classList.add('fadeOut');
//         setTimeout(() => {
//             cart_sec.classList.add('hidden');
//             cart_sec.classList.remove('fadeOut');
//             full_width.classList.remove('blur-md');
//             full_width.classList.remove('opacity-50');
//             full_width.classList.remove('bg-gray-500');
//             full_width.classList.remove('overflow-hidden');
//             full_width.classList.remove('h-[100vh]');
//             full_width.classList.add('bg-white');
//             cart_btn.classList.remove('hidden');
//         }, 200);
//     }
// });







// extra new code 
// var go_to_pro = document.getElementById('go_to_pro');
// const goToProd = () => {
//     var real_content = document.getElementById('real-content'); 
//     real_content.scrollIntoView({
//         behavior: "smooth",
//     });
// };
// go_to_pro.addEventListener('click', goToProd);



// extra old js code start from here

// Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
		scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
		let cart_data = $('#cart-data');
		let full_width_4 = $('#full_width');
		let add_cart_section = $("#add-cart-modal");
		if(cart_data.hasClass("hidden") && add_cart_section.hasClass("hidden") ){
			mybutton.style.display = "block";
		}
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

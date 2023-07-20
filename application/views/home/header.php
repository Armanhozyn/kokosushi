<!DOCTYPE html>
<html lang='en'>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>
    <?php if (isset($meta_title)){
      echo $meta_title;
    } else {
      echo 'Rainbow Sushi Mol - Bestel Online Official';} ?>
  </title>


  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="description" content="<?php
  if(isset($meta_description)){echo $meta_description;}; ?>">
  <meta name="description" content="<?php if (isset($meta_author)) {echo $meta_author; }?>">
  <meta name="keywords" content="<?php if(isset($meta_keywords)) {echo $meta_keywords;}  ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="canonical" href="<?php if (isset($meta_canonical) ) {
    echo $meta_canonical;
  } else {
    echo 'https://kokorosushi.be/';} ?>" />



  

  <!-- ==============OG=================== -->
  <meta property="og:title" content="Rainbow Sushi Mol - Bestel Online Official">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://kokorosushi.be/">
  <meta property="og:image" content="https://kokorosushi.be/assets/images/sushi_mol.png">
  <meta property="og:description" content="Beste Sushi Mol, heerlijke sushi gerechten zijn sushi combo's, broodjes en nigiri met saus. afhalen, Take Away">
  <meta property="og:site_name" content="Kokorosushi">
  <!-- ==============OG=================== -->
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/idea_style.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/idea_style2.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/idea_style3.css"> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114"
    href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120"
    href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144"
    href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152"
    href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180"
    href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"
    href="<?php echo base_url(); ?>assets/images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="144x144"
    href="<?php echo base_url(); ?>assets/images/favicon/android-icon-144x144.png">
  <link rel="icon" type="image/png" sizes="32x32"
    href="<?php echo base_url(); ?>assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96"
    href="<?php echo base_url(); ?>assets/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16"
    href="<?php echo base_url(); ?>assets/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo base_url(); ?>assets/images/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
  
  

  
  

  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Corporation",
  "name": "Sushi Mol Kokoro",
  "alternateName": "Sushi Mol",
  "url": "https://kokorosushi.be",
  "logo": "https://kokorosushi.be/assets/images/sushi_mol.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+32 14872578",
    "contactType": "customer service",
    "areaServed": "BE",
    "availableLanguage": ["en","Dutch"]
  },
  "sameAs": [
    "https://www.facebook.com/KokorosushiBentoMol",
    "https://www.takeaway.com/be-en/menu/kokoro-sushi",
    "https://www.instagram.com/kokorosushi21"
  ]
}
</script>

  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Restaurant",
  "name": "Sushi Mol",
  "image": "https://kokorosushi.be/assets/images/sushi_mol.png",
  "@id": "https://kokorosushi.be/",
  "url": "https://kokorosushi.be",
  "telephone": "+32 14 872 578",
  "menu": "https://kokorosushi.be",
  "servesCuisine": "VOORGERECHTEN, CRISPY ROLL, Sushi COMBO, Sushi BOX, Sushi BOAT, NIGIRI & SASHIMI, KIDS MENU, POKE BOWL & SHIRAISHI, SOUP, DONBURI, NOEDELS, UDON, CALIFORNIA ROLL, HANDROLL TEMAKI, RICE PAPER, SASHIMI ROLL, GREEN SPRING ROLL, NIGIRI & GUNKAN KOUDE",
  "acceptsReservations": "true",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "CORBIESTRAAT 21",
    "addressLocality": "Mol",
    "postalCode": "2400",
    "addressCountry": "BE"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 51.18681092091911,
    "longitude": 5.117387324884575
  } ,
  "sameAs": [
    "https://www.facebook.com/KokorosushiBentoMol",
    "https://www.instagram.com/kokorosushi21"
  ] 
}
</script>

  <script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "VOORGERECHTEN",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "CRISPY ROLL",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 3, 
    "name": "COMBO/BOX/BOAT",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 4, 
    "name": "NIGIRI & SASHIMI COMBO",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 5, 
    "name": "KIDS MENU",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 6, 
    "name": "POKE BOWL & SHIRAISHI",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 7, 
    "name": "SOUP, DONBURI, NOEDELS, UDON",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 8, 
    "name": "CALIFORNIA ROLL",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 9, 
    "name": "CHEF ROLL /SPECIAAL",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 10, 
    "name": "MEGA - LUX ROLL",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 11, 
    "name": "HOSOMAKI",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 12, 
    "name": "HANDROLL TEMAKI",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 13, 
    "name": "RICE PAPER SASHIMI ROLL",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 14, 
    "name": "GREEN SPRING ROLL",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 15, 
    "name": "NIGIRI & GUNKAN",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 16, 
    "name": "KOUDE DRANKEN",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 17, 
    "name": "WARME DRANKEN",
    "item": "https://kokorosushi.be/"  
  },{
    "@type": "ListItem", 
    "position": 18, 
    "name": "DESSERTS",
    "item": "https://kokorosushi.be/"  
  }]
}
</script>

  <style>

    .link{
      color: #FE4545;
    }

    #btn-back-to-top {
      position: fixed;
      display: none;
    }


    /* back to top css start */

    #back2Top {
      width: 50px;
      height: 50px;
      overflow: hidden;
      z-index: 999;
      display: none;
      cursor: pointer;
      position: fixed;
      bottom: 150px;
      right: 5px;
      text-align: center;
      font-size: 30px;
      text-decoration: none;
      border-radius: 50%;
      transition: 0.5s;
    
    }

  #back2Top:hover .icon{
  animation: anim 0.5s linear 0s 1 ;
  }

  @keyframes anim {
  0%{
    transform: translateY(0rem);
    opacity: 1;
  }
  48%{
    transform: translateY(-3rem);
    opacity: 1;
    
  }
  49%{
    transform: translateY(3rem);
    opacity: 0;
    color: #dcb14a;
  }
  50%{
    transform: translateY(3rem);
    opacity: 0;
    color: white;
  }
  100%{
    transform: translateY(0rem);
  }
  
}







    /* back to top css end */

  .section {
  width: 100%;
  /* height: 80vh; */
  display: flex;
  justify-content: center;
  align-items: center;
  animation: floating 5s cubic-bezier(0.37, 0, 0.63, 1) infinite;
}

.tilt {
  display: flex;
  justify-content: center;
  align-items: center;
  animation: tilting 10s cubic-bezier(0.37, 0, 0.63, 1) infinite;
}

.section span {
  transition: font-weight 0.4s ease-in;
  animation: floating-secondary 2.5s cubic-bezier(0.37, 0, 0.63, 1) infinite;
}

.section span:nth-child(1) {
  animation-delay: 1s;
}
.section span:nth-child(2) {
  animation-delay: 2s;
}
.section span:nth-child(3) {
  animation-delay: 3s;
}
.section span:nth-child(4) {
  animation-delay: 4s;
}
.section span:nth-child(5) {
  animation-delay: 5s;
}
.section span:nth-child(6) {
  animation-delay: 6s;
}
.section span:nth-child(7) {
  animation-delay: 7s;
}
.section span:nth-child(8) {
  animation-delay: 8s;
}
.section span:nth-child(9) {
  animation-delay: 9s;
}
.section span:nth-child(10) {
  animation-delay: 10s;
}
.section span:nth-child(11) {
  animation-delay: 11s;
}
.section span:nth-child(12) {
  animation-delay: 4s;
}
.section span:nth-child(13) {
  animation-delay: 3s;
}
.section span:nth-child(14) {
  animation-delay: 2s;
}
.section span:nth-child(15) {
  animation-delay: 1s;
}

.section span:hover {
  font-weight: 100;
}

@keyframes floating {
  0% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(0, 5vh);
  }
  100% {
    transform: translate(0, 0);
  }
}

@keyframes floating-secondary {
  0% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(0, 1vh);
  }
  100% {
    transform: translate(0, 0);
  }
}

@keyframes tilting {
  0% {
    transform: rotate(1deg);
  }
  50% {
    transform: rotate(-1deg);
  }
  100% {
    transform: rotate(1deg);
  }
}

.bg-repeat{
  background-repeat: no-repeat;
  background-size: cover;
}


.hero {
    text-shadow: 5px 5px 2px white;
  }

    


  </style>
</head>
<div class="preloader">
  <div class="heart"></div>
</div>

<body class="">
  <div id="full_width" class="font-segoe bg-white website scroll-smooth">
    <div class="grid grid-cols-6 justify-evenly bg-[#ea2227] text-white py-[2px] text-sm font-medium">
      <div class="sm:col-span-3 col-span-6 text-[11px] font-light" style="text-align: center">
        <a style="color: #ffffff;" href="callto:+3214872578">
          <h2> <i class="fa fa-phone">&nbsp; + 32 14 872 578</i> </h2>
        </a>
      </div>
      <div class="sm:col-span-3 col-span-6 sm:mt-0 mt-1 flex justify-center" style="text-align: center">
        <span style="color: #ffffff;" class="mr-5">
          <h2> <i class="fa fa-map-marker-alt"></i> &nbsp;Corbiestraat 21 - 2400 Mol, Belgium </h2>
        </span>

      </div>
    </div>
    <!-- success -->
    <?php if ($this->session->flashdata('success') != ""): ?>
      <div id="success_msg" class="fadeIn fixed top-[0%] w-[-webkit-fill-available] z-20">
        <div
          class="h-screen flex items-center justify-center w-10/12 sm:w-8/12 md:w-7/12 lg:w-6/12 mx-auto drop-shadow-2xl">
          <div class="text-center bg-gray-100 py-2 px-3 sm:py-3 sm:px-6 rounded-2xl shadow-gray-300   shadow-inner">
            <div class="text-4xl font-bold text-green-700">
              success!
            </div>
            <hr class="my-[12px]">
            <div class="text-lg font-normal text-gray-800">
              <div class="leading-[24px]">
                <!-- your order has been placed successfully,<br>we will contact you soon. -->
                <?php echo $this->session->flashdata('success'); ?>
              </div>
              <div class="my-[12px] text-[#ff3131] font-semibold text-lg">Order number : <?php echo "#" . $this->session->flashdata('order_id'); ?></div>
              <div class="mb-[12px] flex items-center justify-center">
                <div class="text-[14px] md:text-[14px]">Call or WhatsApp us : +3214872578
                  <a target="_blank"
                    href="https://api.whatsapp.com/send?phone=+320484550510&text=Hi%2C+I+placed+an+order+%F0%9F%91%87%0A%0A%F0%9F%9B%B5%F0%9F%94%9C%F0%9F%8F%A1%0A%2ADelivery+Order+No%3A+<?php echo "%23" . $this->session->flashdata('order_id') ?>%2A%0A%0A---------%0A%F0%9F%97%92+Total%3A <?php echo "" . $this->session->flashdata('total_price'); ?>%0A%F0%9F%9B%B5+Delivery Method%3A <?php echo $this->session->flashdata('method') ?>"
                    class="ml-[10px] cursor-pointer"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
                <!-- <a target="_blank" href="https://api.whatsapp.com/send?phone=+320484550510&text=<?php echo "%23" . $this->session->flashdata('order_id') . ", Price: " . $this->session->flashdata('total_price'); ?>" class="ml-[10px] cursor-pointer"><i class="fa-brands fa-whatsapp"></i></a> -->

              </div>
            </div>
            <div class="mb-[12px] flex items-center justify-center">
              <button onclick="hide_sucess()"
                class="cursor-default lg:cursor-pointer font-bold text-xl bg-gradient-to-r from-[#fe1e62] via-[#fe5568] to-[#fe8a6d] text-white rounded-2xl px-[25px] py-[2px]">close</button>
            </div>

          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- success -->

    <!-- navbar -->
    <div  class="w-full pt-3">
      <div  class="w-full">
      <!-- <div id="nav_ele" class="col-span-12"> -->
        <ul class="space-x-8 font-bold flex justify-center flex-wrap">
          <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a
              href="<?php echo base_url(); ?>">Home</a></li>
          <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a
              href="<?php echo base_url(); ?>about">About</a></li>
          <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a
              href="<?php echo base_url(); ?>chef">Chef</a></li>
          <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a
              href="https://g.page/r/CWkabtmzbkabEAg/review" target="_blank" style="
                display: flex;
            ">Feedback Please<img src="https://www.kokorosushi.be//assets/images/good-sushi-review.svg"
                style="width:100px;margin-left: 6px;" alt="star"></a></li>
          <!-- <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a href="<?php echo base_url(); ?>contact">Contact</a></li> -->
        </ul>
      </div>
    </div>
    <!-- navbar -->

    <button id="back2Top" title="Back to top" class="bg-red-600 text-white ">
      <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-4 h-6 mx-auto icon" role="img"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path fill="currentColor"
          d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z">
        </path>
      </svg>
    </button>


    <div style="background-image: url('https://wallpaperaccess.com/full/2176668.jpg'); display: none;" class="lg:flex justify-between items-center md:px-10 md:h-[80vh] p-5 bg-repeat">
      <img src="https://www.gifcen.com/wp-content/uploads/2022/01/valentines-day-gif-10.gif" class="img-fluid rounded-top" alt="">
      <section class="section" aria-label="Floating Logo">
        <!--<div class="tilt">-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">W</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">E</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-white">--</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">A</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">R</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">E</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-white">--</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">O</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">P</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">E</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">N</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-white">--</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">T</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">O</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">D</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">A</span>-->
        <!--  <span class="lg:text-5xl text-2xl font-bold text-red-500 hero">Y</span>-->
        <!--</div>-->
      </section>
    </div>


    <script>
      $(window).scroll(function () {
        var height = $(window).scrollTop();
        if (height > 100) {
          $('#back2Top').fadeIn();
        } else {
          $('#back2Top').fadeOut();
        }
      });
      $(document).ready(function () {
        $("#back2Top").click(function (event) {
          event.preventDefault();
          $("html, body").animate({ scrollTop: 0 }, 2000);
          return false;
        });

      });
    </script>

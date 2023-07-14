<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo htmlspecialchars($this->Setting_Model->get('meta_title')); ?></title>
	<meta name="description" content="<?php echo htmlspecialchars($this->Setting_Model->get('meta_description')); ?>">
	<meta name="keywords" content="<?php echo htmlspecialchars($this->Setting_Model->get('meta_keywords')); ?>"/>
	<meta name="author" content="<?php echo htmlspecialchars($this->Setting_Model->get('meta_author')); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="https://www.kokorosushi.be" />
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<style>
		.website{
			display: none;
		}
/*		html,
		body {
			height: 100%;
		}
		body {
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: #ecf0f1;
		}*/
.preloader{
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: auto;
	height: auto;
	margin: 0px auto;
	z-index: 1000;
}
		.heart {

			position: relative;
		}
		.heart,
		.heart:before,
		.heart:after {
			/*border: 1px solid red;*/
			display: block;
			width: 10vh;
			height:10vh;
			margin: 0px auto;
			background-color: #ea2227;
			transform: rotateZ(45deg);

		}
		.heart:before,
		.heart:after {
			content: '';
			position: absolute;
			border-radius: 50%;
		}
		.heart:before {
			transform: translateX(-50%);
			animation: animX 3s infinite 0.75s;
		}
		.heart:after {
			transform: translateY(-50%);
			animation: animY 3s infinite;
		}
		@-moz-keyframes animX {
			0%, 25% {
				transform: translateX(-50%);
			}
			50%, 75% {
				transform: translateX(50%);
			}
		}
		@-webkit-keyframes animX {
			0%, 25% {
				transform: translateX(-50%);
			}
			50%, 75% {
				transform: translateX(50%);
			}
		}
		@-o-keyframes animX {
			0%, 25% {
				transform: translateX(-50%);
			}
			50%, 75% {
				transform: translateX(50%);
			}
		}
		@keyframes animX {
			0%, 25% {
				transform: translateX(-50%);
			}
			50%, 75% {
				transform: translateX(50%);
			}
		}
		@-moz-keyframes animY {
			0%, 25% {
				transform: translateY(-50%);
			}
			50%, 75% {
				transform: translateY(50%);
			}
		}
		@-webkit-keyframes animY {
			0%, 25% {
				transform: translateY(-50%);
			}
			50%, 75% {
				transform: translateY(50%);
			}
		}
		@-o-keyframes animY {
			0%, 25% {
				transform: translateY(-50%);
			}
			50%, 75% {
				transform: translateY(50%);
			}
		}
		@keyframes animY {
			0%, 25% {
				transform: translateY(-50%);
			}
			50%, 75% {
				transform: translateY(50%);
			}
		}



	</style>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.min.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="144x144"  href="<?php echo base_url();?>assets/images/favicon/android-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url();?>assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Sushi Mol Kokoro",
  "url": "https://www.kokorosushi.be",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.kokorosushi.be/ajaxsearch/fetch?query={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Sushi Mol Kokoro",
    "item": "https://www.kokorosushi.be"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "",
    "item": ""  
  }]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Restaurant",
  "name": "Sushi Mol Kokoro",
  "image": "https://www.kokorosushi.be/assets/images/sushi_mol.png",
  "@id": "https://www.kokorosushi.be",
  "url": "https://www.kokorosushi.be",
  "telephone": "+ 3214872578",
  "priceRange": "1-100",
  "menu": "https://www.kokorosushi.be",
  "servesCuisine": "Sushi",
  "acceptsReservations": "true",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "21 Corbiestraat",
    "addressLocality": "Mol",
    "postalCode": "2400",
    "addressCountry": "BE"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 51.1865813,
    "longitude": 5.1160071
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "09:00",
    "closes": "22:00"
  },
  "sameAs": "https://www.facebook.com/KokorosushiBentoMol" 
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Kokoro box Sushi",
  "image": "https://www.kokorosushi.be/assets/images/sushi_mol_box.jpg",
  "description": "61 stuks (2-3 p.). Rainbow roll, pink lady roll, tonijn avocado roll salmon roll cheese , ebi fry roll, nigiri mix sashimi mix & deep fried dragon eyes.",
  "brand": {
    "@type": "Brand",
    "name": "Kokoro Sushi"
  },
  "sku": "44",
  "offers": {
    "@type": "Offer",
    "url": "https://www.kokorosushi.be",
    "priceCurrency": "EUR",
    "price": "54",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "10",
    "bestRating": "",
    "worstRating": "",
    "ratingCount": "1",
    "reviewCount": "1"
  },
  "review": {
    "@type": "Review",
    "name": "Janssens",
    "reviewBody": "Best Sushi in Mol",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "10",
      "bestRating": "",
      "worstRating": ""
    },
    "datePublished": "2022-04-30",
    "author": {"@type": "Person", "name": ""}
  }
}
</script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        .scroll-top-wrapper {
            position: fixed;
            opacity: 0;
            visibility: hidden;
            overflow: hidden;
            text-align: center;
            z-index: 99999999;
            background-color: #777777;
            color: #eeeeee;
            width: 50px;
            height: 48px;
            line-height: 48px;
            right: 30px;
            bottom: 30px;
            padding-top: 2px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }
        .scroll-top-wrapper:hover {
            background-color: #888888;
        }
        .scroll-top-wrapper.show {
            visibility:visible;
            cursor:pointer;
            opacity: 1.0;
        }
        .scroll-top-wrapper i.fa {
            line-height: inherit;
        }

        .notice-box{
            padding-top: 10px;
        }

        .cart-item-name{
        color: #dc3545;
        font-size: 16px;
        }
        .cart-extra-items{
        color:#ee8108;
        }

        .sticky-nav{

        }



.wrap {
  margin: 0px auto;
  width: 486px;
}

.box {
  width: 100%;
  height: 120px;
 /*/ float: left;*/
  /*background: #347fc3;*/
  border: 1px solid #fff;
 /* overflow: hidden;*/
}

.text {
  font-weight: bold;
  text-align: center;
  /*margin-top: 56px;*/
  color: #c6071a;
  font-size: 18px;
  font-family: sans-serif;
  text-transform: uppercase;
}

.animated {
  animation-duration: 2.5s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
  40% {transform: translateY(-30px);}
  60% {transform: translateY(-15px);}
}
.bounce {
  animation-name: bounce;
}

@keyframes flash {
  0%, 50%, 100% {opacity: 1;}
  25%, 75% {opacity: 0;}
}
.flash {
  animation-name: flash;
}

@keyframes pulse {
  0% {transform: scale(1);}
  50% {transform: scale(1.1);}
  100% {transform: scale(1);}
}
.pulse {
  animation-name: pulse;
  animation-duration: 1s;
}

@keyframes rubberBand {
  0% {transform: scale(1);}
  30% {transform: scaleX(1.25) scaleY(0.75);}
  40% {transform: scaleX(0.75) scaleY(1.25);}
  60% {transform: scaleX(1.15) scaleY(0.85);}
  100% {transform: scale(1);}
}
.rubberBand {
  animation-name: rubberBand;
}

@keyframes shake {
  0%, 100% {transform: translateX(0);}
  10%, 30%, 50%, 70%, 90% {transform: translateX(-10px);}
  20%, 40%, 60%, 80% {transform: translateX(10px);}
}
.shake {
  animation-name: shake;
}

@keyframes swing {
  20% {transform: rotate(15deg);}
  40% {transform: rotate(-10deg);}
  60% {transform: rotate(5deg);}
  80% {transform: rotate(-5deg);}
  100% {transform: rotate(0deg);}
}
.swing {
  transform-origin: top center;
  animation-name: swing;
}

@keyframes wobble {
  0% {transform: translateX(0%);}
  15% {transform: translateX(-25%) rotate(-5deg);}
  30% {transform: translateX(20%) rotate(3deg);}
  45% {transform: translateX(-15%) rotate(-3deg);}
  60% {transform: translateX(10%) rotate(2deg);}
  75% {transform: translateX(-5%) rotate(-1deg);}
  100% {transform: translateX(0%);}
}
.wobble {
  animation-name: wobble;
}

@keyframes flip {
  0% {transform: perspective(400px) translateZ(0) rotateY(0) scale(1);animation-timing-function: ease-out;}
  40% {transform: perspective(400px) translateZ(150px) rotateY(170deg) scale(1);animation-timing-function: ease-out;}
  50% {transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);animation-timing-function: ease-in;}
  80% {transform: perspective(400px) translateZ(0) rotateY(360deg) scale(.95);animation-timing-function: ease-in;}
  100% {transform: perspective(400px) translateZ(0) rotateY(360deg) scale(1);animation-timing-function: ease-in;}
}
.animated.flip {
  backface-visibility: visible;
  animation-name: flip;
}

@keyframes lightSpeedIn {
  0% {transform: translateX(100%) skewX(-30deg);opacity: 0;}
  60% {transform: translateX(-20%) skewX(30deg);opacity: 1;}
  80% {transform: translateX(0%) skewX(-15deg);opacity: 1;}
  100% {transform: translateX(0%) skewX(0deg);opacity: 1;}
}
.lightSpeedIn {
  animation-name: lightSpeedIn;
  animation-timing-function: ease-out;
}

@keyframes rollIn {
  0% {opacity: 0;transform: translateX(-100%) rotate(-120deg);}
  100% {opacity: 1;transform: translateX(0px) rotate(0deg);}
}
.rollIn {
  animation-name: rollIn;
}

@keyframes rotateIn {
  0% {transform-origin: center center;transform: rotate(-200deg);opacity: 0;}
  100% {transform-origin: center center;transform: rotate(0);opacity: 1;}
}
.rotateIn {
  animation-name: rotateIn;
}

@keyframes hinge {
  0% {transform: rotate(0);transform-origin: top left;animation-timing-function: ease-in-out;}
  20%, 60% {transform: rotate(80deg);transform-origin: top left;animation-timing-function: ease-in-out;}
  40% {transform: rotate(60deg);transform-origin: top left;animation-timing-function: ease-in-out;}
  80% {transform: rotate(60deg) translateY(0);transform-origin: top left;animation-timing-function: ease-in-out;}
  100% {transform: translateY(700px);}
}
.hinge {
  margin: 20px;
  animation-name: hinge;
}

@media all and (max-width: 680px) {
  .wrap {
   width: 100%;
  }
  .box {
    width: 100%;
  height: 55px;
    clear: both;
    margin: 0px auto;
  }
  .text {
   margin-top: 20px; 
  }
  .hingebox, .flipbox {
     display: none; 
  }
}
		.h1-heading {
			font-size: 36px;
		}

		@media (max-width: 850px) {
			.h1-heading {
				font-size:24px;
			}

			.h2-heading{
				font-size: 16px;
				margin-bottom: 20px;
			}
		}

		@media (max-width: 500px) {
			.h1-heading {
				font-size:3vh;
			}
			.h2-heading{
				font-size: 12px;

			}
			.heading-box{
				margin-bottom: 20px;
			}
		}

    </style>
    


</head>
<div class="preloader">
	<div class="heart"></div>
</div>
<body>
<div class="website">
<div class="container-fluid bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="text-align: center">
                <a style="color: #ffffff;" href="callto:+3214872578"><i class="fa fa-phone">&nbsp; + 32 14 872 578</i></a>
            </div>
            <div class="col-sm-6" style="text-align: center">
                <span style="color: #ffffff;"><i class="fa fa-map-marker-alt"></i> &nbsp;Corbiestraat 21 - 2400 Mol, Belgium</span>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid header">
    <div class="container">
        <div class="logo-box" >
            <a href="<?php echo base_url(); ?>" >
                <img src="<?php echo base_url(); ?>assets/images/kokorosushi-blank.png" class="logo" alt="Kokoro Sushi Logo">
            </a>
        </div>
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('cart_error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('cart_error'); ?>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

    </div>
   
</div>

  <div class="container box heading-box">
	  <h1 class="h1-heading" style="text-align: center">Sushi Mol, Nami, Rolls</h1>
	  <h2 class="text animated pulse h2-heading">Pickup (afhalen) 10% korting</h2>
  </div>

<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>

<div class="container">


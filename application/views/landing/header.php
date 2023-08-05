<!DOCTYPE html>
<html lang="en">

<head>
    <!--================ Basic page needs ================-->
    <title>KOKORO SUSHI & BENTO</title>
    <meta charset="UTF-8">
    <meta name="author" content="Rafaet Hossain">
    <meta name="keywords" content="shushi,bento, belgium,RESTELO,restaurant">
    <meta name="description" content="Sushi restaurant in RESTELO, Belgium">
    <!--================ Mobile specific metas ================-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--================ Favicon ================-->
    <link rel="shortcut icon" href="<?php echo $asset_url; ?>images/favicon.ico">
    <!--================ Google web fonts ================-->
    <link href="https://fonts.googleapis.com/css?family=Barlow:400,500,600,700,800,900%7CLato:300i,400,400i,700,700i,900&display=swap" rel="stylesheet">
    <!--================ Vendor CSS ================-->
    <link rel="stylesheet" href="<?php echo $asset_url; ?>css/fontawesome-all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons%7CMaterial+Icons+Outlined%7CMaterial+Icons+Two+Tone%7CMaterial+Icons+Round%7CMaterial+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>css/linearicons.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/arcticmodal/jquery.arcticmodal-0.3.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/revolution/css/settings.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/revolution/css/layers.min.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>vendors/revolution/css/navigation.min.css">
    <!--================ Theme CSS ================-->
    <link rel="stylesheet" href="<?php echo $asset_url; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $asset_url; ?>css/responsive.css">
    <!--================ Vendor JS ================-->
    <script src="<?php echo $asset_url; ?>vendors/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $asset_url; ?>vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function scrollToDiv(div) {
            $('html, body').animate({
                scrollTop: $("#"+ div +"").offset().top
            }, 2000);
        }

    </script>
</head>

<body>
<div class="mad-preloader"></div>
<div id="mad-page-wrapper" class="mad-page-wrapper">
    <!--================ Search Modal ================-->
    <div class="mad-d-none">
        <div id="search-modal" class="mad-modal mad-modal--search">
            <button type="button" class="arcticmodal-close"><i class="material-icons">close</i></button>
            <h4 class="mad-title">Search</h4>
            <!--================ Search Form ================-->
            <form role="search" method="get" class="mad-searchform">
                <input type="text" name="s" placeholder="Type your keyword here">
                <button type="submit"><i class="material-icons">search</i></button>
            </form>
            <!--================ End of Search Form ================-->
        </div>
    </div>
    <!--================ End of Search Modal ================-->
    <!--================ Header ================-->
    <!--================ Header ================-->
    <header id="mad-header" class="mad-header style-2 mad-header--transparent">
        <div class="container">
            <!--================ Section ================-->
            <div class="mad-header-section">
                <div class="mad-header-items item-col-3">
                    <div class="mad-header-item">
                        <div><i class="material-icons mad-icon">phone</i> <b>+32 14 872 578</b></div>
                    </div>
                    <div class="mad-header-item">
                        <a href="<?php echo site_url('Landing'); ?>" class="mad-logo"><img src="<?php echo $asset_url; ?>images/kokorosushi-logo.png" alt="KokoroSushi Logo"></a>
                    </div>
                    <div class="mad-header-item">
                        <div class="mad-actions" style="display: none;">
                            <div class="mad-item">
                                <a href="#" class="mad-item-link"><i class="material-icons">person_outline</i></a>
                            </div>
                            <div class="mad-item mad-dropdown">
                                <a href="#" type="button" class="mad-item-link mad-dropdown-title"><span class="mad-count">3</span><i class="material-icons">shopping_cart</i></a>
                                <div class="shopping-cart mad-dropdown-element">
                                    <div class="mad-products mad-product-small">
                                        <div class="mad-col">
                                            <!-- Product -->
                                            <div class="mad-product">
                                                <button class="mad-close-item"><i class="licon-cross-circle"></i></button>
                                                <a href="#" class="mad-product-image">
                                                    <img src="<?php echo $asset_url; ?>images/72x72_img1.jpg" alt="">
                                                </a>
                                                <!-- product-info -->
                                                <div class="mad-product-description">
                                                    <a href="#" class="mad-product-title mad-link">Tuna Roll</a>
                                                    <span class="mad-product-price">1 × $7.99</span>
                                                </div>
                                                <!--/ product-info -->
                                            </div>
                                            <!-- End of Product -->
                                        </div>
                                        <div class="mad-col">
                                            <!-- Product -->
                                            <div class="mad-product">
                                                <button class="mad-close-item"><i class="licon-cross-circle"></i></button>
                                                <a href="#" class="mad-product-image">
                                                    <img src="<?php echo $asset_url; ?>images/72x72_img2.jpg" alt="">
                                                </a>
                                                <!-- product-info -->
                                                <div class="mad-product-description">
                                                    <a href="#" class="mad-product-title mad-link">Yaki Niku Roll</a>
                                                    <span class="mad-product-price">1 × $13.99</span>
                                                </div>
                                                <!--/ product-info -->
                                            </div>
                                            <!-- End of Product -->
                                        </div>
                                    </div>
                                    <div class="sc-footer">
                                        <div class="subtotal">Subtotal: $21.98</div>
                                        <a href="#" class="btn btn-small w-100"><span>Checkout</span> <i class="material-icons">arrow_right_alt</i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="mad-item">
                                <a href="#" class="mad-item-link" data-arctic-modal="#search-modal"><i class="material-icons">search</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================ End of Section ================-->
            <div class="mad-header-section--sticky-xl">
                <div class="container">
                    <!--================ Navigation ================-->
                    <nav class="mad-navigation-container">
                        <ul class="mad-navigation mad-navigation--vertical-sm">
                            <li class="menu-item  current-menu-item"><a href="<?php echo site_url('Landing'); ?>">Home</a>

                            </li>
                            <li class="menu-item"><a href="#">About Us</a></li>
                            <li class="menu-item"><a onclick="scrollToDiv('footer-contact')" href="#">Contact Us</a></li>
                            <li class="menu-item"><a href="<?php echo site_url('home/index'); ?>">Order Online</a></li>

                        </ul>
                    </nav>
                    <!--================ End of Navigation ================-->
                </div>
            </div>
        </div>
    </header>
    <!--================ End of Header ================-->
    <!--================ End of Header ================-->

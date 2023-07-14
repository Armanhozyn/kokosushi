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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/idea_style.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/idea_style2.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/idea_style3.css"> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style>
	#btn-back-to-top {
  position: fixed;
  display: none;
}
</style>
</head>
<div class="preloader">
	<div class="heart"></div>
</div>
<body>
  <div id="full_width" class="font-segoe bg-white website scroll-smooth">
    <div class="grid grid-cols-6 justify-evenly bg-[#ea2227] text-white py-[2px] text-sm font-medium">
            <div class="sm:col-span-3 col-span-6 text-[11px] font-light" style="text-align: center">
                <a style="color: #ffffff;" href="callto:+3214872578"><h2> <i class="fa fa-phone">&nbsp; + 32 14 872 578</i> </h2> </a>
            </div>
            <div class="sm:col-span-3 col-span-6 sm:mt-0 mt-1" style="text-align: center">
                <span style="color: #ffffff;"><h2> <i class="fa fa-map-marker-alt"></i> &nbsp;Corbiestraat 21 - 2400 Mol, Belgium </h2></span>
            </div>
    </div>
    <!-- success -->
    <?php if ($this->session->flashdata('success') != ""):?>
    <div id="success_msg" class="fadeIn fixed top-[0%] w-[-webkit-fill-available] z-20">
        <div class="h-screen flex items-center justify-center w-10/12 sm:w-8/12 md:w-7/12 lg:w-6/12 mx-auto drop-shadow-2xl">
            <div class="text-center bg-gray-100 py-2 px-3 sm:py-3 sm:px-6 rounded-2xl shadow-gray-300   shadow-inner">
                <div class="text-4xl font-bold text-green-700">
                    success!
                </div>
                <hr class="my-[25px]">
                <div class="text-lg font-normal text-gray-800">
                <div class="leading-[35px]">
                    <!-- your order has been placed successfully,<br>we will contact you soon. -->
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <div class="my-[25px]">contact us : +3214872578</div>
                </div>
                <button onclick="hide_sucess()" class="mb-[25px] cursor-default lg:cursor-pointer font-bold text-xl bg-gradient-to-r from-[#fe1e62] via-[#fe5568] to-[#fe8a6d] text-white rounded-2xl px-[25px] py-[2px]">close</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- success -->
  <!-- navbar -->
  <div class="grid grid-cols-12 m-auto justify-items-center pt-4">
        <div id="nav_ele" class="col-span-12">
            <ul class="space-x-8 font-bold">
                <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a href="<?php echo base_url(); ?>about">About</a></li>
                <li class="float-left hover:text-[#fb5b5b] duration-200 cursor-pointer"><a href="<?php echo base_url(); ?>contact">Contact</a></li>
            </ul>
        </div>
    </div>
    <!-- navbar -->

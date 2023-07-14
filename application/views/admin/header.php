<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Kokoro Sushi </title>
    <link href="<?php echo G::path("css") ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo G::path("css") ?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo G::path("css") ?>datepicker3.css" rel="stylesheet">
    <link href="<?php echo G::path("css") ?>lightbox.css" rel="stylesheet">
    <link href="<?php echo G::path("css") ?>styles.css" rel="stylesheet">

    <script src="<?php echo G::path("js") ?>jquery-1.11.1.min.js"></script>
    <script src="<?php echo G::path("js") ?>bootstrap.min.js"></script>
    <script src="<?php echo G::path("js") ?>chart.min.js"></script>
    <!-- <script src="<?php echo G::path("js") ?>chart-data.js"></script> -->
    <script src="<?php echo G::path("js") ?>easypiechart.js"></script>
    <script src="<?php echo G::path("js") ?>easypiechart-data.js"></script>
    <script src="<?php echo G::path("js") ?>bootstrap-datepicker.js"></script>
    <script src="<?php echo G::path("js") ?>lightbox.js"></script>
    <script src="<?php echo G::path("js") ?>custom.js"></script>


    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php //var_dump($user); exit();?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="<?php echo site_url('admin/index') ?>"><span>Kokoro</span> Sushi</a>
            <ul class="nav navbar-top-links navbar-right" style="display: none">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box"><a href="javascript:void(0)" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">3 mins ago</small>
                                    <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">1 hour ago</small>
                                    <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
                <li  class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">

            <div class="profile-usertitle-name"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form style="display: none" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">


        <li class="active"><a href="<?php echo site_url("admin/index") ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

		<!-- Category -->
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-flash"></em> Ticker <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="<?php echo site_url("admin/ticker_list") ?>">
                        <span style="color: #ffb632;" class="fa fa-list ">&nbsp;</span> Ticker List
                    </a></li>
                <li><a class="" href="<?php echo site_url("admin/ticker_add") ?>">
                        <span style="color: #1cbf13;" class="fa fa-list ">&nbsp;</span> Add Ticker
                    </a></li>

            </ul>
        </li> 	<!-- Tickers End -->

		<!-- Category -->
		<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-cubes"></em> Categories <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-2">
				<li><a class="" href="<?php echo site_url("admin/category_list") ?>">
						<span style="color: #ffb632;" class="fa fa-list ">&nbsp;</span> Category List
					</a></li>
				<li><a class="" href="<?php echo site_url("admin/category_add") ?>">
						<span style="color: #1cbf13;" class="fa fa-list ">&nbsp;</span> Add Category
					</a></li>

			</ul>
		</li> 	<!-- Category End -->

		<!-- Product -->
		<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-cart-arrow-down"></em> Products <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-3">
				<li><a class="" href="<?php echo site_url("admin/product_list") ?>">
						<span style="color: #ffb632;" class="fa fa-list ">&nbsp;</span> Product List
					</a></li>
				<li><a class="" href="<?php echo site_url("admin/product_add") ?>">
						<span style="color: #1cbf13;" class="fa fa-list ">&nbsp;</span> Add Product
					</a></li>

			</ul>
		</li> 	<!-- Product End -->

		<!-- Product -->
		<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-cart-arrow-down"></em> Settings <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-4">
				<li><a class="" href="<?php echo site_url("admin/setting_list") ?>">
						<span style="color: #ffb632;" class="fa fa-list ">&nbsp;</span> Setting List
					</a></li>


			</ul>
		</li> 	<!-- Product End -->



		<!--
		<li><a href="javascript: void(0);"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
		<li><a href="javascript: void(0);"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
		<li><a href="javascript: void(0);"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
		<li><a href="javascript: void(0);"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
		<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
				<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
				<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
			</ul>
		</li>
		-->
        <li><a href="<?php echo site_url("auth/logout"); ?>"><em style="color: #ff1700;" class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->

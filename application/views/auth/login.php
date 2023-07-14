<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="<?php echo G::path('css') ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo G::path('css') ?>datepicker3.css" rel="stylesheet">
    <link href="<?php echo G::path('css') ?>styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src='https://www.google.com/recaptcha/api.js'></script>

    <style>
        .rs-header{
            background-color: #01223F;
            padding: 10px;
            margin-bottom: 10px;
        }
        .rs-header h1{
            text-transform: uppercase;
            color: #e0e0e0;
            text-align: center;
            font-weight: 900;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="rs-header">
                <img style="max-width: 200px; display: block; margin: 0px auto;" class="img img-responsive" src="https://www.kokorosushi.be/assets/images/kokoro logo_wh.svg">
                <h1>KoKoRo Sushi</h1>
            </div>
            <div class="panel-heading"><?php echo lang('login_heading');?></div>

            <div class="panel-body">

                <p><?php echo lang('login_subheading');?></p>
                <?php echo form_open("auth/login", array('role'=>'form'));?>
                <?php if($message): ?>
                <div class="alert alert-info">
                    <?php echo $message;?>
                </div>

                <?php endif; ?>

                    <fieldset>
                        <div class="form-group">
                            <?php echo form_input(array_merge($identity, array('class'=>'form-control','placeholder'=>'Username or Email','autofocus'=>'')));?>

                        </div>
                        <div class="form-group">

                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
						<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
						<div class="checkbox">
                            <label>

                                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember Me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button></fieldset>
                <?php echo form_close(); ?>

                <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="<?php echo G::path('js') ?>jquery-1.11.1.min.js"></script>
<script src="<?php echo G::path('js') ?>bootstrap.min.js"></script>
</body>
</html>

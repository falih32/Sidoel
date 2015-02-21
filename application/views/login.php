<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="KeyWords" content="kementrian, perikanan, kelautan, indonesia">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistem Disposisi Elektronik</title>
    <link rel="icon" href="<?php echo base_url();?>assets/css/images/icon.ico">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/sidoel.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-default" style="background-color:rgba(255, 255, 255, 0.75)">
        	<div class="panel-body">
                <div class="col-sm-2"><img src="<?php echo base_url();?>assets/css/images/logokelautan.png" alt="logo kelautan" width="75%"></div>
                <div class="col-md-10 text-center">
                	<h2>SISTEM DISPOSISI ELEKTRONIK (SIDOEL)</h2>
                    <h3>KEMENTERIAN KELAUTAN DAN PERIKANAN REPUBLIK INDONESIA<br>
                    <small>Ministry of Marine Affairs and Fisheries Republic of Indonesia</small></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?=base_URL()?>login/do_login" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" id="username" placeholder="username" name="username" value="<?php echo set_value('username')?>"  type="text" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password" placeholder="password" name="password" type="password" value="<?php echo set_value('password')?>" >
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <div class="text-right">
                            	<a href="<?php echo site_url('ResetUser/forgot_password'); ?>"> Lupa password? </a>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-sm btn-success" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
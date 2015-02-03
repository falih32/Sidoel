<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="Author" content="junno">
	<meta name="KeyWords" content="kementrian, perikanan, kelautan, indonesia">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Test view</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container" align="center">
	    <nav class="navbar navbar-inverse">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
	    </nav>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-md-3 col-md-offset-3">
                    Logo
                </div>
                <div class="col-md-3">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?=base_URL()?>index.php/login/do_login" method="post">
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
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-sm btn-success" value="Login">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
	</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="Author" content="<?php echo $author; ?>">
	<meta name="KeyWords" content="kementrian, perikanan, kelautan, indonesia">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container" align="center">
    	<div id="header"><?php $this->load->view('head'); ?></div>
        <div id="content"><?php $this->load->view($content); ?></div>
        <div id="footer"><?php $this->load->view('footer'); ?></div>
	</div>
</body>
</html>
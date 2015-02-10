<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="KeyWords" content="kementrian, perikanan, kelautan, indonesia">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/sidoel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/dataTables.responsive.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2_min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.3_min.js"></script>
    <!--<![endif]-->
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	// <![CDATA[
	$(document).ready(function () {
		$(function () {
			$( "#kode_surat" ).autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('admin/get_klasifikasi'); ?>",
						data: { kode: $("#kode_surat").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}    
					});
				},
			});
		});
		
		$(function () {
			$( "#dari" ).autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('admin/get_instansi_lain'); ?>",
						data: { kode: $("#dari").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}    
					});
				},
			});
		});
		
		
		$(function() {
			$( ".tgl" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
		});
                
                var counterValue = parseInt($('.notif').html());
                
                function removeAnimation(){
                    setTimeout(function() {
                        $('.notif').removeClass('animating')
                    }, 1000);           
                }

                $('#dis-notif').on('click',function(){
                 $.ajax({
                    url: "Disposisi/updateNotifZero",
                    type: "POST",
                    data: { 'username': user, 'liked': '1' },                   
                    success: function()
                                {
                                    alert("ok");                                    
                                }
                });
                    counterValue = 0; // increment
                    $('.notif').html(counterValue).addClass('animating'); // animate it
                        removeAnimation(); // remove CSS animating class
                });
                
                
	// ]]>
	</script>
</head>
<body>
	<div id="container">
    	<div id="header"><?php $this->load->view('head'); ?></div>
        <div id="content"><?php $this->load->view($content); ?></div>
        <div id="footer"><?php $this->load->view('footer'); ?></div>
	</div>
</body>
</html>
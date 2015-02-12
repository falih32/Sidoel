<?php 
    $usr_id_notif = $this->session->userdata('id_user');
    if($usr_id_notif){$notifDisposisi = $this->db->query("select usr_total_read from t_user where usr_id = '$usr_id_notif'")->row()->usr_total_read;}
	else{$notifDisposisi = 0;}
 ?>
<?php $onpage= strtolower($this->uri->segment(1)); ?>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">SIDOEL</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <?php if($this->session->userdata('id_user') != '') {?>
        <li <?php if($onpage == "" || $onpage == "dashboard")echo "class='active'"; ?>><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
        <li <?php if($onpage == "suratmasuk")echo "class='active'"; ?>><a href="<?php echo site_url("SuratMasuk"); ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Masuk</a></li>
        <?php if($this->session->userdata('id_user') <= 2){ ?>
        <li <?php if($onpage == "disposisi")echo "class='active'"; ?>><a id = "dis-notif" href="<?php echo site_url("Disposisi"); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi</a></li>
        <?php } ?>
        <li <?php if($onpage == "disposisi")echo "class='active'"; ?>><a id = "dis-notif" href="<?php echo site_url("Disposisi/disposisi_saya"); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Inbox Disposisi <span id="notif" class="notif"><?php echo $notifDisposisi;?></span></a></li>
        <li class="dropdown <?php if($onpage == "user" || $onpage == "unittujuan" || $onpage == "unitterusan" || $onpage == "role")echo "active"; ?>">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Referensi <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url("User"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> User</a></li>
            <li><a href="<?php echo site_url("UnitTujuan"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Unit Tujuan </a></li>
             <li><a href="<?php echo site_url("UnitTerusan"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Unit Terusan</a></li>
            <li><a href="<?php echo site_url("Log"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Log</a></li>
          </ul>
        </li>
       <?php }?>
       </ul>
       <ul class="nav navbar-nav navbar-right">
       	<li><a href="<?php echo site_url('login/logout'); ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
       </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<?php if($this->session->flashdata('message') != ""){ $msg=$this->session->flashdata('message');?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="alert alert-<?php echo $msg['class']?> alert-dismissible" role="alert">
        <?php echo $msg['msg']; ?>
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        </div>
    </div>
</div>
<?php } ?>
<?php $onpage= $this->uri->segment(1); ?>
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
        <li <?php if($onpage == "")echo "class='active'"; ?>><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
        <li <?php if($onpage == "suratmasuk" || $onpage == "SuratMasuk")echo "class='active'"; ?>><a href="<?php echo site_url("SuratMasuk"); ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Masuk</a></li>
        <li <?php if($onpage == "disposisi" || $onpage == "Disposisi")echo "class='active'"; ?>><a href="<?php echo site_url("Disposisi"); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi</a></li>
        <li class="dropdown"<?php if($onpage == "User" || $onpage == "UnitTujuan" || $onpage == "UnitTerusan" || $onpage == "Role")echo "class='active'"; ?>>
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Referensi <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url("User"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> User</a></li>
            <li><a href="<?php echo site_url("UnitTujuan"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Unit Tujuan </a></li>
             <li><a href="<?php echo site_url("UnitTerusan"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Unit Terusan</a></li>
            <li><a href="<?php echo site_url("Log"); ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Log</a></li>
          </ul>
        </li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
       	<li><a href="<?php echo site_url('login/logout'); ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
       </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">SIMPEL</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
        <li><a href="<?php echo site_url("SuratMasuk"); ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Masuk</a></li>
        <li><a href="<?php echo site_url("Disposisi"); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<h1>Anda berhasil login :D </h1>
<hr />
Hai, <?php echo $this->session->userdata('username');?> :D
<br />
Selamat Datang di website coba - coba...
<br /><br />
<a href="<?php echo site_url('login/logout'); ?>">keluar</a>
</br>

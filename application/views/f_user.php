<?php
	if($this->uri->segment(2) == "edit_surat_masuk"){
		$mode = 'edit';
		$nama = $userlist-> nama;
		$username = $userlist-> username;
		$NIP = $dataSuSrat-> NIP;
		$nomorhp = $userlist-> nomorhp;
                $level = $userlist->level;
                $password = $userlist->password;
                $konfirm = $userlist->konfirm;
			}
	else{
		$mode = 'add';
		$nama = "";
		$username = "";
		$NIP = "";
		$nomorhp = "";
                $level = "";
                $password ="";
                $konfirm ="";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Register User</h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."suratmasuk/proses_edit_smasuk";}else{echo base_url()."suratmasuk/proses_tambah_smasuk";}?>" class="form-horizontal" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label text-left">Nama</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>">
                        </div>
                    </div>
              <div class="form-group">
                        <label for="username" class="col-sm-2 control-label text-left">Username</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NIP" class="col-sm-2 control-label text-left">NIP</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="NIP" name="NIP" placeholder="Nomor Induk Pegawai" value="<?php echo $NIP; ?>">
                             </div>
                    </div>
               <div class="form-group">
                        <label for="nomorhp" class="col-sm-2 control-label text-left">Nomor Handphone</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="nomorhp" name="nomorhp" placeholder="Nomor Handphone" value="<?php echo $nomorhp; ?>">
                        </div>
                    </div>
                       
                    <div class="form-group">
                        <label for="level" class="col-sm-2 control-label text-left">User Level</label>
                        <div class="col-sm-10">
	                   		 <input type="text" class="form-control" id="level" name="level" placeholder="User Level" value="<?php echo $level; ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label text-left">Password</label>
                        <div class="col-sm-10">
	                   		 <input type="text" class="form-control" id="password" name="password" placeholder="User Password" value="<?php echo $password; ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konfirm" class="col-sm-2 control-label text-left">Konfirmasi Password</label>
                        <div class="col-sm-10">
	                   		 <input type="text" class="form-control" id="konfirm" name="konfirm" placeholder="User Password" value="<?php echo $konfirm; ?>">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="<?php echo base_url()."suratmasuk";?>"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="reset" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset</button>
                            <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>
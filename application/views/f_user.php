<?php
	if($this->uri->segment(2) == "edit_surat_masuk"){
		$mode = 'edit';
		$nama = $dataSurat-> nama;
		$username = $dataSurat-> username;
		$NIP = $dataSurat-> NIP;
		$NIP_diterima = $dataSurat-> NIP_diterima;
		$NIP_dtlanjut = $dataSurat-> NIP_dtlanjut;
		$tenggat_wkt = $dataSurat-> tenggat_wkt;
		$perihal = $dataSurat-> perihal;
		$jenis_surat = $dataSurat-> jenis_surat;
		$agenda = $dataSurat-> no_agenda;
		$unit_tujuan = $dataSurat-> unit_tujuan;
		$keterangan = $dataSurat-> keterangan;
	}
	else{
		$mode = 'add';
		$nama = "";
		$username = "";
		$NIP = "";
		$NIP_diterima = "";
		$NIP_dtlanjut = "";
		$tenggat_wkt = "";
		$perihal = "";
		$jenis_surat = "";
		$agenda = "";
		$unit_tujuan = "";
		$keterangan = "";
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
                        <div class="col-sm-3">
	                        <input type="text" class="form-control" id="NIP" name="NIP" placeholder="Nomor Induk Pegawai" value="<?php echo $NIP; ?>">
                             </div>
               <div class="form-group">
                        <label for="nomorhp" class="col-sm-2 control-label text-left">Nomor Handphone</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="nomorhp" name="nomorhp" placeholder="Nomor Handphone" value="<?php echo $nomorhp; ?>">
                        </div>
                    </div>
                       
                        <div class="col-sm-3">
	                   		 <p class="help-block">Level</p>       <input type="text" class="form-control" id="level" name="level" placeholder="User Level" value="<?php echo $level; ?>">
                            <p class="help-block">Password</p>
                        </div>
                        
                        <div class="col-sm-3">
	                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                    <div class="form-group">
                        <label for="konfirm" class="col-sm-2 control-label text-left">Konfirmasi Password</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="konfirm" name="konfirm" placeholder="Password" value="<?php echo $konfirm; ?>">
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
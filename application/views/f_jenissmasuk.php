<?php
	if($mode == 'edit'){
		$id = $dataJenis->jsm_id;
		$jsm_nama_jenis = $dataJenis-> jsm_nama_jenis;
                $jsm_keterangan = $dataJenis-> jsm_keterangan;
			}
	else{
		
		$jsm_nama_jenis = "";
                $jsm_keterangan ="";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."jenissmasuk/proses_edit_jmasuk";}else{echo base_url()."jenissmasuk/proses_tambah_jmasuk";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jsm_nama_jenis" class="col-sm-4 control-label text-left">Jenis Surat Masuk</label>
                        <div class="col-sm-8">
	                        <input type="text" class="form-control" id="jsm_nama_jenis" name="jsm_nama_jenis" placeholder="Jenis Surat Masuk" value="<?php echo $jsm_nama_jenis; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                              <label for="jsm_keterangan" class="col-sm-4 control-label text-left">Keterangan</label>
                              <div class="col-sm-8">
                                      <textarea class="form-control" id="jsm_keterangan" name="jsm_keterangan" placeholder="Keterangan Jenis Surat Masuk" value="<?php echo $jsm_keterangan; ?>" required></textarea>
                                  <div class="help-block with-errors"></div>
                              </div>
                          </div>
                    </div>
                
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
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
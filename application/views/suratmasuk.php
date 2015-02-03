<div class="container">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Surat masuk</h3>
            </div>
            <div class="panel-body">
            <form method="post" action="SuratMasuk/tambah_surat_masuk" class="form-horizontal">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_surat" class="col-sm-2 control-label text-left">No. Surat</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="nomor_surat" placeholder="No. Surat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengerim" class="col-sm-2 control-label text-left">Pengirim</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="pengirim" placeholder="Pengirim">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_srt" class="col-sm-2 control-label text-left">Tanggal</label>
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="tgl_srt" placeholder="yyyy-mm-dd">
                            <p class="help-block">Tanggal surat</p>
                        </div>
                        
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="tgl_srt_diterima" placeholder="yyyy-mm-dd">
                            <p class="help-block">Tanggal surat diterima</p>
                        </div>
                        
                        <div class="col-sm-3">
	                        <input type="date" class="form-control tgl" id="tgl_srt_dtlanjut" placeholder="yyyy-mm-dd">
                            <p class="help-block">Tenggat Waktu untuk ditindaklanjuti</p>
                        </div>
                        
                        <div class="col-sm-1">
                            <label>
                              <input type="checkbox" id="tenggat_wkt" value="1">
                            </label>
                            <p class="help-block">Tanpa tenggat waktu</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="perihal" class="col-sm-2 control-label text-left">Perihal</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="perihal" placeholder="Perihal">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_surat" class="col-sm-2 control-label text-left">Jenis</label>
                        <div class="col-sm-4">
	                        <select class="form-control" id="jenis_surat">
                            	<option value="">test</option>
                            </select>
                        </div>
                        <label for="no_agenda" class="col-sm-2 control-label text-left">Agenda</label>
                        <div class="col-sm-4">
	                        <input type="text" class="form-control" id="no_agenda" placeholder="Agenda">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit_tujuan" class="col-sm-2 control-label text-left">Unit Tujuan</label>
                        <div class="col-sm-10">
	                        <select class="form-control" id="unit_tujuan">
                            	<option value="">test</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label text-left">Keterangan</label>
                        <div class="col-sm-10">
	                        <textarea rows="5" class="form-control" id="keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="SuratMasuk"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
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
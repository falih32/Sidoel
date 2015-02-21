<?php $ins_instruksi  = $instruksi;
       $utr_unitTerusan = $unitTerusan;
?>
    

<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%;margin: 0px;padding: 0px}
	tr { border: solid 1px #000;margin: 0px;padding: 0px}
	td { padding: 7px 0px; margin: 0px;}
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 60%;margin: 0px;padding: 0px}
	tr { border: solid 1px #000;margin: 0px;padding: 0px}
	td { padding: 7px 0px; margin: 0px;}
</style>
</head>

<body>
    <table border="1">
    	<tr>
            <td style="text-align: center" colspan="4"><h3>Kementerian Kelautan dan Perikanan</h3>
                <h3>Sekretariat Jenderal</h3>
                <h3>BIRO UMUM</h3>
                <h3>Lembar Disposisi</h3>
            </td>
        </tr>
        <tr><td rowspan="4" style="width: 50%">&nbsp;Dari :
            
            <?php echo $suratMasuk->sms_pengirim;?>
            
            </td><td colspan="2" style="width: 25%">&nbsp;Diterima tanggal </td><td style="width: 25%">:
            
            <?php echo $suratMasuk->sms_tgl_srt_diterima;?>
            
            </td></tr>
        <tr><td colspan="2">&nbsp;Surat Nomor</td><td>:
            
            <?php echo $suratMasuk->sms_nomor_surat;?>
            
            </td></tr>
        <tr><td colspan="2">&nbsp;Tanggal</td><td>:
                
            <?php echo $suratMasuk->sms_tgl_srt;?>
            
            </td></tr>
        <tr><td colspan="2">&nbsp;Lampiran</td><td colspan="2">:</td></tr>
        <tr>
          <td rowspan="2">&nbsp;Hal :
          
          <?php echo $suratMasuk->sms_perihal;?>
           
          </td><td colspan="2">&nbsp;Sifat</td><td colspan="2">:
          
          <?php echo $suratMasuk->jsm_nama_jenis;?>
          
          </td></tr>
        <tr>
          <td colspan="3" rowspan="5">&nbsp;Untuk :
          
        
           <div class="col-sm-10 checkbox text-left">
               <form>
                       <?php foreach($ins_instruksi as $row){?>
                       <label class="checkbox">
                           <input type="checkbox" class="form-control" id="ins_instruksi" name="ins_instruksi[<?php echo $row->ins_id; ?>]" disabled value="<?php echo $row->ins_id?>"
                            <?php if ($disposisiInstruksi != ''){ foreach($disposisiInstruksi as $rowIn){?>
                            	<?php if($row->ins_id == $rowIn->din_id_instruksi){echo "checked";}?>
							<?php }} ?>>
							<?php echo $row->ins_nama_instruksi; ?><br>
                            </label>
                            <?php } ?>
               </form>
                        </div>
              &nbsp;Catatan:
              <br>
              <br>
              <br>
              <br>
          </td>
        </tr>
        <tr>
            <td>&nbsp;Indek :</td>
        </tr>
        <tr>
          <td>&nbsp;Kode :</td>
        </tr>
        <tr>
          <td>&nbsp;Diteruskan :
          <div class="col-sm-10 checkbox text-left">
               <form>
                       <?php foreach($utr_unitTerusan as $row){?>
                       <label class="checkbox">
                           <input type="checkbox" class="form-control" id="utr_unitTerusan" name="utr_unitTerusan[<?php echo $row->utr_id; ?>]" disabled value="<?php echo $row->utr_id?>"
                            <?php if ($disposisiUnitTerusan != ''){ foreach($disposisiUnitTerusan as $rowUt){?>
                            	<?php if($row->utr_id == $rowUt->dut_id_unit_terusan){echo "checked";}?>
							<?php }} ?>>
							<?php echo $row->utr_nama_unit_trsn; ?><br>
                            </label>
                            <?php } ?>
               </form>
           </div>
              </td>
        </tr>
        <tr>
          <td>&nbsp;Kasubbag :</td>
        </tr>
        <tr><td>&nbsp;1. Oleh Sekretaris Pribadi</td><td style="width: 16%;text-align: center">Tanggal</td><td style="text-align: center">Paraf</td><td style="text-align: center">Catatan Penyelesaian</td></tr>
        <tr><td>&nbsp;Diterima</td>
          <td> </td><td> </td><td> </td></tr>
        <tr><td>&nbsp;Diteruskan</td><td> </td><td> </td><td> </td></tr>
        <tr><td>&nbsp;Diterima Kembali</td><td> </td><td> </td><td> </td></tr>
        <tr><td>&nbsp;2. Oleh Unit Kerja Ybs</td><td> </td><td> </td><td> </td></tr>
        <tr><td>&nbsp;Diterima</td><td> </td><td> </td><td> </td></tr>
        <tr><td>&nbsp;Diselesaikan</td><td> </td><td> </td><td> </td></tr>
    </table>
    
</body>
</html>
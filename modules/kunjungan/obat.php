
<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if(isset($_POST['dataidobat'])) {
	$kode_pasien = $_POST['dataidobat'];

  // fungsi query untuk menampilkan data dari tabel obat
  $query = mysqli_query($mysqli, "SELECT kode_pasien,nama,tgl_lhr,alamat,alergi FROM data_pasien WHERE kode_pasien='$kode_pasien'")
                                  or die('Ada kesalahan pada query tampil data pasien: '.mysqli_error($mysqli));

  // tampilkan data
  $data = mysqli_fetch_assoc($query);

  $tgl_lhr   = $data['tgl_lhr'];
  $alamat = $data['alamat'];
 

	if($tgl_lhr != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Tanggal Lahir</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='tgl_lhr' name='tgl_lhr' value='$tgl_lhr' readonly>
                    <span class='input-group-addon'>$alamat</span>
                    
                    
                </div>
              </div>";
              
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Tanggal Lahir</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='tgl_lhr' name='tgl_lhr' value='tgl_lhr obat tidak ditemukan' readonly>
                    <span class='input-group-addon'>Tanggal Lahir obat tidak ditemukan</span>
                  </div>
                </div>
              </div>";
	}		
}
?> 
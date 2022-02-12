<?php
require_once "../../config/database.php";
$kode_pasien = $_GET['kode_pasien'];
$query = mysqli_query($conn, "select * from data_pasien where kode_pasien LIKE '%$kode_pasien%'");
$pasien = mysqli_fetch_array($query);
$data = array(
			'nama'      => $pasien['nama'],
			'tgl_lhr'      => $pasien['tgl_lhr'],
			'alamat'      => $pasien['alamat'],);
			// 'tahun'   =>  $aset['tahun'],);

 echo json_encode($data);
?>

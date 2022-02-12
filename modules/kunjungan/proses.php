

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            // $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));
 

 $no_urut             = mysqli_real_escape_string($mysqli, trim($_POST['no_urut']));
 $kode_pasien         = mysqli_real_escape_string($mysqli, trim($_POST['kode_pasien']));

 $poli             = mysqli_real_escape_string($mysqli, trim($_POST['poli']));
// $diagnosis            = mysqli_real_escape_string($mysqli, trim($_POST['diagnosis']));
            
 $tanggal            = mysqli_real_escape_string($mysqli, trim($_POST['tgl_kun']));
 $exp                = explode('-',$tanggal);
 $tgl_kun     = $exp[2]."-".$exp[1]."-".$exp[0];
            // perintah query untuk menyimpan data ke tabel obat masuk
            $query = mysqli_query($mysqli, "INSERT INTO data_kunjungan(no_urut,kode_pasien,poli,tgl_kun) 
           
            VALUES('$no_urut','$kode_pasien','$poli','$tgl_kun')")

             or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

                // cek query
                if ($query) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=kunjungan&alert=1");
                }
              
        }   
    }
}       
?>
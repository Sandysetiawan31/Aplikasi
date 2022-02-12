

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
 

                 $kode_pasien             = mysqli_real_escape_string($mysqli, trim($_POST['kode_pasien']));
                 // $nama_pas                = mysqli_real_escape_string($mysqli, trim($_POST['nama_pas']));
                 $dokter                  = mysqli_real_escape_string($mysqli, trim($_POST['dokter']));
                 $keluhan                 = mysqli_real_escape_string($mysqli, trim($_POST['keluhan']));
                $diagnosis                = mysqli_real_escape_string($mysqli, trim($_POST['diagnosis']));
                $t1                       = mysqli_real_escape_string($mysqli, trim($_POST['t1']));
                $t2                       = mysqli_real_escape_string($mysqli, trim($_POST['t2']));
                 $t3                       = mysqli_real_escape_string($mysqli, trim($_POST['t3']));
 $t4                       = mysqli_real_escape_string($mysqli, trim($_POST['t4']));
 $t5                       = mysqli_real_escape_string($mysqli, trim($_POST['t5']));

                                                    
            // perintah query untuk menyimpan data ke tabel obat masuk
            $query = mysqli_query($mysqli, "INSERT INTO data_medis(kode_pasien,dokter,keluhan,diagnosis,t1,t2,t3,t4,t5) 
           
            VALUES('$kode_pasien','$dokter','$keluhan','$diagnosis','$t1','$t2','$t3','$t4','$t5')")

             or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

                // cek query
                if ($query) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=rekam_medis&alert=1");
                }
              
        }   
    }
}       
?>
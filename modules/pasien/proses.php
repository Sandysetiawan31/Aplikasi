
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
            $kode_pasien       = mysqli_real_escape_string($mysqli, trim($_POST['kode_pasien']));
            $nama            = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jk              = mysqli_real_escape_string($mysqli, trim($_POST['jk']));
            $tgl_lhr         = mysqli_real_escape_string($mysqli, trim($_POST['tgl_lhr']));
            $alamat          = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $pekerjaan       = mysqli_real_escape_string($mysqli, trim($_POST['pekerjaan']));
            $no_telp         = mysqli_real_escape_string($mysqli, trim($_POST['no_telp']));
            $alergi          = mysqli_real_escape_string($mysqli, trim($_POST['alergi']));
           
            // perintah query untuk menyimpan data ke tabel PASIEN
            $query = mysqli_query($mysqli, "INSERT INTO data_pasien(kode_pasien,nama,jk,tgl_lhr,alamat,pekerjaan,no_telp,alergi)

            VALUES('$kode_pasien','$nama','$jk','$tgl_lhr','$alamat','$pekerjaan','$no_telp','$alergi')")

            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pasien&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kode_pasien'])) {
                // ambil data hasil submit dari form
            $kode_pasien       = mysqli_real_escape_string($mysqli, trim($_POST['kode_pasien']));
            $nama            = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jk              = mysqli_real_escape_string($mysqli, trim($_POST['jk']));
            $tgl_lhr         = mysqli_real_escape_string($mysqli, trim($_POST['tgl_lhr']));
            $alamat          = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $pekerjaan       = mysqli_real_escape_string($mysqli, trim($_POST['pekerjaan']));
            $no_telp         = mysqli_real_escape_string($mysqli, trim($_POST['no_telp']));
            $alergi          = mysqli_real_escape_string($mysqli, trim($_POST['alergi']));
            
                
                // perintah query untuk mengubah data pada tabel obat
                $query = mysqli_query($mysqli, "update data_pasien set nama='$_POST[nama]',jk='$_POST[jk]',tgl_lhr='$_POST[tgl_lhr]',alamat='$_POST[alamat]',pekerjaan='$_POST[pekerjaan]',no_telp='$_POST[no_telp]',alergi='$_POST[alergi]' where kode_pasien='$_POST[kode_pasien]'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pasien&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $kode_pasien = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM data_pasien WHERE kode_pasien='$kode_pasien'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pasien&alert=3");
            }
        }
    }       
}       
?>
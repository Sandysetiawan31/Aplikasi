<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel kunjungan
    $query = mysqli_query($mysqli, "SELECT a.no_urut,a.kode_pasien,a.poli,a.tgl_kun,b.kode_pasien,b.nama,b.alamat,b.tgl_lhr FROM data_kunjungan as a INNER JOIN data_pasien as b ON a.kode_pasien=b.kode_pasien  WHERE a.tgl_kun BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY no_urut ASC") 
    or die('Ada kesalahan pada query tampil Kode pasien : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>

    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title >LAPORAN KUNJUNGAN PASIEN</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" /></td>
   
    </head>
    <body>
        

        <div id="title">
            LAPORAN KUNJUNGAN PASIEN
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
         <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE PASIEN</th>
                        <th height="20" align="center" valign="middle">NAMA PASIEN</th>
                        
                        <th height="20" align="center" valign="middle">TANGGAL LAHIR</th>
                        <th height="20" align="center" valign="middle">TANGGAL KUNJUNG</th>
                        <th height="20" align="center" valign="middle">ALAMAT</th>
                        <th height="20" align="center" valign="middle">POLI</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                  
                    <td style='padding-left:5px;' width='80' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                     <td width='80' height='13' align='center' valign='middle'></td>
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
             // tampil tgl lhr
               $tanggal         = $data['tgl_lhr'];
              $exp              = explode('-',$tanggal);
              $tgl_lhr          = $exp[2]."-".$exp[1]."-".$exp[0];
             // tgl kun
              $tanggal         = $data['tgl_kun'];
              $exp             = explode('-',$tanggal);
              $tgl_kun   = $exp[2]."-".$exp[1]."-".$exp[0];
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[kode_pasien]</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[nama]</td>
                        <td width='80' height='13' align='center' valign='middle'>$tgl_lhr</td>
                        <td width='80' height='13' align='center' valign='middle'>$tgl_kun</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[alamat]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[poli]</td>
                        
                    </tr>";
            $no++;
        }
    }
?>  
                </tbody>
            </table>

            <div id="footer-tanggal">
                Penerokan, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Kepala Puskesmas Peneroan <br> 
                Kecamatan Bajubang 
            </div>
             
            <div id="footer-nama">
                Ns. UMAR, S.Kep, M.KM
            </div>

            <div width='1045' height='600' align="center">
                NIP: 196802141988031002
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA OBAT KUNJUNGAN.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
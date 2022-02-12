<?php
 $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rekam_medis", $con);
if ($_POST)
{}

 $data = mysql_query("SELECT * FROM data_medis,data_pasien,data_kunjungan WHERE data_medis.kode_pasien=data_pasien.kode_pasien AND data_medis.kode_pasien=data_kunjungan.kode_pasien ");
?>
<html>
<head>
 <title>laporan</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    
</head>
<body>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" rowspan="3" align="center"><img src="../../images/user/index2.png" width="79" height="81"></td>
    <td height="30" align="center" valign="bottom"><font size="4"><strong>PEMERINTAH MUARA BULIAN DINAS DINAS KESEHATAN</strong></font></td>
    <td width="70" rowspan="3" align="center"><img src="../../images/user/index.jpeg" width="79" height="81"></td>
  </tr>
  <tr>
    <td width="527" height="23" align="center" valign="middle"><h2><strong>PUSKESMAS PENEROKAN
    </strong></h2></td>
  </tr>
  <tr>
    <td height="58" align="center" valign="top"><p><font size="3+">Alamat : Jl. Muara Bulian - Tempino , Penerokan KM 44  Kec. Bajubang<br>
      Telp./fax (0741) 7577686 </u></font></p></td>
  </tr>
  
</table>
<hr>
  <table class="table" border="1" width="90%" style="border-collapse:collapse;" align="center">
   <thead style="background:#e8ecee">
     <tr class="tableheader">
                       
                
                 <!-- <th class="center">No.</th> -->
                <th class="center">Kode Pasien</th>
                <th class="center">Nama Pasien</th>
                <th class="center">Jenis Kelamin</th>
                <th class="center">Tanggal Lahir</th>
                <th class="center">Tanggal Kunjung</th>
                <th class="center">Poli</th>
                <th class="center">Dokter</th>
                <th class="center">Keluhan</th>
                <th class="center">Diagnisis</th>
        </tr>
         </thead>
        <?php while($hasil = mysql_fetch_array($data)){ ?>
        <tr id="rowHover">
            <td align="center"><?php echo $hasil['kode_pasien']; ?></td>
            <td  id="column_padding"><?php echo $hasil['nama']; ?></td>
            <td  id="column_padding"><?php echo $hasil['jk']; ?></td>
            <td  id="column_padding"><?php echo $hasil['tgl_lhr']; ?></td>
            <td  id="column_padding"><?php echo $hasil['tgl_kun']; ?></td>
            <td  id="column_padding"><?php echo $hasil['poli']; ?></td>
            <td  id="column_padding"><?php echo $hasil['dokter']; ?></td>
            <td  id="column_padding"><?php echo $hasil['keluhan']; ?></td>
            <td  id="column_padding"><?php echo $hasil['diagnosis']; ?></td>
            
        </tr>
        <?php } ?>
 
    </table>

    </table>
  <table width=90%>
  <tr>
    <td colspan="2"></td>
    <td width="300"></td>
  </tr>
  <tr>
    <td width="230" align="center">&nbsp;</td>
    <td width="550"></td>
    <td align="Left">PENEROKAN, ............../................../ 20...
    <br>  Kepala Puskesmas Penerokan<br>
    <br> Kecamatan Bajubang </br></td>
  </tr>
  <tr>
    <td height="91" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /></td>
    <td>&nbsp;</td>
    <td width="20" align="Left" valign="top"><u>  Ns. UMAR, S.Kep, M.KM </u><br> 
                              NIP: 196802141988031002</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<script>
 {
    window.print();
}
</script>

</body>
</html>  

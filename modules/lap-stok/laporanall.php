<?php
 $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rekam_medis", $con);
if ($_POST)
{}

 $data = mysql_query("SELECT * FROM is_obat ");
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
    <td height="38" align="center" valign="top"><p><font size="1+">Alamat : Jl. Muara Bulian - Tempino , Penerokan KM 44  Kec. Bajubang<br>
      Telp./fax (0741) 7577686 </u></font></p></td>
  </tr>
  
</table>
<hr>
  <table class="table" border="1" width="90%" style="border-collapse:collapse;" align="center">
   <thead style="background:#e8ecee">
     <tr class="tableheader">
                       
                        <th  align="center">KODE OBAT</th>
                        <th  align="center">NAMA OBAT</th>
                        <th  align="center">BENTUK OBAT</th>
                        <th  align="center">ATURAN</th>
                        <th  align="center">INDIKAASI</th>
                        <th  align="center">KONTRAINDIKASI</th>
                        <th  align="center">EFEK SAMPING</th>
                        <th  align="center">DOSIS</th>
                        <th  align="center">SATUAN</th>
                        <th  align="center">STOK</th>
        </tr>
         </thead>
        <?php while($hasil = mysql_fetch_array($data)){ ?>
        <tr id="rowHover">
            <td align="center"><?php echo $hasil['kode_obat']; ?></td>
            <td  id="column_padding"><?php echo $hasil['nama_obat']; ?></td>
            <td  id="column_padding"><?php echo $hasil['btk_obat']; ?></td>
            <td  id="column_padding"><?php echo $hasil['atr_pakai']; ?></td>
            <td  id="column_padding"><?php echo $hasil['indikasi']; ?></td>
            <td  id="column_padding"><?php echo $hasil['kontraindikasi']; ?></td>
            <td  id="column_padding"><?php echo $hasil['efek_smp']; ?></td>
            <td  id="column_padding"><?php echo $hasil['dosis']; ?></td>
            <td  id="column_padding"><?php echo $hasil['satuan']; ?></td>
            <td  id="column_padding"><?php echo $hasil['stok']; ?></td>
            
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
    <td align="Left">Jambi, ............../................../ 20...
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
    <td width="250" align="Left" valign="top"><u> Ns. UMAR, S.Kep, M.KM</u><br/>
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

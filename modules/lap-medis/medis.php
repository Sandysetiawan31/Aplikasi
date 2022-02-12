
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Rekam Medis Pasien

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-medis/laporanall.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                 <th class="center">No.</th>
                <th class="center">Kode Pasien</th>
                <th class="center">Nama Pasien</th>
                <th class="center">Jenis Kelamin</th>
                <th class="center">Tanggal Lahir</th>
                <th class="center">Tanggal Kunjung</th>
                <th class="center">Poli</th>
                <th class="center">Dokter</th>
                <th class="center">Keluhan</th>
                <th class="center">Diagnisis</th>
                <!-- <th class="center">stok</th> -->
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT * FROM data_medis,data_pasien,data_kunjungan WHERE data_medis.kode_pasien=data_pasien.kode_pasien AND data_medis.kode_pasien=data_kunjungan.kode_pasien ")
              or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
               // tampil tgl lhr
               $tanggal         = $data['tgl_lhr'];
              $exp             = explode('-',$tanggal);
              $tgl_tgl   = $exp[2]."-".$exp[1]."-".$exp[0];
             // tgl kun
              $tanggal         = $data['tgl_kun'];
              $exp             = explode('-',$tanggal);
              $tgl_kun   = $exp[2]."-".$exp[1]."-".$exp[0];
              
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                       <td width='30' class='center'>$no</td>
                      <td width='90' class='center'>$data[kode_pasien]</td>
                      <td width='90' class='center'>$data[nama]</td>
                      <td width='100' class='center'>$data[jk]</td>
                      <td width='100' class='center'>$tgl_tgl</td>
                      <td width='100' class='center'>$tgl_kun</td>
                      <td width='70' class='center'>$data[poli]</td>
                      <td width='80' class='center'>$data[dokter]</td>
                      <td width='80' class='center'>$data[keluhan]</td>
                      <td width='100'>$data[diagnosis]</td>
                      
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content

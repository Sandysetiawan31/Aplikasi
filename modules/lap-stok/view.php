
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Stok Obat

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-stok/laporanall.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>
<br/>


<br/>
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
                <th class="center">Kode Obat</th>
                <th class="center">Nama Obat</th>
                <th class="center">bentuk</th>
                <th class="center">aturan</th>
                <th class="center">Indikasi</th>
                <th class="center">Kontraindikasi</th>
                <th class="center">Efek samping</th>
                <th class="center">dosis</th>
                <th class="center">satuan</th>
                <th class="center">stok</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT kode_obat,nama_obat,btk_obat,atr_pakai,indikasi,kontraindikasi,efek_smp,dosis,satuan,stok FROM is_obat ORDER BY nama_obat ASC")
              or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td >$no</td>
                      <td >$data[kode_obat]</td>
                      <td >$data[nama_obat]</td>
                      <td>$data[btk_obat]</td>
                      <td >$data[atr_pakai]</td>
                      <td >$data[indikasi]</td>
                      <td >$data[kontraindikasi]</td>
                      <td >$data[efek_smp]</td>
                      <td >$data[dosis]</td>
                      <td >$data[satuan]</td>
                      <td >$data[stok]</td>
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
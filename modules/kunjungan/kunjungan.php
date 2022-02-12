
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Kunjungan

    <a class="btn btn-primary btn-social pull-right" href="?module=form_kunjungan&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i>Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data obat baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Kunjungan baru berhasil disimpan.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr >
                <th class="center">No.</th>
                
                <th class="center">No Urut</th>
                <th class="center">Kode Pasien</th>
                <th class="center">Nama Pasien</th>
                <th class="center">Tanggal lahir</th>
                <th class="center">Tanggal Kunjung</th>
                 <th class="center">Alamat</th>
                 <th class="center">Poli</th>
                  
  
                
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel kunjungan
            $query = mysqli_query($mysqli, "SELECT a.no_urut,a.kode_pasien,a.poli,a.tgl_kun,b.kode_pasien,b.nama,b.alamat,b.tgl_lhr FROM data_kunjungan as a INNER JOIN data_pasien as b ON a.kode_pasien=b.kode_pasien ORDER BY no_urut ASC")

              or die('Ada kesalahan pada query tampil Data Kunjungan: '.mysqli_error($mysqli));

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
                      <td width='90' class='center'>$data[no_urut]</td>
                      <td width='90' class='center'>$data[kode_pasien]</td>
                      <td width='90' class='center'>$data[nama]</td>
                      <td width='100' class='center'>$tgl_tgl</td>
                      <td width='100' class='center'>$tgl_kun</td>
                      <td width='80' class='center'>$data[alamat]</td>
                      <td width='100'>$data[poli]</td>
                      
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
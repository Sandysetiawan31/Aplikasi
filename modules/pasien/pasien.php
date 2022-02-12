
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Pasien

    <a class="btn btn-primary btn-social pull-right" href="?module=form_pasien&form=add" title="Tambah Data" data-toggle="tooltip">
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
              Data Pasien baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data obat berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Pasien berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data obat berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Pasien berhasil dihapus.
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
                <th class="center">Kode Pasien</th>
                <th class="center">Nama Pasien</th>
                <th class="center">jenis kelamin</th>
                <th class="center">Tanggal Lahir</th>
                <th class="center">Alamat</th>
                <th class="center">Pekerjaan</th>
                 <th class="center">No Telp</th>
                  <th class="center">Alergi</th>
                   <th class="center">Actions</th>
  
                
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT kode_pasien,nama,jk,tgl_lhr,alamat,pekerjaan,no_telp,alergi FROM data_pasien ORDER BY kode_pasien ASC")                                            or die('Ada kesalahan pada query tampil Data Pasien: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
                 $tanggal         = $data['tgl_lhr'];
              $exp             = explode('-',$tanggal);
              $tgl_lhr   = $exp[2]."-".$exp[1]."-".$exp[0];
             // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                     
                       <td width='30' class='center'>$no</td>
                      <td width='90' class='center'>$data[kode_pasien]</td>
                      <td width='100' class='center'>$data[nama]</td>
                      <td width='100' class='center'>$data[jk]</td>
                      <td width='100' class='center'>$tgl_lhr</td>
                      <td width='80' class='center'>$data[alamat]</td>
                      <td width='80' class='center'>$data[pekerjaan]</td>
                      <td width='100' class='center'>$data[no_telp]</td>
                      <td width='100'>$data[alergi]</td>
                      
                      <td class='center'>
                        <div>

                        <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_pasien&form=edit&id=$data[kode_pasien]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
                          ?>
                         <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/pasien/proses.php?act=delete&id=<?php echo $data['kode_pasien'];?>" onclick="return confirm('Anda yakin ingin menghapus data Pasien <?php echo $data['nama']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
                          <?php
                 
              echo "    </div>
                      </td>















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
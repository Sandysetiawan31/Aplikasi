
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Obat

    <a class="btn btn-primary btn-social pull-right" href="?module=form_obat&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
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
              Data obat baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data obat berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data obat berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data obat berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data obat berhasil dihapus.
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
                <th></th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT kode_obat,nama_obat,btk_obat,atr_pakai,indikasi,kontraindikasi,efek_smp,dosis,satuan,stok FROM is_obat ORDER BY kode_obat ASC")                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

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
                      <td class='center'>
                        <div>

                        <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_obat&form=edit&id=$data[kode_obat]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
                          ?>
                         <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/obat/proses.php?act=delete&id=<?php echo $data['kode_obat'];?>" onclick="return confirm('Anda yakin ingin menghapus obat <?php echo $data['nama_obat']; ?> ?');">
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
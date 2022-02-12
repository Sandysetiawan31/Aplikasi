
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Pasien
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=obat"> Pasien </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pasien/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_Pasien,3) as kode FROM data_pasien
                         ORDER BY kode_pasien DESC LIMIT 1")
                  or die('Ada kesalahan pada query tampil kode_pasien : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_obat
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_obat
              $buat_id   = str_pad($kode, 3, "0", STR_PAD_LEFT);  
              $kode_pasien = "PS$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pasien</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_pasien" value="<?php echo $kode_pasien; ?>" readonly required>
                </div>
              </div>

              

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pasien</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" required>
                </div>
              </div>


                   <div class="form-group">
                <label class=" col-sm-2 control-label" for="inputPassword">Jenis Kelamin</label>
                
                <label class="col-sm-1 control-label" class="radio">
                <input type="radio" name="jk" id="optionsRadios1" value="laki-laki">
                Pria
                </label>
  
                <label class="col-sm-2 control-label" class="radio">
                <input type="radio" name="jk" id="optionsRadios1" value="Perempuan">
                Wanita
                </label>
              </div>





              <div class="form-group">
                <label class="col-sm-2 control-label">tanggal Lahir</label>
                <div class="col-sm-5">
                  <input onchange="isi_otomatis()" type="date" class="form-control" name="tgl_lhr" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat" autocomplete="off" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Pekerjaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pekerjaan" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">No Telp</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="no_telp" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alergi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alergi" autocomplete="off" required>
                </div>
              </div>



              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel obat
      $query = mysqli_query($mysqli,"SELECT kode_pasien,nama,jk,tgl_lhr,alamat,pekerjaan,no_telp,alergi FROM data_pasien  WHERE kode_Pasien='$_GET[id]'") 
         or die('Ada kesalahan pada query tampil Data obat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Data Pasien
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=opasien"> Pasien </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pasien/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pasien</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_pasien" value="<?php echo $data['kode_pasien']; ?>" readonly required>
                </div>
              </div>

              
             <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pasien</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jk" autocomplete="off" value="<?php echo $data['jk']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tgl_lhr" autocomplete="off" value="<?php echo $data['tgl_lhr']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Pekerjaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pekerjaan" autocomplete="off" value="<?php echo $data['pekerjaan']; ?>" required>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">No Telp</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="no_telp" autocomplete="off" value="<?php echo $data['no_telp']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alergi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alergi" autocomplete="off" value="<?php echo $data['alergi']; ?>" required>
                </div>
              </div>              


             
             

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat" class="btn btn-default btn-reset">Batal</a>
                </div>

              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

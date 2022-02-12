
<script type="text/javascript">
  function tampil_obat(input){
    var num = input.value;

    $.post("modules/kunjungan/obat.php", {
      dataidobat: num,
    }, function(response) {      
      $('#tgl_lhr').html(response)
    });
  }
</script>

<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Kunjungan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=kunjungan"> Kunjungan </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/kunjungan/proses.php?act=insert" method="POST" name="formObatMasuk">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat kode transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(no_urut,3) as kode FROM data_kunjungan
                                                ORDER BY no_urut DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil no_urut : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_transaksi
              // $tahun          = date("Y");
              $buat_id        = str_pad($kode, 3, "0", STR_PAD_LEFT);
              $no_urut = "NO-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">NO Urut</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="no_urut" value="<?php echo $no_urut; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Kunjung</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_kun" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

        

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pasien</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_pasien" data-placeholder="-- Pilih Nama Pasien --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="text"></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_pasien, nama FROM data_pasien ORDER BY nama ASC")
                                                            or die('Ada kesalahan pada query tampil nama: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[kode_pasien]\"> $data_obat[kode_pasien] | $data_obat[nama] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
              <span id='tgl_lhr'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="tgl_lhr" name="tgl_lhr" readonly required>
                </div>
              </div>
              </span>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Poli</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="poli" data-placeholder="-- Pilih Poli --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Poli Umum ">Poli Umum</option>
                    <option value="Poli KIA">Poli KIA</option>
                    <option value="Poli Lansia">Poli Lansia</option>
                                                          </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kunjungan" class="btn btn-default btn-reset">Batal</a>
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
?>
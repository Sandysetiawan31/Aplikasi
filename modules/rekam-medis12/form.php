
<script type="text/javascript">
  function tampil_obat(input){
    var num = input.value;

    $.post("modules/rekam-medis/rekam.php", {
      dataidobat: num,
    }, function(response) {      
      $('#tgl_lhr').html(response)
    });
  }
  //tombol url tambah
$(document).ready(function(){
  $("#tambah").click(function(){
    $("#formObatMasuk").attr("action","#");
    $("#formObatMasuk").submit();
  });
</script>

<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Medis
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
          <form role="form" class="form-horizontal" action="modules/rekam-medis/proses.php?act=insert" method="POST" name="formObatMasuk">
            <div class="box-body">

        

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pasien</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_pasien" data-placeholder="-- Pilih Kode Pasien --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="text"></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_pasien, nama FROM data_pasien ORDER BY nama ASC")
                                                            or die('Ada kesalahan pada query tampil nama: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[kode_pasien]\"> $data_obat[kode_pasien] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
             <!--  <span id='tgl_lhr'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="tgl_lhr" name="tgl_lhr" readonly required>
                </div>
              </div>
              </span>
               -->
               <div class="form-group">
                <label class="col-sm-2 control-label">dokter</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="dokter" data-placeholder="-- Pilih DOKTER--" autocomplete="off" required>
                    <option value=""></option>
                    <option value="DR. JONI ">DR.JONI</option>
                    <option value="DR.a>">DR.a</option>
                    <option value="DR.2>">DR.2</option>
                                                          </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Keluhan</label>
                  <div class="col-sm-5">
                    <textarea class="span8" name="keluhan" id="keluhan"></textarea>
                </div>
              </div>



             <div class="form-group">
                <label class="col-sm-2 control-label">Diagnosis</label>
                  <div class="col-sm-5">
                  <input type="text" class="form-control" name="diagnosis" autocomplete="off" required>
                </div>
              </div>
<?php $bar = 0; ?>
<form>
<input type="text" name="baris" value="">
<input type="submit" href="#" class="w3-button w3-pale-red w3-round" name="tambah" id="tambah" value="Add">
<input type="hidden" name="bar" id="bar"value="<?php echo $_GET['baris']; ?>">
</form>
            <?php $bar = $_POST['baris']; 
      
    if ($bar>=1) {
      while ($bar >= 1) {
      
      
    
            ?>

             <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5" style="width:200px">
                   <select class="chosen-select" name="t1" id="t1" data-placeholder="-- Pilih aaaaObat --" onchange="tampil_obat(this)" >
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM is_obat ORDER BY nama_obat ASC")
                       or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[nama_obat]\" >  $data_obat[nama_obat] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

            <?php $bar--; }   }?>
            </td>

              <!-- <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5" style="width:200px">
                   <select class="chosen-select" name="t2" id="t2" data-placeholder="-- Pilih Obat --" onchange="tampil_obat(this)" >
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM is_obat ORDER BY nama_obat ASC")
                       or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[nama_obat]\" >  $data_obat[nama_obat] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </td>

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5" style="width:200px">

                   <select class="chosen-select" name="t3" id="t3" data-placeholder="-- Pilih Obat --" onchange="tampil_obat(this)" >
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM is_obat ORDER BY nama_obat ASC")
                       or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[nama_obat]\" >  $data_obat[nama_obat] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </td>


              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5" style="width:200px">
                   <select class="chosen-select" name="t4" id="t2" data-placeholder="-- Pilih Obat --" onchange="tampil_obat(this)" >
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM is_obat ORDER BY nama_obat ASC")
                       or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[nama_obat]\" >  $data_obat[nama_obat] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </td>

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5" style="width:200px">
                   <select class="chosen-select" name="t5" id="t3" data-placeholder="-- Pilih Obat --" onchange="tampil_obat(this)" >
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT kode_obat, nama_obat FROM is_obat ORDER BY nama_obat ASC")
                       or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[nama_obat]\" >  $data_obat[nama_obat] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </td>
 -->
            



            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=rekam_medis" class="btn btn-default btn-reset">Batal</a>
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
      $query = mysqli_query($mysqli, "SELECT kode_pasien,t1,t2,t3,t4,t5 FROM data_medis WHERE kode_pasien='$_GET[id]'") 
         or die('Ada kesalahan pada query tampil Data obat : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Detail Medis
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=obat"> Obat </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/obat/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pasioen</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_pasien" value="<?php echo $data['kode_pasien']; ?>" readonly required>
                </div>
              </div>

              
             <div class="form-group">
                <label class="col-sm-2 control-label">Nama Obat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['t1']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="dokter" autocomplete="off" value="<?php echo $data['t2']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="keluhan" autocomplete="off" value="<?php echo $data['t3']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="diagnosis" autocomplete="off" value="<?php echo $data['t4']; ?>" required>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="diagnosis" autocomplete="off" value="<?php echo $data['t5']; ?>" required>
                </div>
              </div>

            

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <!-- <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan"> -->
                  <a href="?module=rekam_medis" class="btn btn-default btn-reset">Batal</a>
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

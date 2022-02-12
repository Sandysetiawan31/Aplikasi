

<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";


// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}


// jika halaman konten yang dipilih pasien, panggil file pasien
	elseif ($_GET['module'] == 'pasien') {
		include "modules/pasien/pasien.php";
	}

	// jika halaman konten yang dipilih form pasien, panggil file form pasien
	elseif ($_GET['module'] == 'form_pasien') {
		include "modules/pasien/form.php";
	}
	

// jika halaman konten yang dipilih Kunjungan, panggil file kunjungan
	elseif ($_GET['module'] == 'kunjungan') {
		include "modules/kunjungan/kunjungan.php";
	}

	// jika halaman konten yang dipilih form kunjungan, panggil file form  kunjungan
	elseif ($_GET['module'] == 'form_kunjungan') {
		include "modules/kunjungan/form.php";
	}
	

// jika halaman konten yang dipilih rekam medis, panggil file medis
	elseif ($_GET['module'] == 'rekam_medis') {
		include "modules/rekam-medis/medis.php";
	}

	// jika halaman konten yang dipilih form medis, panggil file form  medis
	elseif ($_GET['module'] == 'form_medis') {
		include "modules/rekam-medis/form.php";
	}
	// jika halaman konten yang dipilih form medis, panggil file form  medis
	elseif ($_GET['module'] == 'form_medis1') {
		include "modules/rekam-medis/form1.php";
	}


// jika halaman konten yang dipilih obat, panggil file view obat
	elseif ($_GET['module'] == 'obat') {
		include "modules/obat/view.php";
	}

	// jika halaman konten yang dipilih form obat, panggil file form obat
	elseif ($_GET['module'] == 'form_obat') {
		include "modules/obat/form.php";
	}
	
	// jika halaman konten yang dipilih obat masuk, panggil file view obat masuk
	elseif ($_GET['module'] == 'obat_masuk') {
		include "modules/obat-masuk/view.php";
	}

	// jika halaman konten yang dipilih form obat masuk, panggil file form obat masuk
	elseif ($_GET['module'] == 'form_obat_masuk') {
		include "modules/obat-masuk/form.php";
	}
	// jika halaman konten yang dipilih obat masuk, panggil file view obat masuk
	elseif ($_GET['module'] == 'obat_keluar') {
		include "modules/obat-keluar/view.php";
	}

	// jika halaman konten yang dipilih form obat masuk, panggil file form obat masuk
	elseif ($_GET['module'] == 'form_obat_keluar') {
		include "modules/obat-keluar/form.php";
	}



	// laporan
	// -----------------------------------------------------------------------------
   // jika halaman konten yang dipilih laporan kunjungan, panggil file view laporan kunjungan
	elseif ($_GET['module'] == 'lap_kunjungan') {
		include "modules/lap-kunjungan/kunjungan.php";
	}
	// -----------------------------------------------------------------------------

   // jika halaman konten yang dipilih laporan medis, panggil file view laporan medis
	elseif ($_GET['module'] == 'lap_medis') {
		include "modules/lap-medis/medis.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan obat masuk, panggil file view laporan obat masuk
	elseif ($_GET['module'] == 'lap_obat_masuk') {
		include "modules/lap-obat-masuk/view.php";
	}

	
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih laporan obat keluar, panggil file view laporan obat keluar
	elseif ($_GET['module'] == 'lap_obat_keluar') {
		include "modules/lap-obat-keluar/view.php";
	}

	
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>
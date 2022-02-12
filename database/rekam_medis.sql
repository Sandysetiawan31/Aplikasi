-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 11:13 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kunjungan`
--

CREATE TABLE `data_kunjungan` (
  `no_urut` varchar(10) NOT NULL,
  `kode_pasien` varchar(10) NOT NULL,
  `poli` varchar(20) NOT NULL,
  `tgl_kun` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kunjungan`
--

INSERT INTO `data_kunjungan` (`no_urut`, `kode_pasien`, `poli`, `tgl_kun`) VALUES
('NO-001', 'PS001', 'Poli Umum', '2019-04-01'),
('NO-002', 'PS002', 'Poli Umum', '2019-04-02'),
('NO-003', 'PS003', 'Poli Umum', '2019-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `data_medis`
--

CREATE TABLE `data_medis` (
  `kode_pasien` varchar(10) NOT NULL,
  `dokter` varchar(20) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `diagnosis` varchar(20) NOT NULL,
  `t1` varchar(20) NOT NULL,
  `t2` varchar(20) NOT NULL,
  `t3` varchar(20) NOT NULL,
  `t4` varchar(20) NOT NULL,
  `t5` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_medis`
--

INSERT INTO `data_medis` (`kode_pasien`, `dokter`, `keluhan`, `diagnosis`, `t1`, `t2`, `t3`, `t4`, `t5`) VALUES
('PS001', 'Poli KIA', 'a', 'a', 'o1', 'o2', 'o3', 'o4', 'o5'),
('PS002', 'DR. JONI', 'as', 'sa', 'komix', 'komix', 'komix', 'komix', 'komix'),
('PS003', 'DR. JONI', 'demam,pilek', 'flu', 'Amoxicillin', 'komix', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `kode_pasien` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alergi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`kode_pasien`, `nama`, `jk`, `tgl_lhr`, `alamat`, `pekerjaan`, `no_telp`, `alergi`) VALUES
('PS002', 'sandy', 'laki-laki', '1997-03-10', 's', 's', 's', 'a'),
('PS001', 'sukma', 'Perempuan', '1982-01-04', 'bagan pete', 'dosen', '081539951014', 'amoxilin'),
('PS003', 'nabila', 'Perempuan', '2008-02-01', 'bagan pete', 'pelajar', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat`
--

CREATE TABLE `is_obat` (
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `btk_obat` varchar(30) NOT NULL,
  `atr_pakai` varchar(100) NOT NULL,
  `indikasi` varchar(100) NOT NULL,
  `kontraindikasi` varchar(100) NOT NULL,
  `efek_smp` varchar(100) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat`
--

INSERT INTO `is_obat` (`kode_obat`, `nama_obat`, `btk_obat`, `atr_pakai`, `indikasi`, `kontraindikasi`, `efek_smp`, `dosis`, `satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000001', 'komix', 'sirup', '3x', 'mual', 'sakit', 'muntah', '35', 'Sirup', 4, 1, '2019-03-21 01:22:40', 1, '2019-04-07 06:33:23'),
('B000002', 'Acyclovir', 'Tablet', '3x sehari', 'Herpes simpleks', 'Hipersensitivitas', '-', '200mg', 'Kotak', 12, 1, '2019-04-09 02:26:41', 1, '2019-04-09 02:29:14'),
('B000003', 'Benacol', 'sirup', 'sebelum atau sesudah makan', 'Meredakan batuk yang diserytai gejala2 alergi', 'Bayi,hamil', '-', 'Dewasa : 3x sehari 2 sendok, Anak : 1 sendok teh', 'Botol', 10, 1, '2019-04-09 02:38:23', 1, '2019-04-09 02:41:09'),
('B000004', 'Amoxicillin', '-', 'Sesudah makan', 'Ifeksi seluruh napas', 'Infeksi mononukleosis', '-', 'Dewasa 500mg tiap 8 jam', 'Kotak', 12, 1, '2019-04-09 02:48:15', 1, '2019-04-13 04:53:13'),
('B000005', 'Amoxillin Sirup', 'Sirup', 'Berikan bersama makan', 'kulit dan jaringan lunak', 'Hipersensitif terhadap pinisillin', '-', 'Dewasa 250mg tiap 8 jam', 'Botol', 10, 1, '2019-04-09 02:53:47', 1, '2019-04-09 02:53:47'),
('B000006', 'Zoralin', 'Tablet', 'Sesudah Makan', 'Infeksi jamur sistemik', '-', '-', 'Dewasa : 1 tablet sekali sehari, Anak >2thn : 5mg/hari', 'Kotak', 14, 1, '2019-04-09 02:59:48', 1, '2019-04-09 02:59:48'),
('B000007', 'Abixa', 'Tablet', 'Bersamaan dengan makan atau tidak', 'pengobatan pasien dngan penyakit Alzheimer', 'Wanita menyusui', '-', '5mg tiap hari', 'Kotak', 13, 1, '2019-04-09 03:03:38', 1, '2019-04-09 13:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat_keluar`
--

CREATE TABLE `is_obat_keluar` (
  `kode_keluar` varchar(20) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat_keluar`
--

INSERT INTO `is_obat_keluar` (`kode_keluar`, `kode_obat`, `tanggal`, `jumlah`) VALUES
('OBT-2019-0001', 'B000007', '2019-04-09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat_masuk`
--

CREATE TABLE `is_obat_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat_masuk`
--

INSERT INTO `is_obat_masuk` (`kode_transaksi`, `tanggal_masuk`, `kode_obat`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('OBT-2019-0002', '2019-04-13', 'B000004', 2, 1, '2019-04-13 04:53:12'),
('TM-2019-0000001', '2019-04-02', 'B000001', 1, 1, '2019-04-02 14:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sandy', 'sandy setiawan', 'd686a53fb86a6c31fa6faa1d9333267e', 'sandy111834@gmail.com', '085896158930', 'indrasatya.jpg', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2019-03-21 01:19:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kunjungan`
--
ALTER TABLE `data_kunjungan`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `data_medis`
--
ALTER TABLE `data_medis`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `is_obat`
--
ALTER TABLE `is_obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_obat_keluar`
--
ALTER TABLE `is_obat_keluar`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `is_obat_masuk`
--
ALTER TABLE `is_obat_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_obat`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_obat`
--
ALTER TABLE `is_obat`
  ADD CONSTRAINT `is_obat_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_obat_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_obat_masuk`
--
ALTER TABLE `is_obat_masuk`
  ADD CONSTRAINT `is_obat_masuk_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `is_obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_obat_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

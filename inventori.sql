-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 04:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `jumlah` varchar(250) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `checklist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `kode_barang`, `nama_barang`, `jenis_barang`, `jumlah`, `satuan`, `checklist`) VALUES
(1, 'BAR-0121001', 'Nutrisari', 'Minuman', '12', 'Pack', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis_barang`) VALUES
(5, 'Makanan'),
(6, 'Minuman'),
(7, 'Obat');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id` int(11) NOT NULL,
  `id_kerusakan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_mesin` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tindakan` varchar(450) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `biaya` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id`, `id_kerusakan`, `tanggal`, `kode_barang`, `nama_mesin`, `jenis`, `tindakan`, `catatan`, `biaya`) VALUES
(8, 'KRS-0522002', '2022-05-17', '04.542.001-002', 'Single Post Lift', 'Meledak', 'Di ganti mesin BOS', 'Biaya akan di lanjutkan', '123333'),
(9, 'KRS-0522003', '2022-07-08', '04.542.001-002', 'Single Post Lift', 'WEDUUUSS', 'TINDAKAN GANTI BOS', 'Biaya Mahal Tapi gatau nih kalo bos gue kaya mah', '123456672'),
(10, 'KRS-0522004', '2022-05-17', '04.346.001', 'Electrical Tester', 'Meledak', 'Di ganti', 'asasasa', '13123121'),
(11, 'KRS-0522005', '2022-05-14', '04.345.001', 'Coil Spring Compresor', 'Meledak', 'Di ganti mesin', 'aaa', '1000000000');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id` int(11) NOT NULL,
  `id_pemeliharaan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_mesin` varchar(500) NOT NULL,
  `checklist` varchar(500) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `petugas` varchar(200) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id`, `id_pemeliharaan`, `tanggal`, `kode_barang`, `nama_mesin`, `checklist`, `catatan`, `petugas`, `jumlah`, `done`) VALUES
(36, 'PML-0522007', '0000-00-00', '04.345.001', 'Scanner Launch', 'Kebersihan Mesin', '111', '', 0, 1),
(38, 'PML-0522009', '0000-00-00', '04.345.001', 'Scanner Launch', 'Kebersihan Mesin,Kesehatan Mesin,Ganti Canvas Mesin', 'HALOHALO', '', 0, 1),
(41, 'PML-0522011', '2022-05-28', '', '4 Post Lift with 1 Jack', '', 'adadadadadaaaaaaaaaa111', 'Beben Kartiwa', 0, 1),
(43, 'PML-0522013', '2022-05-20', '04.346.001', 'Electrical Tester', 'Kebersihan Mesin,Kesehatan Mesin,Ganti Canvas Mesin', 'adadadadadaaaaaaaaaa12121', 'babang', 0, 0),
(46, 'PML-0622015', '2022-06-04', '04.437.001', '', 'Periksa Kompresor Pegas untuk memastikannya tidak rusak.,Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi.', '', '', 0, 0),
(47, 'PML-0622016', '2022-06-04', '04.160.001-003', '4 Post Lift with 1 Jack', ' Periksa perangkat keras yang longgar />\r\n        <label class=,Periksa adaptor retak, atau rusak,Periksa pengukur tekanan dan selang yang rusak', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(5, 'Unit'),
(7, 'PCS'),
(8, 'Pack'),
(9, 'Kg'),
(10, 'Butir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mesin`
--

CREATE TABLE `tb_mesin` (
  `id` int(100) NOT NULL,
  `kode_mesin` varchar(100) NOT NULL,
  `nama_mesin` varchar(100) NOT NULL,
  `merk_mesin` varchar(100) NOT NULL,
  `penyimpanan` varchar(200) NOT NULL,
  `ukuran` varchar(200) NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `fungsi` varchar(500) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `tgl_pelihara` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mesin`
--

INSERT INTO `tb_mesin` (`id`, `kode_mesin`, `nama_mesin`, `merk_mesin`, `penyimpanan`, `ukuran`, `tahun`, `jumlah`, `fungsi`, `harga`, `tgl_pelihara`) VALUES
(26, '04.437.001', 'Compresion Gauge for Gasoline', 'Krisbow DA 8101', 'R6', 'Besi', '2006', '1 Buah', '', 'Rp 1.754.545', NULL),
(27, '04.438.001', 'Compresion Gauge for Diesel', 'Krisbow DA 8102', 'R6', 'Besi', '2006', '1 Buah', '', 'Rp 2.181.818', NULL),
(28, '04.160.001-003', 'Coil Spring Compresor', 'KTC, AS-10', 'R2', '', '2006', '3 Buah', '', 'Rp 6.950.000', NULL),
(29, '04.345.001', 'Scanner Launch', 'Launch X 431 Master', 'R1', 'Besi', '2006', '1 Buah', '', 'Rp 43.000.000', NULL),
(30, '04.346.001', 'Electrical Tester', 'Launch RS-232', 'R1', 'Besi', '2006', '1 Buah', '', 'Rp 28.659.091', NULL),
(31, '04.347.001', 'Intelegent Tester', 'Carman VG RS-232C', 'R1', 'Besi', '2006', '1 Buah', '', 'Rp 49.090.909', NULL),
(32, '04.350.001', 'Engine Scan', 'KES-2000', 'R1', 'Besi', '2006', '1 Buah', '', 'Rp 26.136.364', NULL),
(33, '04.542.001-002', 'Single Post Lift', 'Jack Rotari JR-622 E', 'LP', 'Besi', '2006', '2 Unit', '', 'Rp 45.000.000', NULL),
(34, '04.544.001-002', '2 Post Lift', 'Hesbon HL-26K ', 'LP', 'Besi', '2006', '2 Unit', '', 'Rp 67.000.000', NULL),
(35, '04.545.001', '4 Post Lift with 1 Jack', 'Hesbon HL-300 J', 'LP', 'Besi', '2006', '1 Unit', '', 'Rp 48.500.000', NULL),
(36, '04.554.001', 'Genset', 'Denyo 35 - S10C10 : 10HP', 'LP', 'Besi', '2006', '1 Unit', 'Cadangan Listrik', 'Rp 141.409.091', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(25) NOT NULL DEFAULT 'member',
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `alamat`, `telepon`, `username`, `password`, `jabatan`, `foto`) VALUES
(26, '', 'Master', '', '08999444000', 'pimpinan', '17c4520f6cfd1ab53d8745e84681eb49', 'pimpinan', 'teacher4.png'),
(33, '', 'babang', '', '08232372327', 'babang', '8d213eebcccc4cecc92b215abb7bdcf3', 'mekanik', '16647380.jpg'),
(34, '', 'Beben Kartiwa', '', '08122181723', 'beben', 'e10adc3949ba59abbe56e057f20f883e', 'pimpinan', 'pure-white-background-85a'),
(35, '', 'Hendi Sutisna', '', '081220538655', 'hendi', 'e10adc3949ba59abbe56e057f20f883e', 'staf', 'pure-white-background-85a'),
(36, '', 'Andri', '', '082316553015', 'andri', 'e10adc3949ba59abbe56e057f20f883e', 'mekanik', 'l.png'),
(37, '', 'mekanik', '', '0811123123', 'meka', 'ea7cd15c9b11cb84e14b3a6b7520c400', 'mekanik', 'maskor.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mesin`
--
ALTER TABLE `tb_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_mesin`
--
ALTER TABLE `tb_mesin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

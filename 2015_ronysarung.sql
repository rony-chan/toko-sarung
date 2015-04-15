-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2015 at 02:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_ronysarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `alamat`, `notelp`, `username`, `password`) VALUES
(1, 'Yusuf Akhsan Hidayat', 'DIY, Indonesia', '08123', 'yussan', 'be71a8e61b64f613366380071fae3b38'),
(2, 'Rony I', 'Jl. Cempaka 116A Concat Depok Sleman Yogyakarta', '082220356836', 'rony', 'be71a8e61b64f613366380071fae3b38');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `konten` text NOT NULL,
  `postdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `judul`, `konten`, `postdate`, `updatedate`) VALUES
(1, 1, 'Prosedur Pengambilan Pesanan', 'untuk prosedurnya silahkan baca dengan seksama', '2015-01-17 19:03:59', '2015-01-17 19:03:59'),
(3, 1, 'Cara Belanja', 'Tutorial Cara Pemesanan dan Pembelian Sarung di Toko Sarung Hasaniyyin\r\n1. Login dengan akun masing-masing. Jika belum mempunyai akun silakan Klik ''Daftar''\r\n2. Pilih jenis, ukuran dan jumlah Sarung yang akan di pesan\r\n3. Setelah pemesanan selaesai cetak bukti pesanan\r\n4. Kemudian datang ke Toko kami dengan membawa prin out pesanan\r\n5. Barang siap dibawa :)', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(4, 1, 'Lokasi Toko Sarung Hasaniyyin', 'Alamat Toko Sarung Hasaniyyin:\r\nJl. Cempaka 5 No. 3, Kel. Poncol, Kab. Pekalongan, Jawa Tengah\r\n\r\nGoogle Maps:\r\nhttp://maps.google.com/', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(5, 1, 'Baca Saya', 'Toko Sarung Hasaniyyin adalah toko grosir sarung yang menyediakan berbagai macam jenis sarung untuk dijual kembali oleh para pembeli.\r\n\r\nToko ini hanya menjual dan menyediakan sarung dalam hitungan Kodi dan tidak menerima pembelian sarung dalam bentuk satuan.\r\n\r\nUntuk pemesanan sarung diharuskan kepada pembeli untuk datang langsung ke toko kami agar tidak terjadi sesuatu yang diingikan oleh kedua belah pihak.', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(6, 1, 'Garansi', 'Garansi Barang (Sarung)\n1. Garansi barang dilakukan dalam waktu seminggu sebelum sarung di jual kembali.\n2. Garansi berupaka penukaran sarung dengan model yang sama.\n3. Tidak menerima Claim Garansi apabila sarung hilang dalam perjalanan pulang.\n4. Semoga Barokahsdsdsdsd', '2015-01-17 00:00:00', '2017-03-15 18:04:45'),
(7, 1, 'Hubungi Kami', 'Hubungi Kami di:\r\nNo. Telepon: (0274)-998877\r\nNo. HP: 087733498000\r\nBBM: 7D7C85BB\r\nLine:\r\nWhatsapp:\r\nEmail: dr_key@gmail.com', '2015-01-17 00:00:00', '2009-04-15 08:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_sarung` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_sarung`, `gambar`) VALUES
(1, 'wadimor1.JPG'),
(2, 'hasaniyin1.jpg'),
(3, 'gajahduduk1.jpg'),
(4, 'cendana1.jpg'),
(1, 'wadimorbiru.jpg'),
(1, 'c448113b35b814ab2c06a167cf165760.jpg'),
(5, '29dd31cceb91d2300882bda39f9c3ae1.jpg'),
(6, '19d13b9e05bf8234c06c698c0ce0a0ea.jpg'),
(7, 'e7c53b6757dcd8379090c0f00a543f60.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pasokan`
--

CREATE TABLE IF NOT EXISTS `pasokan` (
`id_pasokan` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasokan`
--

INSERT INTO `pasokan` (`id_pasokan`, `id_pemasok`, `tanggal`) VALUES
(6, 2, '2015-04-15 13:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `pasokan_item`
--

CREATE TABLE IF NOT EXISTS `pasokan_item` (
  `id_pasokan` int(11) NOT NULL,
  `id_sarung` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasokan_item`
--

INSERT INTO `pasokan_item` (`id_pasokan`, `id_sarung`, `jumlah`, `harga`, `subtotal`) VALUES
(6, 1, 5, 1400000, 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `alamat`, `notelp`, `password`, `email`) VALUES
(1, 'Yusuf Konbawa', 'Jl Lele Pugeran', '08123456', 'be71a8e61b64f613366380071fae3b38', 'iam@yussan.me'),
(3, 'Nandy Alam', 'Jl. Ngawi Mantingan', '082220356836', '14d0f2bb475dbcdc51de4b406857fc62', 'nandy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
`id_pemasok` int(11) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `alamat_pemasok` varchar(200) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama_pemasok`, `alamat_pemasok`, `no_telp`) VALUES
(2, 'PT. Wadimor', 'Jln. Jakarta Pusat', '0274 684583'),
(3, 'PT. Gajah Duduk', 'Jln. Jakarta Barat', '0274 684624'),
(4, 'PT. Sarung Cendana', 'Jln. Jakarta Pusat', '0274 632145'),
(5, 'PT. Uzair Sarung', 'Jln. Bekasi', '0274 963852'),
(6, 'PT. Atlas Sarung', 'Jln. Bekasi', '0274 745896');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id_pesan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggalOrder` datetime NOT NULL,
  `tanggalLunas` datetime DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('menunggu pembayaran','lunas') NOT NULL,
  `barangdiambil` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `id_admin`, `tanggalOrder`, `tanggalLunas`, `harga`, `status`, `barangdiambil`) VALUES
(6, 1, NULL, '2012-03-15 05:43:33', NULL, 10800000, 'lunas', 0),
(7, 1, NULL, '2016-03-15 09:00:08', NULL, 19800000, 'lunas', 1),
(12, 1, NULL, '2008-04-15 18:57:04', NULL, 7000000, 'lunas', 1),
(13, 3, NULL, '2014-04-15 03:03:12', NULL, 2550000, 'lunas', 0),
(14, 3, NULL, '2014-04-15 15:07:26', NULL, 1060000, 'menunggu pembayaran', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_item`
--

CREATE TABLE IF NOT EXISTS `pesan_item` (
  `id_pesan` int(11) NOT NULL,
  `id_sarung` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_item`
--

INSERT INTO `pesan_item` (`id_pesan`, `id_sarung`, `jumlah`, `subtotal`) VALUES
(12, 1, 5, 7000000),
(13, 2, 3, 2550000),
(14, 4, 1, 1060000);

-- --------------------------------------------------------

--
-- Table structure for table `sarung`
--

CREATE TABLE IF NOT EXISTS `sarung` (
`id_sarung` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL COMMENT 'dalam bentuk kodi',
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarung`
--

INSERT INTO `sarung` (`id_sarung`, `id_merk`, `nama`, `jumlah`, `harga`, `deskripsi`) VALUES
(1, 1, 'Sarung Wadimor Jacquard Lilin', 0, 1400000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.\r\nMenggunakan bahan anti panas, memungkinkan penggunan selalu sejuk ketika menggunakannya.\r\nSarung ini tahan terhadap air, aman ketika digunakan dalam keadaan hujan ataupun ketika berenang.\r\nAda 2 varian warna merah dan biru.\r\n'),
(2, 2, 'Sarung Tenun Hasaniyyin', 2, 850000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.'),
(3, 3, 'Sarung Gajah Duduk Black White', 5, 940000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.'),
(4, 4, 'Sarung Cendana Spesial Dobby', 9, 1060000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.'),
(5, 1, 'Sarung Wadimor Hujan Gerimis', 5, 800000, 'Terbuat dari bahan berkualitas tenun terbaik yang diproses dengan teknik modern yang menjadikan kain terasa lembut dan warna tidak mudah luntur sehingga menjadikannya nyaman dipake sehari-hari tanpa masalah'),
(6, 6, 'Sarung Atlas Premium 770 Songket', 5, 2200000, 'Terbuat dari bahan berkualitas tenun terbaik yang diproses dengan teknik modern yang menjadikan kain terasa lembut dan warna tidak mudah luntur sehingga menjadikannya nyaman dipake sehari-hari tanpa masalah'),
(7, 6, 'Sarung Atlas Super 970 Songket', 5, 2200000, 'Terbuat dari bahan berkualitas tenun terbaik yang diproses dengan teknik modern yang menjadikan kain terasa lembut dan warna tidak mudah luntur sehingga menjadikannya nyaman dipake sehari-hari tanpa masalah');

-- --------------------------------------------------------

--
-- Table structure for table `sarung_merk`
--

CREATE TABLE IF NOT EXISTS `sarung_merk` (
`id_sarung_merk` int(11) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarung_merk`
--

INSERT INTO `sarung_merk` (`id_sarung_merk`, `merek`) VALUES
(1, 'Wadimor'),
(2, 'Hasaniyyin'),
(3, 'Gajah Duduk'),
(4, 'Cendana'),
(5, 'Uzair'),
(6, 'Atlas');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`), ADD KEY `id_berita` (`id_berita`), ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD KEY `id_sarung` (`id_sarung`);

--
-- Indexes for table `pasokan`
--
ALTER TABLE `pasokan`
 ADD PRIMARY KEY (`id_pasokan`), ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indexes for table `pasokan_item`
--
ALTER TABLE `pasokan_item`
 ADD KEY `id_pasokan` (`id_pasokan`,`id_sarung`), ADD KEY `id_sarung` (`id_sarung`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
 ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`id_pesan`), ADD KEY `id_pelanggan` (`id_pelanggan`,`id_admin`);

--
-- Indexes for table `pesan_item`
--
ALTER TABLE `pesan_item`
 ADD KEY `id_pesan` (`id_pesan`,`id_sarung`), ADD KEY `id_sarung` (`id_sarung`);

--
-- Indexes for table `sarung`
--
ALTER TABLE `sarung`
 ADD PRIMARY KEY (`id_sarung`), ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `sarung_merk`
--
ALTER TABLE `sarung_merk`
 ADD PRIMARY KEY (`id_sarung_merk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pasokan`
--
ALTER TABLE `pasokan`
MODIFY `id_pasokan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sarung`
--
ALTER TABLE `sarung`
MODIFY `id_sarung` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sarung_merk`
--
ALTER TABLE `sarung_merk`
MODIFY `id_sarung_merk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_sarung`) REFERENCES `sarung` (`id_sarung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasokan`
--
ALTER TABLE `pasokan`
ADD CONSTRAINT `pasokan_ibfk_1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasokan_item`
--
ALTER TABLE `pasokan_item`
ADD CONSTRAINT `pasokan_item_ibfk_2` FOREIGN KEY (`id_sarung`) REFERENCES `sarung` (`id_sarung`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pasokan_item_ibfk_3` FOREIGN KEY (`id_pasokan`) REFERENCES `pasokan` (`id_pasokan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan_item`
--
ALTER TABLE `pesan_item`
ADD CONSTRAINT `pesan_item_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pesan_item_ibfk_2` FOREIGN KEY (`id_sarung`) REFERENCES `sarung` (`id_sarung`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

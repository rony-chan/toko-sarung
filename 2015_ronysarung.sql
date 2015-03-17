-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2015 at 04:33 
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_ronysarung`
--
CREATE DATABASE IF NOT EXISTS `2015_ronysarung` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2015_ronysarung`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `alamat`, `notelp`, `username`, `password`) VALUES
(1, 'Yusuf Akhsan Hidayat', 'DIY, Indonesia', '08123', 'yussan', 'be71a8e61b64f613366380071fae3b38'),
(2, 'Rony I', 'Jl. Cempaka 116A Concat Depok Sleman Yogyakarta', '082220356836', 'rony', 'a6296f234a2ff4800237a96a049ca58c');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `konten` text NOT NULL,
  `postdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `id_berita` (`id_berita`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `judul`, `konten`, `postdate`, `updatedate`) VALUES
(1, 1, 'Prosedur Pengambilan Pesanan', 'untuk prosedurnya silahkan baca dengan seksama', '2015-01-17 19:03:59', '2015-01-17 19:03:59'),
(3, 1, 'Cara Belanja', 'Tutorial Cara Pemesanan dan Pembelian Sarung di Toko Sarung Hasaniyyin\r\n1. Login dengan akun masing-masing. Jika belum mempunyai akun silakan Klik ''Daftar''\r\n2. Pilih jenis, ukuran dan jumlah Sarung yang akan di pesan\r\n3. Setelah pemesanan selaesai cetak bukti pesanan\r\n4. Kemudian datang ke Toko kami dengan membawa prin out pesanan\r\n5. Barang siap dibawa :)', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(4, 1, 'Lokasi Toko Sarung Hasaniyyin', 'Alamat Toko Sarung Hasaniyyin:\r\nJl. Cempaka 5 No. 3, Kel. Poncol, Kab. Pekalongan, Jawa Tengah\r\n\r\nGoogle Maps:\r\nhttp://maps.google.com/', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(5, 1, 'Baca Saya', 'Toko Sarung Hasaniyyin adalah toko grosir sarung yang menyediakan berbagai macam jenis sarung untuk dijual kembali oleh para pembeli.\r\n\r\nToko ini hanya menjual dan menyediakan sarung dalam hitungan Kodi dan tidak menerima pembelian sarung dalam bentuk satuan.\r\n\r\nUntuk pemesanan sarung diharuskan kepada pembeli untuk datang langsung ke toko kami agar tidak terjadi sesuatu yang diingikan oleh kedua belah pihak.', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(6, 2, 'Garansi', 'Garansi Barang (Sarung)\r\n1. Garansi barang dilakukan dalam waktu seminggu sebelum sarung di jual kembali.\r\n2. Garansi berupaka penukaran sarung dengan model yang sama.\r\n3. Tidak menerima Claim Garansi apabila sarung hilang dalam perjalanan pulang.\r\n4. Semoga Barokah', '2015-01-17 00:00:00', '2015-01-17 00:00:00'),
(7, 2, 'Hubungi Kami', 'Hubungi Kami di:\r\nNo. Telepon: (0274)-998877\r\nNo. HP: 087733498000\r\nBBM: 7D7C85BB\r\nLine:\r\nWhatsapp:\r\nEmail: dr_key@gmail.com', '2015-01-17 00:00:00', '2015-01-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_sarung` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  KEY `id_sarung` (`id_sarung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_sarung`, `gambar`) VALUES
(1, 'wadimor1.JPG'),
(2, 'hasaniyin1.jpg'),
(3, 'gajahduduk1.jpg'),
(4, 'cendana1.jpg'),
(5, 'uzair1.jpg'),
(1, 'wadimorbiru.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pasokan`
--

CREATE TABLE IF NOT EXISTS `pasokan` (
  `id_pasokan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasok` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_pasokan`),
  KEY `id_pemasok` (`id_pemasok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pasokan_item`
--

CREATE TABLE IF NOT EXISTS `pasokan_item` (
  `id_pasokan` int(11) NOT NULL,
  `id_sarung` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `id_sarung_merk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  KEY `id_pasokan` (`id_pasokan`,`id_sarung`,`id_sarung_merk`),
  KEY `id_sarung_merk` (`id_sarung_merk`),
  KEY `id_sarung` (`id_sarung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `alamat`, `notelp`, `password`, `email`) VALUES
(1, 'Yusuf Konbawa', 'Jl Lele Pugeran', '08123456', 'be71a8e61b64f613366380071fae3b38', 'iam@yussan.me');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggalOrder` datetime NOT NULL,
  `tanggalLunas` datetime DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('menunggu pembayaran','lunas') NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `id_pelanggan` (`id_pelanggan`,`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `id_admin`, `tanggalOrder`, `tanggalLunas`, `harga`, `status`) VALUES
(6, 1, NULL, '2012-03-15 05:43:33', NULL, 10800000, 'menunggu pembayaran'),
(7, 1, NULL, '2016-03-15 09:00:08', NULL, 19800000, 'menunggu pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_item`
--

CREATE TABLE IF NOT EXISTS `pesan_item` (
  `id_pesan` int(11) NOT NULL,
  `id_sarung` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  KEY `id_pesan` (`id_pesan`,`id_sarung`),
  KEY `id_sarung` (`id_sarung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_item`
--

INSERT INTO `pesan_item` (`id_pesan`, `id_sarung`, `jumlah`, `subtotal`) VALUES
(6, 5, 12, 10800000),
(7, 5, 22, 19800000);

-- --------------------------------------------------------

--
-- Table structure for table `sarung`
--

CREATE TABLE IF NOT EXISTS `sarung` (
  `id_sarung` int(11) NOT NULL AUTO_INCREMENT,
  `id_merk` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL COMMENT 'dalam bentuk kodi',
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  PRIMARY KEY (`id_sarung`),
  KEY `id_merk` (`id_merk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sarung`
--

INSERT INTO `sarung` (`id_sarung`, `id_merk`, `nama`, `jumlah`, `harga`, `deskripsi`) VALUES
(1, 1, 'Sarung Wadimor Jacquard Lilin Gerimis', 5, 1400000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.\r\nMenggunakan bahan anti panas, memungkinkan penggunan selalu sejuk ketika menggunakannya.\r\nSarung ini tahan terhadap air, aman ketika digunakan dalam keadaan hujan ataupun ketika berenang.\r\nAda 2 varian warna merah dan biru.\r\n'),
(2, 2, 'Sarung Tenun Hasaniyyin', 5, 850000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.'),
(3, 3, 'Sarung Gajah Duduk Black White', 5, 940000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.'),
(4, 4, 'Sarung Cendana Spesial Dobby', 5, 1060000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.'),
(5, 5, 'Sarung Uzair AAC', 0, 900000, 'Dari bahan bermutu tinggi, tahan dalam segala kondisi Mulus seperti kuliat ayam goreng. Memiliki citarasa seni yang tinggi.');

-- --------------------------------------------------------

--
-- Table structure for table `sarung_merk`
--

CREATE TABLE IF NOT EXISTS `sarung_merk` (
  `id_sarung_merk` int(11) NOT NULL AUTO_INCREMENT,
  `merek` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sarung_merk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sarung_merk`
--

INSERT INTO `sarung_merk` (`id_sarung_merk`, `merek`) VALUES
(1, 'wadimor'),
(2, 'hasaniyin'),
(3, 'gajah duduk'),
(4, 'cendana'),
(5, 'uzair');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Constraints for table `pasokan_item`
--
ALTER TABLE `pasokan_item`
  ADD CONSTRAINT `pasokan_item_ibfk_1` FOREIGN KEY (`id_sarung_merk`) REFERENCES `sarung_merk` (`id_sarung_merk`) ON DELETE CASCADE ON UPDATE CASCADE,
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

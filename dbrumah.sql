-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. September 2021 jam 11:47
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbrumah`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `r`
--
CREATE TABLE IF NOT EXISTS `r` (
`ukuran` varchar(10)
,`tipe` varchar(10)
,`kode_bayar` int(11)
,`kode_rumah` int(11)
,`kode_desain` int(11)
,`user_name_pelanggan` varchar(20)
,`nama` varchar(50)
,`no_rek` varchar(50)
,`total_bayar` varchar(255)
,`status` int(11)
,`jumlah` int(11)
,`metode` varchar(50)
,`bukti_transfer` varchar(100)
,`tanggal` date
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('Admin') DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_desain`
--

CREATE TABLE IF NOT EXISTS `tbl_desain` (
  `kode_desain` int(11) NOT NULL AUTO_INCREMENT,
  `harga` varchar(11) DEFAULT NULL,
  `tipe` varchar(10) DEFAULT NULL,
  `keterangan` mediumtext,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_desain`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tbl_desain`
--

INSERT INTO `tbl_desain` (`kode_desain`, `harga`, `tipe`, `keterangan`, `foto`) VALUES
(0, '0', '-', '-', '-'),
(7, '200000000', 'Rumah Kaca', 'Rumah Kaca Minimalis memberikan inpirasi terbaik saat ini untuk desain rumah yang sedang anda cari dan anda idamkan. Dari berbagai sumber yang terpercaya, Arcadia Design Architect harapkan dapat di jadikan acuan anda dalam Ide Desain Arsitektur Rumah, Desain Interior dan Konstruksi Terbaik Rumah Idaman.', 'desain 2.jpg'),
(8, '100000000', 'Desain Kay', 'Jika saat ini anda sedang ingin membangun rumah, merenovasi rumah ataupun hanya membutuhkan desain rumah dan memerlukan inspirasi dari konsep Rumah Minimalis, pilhan yang sangat tepat telah berkunjung di Arcadia Design Architect. Sebagai penyedia ide Desain Arsitektur Rumah, Desain Rumah minimalis modern, maupun Desain Interior rumah mewah, kami sediakan desain rumah lengkap dengan ukurannya.\r\n', 'desain 1.jpg'),
(10, '3213', '22323', '21312222', 'thumb-1920-380534.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE IF NOT EXISTS `tbl_informasi` (
  `kode_info` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `waktu_info` datetime DEFAULT NULL,
  `isi_info` text,
  PRIMARY KEY (`kode_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`kode_info`, `judul`, `waktu_info`, `isi_info`) VALUES
(5, 'Cara Memilih Desain Yang Bagus', '2020-12-16 01:09:03', 'Jika saat ini anda sedang ingin membangun rumah, merenovasi rumah ataupun hanya membutuhkan desain rumah dan memerlukan inspirasi dari konsep Rumah Minimalis, pilhan yang sangat tepat telah berkunjung di Arcadia Design Architect. Sebagai penyedia ide Desain Arsitektur Rumah, Desain Rumah minimalis modern, maupun Desain Interior rumah mewah, kami sediakan desain rumah lengkap dengan ukurannya.\r\n\r\nKami memiliki berbagai contoh inspirasi gambar rumah terbaru serta menarik untuk digunakan dalam remodeling rumah impian anda. Pada Rumah Kaca Minimalis, setidaknya akan memberikan gambaran terbaik dalam desain rumah yang anda harapkan saat ini.'),
(6, 'Cara Membeli Rumah Yang Cocok Buat Keluarga', '2020-12-16 01:09:41', 'Rumah Kaca Minimalis memberikan inpirasi terbaik saat ini untuk desain rumah yang sedang anda cari dan anda idamkan. Dari berbagai sumber yang terpercaya, Arcadia Design Architect harapkan dapat di jadikan acuan anda dalam Ide Desain Arsitektur Rumah, Desain Interior dan Konstruksi Terbaik Rumah Idaman.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` text,
  `no_hp` bigint(12) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Aktif',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`username`, `password`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`, `tanggal`, `status`) VALUES
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'DELISMAN HULU', 'Laki-Laki', 'Jln. Garama Medan', 81375653271, '2020-12-16 01:10:18', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesan` (
  `kode_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(20) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi_pesan` text,
  `waktu_pesan` datetime DEFAULT NULL,
  `status` enum('Baru','Telah di Respon','') DEFAULT NULL,
  `balasan` text,
  PRIMARY KEY (`kode_pesan`),
  KEY `ps` (`pengirim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`kode_pesan`, `pengirim`, `judul`, `isi_pesan`, `waktu_pesan`, `status`, `balasan`) VALUES
(9, 'user', 'Saya Mau Tahu Jam Operasional Kantor', 'Selamat Malam saya mau tanya\r\nJam operasional Kantor ?', '2021-01-28 00:57:21', 'Baru', 'Saya Setuju dengan anda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesanan` (
  `kode_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rumah` int(11) DEFAULT '0',
  `kode_desain` int(11) DEFAULT '0',
  `user_name_pelanggan` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `bank` text NOT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) DEFAULT NULL,
  `metode` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`kode_bayar`),
  KEY `p1` (`kode_rumah`),
  KEY `p2` (`kode_desain`),
  KEY `p3` (`user_name_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`kode_bayar`, `kode_rumah`, `kode_desain`, `user_name_pelanggan`, `nama`, `no_rek`, `bank`, `total_bayar`, `status`, `jumlah`, `metode`, `bukti_transfer`, `tanggal`) VALUES
(18, 7, 0, 'user', '2', '123123', '', '', 0, 90, 'Tunai', NULL, '2021-01-28'),
(19, 8, 0, 'user', 'gg', '88', '', '200000000', 0, 8, 'Transfer', NULL, '2021-09-13'),
(20, 8, 0, 'user', 'Delisman Hulu', '77777', 'BNI', '50000000', 0, 2, 'Transfer', NULL, '2021-09-14'),
(21, 7, 0, 'user', 'Delisman Hulu', '333', 'BNI', '20000000', 0, 1, 'Transfer', NULL, '2021-09-14'),
(22, 0, 10, 'user', 'delisman hulu', '', 'BRI', '321.3', 0, 1, 'Transfer', NULL, '2021-09-14'),
(23, 0, 8, 'user', 'delisman hulu', '', 'BRI', '10000000', 0, 1, 'Transfer', NULL, '2021-09-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rumah`
--

CREATE TABLE IF NOT EXISTS `tbl_rumah` (
  `kode_rumah` int(11) NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(10) DEFAULT NULL,
  `tipe` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `fasilitas` mediumtext,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_rumah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tbl_rumah`
--

INSERT INTO `tbl_rumah` (`kode_rumah`, `ukuran`, `tipe`, `harga`, `lokasi`, `fasilitas`, `foto`) VALUES
(0, '-', '-', 0, '-', '-', '-'),
(7, 'Ukuran 6 X', 'Rumah Mini', 200000000, 'Jl. Jamin Ginting No.583, Titi Rantai, Kec. Medan Baru, Kota Medan, Sumatera Utara 20157', '<p><strong>Rumah Golf Lake Residence</strong></p><p>Dijual Rumah Golf Lake Residence</p><p>Uk 8x20</p><p>2 lantai</p><p>3+1KT</p><p>3+1KM</p><p>Furnish</p><p>SHM</p><p>Selatan</p><p>(Kondisi tersewa s/d awal november 2020)</p>', 'gambar 4.jpg'),
(8, '10 X 10', 'Kayu dan B', 250000000, 'Jl. Jamin Ginting No.583, Titi Rantai, Kec. Medan Baru, Kota Medan, Sumatera Utara 20157', '<p>Panorama Bali Residence Harga Mulai dari 200JutaanJl H. USA Putat Nutug Ciseeng Parung â€“ BogorHunian Asri Nuansa Bali, Fasilitas lengkap dengan lokasi strategis dan pinggir jalan percis di 43 Hektar dengan 3.300 Unit</p>', 'gambar 3.jpg'),
(9, '9 X 9 Ukur', 'Keluarga B', 600000000, 'Jl. Jawa No.2, Gg. Buntu, Kec. Medan Tim., Kota Medan, Sumatera Utara 20231', '<p>Semua Lengkap&nbsp;</p><p>Premium Townhouse, dilokasi strategis Ciputat / Bintaro dengan design mewah namun harga terjangkau.</p>', 'gambar 1.jpg'),
(10, 'Rumah 5 X ', 'Rumah Kelu', 500000000, 'JL. Bilal No. 24, Pulo Brayan Darat I, Medan Timur, Pulo Brayan Darat I, Medan Tim., Kota Medan, Sum', '<p>Fasilitas</p><p>Kamir 2 Bed</p><p>Ruang Tamu</p><p>Kursi Sova</p>', 'gambar2.jpg');

-- --------------------------------------------------------

--
-- Structure for view `r`
--
DROP TABLE IF EXISTS `r`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `r` AS select `tbl_rumah`.`ukuran` AS `ukuran`,`tbl_desain`.`tipe` AS `tipe`,`tbl_pesanan`.`kode_bayar` AS `kode_bayar`,`tbl_pesanan`.`kode_rumah` AS `kode_rumah`,`tbl_pesanan`.`kode_desain` AS `kode_desain`,`tbl_pesanan`.`user_name_pelanggan` AS `user_name_pelanggan`,`tbl_pesanan`.`nama` AS `nama`,`tbl_pesanan`.`no_rek` AS `no_rek`,`tbl_pesanan`.`total_bayar` AS `total_bayar`,`tbl_pesanan`.`status` AS `status`,`tbl_pesanan`.`jumlah` AS `jumlah`,`tbl_pesanan`.`metode` AS `metode`,`tbl_pesanan`.`bukti_transfer` AS `bukti_transfer`,`tbl_pesanan`.`tanggal` AS `tanggal` from ((`tbl_rumah` join `tbl_pesanan` on((`tbl_rumah`.`kode_rumah` = `tbl_pesanan`.`kode_rumah`))) join `tbl_desain` on((`tbl_desain`.`kode_desain` = `tbl_pesanan`.`kode_desain`)));

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD CONSTRAINT `ps` FOREIGN KEY (`pengirim`) REFERENCES `tbl_pelanggan` (`username`);

--
-- Ketidakleluasaan untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `p1` FOREIGN KEY (`kode_rumah`) REFERENCES `tbl_rumah` (`kode_rumah`),
  ADD CONSTRAINT `p2` FOREIGN KEY (`kode_desain`) REFERENCES `tbl_desain` (`kode_desain`),
  ADD CONSTRAINT `p3` FOREIGN KEY (`user_name_pelanggan`) REFERENCES `tbl_pelanggan` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
